@extends('admin.layouts.app')
@section('content')


    <div class="col-sm-6 mt-5  mx-auto jumbotron">
        <div>
            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            {{--            @if($message = Session::get('error'))--}}
            {{--                <div class="alert alert-danger">--}}
            {{--                    <p>{{ $message }}</p>--}}
            {{--                </div>--}}
            {{--            @endif--}}

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{$error}}
                    </div>
                @endforeach
            @endif
        </div>
        <h3 class="text-center">Edit Course</h3>

        <form class="form" id="form-updatecourse" action="{{route('admin.updatecourse')}}" method="POST"
              enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="course_name">Course Name</label>
                <input type="text" class="form-control" id="course_name" name="course_name"
                       value="{{old('course_name',$course->name)}}">

                <input type="hidden" name="id" value="{{ $course->id }}" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="course_desc">Course description</label>
                <textarea type="textarea" class="form-control" id="course_desc"
                          name="course_desc">{{old('course_desc',$course->description)}}</textarea>
            </div>
            <div class="form-group">
                <label for="course_author">Author</label>
                <input type="text" class="form-control" id="course_author" name="course_author"
                       value="{{old('course_author',$course->author)}}">
            </div>
            <div class="form-group">
                <label for="course_duration">Course duration</label>
                <input type="text" class="form-control" id="course_duration" name="course_duration"
                       value="{{old('course_duration',$course->duration)}}">
            </div>
            <div class="form-group">
                <label for="course_img">Course image</label>
                <input type="file" name="course_img" class="form-control">
                <img src="{{asset($course->image)}}" width="300px">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger" id="course_btn" name="course_btn">Update</button>
                <a href="{{route('admin.courselist')}}" class="btn btn-secondary">Close</a>
            </div>
            <div id="alert-msg" role="alert" style="display:none"></div>
        </form>
    </div>
@endsection
