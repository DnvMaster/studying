<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategory()
    {
        return view('admin.category.index');
    }
    public function addCategory(Request $request)
    {
        $validate = $request->validate([
            'category_name'=>'required|unique:categories|max:15',
            'category_name'=>'required|unique:categories|min:5',
        ],[
            'category_name.required'=>'Введите название категории!',
            'category_name.max'=>'Название категории должно быть не больше 15 символов.',
            'category_name.min'=>'Название категории должно быть не меньше 5 символов.',
        ]);
    }
}
