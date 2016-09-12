<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <title></title>
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.23.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.23.0/mapbox-gl.css' rel='stylesheet' />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.js" charset="utf-8"></script>
    <style>
        body { margin:0; padding:0; }
        #map { position:absolute; top:0; bottom:0; width:100%; }
    </style>
</head>
<body>

<style type='text/css'>
    #info {
        display: block;
        position: relative;
        margin: 0px auto;
        width: 50%;
        padding: 10px;
        border: none;
        border-radius: 3px;
        font-size: 12px;
        text-align: center;
        color: #222;
        background: #fff;
    }
</style>
<div id='map'></div>
<span id="info">The current location: @{{ lnglat }}</span>
<script>
var vue = new Vue({
    el: 'body',
    data:{
        lnglat: '0123'
    }
});

mapboxgl.accessToken = 'pk.eyJ1Ijoid2FpY3VuZyIsImEiOiJjaXN3bXpxZzcwNXh3MnBwZzg0ZWJ0Z3hmIn0.sJawkQSHIoo7D_gE9qNnZw';
var map = new mapboxgl.Map({
    container: 'map', // container id
    style: 'mapbox://styles/mapbox/streets-v9',
    center: [-74.50, 40], // starting position
    zoom: 9 // starting zoom
});

map.on('mousemove', function (e) {
    vue.lnglat=
        JSON.stringify(e.lngLat);
});
</script>

</body>
</html>
