
<template>
    <div>
        <map
        :center.sync="center"
        :zoom.sync="zoom"
        :map-type-id.sync="mapType"
        :options="{styles: mapStyles, scrollwheel: scrollwheel}"
        @g-rightclick="mapRclicked"
        >
            <marker
            :position.sync="m.position"
            :opacity="m.opacity"
            :draggable.sync="m.draggable"
            v-for="m in markers"
            >
            </marker>
        </map>

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
          clustering: true,
          gridSize: 50,
          mapType: 'roadmap',
          mapStyle: 'normal',
          scrollwheel: true
        };
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
            this.markers.push({
                position: this.center,
                opacity: 1,
                draggable: true,
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
