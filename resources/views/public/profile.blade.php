@extends('public.layouts.app')

@section('content')
    <div class="row">
        @include('public.include.usersidebar')
        <div class="col-sm-6 mt-3 mx-auto">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{--            @if($message = Session::get('error'))--}}
            {{--                <div class="alert alert-danger">--}}
            {{--                    <p>{{ $message }}</p>--}}
            {{--                </div>--}}
            {{--            @endif--}}

            <h2 class="text-center bg-dark justify-content-center text-white ">User Information</h2>
            <form id="user-profile" action="{{route('user.update')}}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="user_id">User id </label>
                    <input type="text" class="form-control" id="user_id" name="user_id" value="{{$user->id}}"
                           readonly>
                </div>

                <div class="form-group">
                    <label for="userr_name">Username</label>
                    <input type="text" class="form-control" id="user_name" name="user_name"
                           placeholder="Enter username"
                           value="{{old('user_name',$user->name)}}">
                </div>
                <div class="form-group">
                    <label for="user_email"> Email:</label>
                    <input type="text" class="form-control" id="user_email" placeholder="Enter user email"
                           name="email"
                           value="{{$user->email}}" readonly>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                           placeholder="Enter new password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation"></label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                           placeholder="Confirm password">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-info" id="update_info" name="info_btn">
                            Update Info
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
