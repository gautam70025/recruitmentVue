<template>
  <div class="body">
    <header-bar></header-bar>
    <nav-bar :app="this"></nav-bar>

    <router-view :app="this"></router-view>
    <footer-bar></footer-bar>
  </div>
</template>
<script>
import { global } from "../global.js";

export default {
  data() {
    return {
      user: null,
    };
  },
  methods: {
    init() {
      axios.get(global.apiUrl + "init").then((result) => {
        this.user = result.data.user;
        // console.log(this.user);
      });
    },
    isApplied() {
      if (this.$store.state.user.length != 0) {
        this.$store.dispatch("checkIfApplied");
      }
      // .then((result) => {
      //         this.$store.state.personal_information_errors=null;
      //       })
      //       .catch((error) => {
      //         console.log("error");
      //       });
    },
  },

  mounted() {
    this.init();
    this.isApplied();
  },
  created() {
    this.$http.interceptors.response.use(undefined, function (err) {
      return new Promise(function (resolve, reject) {
        if (err.status === 401 && err.config && !err.config.__isRetryRequest) {
          this.$store.dispatch(logout);
        }
        throw err;
      });
    });
  },
};
</script>
