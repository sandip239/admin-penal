<?php

namespace App\Http\Controllers;

use App\Events\userCreated;
use App\Mail\RegistrationConfirmationMail;
use App\Models\customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class usercontroller extends Controller
{
    public function deshboard(request $request)
    {
        if ($request->ajax()) {
            $users = customers::select(['id', 'name', 'email','country','state','gender','language']);

            return DataTables::of($users)->toJson();
        }
          return view('deshboard');
        // $user = customers::all();
        // return view('deshboard', compact('user'));
    }
    public function index()
    {
        return view('userregister');
    }


    public function userRegister(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required',
            'country' => 'required',
            'state' => 'required',
            'gender' => 'required',
            'languages' => 'required|array',
            'image' => 'required',
        ]);
        // dd($request->image);
           $data = [
        'username' => $validatedData['name'],
        'useremail' => $validatedData['email'],
       ];
          event(new UserCreated($data));

        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();

        $file->move(public_path('uploads'), $filename); // Move the file to the "uploads" directory in the public folder

        // Store the student data in the database
        $student = new customers();
        $student->name = $validatedData['name'];
        $student->email = $validatedData['email'];
        $student->country = $validatedData['country'];
        $student->state = $validatedData['state'];
        $student->gender = $validatedData['gender'];
        $student->language = json_encode($validatedData['languages']);
        $student->image = $filename; // Store the filename, not the file object

        $student->save();

        return redirect()->route('deshboard');
    }



    public function edit($id)
    {
        $user = customers::find($id);
        return view('edit', compact('user'));
    }

    public function updateData(request $request)
    {

        $request->validate([
            'image' => 'nullable'
        ]);

        $student = customers::find($request->input('id'));

    if ($request->hasFile('image')) {
        $file = $request->file('image');

        $filename = time() . '_' . $file->getClientOriginalName();

        $file->move(public_path('uploads'), $filename);

        if ($student->image) {
            unlink(public_path('uploads/' . $student->image));
        }

        $student->image = $filename;
        $student->save();
    }

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

    public function deleteUsers(Request $request)
{
    $userIds = $request->input('user_ids');
    customers::whereIn('id', $userIds)->delete();

    return response()->json(['message' => 'Users deleted successfully']);
}

public function yajara(Request $request)
{
    if ($request->ajax()) {
        $users = customers::select(['id', 'name', 'email']);

        return DataTables::of($users)->toJson();
    }

    return view('yajara');
}

public function deleteSelected(Request $request)
    {
        $userIds = $request->input('user_ids');
        customers::whereIn('id', $userIds)->delete();

        return response()->json(['message' => 'Selected users deleted successfully']);
    }

}
