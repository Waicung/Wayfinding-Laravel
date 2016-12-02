
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

 // Vue.component('example', require('./components/Example.vue'));
 //Vue.component('wf-summary', require('./components/Summary.vue'));

Vue.component('pager', require('./components/Pager.vue'));
Vue.component('progress-bar', require('./components/ProgressBar.vue'));
Vue.component('action-bar', require('./components/ActionBar.vue'));
Vue.component('list-view', require('./components/ListView.vue'));
Vue.component('google-map', require('./components/GoogleMap.vue'));
Vue.component('v-select', VueSelect.VueSelect);

const app = new Vue({

    el: 'main',
    data: {
        home: '/home',
        pages: 3,
        fields: [
            {required:true,inputs:['Subject','Description']},
            {required:false,inputs:['Routes']},
            {required:true,inputs:['Tests','Form']},
        ],
        subject: '',
        description: '',
        form: null,
        tests: null,
        markers: [],
        current: 1,
    },
    computed: {
        progress: function () {
            return (this.current-1)/this.pages*100;
        },
        ongoing: function () {
            return 1/this.pages*100;
        },
        routes: function () {
            var routes = [];
            for(var i=0; i<this.markers.length; i+=2){
                if(i===this.markers.length-1){
                    routes.push({origin:this.simplify(this.markers[i])});
                }else {
                    routes.push({origin:this.simplify(this.markers[i]), destination:this.simplify(this.markers[i+1])});
                }
            }
            return JSON.stringify(routes);
        }
    },
    methods: {
        simplify: function (marker) {
            return marker.position;
        }
    }

});
