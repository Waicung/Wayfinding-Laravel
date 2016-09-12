@extends('layouts.app')

@section('content')
    @include('includes.panel')

    <div class="container">
        <!--Experiment<br />
        Routes info<br />-->
        @if(isset($subjects) && count($subjects)>0)
        <select class="form-control" name="exp">
                @foreach($subjects as $subject)
                    <option name="{{ $subject->subject }}">
                        {{ $subject->subject }}
                    </option>
                @endforeach
        </select>
        @else
        <span>You have not created any experiment</span>
        @endif

    </br/>
    </div>

@endsection
