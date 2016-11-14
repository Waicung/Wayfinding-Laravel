<!--
    A List Rendering Component
-->
<template lang="html">
    <div class="panel panel-default">
        <!--Panel Heading-->
        <a href="#wf-items" data-toggle="collapse">
            <div class="panel-heading" v-if="dHeading">
                <!--TODO: Inject heading hTML in to this slot-->
                <slot name="heading"></slot>
            </div>
        </a>

        <!--The List-->
        <div class="panel-collapse in" id="wf-items">
            <ul class="list-group">
                <li class="list-group-item" v-for="route in routes">
                    <!--Remove item from the list-->
                    <a v-if="remove" @click="remove(route)">
                        <span class="glyphicon glyphicon-remove"></span>
                    </a>
                    {{ toString(route) }}
                    <a :href="route.detail" v-if="detail">
                        <span class="glyphicon glyphicon-menu-right pull-right"></span>
                    </a>
                </li>
            </ul>
        </div>

        <!--Footer-->
        <div class="panel-footer" v-if="footer">
            <slot name="footer"></slot>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        items: {
            type: Array
        },
        heading: {
            type: Boolean,
            default: false
        },
        footer: {
            type: Boolean,
            default: false
        },
        detail: {
            type: Boolean,
            default: false
        },
    },
    computed: {
        routes: function () {
            var routes = [];
            for(var i=0; i<this.items.length; i+=2){
                if(i===this.items.length-1){
                    routes.push({origin:this.items[i]});
                }else {
                    routes.push({origin:this.items[i], destination:this.items[i+1]});
                }
            }
            return routes;
        },
        dHeading: function () {
            return this.heading === false || !this.items[0]? false : true;
        }
    },

    methods: {
        /*Based on Vuex, delete the selected item from the list*/
        remove: function (route) {
                this.items = this.items.filter(function (x) {
                    return JSON.stringify(x)!==JSON.stringify(route.origin)&&JSON.stringify(x)!==JSON.stringify(route.destination);
                }
            );
        },
        toString: function (route) {
            if(route.destination === undefined){
                return route.origin.position.lat.toFixed(6)+', '+route.origin.position.lng.toFixed(6);
            }
            return route.origin.position.lat.toFixed(6)+', '+route.origin.position.lng.toFixed(6)+' - '+
            route.destination.position.lat.toFixed(6)+', '+route.destination.position.lng.toFixed(6);
        }
    }

}
</script>

<!--Based On Bootstrap-->
<style lang="css">
</style>
