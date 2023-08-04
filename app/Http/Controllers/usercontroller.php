<?php

namespace App\Http\Controllers;

use App\Models\customers;
use Illuminate\Http\Request;

class usercontroller extends Controller
{
    public function deshboard()
    {
        $user = customers::all();
        return view('deshboard', compact('user'));
    }
    public function index()
    {
        return view('userregister');
    }


    public function userRegister(request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required',
            'country' => 'required',
            'state' => 'required',
            'gender' => 'required',
            'languages' => 'required|array',

        ]);


        // Store the student data in the database
        $student = new customers();
        $student->name = $validatedData['name'];
        $student->email = $validatedData['email'];
        $student->country = $validatedData['country'];
        $student->state = $validatedData['state'];
        $student->gender = $validatedData['gender'];
        $student->language = json_encode($validatedData['languages']);



        // Handle the profile_picture file upload
        // if ($request->hasFile('profile_picture')) {
        //     $file = $request->file('profile_picture');
        //     $filename = time() . '_' . $file->getClientOriginalName();
        //     $file->move(public_path('profile_pictures'), $filename); // Move the file to the "profile_pictures" directory in the public folder
        //     $student->profile_picture = 'profile_pictures/' . $filename;
        // }

        $student->save();
        return redirect()->route('deshboard');
        // Redirect or return a response
        // For example, redirect back to the registration form with a success message
        // dd('sucess');

    }

    public function edit($id)
    {
        $user = customers::find($id);
        return view('edit', compact('user'));
    }

    public function updateData(request $request)
    {

        $student = customers::find($request->input('id'));

        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->country = $request->input('country');
        $student->city = $request->input('city');
        $student->state = $request->input('state');
        $student->language = json_encode($request->input('languages'));
        $student->gender = $request->input('gender');
        $student->save();

        return redirect()->route('deshboard');
    }
}
