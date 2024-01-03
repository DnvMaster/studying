<?php

namespace App\Http\Controllers;

use App\Models\About;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function aboutAll()
    {
        $abouts = About::latest()->get();
        return view('admin.about.index',compact('abouts'));

    }
    public function aboutAdd()
    {
        return view('admin.about.add_about');
    }
    public function storeAbout(Request $request)
    {
        About::insert([
            'title'=>$request->title,
            'short'=>$request->short,
            'long'=>$request->long,
            'created_at'=>Carbon::now(),
        ]);
        return Redirect()->route('all-about')->with('success','Раздел был успешно создан');
    }
    public function edit($id)
    {
        $abouts = About::find($id);
        return view('admin.about.edit',compact('abouts'));
    }
    public function update(Request $request, $id)
    {
        $update = About::find($id)->update([
            'title' => $request->title,
            'short' => $request->short,
            'long' => $request->long,
        ]);
        return Redirect()->route('all-about')->with('success','Раздел О нас, был успешно обновлён.');
    }
    public function delete($id)
    {
        About::find($id)->delete();
        return Redirect()->route('all-about')->with('success','Раздел о нас успешно удалён.');
    }
}
