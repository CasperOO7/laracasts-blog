<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{

    public function create(){
        
    return view('register.create');
    }


    public function store()
    {
       $attributes=request()->validate(

            [
                'name'=>['required','max:255'],
                'username'=>['required','min:3',Rule::unique('users','username')],
                'email'=>['required','max:255','email'],
                'password'=>['required','min:7']
            ]
            );

            User::create($attributes);

            return redirect('/')->with('success','user created successfully 
            !');

    }
}
