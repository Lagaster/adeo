<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;
use Illuminate\Support\Facades\Session;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::query()->latest()->get();

        return view('admin_side.programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin_side.programs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgramRequest $request)
    {
        $data = $request->validated();
        // upload image 

        if (file_exists($request->file('image'))) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(storage_path('app/public/images/programs'), $imageName);
            $data['image'] = $imageName;
        }
       
        $data['slug'] = Str::of($data['title'])->slug('-');
        $data['created_by'] = auth()->user()->id;
        Program::create($data);
        Session::flash('success', 'Program Created Successfully');
        return redirect()->route('programs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($programId)
    {
        $program = Program::findOrFail($programId);
        return view('admin_side.programs.show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        return view('admin_side.programs.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgramRequest $request, Program $program)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $image_path = storage_path('app/public/images/programs' . $program->image);
            // delete old image
            if ($program->image != 'default_program.png' && file_exists($image_path)) {
                Storage::disk('public')->delete('images/programs/' . $program->image);
            } else {
                $data['image'] = $program->image;
            }

            // upload image 
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/programs'), $imageName);
            $data['image'] = $imageName;
        }
        $data['slug'] = Str::of($data['title'])->slug('-');
        // $data['created_by'] = auth()->user()->id ;
        $program->update($data);
        Session::flash('success', 'Program Updated Successfully');
        return redirect()->route('programs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($programId)
    {
        Log::info("Program Id : " . $programId);
        $program = Program::findOrFail($programId);

        $image_path = public_path('storage/images/programs/' . $program->image);
        // delete old image
        if ($program->image != 'default_program.png' && file_exists($image_path)) {
            Storage::disk('public')->delete('images/programs/' . $program->image);
        } 

        // $program->delete();

        return response()->json([
            'statue' => true,
            'message' => 'Program Deleted Successfully'
        ]);
    }
}
