<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teachers;
use Illuminate\Support\Facades\Session;

class teacher extends Controller
{
    //
    public function show()
    {
        $data = teachers::all();
        // return redirect('teachers/show')->with(['data' => $data]);
        return view('teachers.show', ['data' => $data]);
    }

    public function submit(Request $req)
    {

        $data = new teachers();
        $data->name = $req->name;
        $data->age = $req->age;
        $data->city = $req->city;
        $data->save();
        $data = teachers::all();
        return redirect('teachers/show')->with('success', 'teacher Add Successfully');
    }
    public function edit($id)
    {
        $teachers = teachers::find($id);
        return view('teachers.edit', ['data' => $teachers]);
    }
    public function update_teacher(Request $req, $id)
    {
        // Find the teacher record by ID
        $teacher = teachers::find($id);

        if (!$teacher) {
            // Handle case where teacher is not found
            return redirect()->back()->with('error', 'teacher not found.');
        }

        // Update the teacher record with the request data
        $teacher->name = $req->input('name');
        $teacher->age = $req->input('age');
        $teacher->city = $req->input('city');
        $teacher->save();

        // Optionally retrieve all teachers data again (you might not need this depending on your requirements)
        $data = teachers::find($id);
        // dd($data);        // Redirect to the view with a success message
        Session::flash('up_success', 'teacher updated successfully.');
        // return view('teachers.show', ['data' => $data]);
        // $data = teachers::all();
        // return redirect()->Route('teachers/show')->with('up_success', 'teacher updated successfully.');
        return redirect('teachers/show')->with(['up_success' => 'teacher updated successfully.', 'data' => $data]);
    }
    public function delete($id)
    {
        $teacher = teachers::find($id);
        $teacher->delete();
        return redirect()->back()->with('success', 'teacher Deleted Successfully');
    }

    public function data_show()
    {
        echo "gfhtfty";
    }
}
