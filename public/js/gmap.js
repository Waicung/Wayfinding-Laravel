var map;
var markers = [];
var melbourne = {lat: -37.813628, lng: 144.963058};
/*Set center button*/
function CenterControl(controlDiv, map, center){
    var control = this;

    //set center property
    control.center_ = center;
    controlDiv.style.clear = 'both'; //prohibit floating objects on both side

    //set CSS for the control border
    var setCenterUI = document.createElement('div');
    setCenterUI.id = 'setCenterUI';
    setCenterUI.title = 'Click to select a center';
    controlDiv.appendChild(setCenterUI);

    //set CSS for the control interior
    var setCenterText = document.createElement('div');
    setCenterText.id = 'setCenterText';
    setCenterText.innerHTML = 'Set center';
    setCenterUI.appendChild(setCenterText);

    //click enevt listener
    setCenterUI.addEventListener('click', function(){
        var newCenter = map.getCenter();
        control.setCenter(newCenter);
    });

}

/*property to store and set center coordinate*/
CenterControl.prototype.center_ = null;

CenterControl.prototype.setCenter = function(center) {
        this.center_ = center;
        console.log(center.toString());
        //set centre coordinate to the form
        document.getElementById('centerText').value =
                center.lat().toPrecision(8) + ", " +
                center.lng().toPrecision(8);
        //set center marker to the map
        var marker = setMarker(center,"C");
        setMapOnAll(null);
        var markerKey = labelToID("C");
        markers[markerKey] = marker;
        //renderMarker();
        setMapOnAll(map);

      };


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
    map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(centerControlDiv);

    var searchBox = document.getElementById('pac-input');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(searchBox);


}





function setMarker(latlng,label){
    var marker = new google.maps.Marker({
        position: latlng,
        label: label,
    });
    return marker;
}

function labelToID(label){
    var arraykey = null;
    switch (label.substring(0,1)) {
        case "C":
            arraykey = 0;
            break;
        case "O":
            arraykey = 1;
            break;
        case "D":
            arraykey = 2;
            break;
        default:
            return false;
    }
    if (Number(label.substring(1))>1) {
        arraykey *= number(label.substring(1));
    }
    return arraykey;
}

// Sets the map on all markers in the array.
function setMapOnAll(map) {
    markers.forEach(function(marker) {
      marker.setMap(map);
    });
    /*for (var i = 0; i < markers.length; i++) {
      markers[i].setMap(map);
      console.log(markers[i].label);
    }*/
}
