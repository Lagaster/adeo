<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function allGalleries()
    {
        $galleries = Gallery::latest()->get();
        return response()->json($galleries);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin_side.galleries.index');
    }

    
}
