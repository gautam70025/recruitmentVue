<template>
  <div class="homepage-area container-fluid">
    <div class="row">
      <div class="col-md-8 banner">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <h2>Welcome to The P&RD Online Application Portal</h2>
            <router-link class="banner-button" to="/career">Apply Now</router-link>
          </div>
        </div>
      </div>
      <div class="col-md-4 sidebar-padding">
        <notifications></notifications>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {};
  },
};
</script>
