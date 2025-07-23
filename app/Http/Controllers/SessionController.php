<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionCOntroller extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function store(){
        //validate the form
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        //attempt to login the user
        if (! Auth::attempt($attributes)){
            throw ValidationException :: withMessages([
                'email' => 'Sorry, those credential do not match'
            ]);
        }

        //regenerate the session token 
        request()->session()->regenerate();

        //redirect
        return redirect('/jobs');
    }

    public function destroy(){
        Auth::logout();
        return redirect('/');
    }
}
