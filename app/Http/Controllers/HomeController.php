<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class HomeController extends Controller
{
    public function index()
    {
        $students = Student::latest()->paginate(5);
        return view('home')->with('students', $students);
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

        return response()->json(["status" => "success"]);
        //return redirect()->route('home')->with('success', 'Message sent successfully!');
    }

    public function update(Request $request)
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
            ]
        );

        Student::where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return response()->json(["status" => "success"]);
        //return redirect()->route('home')->with('success', 'Message sent successfully!');
    }
}
