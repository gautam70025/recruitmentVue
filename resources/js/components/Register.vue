<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card box-card">
                    <div class="card-header bg-primary">
                        User Registration form
                    </div>
                    <div class="card-body">
                        <p class="note">
                            *An email and a message containing the user id and
                            password will be sent to your respective email id
                            and phone number after successful registration.
                        </p>
                        <form @submit.prevent="onRegister" id="demo-form">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">
                                            Name
                                            <span class="star">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Enter Name"
                                            id="name"
                                            v-model="name"
                                            :class="{
                                                border:
                                                    spanError.name == true ||
                                                    (val_errors &&
                                                        val_errors.name != null)
                                            }"
                                        />
                                        <span>{{ errors.name }}</span>
                                        <span
                                            v-if="val_errors && val_errors.name"
                                            >x {{ val_errors.name[0] }}</span
                                        >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">
                                            Email Id
                                            <span class="star">*</span>
                                        </label>
                                        <input
                                            type="email"
                                            class="form-control"
                                            placeholder="Enter Email"
                                            id="email"
                                            v-model="email"
                                            :class="{
                                                border:
                                                    spanError.email == true ||
                                                    (val_errors &&
                                                        val_errors.email !=
                                                            null &&
                                                        email_errors != null)
                                            }"
                                        />
                                        <span>{{ errors.email }}</span>
                                        <span v-if="email_errors"
                                            >x {{ email_errors }}</span
                                        >

                                        <span
                                            v-if="
                                                val_errors && val_errors.email
                                            "
                                            >x {{ val_errors.email[0] }}</span
                                        >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="phone_no">
                                            Phone No
                                            <span class="star">*</span>
                                        </label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            placeholder="Enter Phone No"
                                            id="phone_no"
                                            v-model="phone_no"
                                            :class="{
                                                border:
                                                    spanError.phone_no ==
                                                        true ||
                                                    (val_errors &&
                                                        val_errors.phone_no !=
                                                            null)
                                            }"
                                        />
                                        <span>{{ errors.phone_no }}</span>
                                        <span
                                            v-if="
                                                val_errors &&
                                                    val_errors.phone_no
                                            "
                                        >
                                            x
                                            {{ val_errors.phone_no[0] }}
                                        </span>
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
                                        Register
                                    </button>
                                    <br />
                                    <br />
                                    <p>
                                        <router-link to="/login"
                                            >Already registered ? Login
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
export default {
    data() {
        return {
            name: "",
            email: "",
            phone_no: "",
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
        onRegister() {
            this.errors = {};
            if (!this.name.length) {
                this.errors.name = "x This field is required.";
                this.spanError.name = true;
            } else {
                this.errors.name = null;
                delete this.errors["name"];
                this.spanError.name = false;
            }
            if (!this.email.length) {
                this.errors.email = "x This field is required.";
                this.spanError.email = true;
            } else {
                this.errors.email = null;
                delete this.errors["email"];

                this.spanError.email = false;
            }
            if (!this.phone_no.length || this.phone_no.length != 10) {
                this.errors.phone_no = "x This field is required.";
                this.spanError.phone_no = true;
            } else {
                this.errors.phone_no = null;
                delete this.errors["phone_no"];

                this.spanError.phone_no = false;
            }

            // if (
            //   !this.password.length ||
            //   !this.confirm_password ||
            //   this.password !== this.confirm_password
            // ) {
            //   this.errors.password = "x Passwords don't match.";
            //   this.errors.confirm_password = "x Passwords don't match.";
            //   this.spanError.confirm_password = true;
            //   this.spanError.password = true;
            // } else {
            //   delete this.errors["password"];
            //   delete this.errors["confirm_password"];
            //   this.spanError.confirm_password = false;
            //   this.spanError.password = false;
            // }
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
                    name: this.name,
                    email: this.email,
                    phone_no: this.phone_no,
                    captcha: this.captcha_code
                };
                // console.log("ad", data);

                this.$store
                    .dispatch("register", data)
                    .then(result => {
                        Nprogress.done();

                        swal("Done!", "Registration Completed", "success");
                        this.$router.push("/login");
                    })
                    .catch(error => {
                        console.log("error");
                    });
            }
        }
    },
    computed: {
        // captcha_code() {
        //   this.first_no = Math.floor(Math.random() * 10) + 1;
        //   this.second_no = Math.floor(Math.random() * 99) + 1;
        //   console.log(this.first_no);
        //   return this.first_no + "+" + this.second_no;
        // },
        val_errors() {
            return this.$store.state.register_errors;
            // if (this.$store.state.register_errors != null) {
            //   var err = this.$store.state.register_errors;
            //   err = Object.values(err);
            //   err = err.flat();
            //   return err;
            // }
        },
        email_errors() {
            return this.$store.state.register_email_errors;
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
    margin-top: 20px;
}
.card-header {
    text-align: center;
    color: white;
    text-transform: uppercase;
    font-size: 18px;
}
.form-group span {
    color: red;
    font-size: 12px;
}
.border {
    border: 1px solid red !important;
}
.box-card {
    box-shadow: 1px 1px 8px 1px #5d5d5d5e;
}
.note {
    color: #007bff;
    background: yellow;
    font-size: 14px;
    padding: 2px 5px;
    width: fit-content;
}</style
>>
