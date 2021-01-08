<template>
  <div>
    <div class="col-md-4">
      <div class="captcha-class">
        <p>
          {{captcha_code}}
          <span>
            <button type="button" class="btn btn-sm" @click="reloadCaptcha">
              <i class="fa fa-refresh"></i>
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
        <span>{{ errors.confirm_captcha }}</span>
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