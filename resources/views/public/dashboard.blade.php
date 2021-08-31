@extends('public.layouts.app')

@section('content')
    <div class="row">
        @include('public.include.usersidebar')
        <div class="col-sm-9 mt-5">
            <div class="text-center">
                <h2 class="text-center bg-dark justify-content-center text-white ">My Courses</h2>
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Course Id</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Course Author</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <td>{{$course->id}}</td>
                            <td>{{$course->name}}</td>
                            <td>{{$course->author}}</td>
                            <td>{{"Enrolled"}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
