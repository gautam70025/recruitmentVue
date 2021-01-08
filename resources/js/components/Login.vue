<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-header bg-primary">Login form</div>
                    <div class="card-body">
                        <div
                            class="alert alert-danger text-center"
                            role="alert"
                            v-if="val_errors"
                        >
                            {{ val_errors }}
                        </div>
                        <form @submit.prevent="onLogin" id="login-form">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="registration_no"
                                            >User Id</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Enter User ID"
                                            id="registration_no"
                                            v-model="registration_no"
                                            :class="{
                                                border:
                                                    spanError.registration_no ==
                                                        true ||
                                                    val_errors != null
                                            }"
                                        />
                                        <span>{{
                                            errors.registration_no
                                        }}</span>
                                        <!-- <span v-if="val_errors">x {{ val_errors }}</span> -->
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input
                                            type="password"
                                            class="form-control"
                                            placeholder="Enter Password"
                                            id="password"
                                            v-model="password"
                                            :class="{
                                                border:
                                                    spanError.password ==
                                                        true ||
                                                    val_errors != null
                                            }"
                                        />
                                        <span>{{ errors.password }}</span>
                                        <!-- <span v-if="val_errors">x {{ val_errors }}</span> -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="captcha-class">
                                        <p>
                                            {{ captcha_code }}
                                            <span>
                                                <button
                                                    type="button"
                                                    class="btn btn-sm"
                                                    @click="reloadCaptcha"
                                                >
                                                    <i
                                                        class="fa fa-refresh"
                                                    ></i>
                                                </button>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="number"
                                            class="form-control"
                                            placeholder="Confirm Captcha"
                                            id="confirm_captcha"
                                            v-model="confirm_captcha"
                                            :class="{
                                                border:
                                                    spanError.confirm_captcha ==
                                                    true
                                            }"
                                        />
                                        <span>{{
                                            errors.confirm_captcha
                                        }}</span>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <hr />
                                    <button
                                        type="submit"
                                        class="btn custom-success"
                                    >
                                        Login
                                    </button>
                                    <br />
                                    <br />
                                    <p>
                                        <router-link to="/register"
                                            >New User ? Register
                                            here</router-link
                                        >
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import swal from "sweetalert";
import { global } from "../global.js";
import Nprogress from "nprogress";
import "nprogress/nprogress.css";
import Captcha from "./Captcha.vue";

export default {
    components: {
        captcha: Captcha
    },
    data() {
        return {
            registration_no: "",
            password: "",
            errors: {},
            spanError: {},
            global: global,
            confirm_captcha: "",
            first_no: null,
            second_no: null,
            captcha_code: null
        };
    },
    created() {
        // this.$nextTick(function () {
        //   grecaptcha.render("recaptcha-main");
        // });
    },
    methods: {
        reloadCaptcha() {
            this.first_no = Math.floor(Math.random() * 10) + 1;
            this.second_no = Math.floor(Math.random() * 99) + 1;
            this.captcha_code = this.first_no + "+" + this.second_no;
        },
        onLogin() {
            this.errors = {};

            if (!this.registration_no.length) {
                this.errors.registration_no = "x This field is required.";
                this.spanError.registration_no = true;
            } else {
                this.errors.registration_no = null;
                delete this.errors["registration_no"];

                this.spanError.registration_no = false;
            }

            if (!this.password.length) {
                this.errors.password = "x This field is required.";
                this.spanError.password = true;
            } else {
                this.errors.password = null;
                delete this.errors["password"];
                this.spanError.password = false;
            }
            if (this.confirm_captcha != this.first_no + this.second_no) {
                this.errors.confirm_captcha = "x Invalid Captcha.";
                this.spanError.confirm_captcha = true;
            } else {
                delete this.errors["confirm_captcha"];
                this.spanError.confirm_captcha = false;
            }
            if (Object.keys(this.errors).length == 0) {
                Nprogress.start();
                const data = {
                    registration_no: this.registration_no,
                    password: this.password,
                    captcha: this.captcha_code
                };

                this.$store
                    .dispatch("login", data)
                    .then(result => {
                        swal("Done!", "Login Successful", "success");
                        this.$router.push("/recruitment_form");
                    })
                    .catch(error => {
                        // console.log("error");
                    });
            }
        }
    },
    computed: {
        val_errors() {
            return this.$store.state.login_errors;
        }
    },
    mounted() {
        this.reloadCaptcha();
        // grecaptcha.reset();
        // grecaptcha.ready(function () {
        //   grecaptcha.render("recaptcha-container", {
        //     sitekey: "6Lcqj8UZAAAAAKTrGTjXoYyAAutAQa1Xi9mWmkN8",
        //   });
        // });
        // console.log(global.gcp_site_key);
    }
};
</script>
<style scoped>
.card {
    margin-top: 40px;
}
.card-header {
    text-align: center;
    color: white;
    text-transform: uppercase;
    font-size: 20px;
}
.form-group span {
    color: red;
    font-size: 12px;
}
.border {
    border: 1px solid red !important;
}
.alert-danger {
    color: #ffffff;
    background-color: #dc3545;
    border-color: #dc3545;
}</style
>>
