<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {

        return view('sessions.create');
    }


    public function authenticate()
    {
        $attributes=request()->validate(['email'=>'required|email','password'=>'required']);
        if(auth()->attempt($attributes))
        {
            session()->regenerate();

            return redirect(
                '/'
            )->with('success','logged in successfully');
        }
        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.'
        ]);
    }


    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
