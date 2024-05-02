<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\courses;
use App\Models\batches;
use App\Models\teachers;
use Illuminate\Support\Facades\Session;

class batche extends Controller
{
    // public function index()
    // {
    //     $batches = batches::with('teacher')->get();
    //     return view('batches.show', compact('batches'));
    // }
    // //
    public function show()
    {
        $data = batches::join('teacher', 'batche.t_id', '=', 'teacher.id')
            ->join('course', 'batche.c_id', '=', 'course.id')
            ->get(['batche.id', 'course.name as c_name', 'teacher.name as t_name', 'batche.session', 'batche.time_slot']);

        // $data = batches::join('teacher', 'batche.t_id', '=', 'teacher.id', 'course', 'batche.c_id', '=', 'course.id')->get(['batche.id', 'course.name as c_name', 'teacher.name as t_name', 'batche.session', 'batche.time_slot']);
        // $id = teachers::with('id')->get();
        // return redirect('batches/show')->with(['data' => $data]);
        return view('batchess.show', ['data' => $data]);
    }
    public function add()
    {
        $data = batches::join('teacher', 'batche.t_id', '=', 'teacher.id')
            ->join('course', 'batche.c_id', '=', 'course.id')
            ->get(['batche.id', 'course.name as c_name', 'teacher.name as t_name', 'batche.session', 'batche.time_slot']);

        // $id = teachers::with('id')->get();
        // return redirect('batches/show')->with(['data' => $data]);
        return view('batchess.add', ['data' => $data]);
    }

    public function submit(Request $req)
    {

        $batche = new batches();
        $teacherName = $req->input('teacher_name');
        $courseName = $req->input('course_name');
        // dd($teacherName);
        $teacher = teachers::where('name', $teacherName)->first();
        $course = courses::where('name', $courseName)->first();
        // dd($teacher);


        $batche->t_id = $teacher->id;
        $batche->c_id = $course->id;
        $batche->session = $req->session;
        $batche->time_slot = $req->time_slot;

        $batche->save();
        $data = batches::all();
        return redirect('batchess/show')->with(['success' => 'batche Add Successfully', 'data' => $data]);
    }
    public function edit($id)
    {
        $batches = batches::join('teacher', 'batche.t_id', '=', 'teacher.id')
            ->join('course', 'batche.c_id', '=', 'course.id')
            ->get(['batche.id', 'course.name as c_name', 'teacher.name as t_name', 'batche.session', 'batche.time_slot'])->find($id);

        $batches_2 = batches::join('teacher', 'batche.t_id', '=', 'teacher.id')
            ->join('course', 'batche.c_id', '=', 'course.id')
            ->get(['batche.id', 'course.name as c_name', 'teacher.name as t_name', 'batche.session', 'batche.time_slot']);

        return view('batchess.edit', ['data' => $batches], ['data_2' => $batches_2]);
    }
    public function update_batche(Request $req, $id)
    {
        // Find the batche record by ID
        $batche = batches::find($id);

        if (!$batche) {
            // Handle case where batche is not found
            return redirect()->back()->with('error', 'batche not found.');
        }
        $teacher = teachers::where('name', $req->teacher_name)->first();
        $course = courses::where('name', $req->course_name)->first();
        // Update the batche record with the request data
        // $batche->name = $req->name;
        $batche->t_id = $teacher->id; // Set the teacher id
        $batche->c_id = $course->id;
        $batche->session = $req->session;
        $batche->time_slot = $req->time_slot; // Set the teacher id
        $batche->save();

        // Optionally retrieve all batches data again (you might not need this depending on your requirements)
        $data = batches::find($id);
        // dd($data);        // Redirect to the view with a success message
        Session::flash('up_success', 'batche updated successfully.');
        // return view('batches.show', ['data' => $data]);
        // $data = batches::all();
        // return redirect()->Route('batches/show')->with('up_success', 'batche updated successfully.');
        return redirect('batchess/show')->with(['up_success' => 'batche updated successfully.', 'data' => $data]);
    }
    public function delete($id)
    {
        $batche = batches::find($id);
        $batche->delete();
        return redirect()->back()->with('success', 'batche Deleted Successfully');
    }

    public function data_show()
    {
        echo "gfhtfty";
    }
}
