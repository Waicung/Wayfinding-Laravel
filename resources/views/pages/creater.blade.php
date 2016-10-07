@extends('layouts.app')

@section('content')

    <div class="container" id="vue-app">
        @if ($section == "experiment")
            <!--New Experiment-->
            <div class="row row-eq-height">
                <div class="col-sm-7 section-left">
                    @include('forms.experimentform')
                </div>
                <!--Summary-->
                <div class="col-sm-5 section-right">
                    <wf-summary :list = "experiment">
                </div>
            </div>

        @elseif ($section == "routes")
            <!--Route Selecter-->
            @include('forms.routeform')
        @else
            <div class="alert alert-danger">error</div>
            <?php // TODO: error page ?>
        @endif
    </div>

@endsection
