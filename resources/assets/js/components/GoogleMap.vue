
<template>
    <div>
        <map
        :center.sync="center"
        :zoom.sync="zoom"
        :map-type-id.sync="mapType"
        :options="{styles: mapStyles, scrollwheel: scrollwheel}"
        @g-click="mapClicked"
        @g-rightclick="mapRclicked"
        >
            <marker
            v-for="m in markers"
            :position.sync="m.position"
            :opacity="m.opacity"
            :draggable.sync="m.draggable"
            :label="m.label"
            >
            </marker>
        </map>
        <div class="col-md-offset-8">
            <a type="button" class="btn btn-default" @click="addMarker" style="margin:20px 0"> {{ markerBtn }}</a>
            <span>Or right click on the map</span>
        </div>
    </div>
</template>

<script>

import {load, Marker, Map, Cluster} from 'vue-google-maps'

load('AIzaSyAZEyaeSOnH8dcVq646GIyUQbxGKHza_dc', '3', ['places']);

export default {
    props:{
        markers: {
            type: Array,
        }

    },
    data: function data() {
        return {
          center: { lat: -37.813628, lng: 144.963058 },
          zoom: 12,
          clustering: false,
          gridSize: 50,
          mapType: 'roadmap',
          mapStyle: 'normal',
          scrollwheel: true
        };
    },
    computed: {
        markerBtn: function () {
            return this.markers.length%2 === 0? "Add Starting Point": "Add Destination";
        }
    },
    methods: {
        mapClicked (mouseArgs) {
            console.log('map clicked', mouseArgs);
        },
        mapRclicked (mouseArgs) {
            const createdMarker = this.addMarker();
            createdMarker.position.lat = mouseArgs.latLng.lat();
            createdMarker.position.lng = mouseArgs.latLng.lng();
        },
        addMarker: function addMarker() {
            var label = (this.markers.length)%2 ===0? (this.markers.length+2)/2: (this.markers.length+1)/2;
            this.markers.push({
                position: this.center,
                opacity: 1,
                draggable: true,
                label: label+""
            });
            return this.markers[this.markers.length - 1];
        }
    },
    components: {
        Map,
        Marker,
    }
};
</script>

<style>
    map {
        width:100%;
        height: 350px;
        display: block;
    }
</style>
