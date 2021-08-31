<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function dashboard()
    {
        $user_id = auth()->id();
        $courses = DB::table('courses')
            ->join('enrolls', 'courses.id', '=', 'enrolls.course_id')
            ->join('users', 'enrolls.user_id', '=', 'users.id')
            ->where('users.id',$user_id)
            ->select('courses.*')
            ->get();
        return view('public.dashboard', ["courses" => $courses]);
    }

    public function update(Request $request)
    {

        $request->validate([
            'user_name' => 'required',
            'password' =>'required|confirmed|min:6',

        ]);

        $id = $request->user_id;
        $user = User::find($id);
        $user->name = $request->user_name;
        $user->password = Hash::make($request->password);

        if ($user->update()) {
            return redirect()->route('user.profile')->with('success', 'User information  updated successfully');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function ShowProfile()
    {
        $user = Auth::user();
        return view('public.profile', ["user" => $user]);
    }

    public function userlist()
    {
        //orm
//         $users = User::where('is_admin',0)->get();
//         query builder
        $users = DB::table('users')->where('is_admin', 0)->paginate(3);

        return view('admin.userlist', ['users' => $users]);
    }

    public function delete(Request $request)
    {
        $user = User::find($request->id);
        if ($user) {
            $user->delete();
            return response()->json("ok");
        } else
            return response()->json('no');

    }
}
