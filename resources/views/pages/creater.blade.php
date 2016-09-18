@extends('layouts.app')

@section('content')
    @include('includes.panel')

    {{-- @foreach($errors->all() as $message)
    {{ $message }}
    @endforeach --}}
    <!--Form creater-->
    <div class="container">
        <h2>Experiment Creater</h2>
        <h3>Experiment Information</h3>
        <form class="form-horizontal" action="/createexp" method="post">
            {{ csrf_field() }}
            <!--Form Subject-->
            <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                <label class="control-label col-sm-2" for="subject">Subject:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="A wayfinding Experiment">
                    @if ($errors->has('subject'))
                        <span class="help-block">
                            <strong>{{ $errors->first('subject') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <!--Form Description-->
            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <label class="control-label col-sm-2" for="description">Descripion</label>
                <div class="col-sm-10">
                    <input type="testarea" class="form-control" id="description" name="description" placeholder="Describe the project">
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <!--Recruitment Section-->
            <hr>
            <h3>Recruitment</h3>
            <!--Recruitment form-->
            <div class="form-group{{ $errors->has('form') ? ' has-error' : '' }}">
                <label for="form" class="col-sm-12">Recruitment Form:</label>
                <div class="col-sm-12">
                    <select class="form-control" id="form" name="form">

                        @foreach($forms as $form)
                            <option value="{{ $form->title }}">{{ $form->title }}</option>
                        @endforeach

                    </select>
                    @if ($errors->has('form'))
                        <span class="help-block">
                            <strong>{{ $errors->first('form') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <!--Recuitment tests-->
            <div class="form-group{{ $errors->has('test') ? ' has-error' : '' }}">
                <label for="test" class="col-sm-12">Recruitment Test (Optional: hold shift to select more than one):</label>
                <div class="col-sm-12">
                    <select multiple class="form-control" id="test" name="test">

                        @foreach($tests as $test)
                            <option value="{{ $test->title }}">{{ $test->title }}</option>
                        @endforeach

                    </select>
                    @if ($errors->has('test'))
                        <span class="help-block">
                            <strong>{{ $errors->first('test') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <!--Route Selecter-->
            <hr>
            <h3>Route Selecter</h3>
            <div class="row">
                <!--Route info-->
                <div class="form col-md-7 route-info">
                    <div class="row">
                        <div class="form-group" id="MapCenter">
                            <label class="control-label col-sm-2" for="subject">Centre:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="centerText" placeholder="Select a centre">
                            </div>
                        </div>
                    </div>

                    <!--Route to be added-->
                    <div class="row" id="routeList">

                    </div>

                    <!--Add-route button-->
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default" onclick="WFfunction.addRoute();">
                                        Add Route
                                    </button>
                                    <a type="button" id="maptoggle" class="btn btn-info" data-toggle="collapse" href="#map">
                                        Map
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <input id="pac-input" class="controls" type="text" placeholder="Search not working">
                        <div class="collapse in" id="map">
                        </div>
                    </div>
                    <!--Submit Button-->
                    <div class="form-group">
                        <div class=" col-sm-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
<script src="/js/app.js"></script>
<script src="/js/main.js" charset="utf-8"></script>
<!--Google Map Api-->
<script src="/js/gmap.js" charset="utf-8"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZEyaeSOnH8dcVq646GIyUQbxGKHza_dc&libraries=places&callback=initMap"></script>
</body>
@endsection
