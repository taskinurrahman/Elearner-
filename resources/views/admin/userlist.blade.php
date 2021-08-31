@extends('admin.layouts.app')
@section('content')
    <div class="col-md-9 mt-5 ">
        <h3 style="text-align:center" class="bg-dark text-white p-2">List of Users</h3>

        <table class="table" style="align-content: center">
            <thead>
            <tr>
                <th scope="col">User ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>

            <div>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name }}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <form action="" method="POST">
                                @csrf
                                {{-- <a class="btn btn-info" href="{{route('show',$product->id)}}">Show</a>--}}
                                {{--<a class="btn btn-info" href="{{route('admin.editcourse',$course->id)}}"><i class="fas fa-edit"></i></a>--}}
                                <a data-id="{{$user->id}}" class="btn btn-secondary user-delete" type="button"><i
                                        class="far fa-trash-alt"></i></a>
                            </form>

                        </td>
                    </tr>
                @endforeach

            </div>

            </tbody>
        </table>
        <div class="col-md-2 mx-auto">
            {{$users->links()}}
        </div>
    </div>

@endsection
