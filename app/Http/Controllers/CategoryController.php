<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function allCategory()
    {
        $categories = Category::latest()->paginate(5);
        // $categories = DB::table('categories')->latest()->paginate(4);
        return view('admin.category.index',compact('categories'));
    }
    public function addCategory(Request $request)
    {
        // Ограничение символов в тексте
        $validate = $request->validate([
            'category_name'=>'required|unique:categories|max:15',
            'category_name'=>'required|unique:categories|min:5',
        ],[
            'category_name.required'=>'Введите название категории!',
            'category_name.max'=>'Название категории должно быть не больше 15 символов.',
            'category_name.min'=>'Название категории должно быть не меньше 5 символов.',
        ]);
        // Вставка данных в таблицу Категории базы данных

        // Вариант - 1
        // Category::insert([
        //    'category_name'=>$request->category_name,
        //    'user_id'=>Auth::user()->id,
        //    'created_at'=>Carbon::now(),
        //]);

        // Вариант - 2
        $category = new Category;
        $category->category_name = $request->category_name;
        $category->user_id = Auth::user()->id;
        $category->save();
        return Redirect()->back()->with('success','Название категории успешно создано');
    }

    public function edit($id)
    {
        // $categories = Category::find($id);
        $categories = DB::table('categories')->where('id',$id)->first();
        return view('admin.category.edit',compact('categories'));
    }

    public function update(Request $request, $id)
    {
        /*
        $update = Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
        ]);
        */

        $data = array();
        $data['category_name'] = $request->category_name;
        $data['user_id'] = Auth::user()->id;
        DB::table('categories')->where('id',$id)->update($data);
        
        return Redirect()->route('all-category')->with('success','Название категории успешно обновлено.');
    }
}
