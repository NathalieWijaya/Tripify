<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class RegisterController extends Controller
{
    public function index(){
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'

        ]);
    }
    public function store(Request $request){
        $validatedData=$request->validate([
            'name' => 'required|max:150',
            'username' => 'required|min:3|max:50|unique:users',
            'email'=>'required|email:dns|unique:users',
            'password'=>'required|min:8'
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        return redirect('/login')->with('success', 'Registration Successfull!!');
    }

}
