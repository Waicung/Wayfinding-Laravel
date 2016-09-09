@extends('layouts.app')

@section('content')
    @include('includes.panel')

    <div class="container">
        <h2>Experiment Creater</h2>
        <form class="form-horizontal">
            <div class="form-group">
                <label class="control-label col-sm-2" for="subject">Subject:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="subject" placeholder="A wayfinding Experiment">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="description">Descripion</label>
                <div class="col-sm-10">
                    <input type="testarea" class="form-control" id="description" placeholder="Describe the project">
                </div>
            </div>

            <!--Recruitment Section-->
            <hr>
            <h3>Recruitment</h3>
            <div class="form-group">
                <label for="form" class="col-sm-12">Recruitment Form:</label>
                <div class="col-sm-12">
                    <select class="form-control" id="form">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                </div>
                <label for="sel2" class="col-sm-12">Recruitment Test (hold shift to select more than one):</label>
                <div class="col-sm-12">
                    <select multiple class="form-control" id="sel2">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>

            <!--Submit Button-->
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
                <div class="col-sm-offset-2 col-sm-2">
                    <button type="button" class="btn btn-default">Add Route</button>
                </div>
            </div>

            <!--Route Selecter-->
            <hr>
            <h3>Route Selecter</h3>
            <div class="form-group">
                <label class="control-label col-sm-1" for="subject">Centre:</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" id="subject" placeholder="Select a centre">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-1" for="subject">Origin:</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="subject" placeholder="Origin">
                </div>
                <label class="control-label col-sm-2" for="subject">Destination:</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="subject" placeholder="Destination">
                </div>
                <div class="col-sm-3">
                    <button type="button" class="btn btn-default">Add Route</button>
                </div>

            </div>





        </form>
    </div>

@endsection
