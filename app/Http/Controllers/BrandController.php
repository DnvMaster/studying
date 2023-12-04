<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function allBrands()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brands.index', compact('brands'));
    }
    public function storeBrand(Request $request)
    {
        // Ограничение символов в тексте
        $validate = $request->validate([
            'brand_name'=>'required|unique:brands|min:7',
            'brand_name'=>'required|unique:brands|max:12',
            'brand_image'=>'required|mimes:png,jpg,jpeg',
        ],[
            'brand_name.required'=>'Введите название бренда!',
            'brand_name.max'=>'Название бренда должно быть не больше 12 символов.',
            'brand_name.min'=>'Название бренда должно быть не меньше 7 символов.',
            'brand_image.required' =>'Выберите логотип бренда!'
        ]);

        $brand_image = $request->file('brand_image');
        // Генератор уникального идентификатора
        // $generate_image = hexdec(uniqid());
        // Получаем исходное рассширение изображения
        // $image_ext = strtolower($brand_image->getClientOriginalExtension());
        // $image_name = $generate_image.'.'.$image_ext;
        // Cохранение изображения в каталог Бренд
        // $up_location = 'images/brands/';
        // $last_image = $up_location.$image_name;
        // $brand_image->move($up_location,$image_name);

        # Intervention Image package
        $generate_image = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300,200)->save('images/brands/'.$generate_image);
        $last_image = 'images/brands/'.$generate_image;


        Brand::insert([
            'brand_name'=> $request->brand_name,
            'brand_image' => $last_image,
            'created_at' => Carbon::now(),
        ]);
        return Redirect()->back()->with('success','Логотип бренда успешно сохранён.');
    }
    public function edit($id)
    {
        $brands = Brand::find($id);
        return view('admin.brands.edit',compact('brands'));
    }
    public function update(Request $request, $id)
    {
        // Ограничение символов в тексте
        $validate = $request->validate([
            'brand_name'=>'required|min:7',
            'brand_name'=>'required|max:12',

        ],[
            'brand_name.required'=>'Введите название бренда!',
            'brand_name.max'=>'Название бренда должно быть не больше 12 символов.',
            'brand_name.min'=>'Название бренда должно быть не меньше 7 символов.',
            'brand_image.required' =>'Выберите логотип бренда!'
        ]);
        $old_image = $request->old_image;
        $brand_image = $request->file('brand_image');
        // Изменение названия логотипа с прежним логотипом
        if ($brand_image)
        {
            // Генератор уникального идентификатора
            $generate_image = hexdec(uniqid());
            // Получаем исходное рассширение изображения
            $image_ext = strtolower($brand_image->getClientOriginalExtension());
            $image_name = $generate_image.'.'.$image_ext;
            // Cохранение изображения в каталог Бренд
            $up_location = 'images/brands/';
            $last_image = $up_location.$image_name;
            $brand_image->move($up_location,$image_name);
            unlink($old_image);

            Brand::find($id)->update([
                'brand_name'=> $request->brand_name,
                'brand_image' => $last_image,
                'created_at' => Carbon::now(),
            ]);
            return Redirect()->back()->with('success','Логотип бренда успешно обновлён.');
        } else {
            Brand::find($id)->update([
                'brand_name'=> $request->brand_name,
                'created_at' => Carbon::now(),
            ]);
            return Redirect()->back()->with('success','Логотип бренда успешно обновлён.');
        }
    }
    public function delete($id)
    {
        $image = Brand::find($id);
        $old_image = $image->brand_image;
        unlink($old_image);
        Brand::find($id)->delete();
        return Redirect()->back()->with('success','Логотип бренда успешно удалён.');
    }
}
