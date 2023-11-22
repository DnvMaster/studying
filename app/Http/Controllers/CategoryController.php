<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategory()
    {
        return view('admin.category.index');
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
}
