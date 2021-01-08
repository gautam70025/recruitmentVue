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
            >{{val_errors}}</div>
            <form @submit.prevent="onLogin" id="login-form">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="email">Email Id</label>
                    <input
                      type="email"
                      class="form-control"
                      placeholder="Enter Email"
                      id="email"
                      v-model="email"
                      :class="{
                                                border: spanError.email == true || (val_errors !=null)
                                            }"
                    />
                    <span>{{ errors.email }}</span>
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
                                                    spanError.password == true || (val_errors !=null)
                                            }"
                    />
                    <span>{{ errors.password }}</span>
                    <!-- <span v-if="val_errors">x {{ val_errors }}</span> -->
                  </div>
                </div>

                <div class="col-md-12 text-center">
                  <div id="recaptcha-main" class="g-recaptcha" :data-sitekey="global.gcp_site_key"></div>
                  <hr />
                  <button type="submit" class="btn custom-success">Login</button>
                  <br />
                  <br />
                  <p>
                    <router-link to="/register">New User ? Register here</router-link>
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
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script>
import swal from "sweetalert";
import { global } from "../global.js";
import Nprogress from "nprogress";
import "nprogress/nprogress.css";

export default {
  data() {
    return {
      email: "",
      password: "",
      errors: {},
      spanError: {},
      global: global,
    };
  },
  created() {
    this.$nextTick(function () {
      grecaptcha.render("recaptcha-main");
    });
  },
  methods: {
    onLogin() {
      this.errors = {};

      if (!this.email.length) {
        this.errors.email = "x This field is required.";
        this.spanError.email = true;
      } else {
        this.errors.email = null;
        delete this.errors["email"];

        this.spanError.email = false;
      }

      if (!this.password.length) {
        this.errors.password = "x This field is required.";
        this.spanError.password = true;
      } else {
        this.errors.password = null;
        delete this.errors["password"];
        this.spanError.password = false;
      }
      if (grecaptcha.getResponse() == "") {
        swal("Error!", "You are not a human", "error");
      } else {
        if (Object.keys(this.errors).length == 0) {
          Nprogress.start();
          const data = {
            email: this.email,
            password: this.password,
            grecaptcha: grecaptcha.getResponse(),
          };

          this.$store
            .dispatch("login", data)
            .then((result) => {
              swal("Done!", "Login Successful", "success");
              this.$router.push("/recruitment_form");
            })
            .catch((error) => {
              // console.log("error");
            });
        }
      }
    },
  },
  computed: {
    val_errors() {
      return this.$store.state.login_errors;
    },
  },
  mounted() {
    // grecaptcha.reset();
    // grecaptcha.ready(function () {
    //   grecaptcha.render("recaptcha-container", {
    //     sitekey: "6Lcqj8UZAAAAAKTrGTjXoYyAAutAQa1Xi9mWmkN8",
    //   });
    // });
    // console.log(global.gcp_site_key);
  },
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
}
</style
>>
