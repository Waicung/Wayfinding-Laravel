@extends('layouts.app')

@section('content')
    <div class="container">
        <!--Progress bar-->
        <div class="row">
            <div class="col-md-12">
                <progress-bar :progress="progress" :stage="ongoing"></progress-bar>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">New Experiment</h4>
            </div>
        </div>

        <pager :page="current">
            <!--General Info-->
            <div class="row" slot="page-1">
                <div class="col-md-12">
                    <div class="form-group {{ $errors->has('subject') ? ' has-error' : '' }}">
                      <label for="subject">Subject</label>
                      <input type="text" class="form-control" id="subject" placeholder="Give It a Title" v-model="subject">
                      @if ($errors->has('subject'))
                          <span class="help-block">
                              <strong>{{ $errors->first('subject') }}</strong>
                          </span>
                      @else
                          <p class="help-block">Identity for each experiment</p>
                      @endif
                    </div>
                    <div class="form-group {{ $errors->has('description') ? ' has-error' : ''}}">
                      <label for="description">Description</label>
                      <textarea class="form-control" id="description" rows="5" placeholder="Way-finding" v-model="description"></textarea>
                      @if ($errors->has('description'))
                          <span class="help-block">
                              <strong>{{ $errors->first('description')}}</strong>
                          </span>
                        @else
                          <p class="help-block">A brief description</p>
                      @endif
                    </div>
                </div>
            </div>

            <!--Route Selection-->
            <div class="row" slot="page-2">
                <div class="col-md-12">
                    <google-map :markers="markers"></google-map>
                </div>

                <div class="col-md-12">
                  <list-view :items.sync="markers" :heading="true" :footer="false" :detail="false" :remove="true">
                      <h6 class="text-center" slot="heading">Experiment Routes</h6>
                  </list-view>
                </div>
            </div>

            <!--Recruitment Section-->
            <div class="row" slot="page-3">
                <div class="col-md-12">
                    <div class="form-group {{ $errors->has('form') ? ' has-error' : ''}}">
                    <h5>Form</h5>
                    <v-select  :value.sync="form" :options="{{ $forms }}" placeholder="General Data Collection"></v-select>
                    @if ($errors->has('form'))
                        <span class="help-block">
                            <strong>{{ $errors->first('form')}}</strong>
                        </span>
                    @endif
                    </div>
                </div>
                <div class="col-md-12">
                    <h5>Tests (Optional)</h5>
                    <v-select  multiple :value.sync="tests" :options="{{ $tests }}" placeholder="Specific Tests"></v-select>
                </div>

            </div>
        </pager>

        <form action="/experiment/new" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="subject" :value="subject">
            <input type="hidden" name="description" :value="description">
            <input type="hidden" name="routes" :value="routes">
            <input type="hidden" name="tests" :value="tests">
            <input type="hidden" name="form" :value="form">
            <div class="row  wf-action-bar">
              <div class="col-md-12">
                  <action-bar :pages="pages" :fields="fields" :home="home" :current.sync="current"></action-bar>
              </div>
            </div>
        </form>
    </div>
@endsection

@section('js')


@endsection
