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

        <form action="/experiment/new" method="post">
            <pager :page="current">
                <!--General Info-->
                <div class="row" slot="page-1">
                    <div class="col-md-12">
                        <div class="form-group">
                          <label for="subject">Subject</label>
                          <input type="text" class="form-control" id="subject" placeholder="Give It a Title" v-model="subject">
                          <p class="help-block">Identity for each experiment</p>
                        </div>
                        <div class="form-group">
                          <label for="description">Description</label>
                          <textarea class="form-control" id="description" rows="5" placeholder="Way-finding" v-model="description"></textarea>
                          <p class="help-block">A brief description</p>
                        </div>
                    </div>
                </div>

                <!--Route Selection-->
                <div class="row" slot="page-2">
                    <div class="col-md-12">
                        <div class="map">

                        </div>
                    </div>
                    <div class="col-md-12">

                      <list-view :items="routes" :heading="true" :footer="false" :detail="true" :remove="true">
                          <h6 class="text-center" slot="heading">Experiment Routes</h6>
                      </list-view>
                    </div>
                    <div class="col-md-12">
                        <input type="hidden" name="routes" id="routes" v-model="routes">
                    </div>
                </div>

                <!--Recruitment Section-->
                <div class="row" slot="page-3">
                    <h1>page3</h1>
                </div>
            </pager>

            <div class="row  wf-action-bar">
              <div class="col-md-12">
                  <action-bar :pages="pages" :fields="fields" :home="home" :current="current"</action-bar>
              </div>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script src="/js/gmap.js" charset="utf-8"></script>
@endsection
