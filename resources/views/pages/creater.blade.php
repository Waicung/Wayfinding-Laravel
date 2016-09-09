@extends('layouts.app')

@section('content')
    @include('includes.panel')

    {{-- @foreach($errors->all() as $message)
        {{ $message }}
    @endforeach --}}
    <div class="container">
        <h2>Experiment Creater</h2>
        <form class="form-horizontal" action="/createexp" method="post">
            {{ csrf_field() }}
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
            <div class="form-group{{ $errors->has('form') ? ' has-error' : '' }}">
                <label for="form" class="col-sm-12">Recruitment Form:</label>
                <div class="col-sm-12">
                    <select class="form-control" id="form" name="form">
                        @if(isset($forms))
                        @foreach($forms as $form)
                            <option value="{{ $form->title }}">{{ $form->title }}</option>
                        @endforeach
                        @endif
                    </select>
                    @if ($errors->has('form'))
                        <span class="help-block">
                            <strong>{{ $errors->first('form') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('test') ? ' has-error' : '' }}">
                <label for="test" class="col-sm-12">Recruitment Test (Optional: hold shift to select more than one):</label>
                <div class="col-sm-12">
                    <select multiple class="form-control" id="test" name="test">
                        @if(isset($tests))
                        @foreach($tests as $test)
                            <option value="{{ $test->title }}">{{ $test->title }}</option>
                        @endforeach
                        @endif
                    </select>
                    @if ($errors->has('test'))
                        <span class="help-block">
                            <strong>{{ $errors->first('test') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <!--Submit Button-->
            <div class="form-group pull-right">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>


            <div class="form-group">
                <button type="button" class="btn btn-default" onclick="showStuff('selecter',this); return false;">Add Route</button>
            </div>





            <!--Route Selecter-->
            <div class="container hidden" id="selecter">
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
            </div>

        </form>
    </div>


<script type="text/javascript">
function showStuff(id, btn) {
   document.getElementById(id).className ="container";
   btn.className  = 'hidden';
}
</script>

@endsection
