@extends('layouts.app')

@section('content')
    <div class="container profile">
        <div class="row">
          <img src="http://placehold.it/248x248">
        </div>
        <div class="row">
            {{ $info->username }}<br/>
        </div>
        <div class="row">
            {{ $info->email }}
        </div>
    </div>

@endsection
