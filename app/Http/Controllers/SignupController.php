<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Enums\ServerStatus;
use Illuminate\Validation\Rules\Enum;
use App\Models\User;

class SignupController extends Controller
{
    public function index()
    {
        return view('elearning.signup.index',
        [
            'title' => 'Sign Up'
        ]);
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username'  => ['required', 'min:3', 'max:255', 'unique:users'],
            'email'     => 'required|unique:users',
            'password'  => 'required|min:5|max:255',
            'role'      => 'required',
        ]);
        
        //$validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);
        
        User::create($validatedData);
        
        $request->session()->flash('success', 'Regristrasi berhasil silakan login');
        
        return redirect('/login')->with('success', 'Regristrasi berhasil silakan login');
    }
}
