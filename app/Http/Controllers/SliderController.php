<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
use Auth;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allSliders()
    {
        $sliders = Slide::latest()->get();
        return view('admin.sliders.index',compact('sliders'));
    }
    public function addSlide()
    {
        return view('admin.sliders.add_slide');
    }
    public function storeSlide(Request $request)
    {
        $slider_image = $request->file('image');
        $name_generate = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920,1088)->save('images/sliders/'.$name_generate);
        $last_image = 'images/sliders/'.$name_generate;
        Slide::insert([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$last_image,
            'created_at'=>Carbon::now(),
        ]);
        return Redirect()->route('all-sliders')->with('success','Слайд был успешно создан');
    }
}
