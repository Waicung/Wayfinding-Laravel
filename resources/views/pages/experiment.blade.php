@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-group">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ $experiment->subject }}</h3>
                        </div>

                        <ul class="list-group">
                          <li class="list-group-item">{{ $experiment->description }}</li>
                          <li class="list-group-item">
                              @foreach ($experiment->routes as $route)
                                  {{ $route }}
                                  {{ $route->title }}
                                  {{ $route->origin->longitude.$route->origin->latitude.', ' }}
                                  {{ $route->destination->longitude.$route->destination->latitude }}<br>
                              @endforeach

                          </li>
                          <li class="list-group-item"> {{ $experiment->forms->first()->title }}
                           {{ $experiment->tests->map(function ($item) {
                               return $item->title;
                           }) }}</li>
                        </ul>


                    </div>


                </div>
            </div>

            <div class="col-md-12">
                <a type="button" class="btn btn-primary" href="{{ url('/experiment/editor/'.$experiment->id) }}">Edit</a>
            </div>
        </div>


    </div>
@endsection
