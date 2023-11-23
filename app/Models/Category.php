<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = ['user_id','category_name'];
    public function user()
    {
        // Связываем одну модель с другой
        // то есть, модель Category с моделью User
        return $this->hasOne(User::class,'id','user_id');
    }
}
