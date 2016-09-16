var map;
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
CenterControl.prototype.getCenter = function() {
        return this.center_;
      };
CenterControl.prototype.setCenter = function(center) {
        this.center_ = center;
        console.log(center.toString());
        document.getElementById('centerText').value =
                center.lat().toPrecision(8) + ", "
        +center.lng().toPrecision(8);
      };


function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: melbourne,
    });

    /*Container for the center control*/
    var centerControlDiv = document.createElement('div');
    var centerControl = new CenterControl(centerControlDiv, map, melbourne);
    
    /*Attach the container to the map*/
    centerControlDiv.style['padding-top'] = '10px';
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);
}
