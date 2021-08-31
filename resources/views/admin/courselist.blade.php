@extends('admin.layouts.app')
@section('content')
    <div class=" col-sm-9 mt-5">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <h3 style="text-align:center" class="bg-dark text-white p-2">List of Courses</h3>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Course ID</th>
                <th scope="col">Name</th>
                <th scope="col">Author</th>
                <th scope="col">image</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($courses as $course)
                <tr id="data-row">
                    <td>{{$course->id}} </td>
                    <td>{{$course->name}}</td>
                    <td> {{$course->author}}</td>
                    <td><img src="{{asset($course->image)}}" width="100px"></td>
                    <td>
                        <form action="" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$course->id}}">
                            {{--                    <a class="btn btn-info" href="{{route('show',$product->id)}}">Show</a>--}}
                            <a class="btn btn-info" href="{{route('admin.editcourse',$course->id)}}"><i
                                    class="fas fa-edit"></i></a>
                            <a data-id="{{$course->id}}" class="btn btn-secondary course-delete" type="button"><i
                                    class="far fa-trash-alt"></i></a>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        <div class="col-md-2 mx-auto">
            {{$courses->links()}}
        </div>
    </div>

    <div>
        <a class="btn btn-danger box" href="{{route('admin.addcourse')}}">
            <i class="fas fa-plus fa-2x"></i>
        </a>
    </div>
@endsection

{{--onclick="return confirm('Are you sure?')"--}}
