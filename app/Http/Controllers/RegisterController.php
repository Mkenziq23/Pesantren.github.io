<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('session.register',[
            "tittle" => "Register"
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'username' => 'required|min:3|max:255|unique:users',
            'pesantren' => 'required|max:255',
            'provinsi' => 'required|max:255',
            'kabupaten' => 'required|max:255',
            'kota' => 'required|max:255',
            'alamat' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
        ]);
        $attributes['password'] = bcrypt($attributes['password'] );



        session()->flash('success', 'Your account has been created.');
        $user = User::create($attributes);
        Auth::login($user);
        return redirect('/dashboard');
    }
}
