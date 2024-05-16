<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function add(Request $request)
    {
        $request->validate(
            [
            'name' => 'required',
            'email' => 'required|email|unique:students,email'
            ],
            [
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'email.email' => 'Email is invalid',
                'email.unique' => 'Email already exists'
            ]
        );

        return redirect()->route('home')->with('success', 'Message sent successfully!');
    }
}
