<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function viewRegisterAdmin()
    {
        return view('auth.register');
    }

    public function viewLogin()
    {
        return view('auth.login');
    }

    protected function createAdmin(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'admin'
        ]);
    }

    public function registerAdmin(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->createAdmin($request->all())));

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect('/admin');
    }
}
