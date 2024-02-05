<?php

namespace App\Http\Controllers;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    function create()
    {
        return view('pages.register');
    }

    function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            "email" => 'required|unique:users|email',
            "password" => 'required|confirmed|min:8'
        ]);

        $user = new User;

        $filename = time() . $request->file('picture')->getClientOriginalName();
        $path = $request->file('picture')->storeAs('image', $filename, 'public');
        $user->picture = '/storage/' . $path;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
