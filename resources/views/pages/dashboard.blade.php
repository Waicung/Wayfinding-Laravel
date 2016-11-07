
@extends('layouts.app')

@section('content')

    <div class="container">
        @if ($experiments)
            <ul>
                @foreach ($experiments as $experiment)
                    <li>{{ $experiment->subject}}</li>
                @endforeach
            </ul>
            @else
                {{"no"}}
        @endif

        <h3>Dashboard Home</h3>
    </div>

@endsection
