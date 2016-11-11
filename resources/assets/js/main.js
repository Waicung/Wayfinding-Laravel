var focusedID;
jQuery(document).ready(function(){

    /*Map toggle button*/
    jQuery("#map").on("hide.bs.collapse", function(){
        jQuery("#maptoggle").toggleClass("btn-info");
    });
    jQuery("#map").on("show.bs.collapse", function(){
        jQuery("#maptoggle").toggleClass("btn-info");
    });

    var lastRouteID = 0;

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
                                        "<input type='text' class='form-control' id='origin"+lastRouteID+"' placeholder='Origin (lat,lng)'>"+
                                    "</div>"+
                                    "<label class='sr-only' for='destination"+lastRouteID+"'>Route Name</label>"+
                                    "<div class='col-sm-4'>"+
                                        "<input type='text' class='form-control' id='destination"+lastRouteID+"' placeholder='Destination (lat,lng)'>"+
                                    "</div>"+
                                    "<div class='col-sm-1'>"+
                                        "<button type='button' class='close closeRoute'>&times;</button>"+
                                    "</div>"+
                                "</div>";
            jQuery('#routeList').append(routeSection);
            jQuery('#origin'+lastRouteID).on('focus', function(event) {
                //alert(event.currentTarget.id);
                focusedID = event.currentTarget.id;
            });
            jQuery('#destination'+lastRouteID).on('click', function(event) {
                focusedID = event.currentTarget.id;
            });
        },
    }

    jQuery('#centerText').on('click', ".closeRoute", function(event) {
        event.preventDefault();
        jQuery(this).parent().parent().remove();
    });

    jQuery('#centerText').on('focus', function(event) {
        focusedID = event.currentTarget.id;
    })

});
