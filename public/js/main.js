$(document).ready(function(){

    /*Map toggle button*/
    $("#map").on("hide.bs.collapse", function(){
        $("#maptoggle").toggleClass("btn-info");
    });
    $("#map").on("show.bs.collapse", function(){
        $("#maptoggle").toggleClass("btn-info");
    });

    var lastRouteID = -1;

    /*Add a route information form*/
    WFfunction = {
        addRoute: function(){
            lastRouteID += 1;
            var routeSection = "<div class='form-group' id='route"+lastRouteID+"'>"+
                                    "<label class='sr-only' for='routeName"+lastRouteID+"'>Route Name</label>"+
                                    "<div class='col-sm-3'>"+
                                        "<input type='text' class='form-control' id='RouteName"+lastRouteID+"' placeholder='New Route'>"+
                                    "</div>"+
                                    "<label class='sr-only' for='origin"+lastRouteID+"'>Route Name</label>"+
                                    "<div class='col-sm-4'>"+
                                        "<input type='text' class='form-control' id='origin"+lastRouteID+"' placeholder='Origin'>"+
                                    "</div>"+
                                    "<label class='sr-only' for='destination"+lastRouteID+"'>Route Name</label>"+
                                    "<div class='col-sm-4'>"+
                                        "<input type='text' class='form-control' id='destination"+lastRouteID+"' placeholder='Destination'>"+
                                    "</div>"+
                                    "<div class='col-sm-1'>"+
                                        "<button type='button' class='close closeRoute'>&times;</button>"+
                                    "</div>"+
                                "</div>";
            $('#routeList').append(routeSection);
        },
    }

    $(document).on('click', ".closeRoute", function(event) {
        event.preventDefault();
        $(this).parent().parent().remove();
    })

});
