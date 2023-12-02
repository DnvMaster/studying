<?php

namespace App\Http\Controllers;

use App\Models\Pikchers;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function imagesAll()
    {
        $images = Pikchers::all();
        return view('admin.images.index',compact('images'));
    }
}
