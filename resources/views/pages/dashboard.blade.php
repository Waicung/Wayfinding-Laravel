@extends('layouts.app')

@section('content')

    <div class="container">
        <!--List exepriments-->
        @if ($experiments->count()!==0)
            <div class="panel-group">
                @foreach ($experiments as $experiment)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a data-toggle="collapse" href="#{{ str_replace(" ","_",$experiment->subject) }}">
                                {{ $experiment->subject }}
                            </a>
                            <span class="glyphicon glyphicon-menu-right pull-right"></span>
                        </div>
                        <div class="panel-collapse collapse" id="{{ str_replace(" ","_",$experiment->subject) }}">
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

        <!--New Experiment Entrance-->

            <a class="btn btn-primary pull-right" role="button" href="/experiment">New Experiment</a>


    </div>

@endsection
