<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\courses;
use App\Models\teachers;
use Illuminate\Support\Facades\Session;

class course extends Controller
{
    // public function index()
    // {
    //     $courses = courses::with('teacher')->get();
    //     return view('courses.show', compact('courses'));
    // }
    // //
    public function show()
    {
        $data = courses::all();
        // $id = teachers::with('id')->get();
        // return redirect('courses/show')->with(['data' => $data]);
        return view('courses.show', ['data' => $data]);
    }

    public function submit(Request $req)
    {

        $data = new courses();
        $data->name = $req->name;
        $data->age = $req->age;
        $data->city = $req->city;
        $data->save();
        $data = courses::all();
        return redirect('courses/show')->with('success', 'course Add Successfully');
    }
    public function edit($id)
    {
        $courses = courses::find($id);
        return view('courses.edit', ['data' => $courses]);
    }
    public function update_course(Request $req, $id)
    {
        // Find the course record by ID
        $course = courses::find($id);

        if (!$course) {
            // Handle case where course is not found
            return redirect()->back()->with('error', 'course not found.');
        }

        // Update the course record with the request data
        $course->name = $req->input('name');
        $course->age = $req->input('age');
        $course->city = $req->input('city');
        $course->save();

        // Optionally retrieve all courses data again (you might not need this depending on your requirements)
        $data = courses::find($id);
        // dd($data);        // Redirect to the view with a success message
        Session::flash('up_success', 'course updated successfully.');
        // return view('courses.show', ['data' => $data]);
        // $data = courses::all();
        // return redirect()->Route('courses/show')->with('up_success', 'course updated successfully.');
        return redirect('courses/show')->with(['up_success' => 'course updated successfully.', 'data' => $data]);
    }
    public function delete($id)
    {
        $course = courses::find($id);
        $course->delete();
        return redirect()->back()->with('success', 'course Deleted Successfully');
    }

    public function data_show()
    {
        echo "gfhtfty";
    }
}
