<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function viewRegister()
    {
        return view('register');
    }

    public function viewLogin()
    {
        return view('login');
    }
}
