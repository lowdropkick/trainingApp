@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        @if (Auth::user()->hasRole('manager'))

                            @foreach($users as $user)

                                <h1>{{$user->name}}</h1>
                                        <ul>
                                            @foreach($courses as $course)
                                                @if ($course->users()->wherePivot('user_id', $user->id)->wherePivot('course_id', $course->id)->wherePivot('passed', true)->exists())
                                                    <li><a href="{{ url('/results/' . $course->id . '/' . $user->id) }}">{{ $course->name }}</a> - PASSED  </li>
                                                @else
                                                    <li><a href="{{ url('/results/' . $course->id . '/' . $user->id) }}">{{ $course->name }}</a>  - in training  </li>
                                                    <form action="{{ route('update', ['course' => $course->id, 'user' => $user->id]) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit">Mark as Passed</button>
                                                    </form>
                                                @endif
                                            @endforeach
                                        </ul>
                                        @endforeach
                                        @else
                                            <h1>{{ $users->name }}</h1>
                                            <ul>
                                                @foreach($courses as $course)
                                                    @if ($course->users()->wherePivot('user_id', $users->id)->wherePivot('course_id', $course->id)->wherePivot('passed', true)->exists())
                                                        <li><a href="{{ url('/results/' . $course->id . '/' . $users->id) }}">{{ $course->name }}</a> - PASSED  </li>
                                                    @else
                                                        <li><a href="{{ url('/results/' . $course->id . '/' . $users->id) }}">{{ $course->name }}</a> - in training  </li>
                                                    @endif
                                                @endforeach
                                            </ul>

                                @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection;
