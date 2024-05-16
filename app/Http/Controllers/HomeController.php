<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

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

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->save();

        return redirect()->route('home')->with('success', 'Message sent successfully!');
    }
}
