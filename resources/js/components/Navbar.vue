<template>
    <div class="navbar-area">
        <nav class="navbar navbar-expand-lg bg-custom navbar-light sticky-top">
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#mainNavbar"
                aria-controls="mainNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div
                class="collapse navbar-collapse justify-content-between"
                id="mainNavbar"
            >
                <ul class="navbar-nav">
                    <!-- <li class="nav-item active">
            <a class="nav-link" href="#">
              Centered nav only
              <span class="sr-only">(current)</span>
            </a>
          </li>-->
                    <li class="nav-item active">
                        <router-link class="nav-link" to="/">Home</router-link>
                    </li>
                    <!-- <li class="nav-item" v-if="!isLoggedIn">
            <router-link class="nav-link" to="/"
              >Detailed Notification</router-link
            >
          </li>
          <li class="nav-item" v-if="!isLoggedIn">
            <router-link class="nav-link" to="/">Corrigendum</router-link>
          </li>
          <li class="nav-item" v-if="!isLoggedIn">
            <router-link class="nav-link" to="/">Notice</router-link>
          </li> -->
                    <!-- <li class="nav-item">
            <router-link class="nav-link" to="/">Instructions</router-link>
          </li> -->
                    <li class="nav-item">
                        <router-link class="nav-link" to="/career"
                            >Career</router-link
                        >
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/contact"
                            >Help Desk</router-link
                        >
                    </li>

                    <!-- <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="http://example.com"
              id="dropdown08"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown08">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>-->
                </ul>
                <ul class="navbar-nav">
                    <!-- <li class="nav-item" v-if="!isLoggedIn">
            <router-link class="nav-link" to="/login">Login</router-link>
          </li>
          <li class="nav-item" v-if="!isLoggedIn">
            <router-link class="nav-link" to="/register">Register</router-link>
          </li>-->
                    <li class="nav-item" v-if="isLoggedIn">
                        <!-- <router-link class="nav-link" to="/register">{{user.name}}, Logout</router-link> -->
                        <!-- <a class="nav-link">Acknowledgement</a> -->
                        <router-link
                            class="nav-link"
                            to="/acknowledgement"
                            style="color: #d8ff00 !important; font-weight: 600"
                            >Acknowledgement</router-link
                        >
                    </li>
                    <li class="nav-item" v-if="isLoggedIn">
                        <!-- <router-link class="nav-link" to="/register">{{user.name}}, Logout</router-link> -->
                        <a
                            class="nav-link"
                            @click="logout"
                            href="javascript:void(0)"
                            >Hello {{ user.name }},&nbsp;&nbsp;Logout</a
                        >
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    props: ["app"],
    data() {
        return {};
    },
    computed: {
        isLoggedIn() {
            return this.$store.getters.isLoggedIn;
        },
        user() {
            return this.$store.getters.user;
        }
    },
    methods: {
        logout: function() {
            swal({
                title: "Alert",
                text: "Are you sure?",
                // icon: "warning",
                buttons: true
            }).then(isConfirm => {
                if (isConfirm) {
                    this.$store.dispatch("logout").then(() => {
                        swal("Done!", "Your are logged out", "success");

                        this.$router.push("/login");
                    });
                }
            });
        }
    },
    mounted() {
        console.log(this.$store.state.users);
    }
};
</script>
