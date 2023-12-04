<?php

namespace App\Http\Controllers;

use App\Models\Pikchers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function imagesAll()
    {
        $images = Pikchers::all();
        return view('admin.images.index',compact('images'));
    }
    public function imagesAdd(Request $request)
    {
        $validate = $request->validate([
            'image.required'=>'Выберите изображение.',
        ]);

        $image = $request->file('image');
        foreach($image as $img)
        {
            # Intervention Image package
            $generate_image = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(300,2300)->save('images/img/'.$generate_image);
            $last_image = 'images/img/'.$generate_image;


            Pikchers::insert([
                'image'=> $last_image,
                'created_at' => Carbon::now(),
            ]);
        }
        return Redirect()->back()->with('success','Изображение успешно сохранено.');

    }
}
