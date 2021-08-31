@extends('public.layouts.app')

@section('content')
    <div class="container-fluid remove-vidmargin">
        <div class="vid-home">
            <video playsinline autoplay muted loop>
                <source src="{{asset('videos/Library.mp4')}}">
            </video>
        </div>
        <div class="vid-content jumbotron-fluid">
            @guest()
                <h1>Welcome to ELearner</h1>
                <a class="btn btn-danger"  href="{{route("register")}}">Get started</a>
            @endguest
            @if(auth()->check())
            <h1>Welcome to ELearner</h1>
            <a class="btn btn-danger"  href="{{route("user.profile")}}">My profile</a>
                @endif
        </div>
    </div>
@endsection
