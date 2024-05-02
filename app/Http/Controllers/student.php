<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\students;
use Illuminate\Support\Facades\Session;

class student extends Controller
{
    //
    public function show()
    {
        $data = students::all();
        return view('students.show', ['data' => $data]);
        // return view('students.add', ['students' => $data]);
    }

    public function submit(Request $req)
    {

        $data = new students();
        $data->name = $req->name;
        $data->age = $req->age;
        $data->city = $req->city;
        $data->save();
        $data = students::all();
        return redirect('/show')->with('success', 'Student Add Successfully');
    }
    public function edit($id)
    {
        $students = students::find($id);
        return view('students.edit', ['data' => $students]);
    }
    public function update_student(Request $req, $id)
    {
        // Find the student record by ID
        $student = students::find($id);

        if (!$student) {
            // Handle case where student is not found
            return redirect()->back()->with('error', 'Student not found.');
        }

        // Update the student record with the request data
        $student->name = $req->input('name');
        $student->age = $req->input('age');
        $student->city = $req->input('city');
        $student->save();

        // Optionally retrieve all students data again (you might not need this depending on your requirements)
        $data = students::find($id);
        // dd($data);        // Redirect to the view with a success message
        Session::flash('up_success', 'Student updated successfully.');
        // return view('students.show', ['data' => $data]);
        // $data = students::all();
        // return redirect()->Route('students/show')->with('up_success', 'Student updated successfully.');
        return redirect('show')->with(['up_success' => 'Student updated successfully.', 'data' => $data]);
    }
    public function delete($id)
    {
        $student = students::find($id);
        $student->delete();
        return redirect()->back()->with('success', 'Student Deleted Successfully');
    }

    public function data_show()
    {
        echo "gfhtfty";
    }
}
