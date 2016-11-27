@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span class="label label-success">Experiment Successfully created</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center"> Recruitment Link </h3>
                    </div>
                    <div class="panel-body">
                        <p class="text-center">
                            {{ $recruitmentLink. "/". "experiment". $experiment->id}}
                        </p>
                    </div>
                    <div class="panel-footer">
                        <p class="help-block">
                            *The address can be sent to volunteers to sign up for the experiment
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="btn-group btn-group-sm pull-right">
                    <!--<a type="button" class="btn btn-default">
                        COPY
                    </a>-->
                    <a type="button" class="btn btn-primary" href="{{ url('/home')}}">
                        DONE
                    </a>
                </div>
        </div>

    </div>

@endsection
