<h3>New Experiment</h3>
<form class="form-horizontal" action="/createexp" method="post">
    {{ csrf_field() }}
    <!--Form Subject-->
    <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
        <label class="control-label col-sm-2" for="subject">Subject:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="subject" name="subject" placeholder="A wayfinding Experiment" v-model="experiment.subject" >
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
            <textarea rows="4" cols="50" class="form-control" id="description" name="description" placeholder="Describe the project"
            v-model="experiment.description"></textarea>
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
            <select class="form-control" id="form" name="form" v-model="experiment.form">

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
            <select multiple class="form-control" id="test" name="test" v-model="experiment.tests">

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
    <div class="form-group pull-right">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
