<h3>Route Selecter</h3>
<form class="form-horizontal" action="/createroutes" method="post">
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
                <!--<input id="pac-input" class="controls" type="text" placeholder="Search not working">-->
                <div class="collapse in" id="map">
                </div>
            </div>
            <!--Submit Button-->
            <div class="form-group">
                <div class=" col-sm-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                >
            </div>
        </div>
    </div>

</form>
