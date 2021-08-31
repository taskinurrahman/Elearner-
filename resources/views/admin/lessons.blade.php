@extends('admin.layouts.app')
@section('content')
    <div class=" col-md-6 mt-5 mx-3 mx-auto">
        <form action="" class="mt-3 form inline d-print-none">
            <div class="form-group mr-3">
                <label for="checkid">Enterr Course ID:</label>
                <input type="text" class="form control ml-3" id="checkid" name="checkid">
                <button type="submit" class="btn btn-success ml-3">Search</button>
            </div>
        </form>
    </div>
    <div class=" col-md-8 mx-auto text-center">
        <h3 class="bg-dark text-white p-2">List of Lessons</h3>

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
            {{--            @foreach($courses as $course)--}}
            <tr id="data-row">
                <td>1</td>
                <td>Lern C</td>
                <td>a</td>
                <td>a</td>
                <td>
                    <form action="" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="">
                        {{--                    <a class="btn btn-info" href="{{route('show',$product->id)}}">Show</a>--}}
                        <a class="btn btn-info" href=""><i
                                class="fas fa-edit"></i></a>
                        <a data-id="}" class="btn btn-secondary course-delete" type="button"><i
                                class="far fa-trash-alt"></i></a>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div>
        <a class="btn btn-danger box" href="{{route('admin.addcourse')}}">
            <i class="fas fa-plus fa-2x"></i>
        </a>
    </div>
@endsection
