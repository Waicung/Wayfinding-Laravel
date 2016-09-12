@extends('layouts.app')

@section('content')
    @include('includes.panel')

    <div class="container">
        @foreach($exps as $exp)
            {{ $exp->subject }} <br/>
        @endforeach
    </div>


@endsection
