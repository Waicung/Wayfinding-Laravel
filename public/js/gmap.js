var map;
/*An array of all the markers
0: center marker
n*1: origin markers
n*2: destination markers
*/
var markers = [];

/*Default center*/
var melbourne = {lat: -37.813628, lng: 144.963058};

/*set center button*/
function CenterControl(controlDiv, map){
    var control = this;
    /*prohibit floating objects on both side*/
    controlDiv.style.clear = 'both';
    /*set CSS for the control border*/
    var setCenterUI = createAndAppend(
        'div',
        'Click to select a center',
        'setCenterUI',
        controlDiv);

    /*set CSS for the control interior*/
    var setCenterText = createAndAppend(
        'div',
        '',
        'setCenterText',
        setCenterUI);
    setCenterText.innerHTML = 'Set Center';

    /*click enevt listener*/
    setCenterUI.addEventListener('click', function(){
        var newCenter = map.getCenter();
        control.setCenter(newCenter);
    });

}

/*property to store and set center coordinate*/
//CenterControl.prototype.center_ = null;
CenterControl.prototype.setCenter = function(center) {
        //this.center_ = center;
        console.log('set center', center.toString());
        /*set centre coordinate to the form*/
        document.getElementById('centerText').value =
                center.lat().toPrecision(8) + ", " +
                center.lng().toPrecision(8);
        /* set center marker to the map*/
        var marker = setMarker(center,"C");
        setMapOnAll(null);
        markers[labelToID("C")] = marker;
        setMapOnAll(map);
        //alert(focusedID);
      };

function RouteControl(controlDiv, map){
    var control = this;
    /*prohibit floating objects on both side*/
    controlDiv.style.clear = 'both';
    var setOriginUI = createAndAppend(
        'div',
        'Set the origin',
        'setOriginUI',
        controlDiv
    );

    var setDestinationUI = createAndAppend(
        'div',
        'Set the destination',
        'setDestinationUI',
        controlDiv
    );

    var setOriginText = createAndAppend(
        'div',
        '',
        'setOriginText',
        setOriginUI
    );
    setOriginText.innerHTML = 'Set Origin';

    var setDestinationText = createAndAppend(
        'div',
        '',
        'setDestinationText',
        setDestinationUI
    );
    setDestinationText.innerHTML = 'Set Destination';

    setOriginText.addEventListener('click',function(){
        alert(focusedID);
        var marker = setMarker(map.center,'O', true);
        setMapOnAll(null);
        markers[labelToID(focusedID)] = marker;
        setMapOnAll(map);

    });

    setDestinationText.addEventListener('click', function(){
        alert(focusedID);
        var marker = setMarker(map.center,'D', true);
        setMapOnAll(null);
        markers[labelToID(focusedID)] = marker;
        setMapOnAll(map);
    });


}

/*call back function to initialise the map view*/
function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: melbourne,
    });

    /*Container for the center control*/
    var centerControlDiv = document.createElement('div');
    var centerControl = new CenterControl(centerControlDiv, map, melbourne);

    /*Attach the container to the map*/
    centerControlDiv.style['padding-top'] = '10px';
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);

    /*Attach the search box*/
    /*var searchBox = document.getElementById('pac-input');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(searchBox);*/

    var routeControlDiv = document.createElement('div');
    var routeControl = new RouteControl(routeControlDiv,map);

    map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(routeControlDiv);

}

/*get the default marker object by latlng and a label*/
function setMarker(latlng, label, dragable){
    var marker = new google.maps.Marker({
        position: latlng,
        label: label,
        draggable: dragable,
    });
    return marker;
}

/*get the key of a marker in the marker array*/
function labelToID(label){
    var arraykey = null;
    switch (label.substring(0,1)) {
        case "C":
            arraykey = 0;
            break;
        case "o":
            arraykey = 1;
            break;
        case "d":
            arraykey = 2;
            break;
        default:
            return false;
    }
    if (Number(label.substring(-1))>1) {
        arraykey *= number(label.substring(-1));
    }
    return arraykey;
}

/*render the array of markers on the map*/
function setMapOnAll(map) {
    markers.forEach(function(marker) {
        console.log(marker);
      marker.setMap(map);
    });
}

/*create and element and append to the parent*/
function createAndAppend(element, title, id, parent){
    var element = document.createElement(element);
    element.id = id;
    element.title = title;
    parent.appendChild(element);
    return element;
}

//# sourceMappingURL=gmap.js.map
