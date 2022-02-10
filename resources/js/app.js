/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import { BootstrapVue, IconsPlugin, BootstrapVueIcons, FormSelectPlugin, FormFilePlugin } from 'bootstrap-vue'
import VueRouter from 'vue-router'
import ToggleButton from 'vue-js-toggle-button'

//import components
// import ExampleComponent from './components/ExampleComponent.vue'
import SidebarComponent         from './components/SidebarComponent.vue'
import ActivitiesComponent      from './components/ActivitiesComponent.vue'
import WatchHistoryComponent    from './components/WatchHistoryComponent.vue'
import StaffSellerComponent     from './components/StaffSellerComponent.vue'
import ManageEstimatorComponent from './components/ManageEstimatorComponent.vue'
import BcmComponent             from './components/BcmComponent.vue'
import GeneralSettingsComponent from './components/GeneralSettingsComponent.vue'
import UserDetailComponent from './components/UserDetailComponent.vue'

//Estimator's Component
import AddEstimatorComponent    from './components/estimator/AddEstimatorComponent.vue'

// Import Bootstrap an BootstrapVue CSS files (order is important)
import 'jquery/dist/jquery.min.js'; 
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import "datatables.net-dt/js/dataTables.dataTables"
import "datatables.net-dt/css/jquery.dataTables.min.css"
import "datatables.net-buttons/js/dataTables.buttons.js"
import "datatables.net-buttons/js/buttons.colVis.js"
import "datatables.net-buttons/js/buttons.flash.js"
import "datatables.net-buttons/js/buttons.html5.js"
import "datatables.net-buttons/js/buttons.print.js"
import $ from 'jquery';

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.use(VueRouter)
Vue.use(FormSelectPlugin, FormFilePlugin)
Vue.use(ToggleButton)


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', ExampleComponent);
Vue.component('sidebar-component', SidebarComponent);
Vue.component('user-detail-component', UserDetailComponent);
// Vue.component('activities-component', ActivitiesComponent);
// Vue.component('watch-history-component', WatchHistoryComponent);
// Vue.component('manage-user-component', StaffSellerComponent);
// Vue.component('manage-estimator-component', ManageEstimatorComponent);
// Vue.component('bcm-component', BcmComponent);
// Vue.component('settings-component', GeneralSettingsComponent);

const routes = [
    //Menus
    { path: '/',                    component: ActivitiesComponent },
    { path: '/watch_history',       component: WatchHistoryComponent },
    { path: '/manage_user',         component: StaffSellerComponent },
    { path: '/manage_estimator',    component: ManageEstimatorComponent },
    { path: '/bcm',                 component: BcmComponent },
    { path: '/settings',            component: GeneralSettingsComponent },

    //Estimator
    { path: '/add_estimator',       component: AddEstimatorComponent },
]

const router = new VueRouter({ routes })

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router: router,
});
