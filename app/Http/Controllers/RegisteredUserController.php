<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(){
        //Validate
        $attributes = request()->validate([
           'first_name' => ['required'],
           'last_name' => ['required'],
           'email' => ['required','email'],
           'password' => ['required', Password::default(),'confirmed']
        ]);
        //create the user
        $user = User::create($attributes);
        //login 
        Auth::login($user);
        //redirect somewhere
        return redirect('/jobs');
    }
}
