import Vue from "vue";
import VueResource from "vue-resource";
import VueRouter from "vue-router";

Vue.use(VueResource);
Vue.use(VueRouter);


import select_location from "./components/select_location.vue";
Vue.component("select-location", select_location);
var router = new VueRouter({
    mode: 'history',
    routes: []
});
// var vm =  new Vue({
//     router,
//     el: '#app',
//     mounted: function() {
//         q = this.$route.query.q
//         console.log(q)
//     },
// });

const app = new Vue({
    router
}).$mount("#location_app");


// new Vue({ el: '#location_app' })