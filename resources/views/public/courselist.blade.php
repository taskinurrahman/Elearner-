@extends('public.layouts.app')

@section('content')
    <main role="main" class="mt-md-2">
        <section class="text-center">
            <h1>Courses</h1>
        </section>

        <div class="album py-5 bg-light ">
            <div class="container">
                <div class="row">
                    @foreach($courses as $course)
                        <div class="col-md-4" mt-5>
                            <div class="card mb-3 box-shadow ">
                                <a href="{{route('user.course',$course->id)}}">
                                    <img class="card-img-top" src="{{asset($course->image)}}" alt="image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong></strong>{{$course->name}}</strong></h5>
                                        <p class="card-text no-underline"
                                           style="overflow:hidden;">{{Str::limit($course->description,50)}}</p>
{{--                                        <button data-id="" href="{{route('profile')}}"--}}
{{--                                                class="enroll-btn btn btn-info text-white font-weight-bolder float-right m-md-3">--}}
{{--                                            Enroll--}}
{{--                                        </button>--}}
                                         <div class="author">
                                             Author:
                                             {{$course->author}}
                                         </div>
                                        <div class ="est-time mt-2">
                                            <h5 >Estimated Time </h5>
                                            {{ $course->duration }}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>

    </main>
@endsection

