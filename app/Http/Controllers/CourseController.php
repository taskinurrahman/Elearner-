<?php

namespace App\Http\Controllers;

use App\Course;
use App\Enroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(4);
        return view('admin.courselist',
            ['courses' => $courses]);

    }

    public function userindex()
    {
        $courses = Course::all();
        return view('public.courselist',
            ['courses' => $courses]);
    }

    public function show($id)
    {
        $course = Course::find($id);
        $enrolls = DB::table('enrolls')->where('user_id', auth()->id())
            ->where('course_id', $id)
            ->get();


        return view('public.showcourse', ['course' => $course, 'enrolls' => $enrolls]);
    }

    public function addCourse()
    {
        return view('admin.addcourse');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required',
            'course_desc' => 'required',
            'course_author' => 'required',
            'course_duration' => 'required',
            'course_img' => 'required',
        ]);

        $path = $request->file('course_img')->store('uploads/' . $request->user()->id, 'public');

        //save to database
        $course = new Course();
        $course->name = $request->course_name;
        $course->author = $request->course_author;
        $course->description = $request->course_desc;
        $course->duration = $request->course_duration;
        $course->image = "storage/" . $path;;

        if ($course->save()) {
            return redirect()->route('admin.courselist')->with('success', 'Course added successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function edit($id)
    {
        $course = Course::find($id);
        return view('admin.editcourse')->with('course', $course);
    }

    public function update(Request $request)
    {
        $request->validate([
            'course_name' => 'bail|required|min:10',
            'course_desc' => 'required',
            'course_author' => 'required',
            'course_duration' => 'required',
        ]);
        $course = Course::find($request->id);
        $image = $request->file('course_img');
        if ($image) {
            $path = $request->file('course_img')->store('uploads/' . $request->user()->id, 'public');
            $course->image = "storage/" . $path;
        }
        $course->name = $request->course_name;
        $course->author = $request->course_author;
        $course->description = $request->course_desc;
        $course->duration = $request->course_duration;


        if ($course->update()) {
            return redirect()->back()->with('success', 'Course updated successfully');
        }
        else
        return redirect()->back()->withInput(Input::all());

    }

    public function delete(Request $request)
    {
        $course = Course::find($request->id);
        if ($course) {
            $course->delete();
            return response()->json("ok");
        } else
            return response()->json('no');

    }
}
