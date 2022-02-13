<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{


    public function adult(){
        return view('auth.checkAge');
    }

    public function adults(){
        return view('auth.checkAges');
    }


    public function site()
    {
        return view('auth.site');

    }

    public function admin()
    {
        return view('auth.admin');
    }


    public function adminLogin()
    {
        return view('auth.adminLogin');
    }

    public function checkAdminLogin(Request $request)
    {


        $this->validate($request , [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('email'));
    }

}
