<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\PreviousWork;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePreviousWorkRequest;
use App\Http\Requests\UpdatePreviousWorkRequest;

class PreviousWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $works = PreviousWork::query()->latest()->get();

        return view('admin_side.works.index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin_side.works.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePreviousWorkRequest $request)
    {
        $data = $request->validated();
        // upload image 

        if (file_exists($request->file('image'))) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(storage_path('app/public/images/works'), $imageName);
            $data['image'] = $imageName;
        }
       
        $data['slug'] = Str::of($data['title'])->slug('-');
        $data['created_by'] = auth()->user()->id;
        PreviousWork::create($data);
        Session::flash('success', 'Previous Work Created Successfully');
        return redirect()->route('works.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($previousWorkId)
    {
        $work = PreviousWork::findOrFail($previousWorkId);
        return view('admin_side.works.show', compact('work'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $previousWorkId)
    {
        $previousWork = PreviousWork::findOrFail($previousWorkId);
        return view('admin_side.works.edit', compact('previousWork'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePreviousWorkRequest $request,  $previousWorkId)
    {
        $data = $request->validated();
        $previousWork = PreviousWork::findOrFail($previousWorkId);
        
        if ($request->hasFile('image')) {
            $image_path = storage_path('app/public/images/works' . $previousWork->image);
            // delete old image
            if ($previousWork->image != 'default_program.png' && file_exists($image_path)) {
                Storage::disk('public')->delete('images/works/' . $previousWork->image);
            } 

            // upload image 
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(storage_path('app/public/images/works'), $imageName);
            $data['image'] = $imageName;

        }
        $data['slug'] = Str::of($data['title'])->slug('-');
        // $data['created_by'] = auth()->user()->id ;
        $previousWork->update($data);
        Session::flash('success', 'Previous work Updated Successfully');
        return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($previousWorkId)
    {
        Log::info("Prevous Work Id : " . $previousWorkId);
        $previousWork = PreviousWork::findOrFail($previousWorkId);

        $image_path = public_path('storage/images/works/' . $previousWork->image);
        // delete old image
        if ($previousWork->image != 'default_program.png' && file_exists($image_path)) {
            Storage::disk('public')->delete('images/works/' . $previousWork->image);
        } 

        $previousWork->delete();

        return response()->json([
            'statue' => true,
            'message' => 'Work Deleted Successfully'
        ]);
    }
}
