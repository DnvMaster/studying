<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Auth;

class UsersController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return Redirect()->route('login')->with('success','Вы успешно вышли из системы');
    }
}
