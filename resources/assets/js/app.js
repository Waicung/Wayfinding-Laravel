
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

const store = new Vuex.Store({
    state: {
        stage: 1,
        routes: [
            {message:'item1',detail:'/'},
            {message:'item2'},
            {message:'item3'},
        ],
    },
    mutations: {
        increment: state => state.stage++,
        decrement: state => state.stage--,
        setRoutes: (state,routes) => state.routes = routes,
        resetRoutes: state => state.routes = [],
    }
});

const app = new Vue({
    el: 'main',
    store,
    data: {
        home: '/',
        pages: 3,
        fields: [
            {required:true,inputs:['Subject','Description']},
            {required:false,inputs:['Routes']},
            {required:true,inputs:['Tests','Form']},
        ],
        subject: '',
        description: '',
        form: '',
        tests: [],
        markers: [],
    },
    computed: {
        current: function () {
            return store.state.stage;
        },
        progress: function () {
            return (this.current-1)/this.pages*100;
        },
        ongoing: function () {
            return 1/this.pages*100;
        },
        routes: function () {
            return store.state.routes;
        },
    }
});
