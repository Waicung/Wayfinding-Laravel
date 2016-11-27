@extends('layouts.app')

@section('content')

    <div class="container">
        <!--List exepriments-->
        @if ($experiments->count()!==0)
            <div class="panel-group">
                @foreach ($experiments as $experiment)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a data-toggle="collapse" href="#{{ "experiment".$experiment->id }}">
                                {{ $experiment->subject }}
                            </a>
                            <a href="{{ url("/experiment/"."experiment". $experiment->id) }}">
                                <span class="glyphicon glyphicon-menu-right pull-right"></span>
                            </a>
                        </div>
                        <div class="panel-collapse collapse" id="{{ "experiment".$experiment->id }}">
                            <ul class="list-group">
                                <li class="list-group-item">{{ $experiment->description }}</li>
                            </ul>
                        </div>
                    </div>

                @endforeach
            </div>
        @else
            <div class="alert alert-info">
                No experiment
            </div>
        @endif

        <!--New Experiment Entry-->
        <a class="btn btn-primary pull-right" role="button" href="/experiment" id="newExperiment">New Experiment</a>
    </div>

@endsection
