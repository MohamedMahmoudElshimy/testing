<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function adult(){
        return view('auth.checkAge');
    }

    public function adults(){
        return view('auth.checkAges');
    }




}
