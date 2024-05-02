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
        $data = courses::join('teacher', 'course.t_id', '=', 'teacher.id')->get(['course.id', 'course.name as c_name', 'teacher.name as t_name',]);
        // $id = teachers::with('id')->get();
        // return redirect('courses/show')->with(['data' => $data]);
        return view('courses.show', ['data' => $data]);
    }
    public function add()
    {
        $data = courses::join('teacher', 'course.t_id', '=', 'teacher.id')->get(['course.id', 'course.name as c_name', 'teacher.name as t_name',]);
        // $id = teachers::with('id')->get();
        // return redirect('courses/show')->with(['data' => $data]);
        return view('courses.add', ['data' => $data]);
    }

    public function submit(Request $req)
    {

        $course = new courses();
        $teacherName = $req->input('teacher_name');
        // dd($teacherName);
        $teacher = teachers::where('name', $teacherName)->first();
        // dd($teacher);
        $course->name = $req->name;

        $course->t_id = $teacher->id;

        $course->save();
        $data = courses::all();
        return redirect('courses/show')->with(['success' => 'course Add Successfully', 'data' => $data]);
    }
    public function edit($id)
    {
        $courses = courses::join('teacher', 'course.t_id', '=', 'teacher.id')->get(['course.id', 'course.name as c_name', 'teacher.name as t_name',])->find($id);
        $courses_2 = courses::join('teacher', 'course.t_id', '=', 'teacher.id')->get(['course.id', 'course.name as c_name', 'teacher.name as t_name',]);
        return view('courses.edit', ['data' => $courses], ['data_2' => $courses_2]);
    }
    public function update_courses(Request $req, $id)
    {
        // Find the course record by ID
        $course = courses::find($id);

        if (!$course) {
            // Handle case where course is not found
            return redirect()->back()->with('error', 'course not found.');
        }
        $teacher = teachers::where('name', $req->teacher_name)->first();
        // Update the course record with the request data
        $course->name = $req->name;
        $course->t_id = $teacher->id; // Set the teacher id
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
