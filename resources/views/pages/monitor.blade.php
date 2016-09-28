@extends('layouts.app')

@section('content')


    @if ($section == "statistics")
        <!--Experiment Form-->
        @include('monitor.statistics')
    @elseif ($section == "modifier")
        <!--Route Selecter-->
        @include('monitor.modifier')
    @elseif ($section == "participants")
        @include('monitor.participants')
    @else
        <div class="alert alert-danger">error</div>
        <?php // TODO: error page ?>
    @endif




@endsection
