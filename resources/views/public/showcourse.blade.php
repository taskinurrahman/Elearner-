@extends('public.layouts.app')

@section('content')
    <div class=" col-md-6 mx-auto card">
        <div class="row ">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <h1>{{ $course->name }}</h1>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <img src="{{asset( $course->image) }}" width="500px">

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Author:</strong>
                    {{ $course->author }}
                    <div class="est-time">
                        <strong>Estimated Time:</strong>
                        {{ $course->duration }}
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p>{{ $course->description }}</p>
                </div>

                <div class="mx-auto text-center mb-5">
                    <form class="form-enroll" action="" method="post">
                        @csrf
                        <input type="hidden" name ="id">
                        @if($enrolls->count() == 0)
                        <button  type="submit" data-id = "{{$course->id}}"  id ="enroll" class ="btn btn btn-success enroll-btn">Enroll</button>
                        @else
                            <button type="" class ="btn btn btn-success disabled enroll-btn" disabled> Enrolled</button>
                        @endif
                    </form>

                </div>
            </div>
        </div>

    </div>

@endsection
