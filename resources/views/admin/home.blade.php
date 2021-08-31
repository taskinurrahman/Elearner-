@extends('admin.layouts.app')
@section('content')
    {{--//admin area--}}
    <div class="row  col-md-9 mx-auto">
        <div class="col-sm-4 col-md-4 mt-5">
            <div class="card bg-danger  ">
                <div class="card-body ">
                    <div class="card-title text-white">Number of Users</div>
                    <h4 class="card-text text-white">
                        {{$user_count}}
                    </h4>
                    <a class="btn text-white" href="{{'admin.userlist'}}">View</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4 mt-5">
            <div class="card bg-success ">
                <div class="card-body ">
                    <div class="card-title text-white">Number of Courses</div>
                    <h4 class="card-text text-white">
                        {{$course_count}}
                    </h4>
                    <a class="btn text-white" href="{{'admin.userlist'}}">View</a>
                </div>
            </div>

        </div>
        <div class="col-sm-4 col-md-4 mt-5">
            <div class="card bg-info  ">
                <div class="card-body ">
                    <div class="card-title text-white ">Number of Enroll</div>
                    <h4 class="card-text text-white">
                        {{$enroll_count}}
                    </h4>
                    <a class="btn text-white" href="{{'admin.userlist'}}">View</a>
                </div>
            </div>

        </div>
        <div class="col-md-12 mt-5 align-content-center">
            <h3 style="text-align:center" class="bg-dark text-white p-2">List of Enrollment</h3>
            <div id ="data-table">
            @include('admin.pagination_enroll')
            </div>
        </div>
    </div>
@endsection
