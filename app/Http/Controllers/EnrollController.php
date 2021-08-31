<?php

namespace App\Http\Controllers;

use App\Enroll;
use Illuminate\Http\Request;

class EnrollController extends Controller
{
    public function enroll(Request $request){
//        dd($request->all);

        $course_id = $request->id;
        $user_id = auth()->id();
        $enroll = New Enroll();
        $enroll->course_id=$course_id;
        $enroll->user_id = $user_id;
        if($enroll->save()){
            return response()->json("ok");
        }
        else
            return response()->json('no');

    }
}
