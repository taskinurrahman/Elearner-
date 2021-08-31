<?php

namespace App\Http\Controllers;

use App\Course;
use App\Enroll;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('public.home');
    }

    public function adminHome()
    {
        $course_count = Course::count();
        $user_count = User::count();
        $enroll_count = Enroll::count();
        $data = DB::table('courses')
            ->join('enrolls', 'courses.id', '=', 'enrolls.course_id')
            ->join('users', 'enrolls.user_id', '=', 'users.id')
            ->select('enrolls.id','courses.id as course_id','courses.name as course_name','users.id as user_id','users.name as user_name')
            ->paginate(5);


        return view('admin.home',["course_count"=>$course_count,"user_count"=>$user_count,
            "enroll_count"=>$enroll_count,"data"=>$data]);
    }

    public function fetch_data(Request $request)
    {
        if($request->ajax())
        {
            $data =DB::table('courses')
            ->join('enrolls', 'courses.id', '=', 'enrolls.course_id')
            ->join('users', 'enrolls.user_id', '=', 'users.id')
            ->select('enrolls.id','courses.id as course_id','courses.name as course_name','users.id as user_id','users.name as user_name')
            ->paginate(5);

            return view('admin.pagination_enroll', compact('data'))->render();
        }
    }
}
