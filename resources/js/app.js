/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");
import VueRouter from "vue-router";
import App from "./components/App.vue";
import { routes } from "./router.js";
import { store } from "./store/index";
import "./css/main.css";
import Nprogress from "nprogress";
import "nprogress/nprogress.css";

Vue.use(VueRouter);
Vue.use(Nprogress);
Vue.prototype.$http = axios;
const token = localStorage.getItem("gToken");
if (token) {
    Vue.prototype.$http.defaults.headers.common[
        "Authorization"
    ] = `Bearer ${token}`;
}
Vue.prototype.$http.defaults.headers.common["X-Requested-With"] =
    "XMLHttpRequest";

const router = new VueRouter({
    routes
    // mode: "history"
});
router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (store.getters.isLoggedIn) {
            // console.log("login");
            next();
            return;
        } else next("/login");
    } else {
        // console.log("login_next");
        next();
    }
    if (to.matched.some(record => record.meta.hideForAuth)) {
        if (store.getters.isLoggedIn) {
            console.log("check applied", store.state.isApplied);
            if (store.state.isApplied) {
                next({ path: "/acknowledgement" });
            } else {
                next({ path: "/recruitment_form" });
            }
            // console.log("login_hiude");

            return;
        } else next();
    } else {
        // console.log("login_hiude_next");

        next(false);
    }
});
router.beforeResolve((to, from, next) => {
    if (to.path) {
        Nprogress.start();
    }
    next();
});

router.afterEach((to, from) => {
    Nprogress.done();
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
Vue.component("app", require("./components/App.vue").default);
Vue.component("nav-bar", require("./components/Navbar.vue").default);
Vue.component("header-bar", require("./components/Header.vue").default);
Vue.component("footer-bar", require("./components/Footer.vue").default);
Vue.component("register", require("./components/Register.vue").default);
Vue.component("login", require("./components/Login.vue").default);
Vue.component(
    "step-component",
    require("./components/StepComponent.vue").default
);
Vue.component(
    "notifications",
    require("./components/Notifications.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
    router,
    store,
    render: h => h(App)
});
