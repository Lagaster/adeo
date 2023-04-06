<?php

namespace App\Http\Controllers\API;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Resources\GalleryResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreGalleryRequest;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries =  GalleryResource::collection(Gallery::latest()->lazy());
        return response()->json($galleries);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGalleryRequest $request)
    {
        $data = $request->validated();
        $gallery = new Gallery();
        $gallery->file = Storage::disk('public')->put('images/galleries', $request->file('file'));
        $gallery->save();
        return response()->json(['success' => 'Image Uploaded Successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($galleryId)
    {
        
        $gallery = Gallery::findOrFail($galleryId);
        Log::info($gallery->file);
        Storage::disk('public')->delete($gallery->file) ;
        $gallery->delete();
        return response()->json(['success' => 'Image Deleted Successfully']);
        
    }
}
