<template id="">
  <div class="container-fluid">
    <form class="detail_form">
      <div class="card step-1">
        <div class="card-header">
          Computer Knowledge
          <span class="note"
            >(*) In case of candidates having degree in Computer
            Science/Information Technology, can upload certificate of your
            respective degree.</span
          >
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="name_of_diploma"
                  >Name of Diploma/Degree<span class="star">*</span></label
                >
                <input
                  type="text"
                  class="form-control"
                  id=""
                  placeholder=""
                  v-model="diploma"
                  :class="{
                    border:
                      spanError.diploma == true ||
                      (val_errors && val_errors.diploma != null),
                  }"
                />
                <span>{{ errors.diploma }}</span>
                <span v-if="val_errors && val_errors.diploma"
                  >x {{ val_errors.diploma[0] }}</span
                >
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="institute"
                  >Institute<span class="star">*</span></label
                >
                <input
                  type="text"
                  class="form-control"
                  id=""
                  placeholder=""
                  v-model="institute"
                  :class="{
                    border:
                      spanError.institute == true ||
                      (val_errors && val_errors.institute != null),
                  }"
                />
                <span>{{ errors.institute }}</span>
                <span v-if="val_errors && val_errors.institute"
                  >x {{ val_errors.institute[0] }}</span
                >
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="duration"
                  >Duration(Months)<span class="star">*</span></label
                >
                <input
                  type="number"
                  class="form-control"
                  id=""
                  placeholder=""
                  v-model="duration"
                  :class="{
                    border:
                      spanError.duration == true ||
                      (val_errors && val_errors.duration != null),
                  }"
                />
                <span>{{ errors.duration }}</span>
                <span v-if="val_errors && val_errors.duration"
                  >x {{ val_errors.duration[0] }}</span
                >
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="duration"
                  >File<span class="star">*MAX: 100KB(jpg only)</span></label
                >

                <input
                  type="file"
                  name=""
                  class="form-control"
                  value=""
                  @change="getFile($event)"
                />
                <span>{{ errors.document_name }}</span>
                <span v-if="val_errors && val_errors.document_name"
                  >x {{ val_errors.document_name[0] }}</span
                >
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-center">
          <button
            type="button"
            class="btn custom-prev"
            @click.prevent="onPrev"
            :disabled="disabled"
          >
            Prev
          </button>
          <button
            :disabled="disabled"
            type="submit"
            class="btn custom-primary"
            @click.prevent="onNext"
          >
            Next
          </button>
          <button
            v-if="
              this.required_qualifications[0].job_post.computer_skill == 'No'
            "
            type="button"
            class="btn custom-primary"
            style="background: cornflowerblue !important"
            :disabled="disabled"
            @click.prevent="onSkip"
          >
            Skip
          </button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { global } from "../global";

import Nprogress from "nprogress";
import "nprogress/nprogress.css";
export default {
  data() {
    return {
      diploma: "",
      institute: "",
      duration: "",
      document_name: null,
      errors: {},
      spanError: {},
      required_qualifications: null,
      computer_skills: null,
      disabled: false,
      timeout: null,
    };
  },
  methods: {
    getFile(event) {
      console.log(event);
      this.document_name = event.target.files[0];
    },
    onPrev() {
      this.disabled = true;

      this.timeout = setTimeout(() => {
        this.disabled = false;
      }, 5000);
      this.$store.dispatch("changeStep", {
        next: 0,
        user_id: this.$store.state.user.id,
      });
    },
    onSkip() {
      this.disabled = true;

      this.timeout = setTimeout(() => {
        this.disabled = false;
      }, 5000);
      this.$store.dispatch("changeStep", {
        next: 1,
        user_id: this.$store.state.user.id,
      });
    },
    onNext() {
      this.disabled = true;

      this.timeout = setTimeout(() => {
        this.disabled = false;
      }, 5000);
      this.errors = {};
      if (!this.diploma.length) {
        this.errors.diploma = "x This field is required.";
        this.spanError.diploma = true;
      } else {
        this.errors.diploma = null;
        delete this.errors["diploma"];
        this.spanError.diploma = false;
      }
      if (!this.institute.length) {
        this.errors.institute = "x This field is required.";
        this.spanError.institute = true;
      } else {
        this.errors.institute = null;
        delete this.errors["institute"];
        this.spanError.institute = false;
      }
      if (!this.duration.toString().length) {
        this.errors.duration = "x This field is required.";
        this.spanError.duration = true;
      } else {
        this.errors.duration = null;
        delete this.errors["duration"];
        this.spanError.duration = false;
      }
      if (!this.document_name) {
        this.errors.document_name = "x This field is required.";
        this.spanError.document_name = true;
      } else {
        this.errors.document_name = null;
        delete this.errors["document_name"];
        this.spanError.document_name = false;
      }
      if (Object.keys(this.errors).length == 0) {
        Nprogress.start();
        const formData = new FormData();
        formData.append("user_id", this.$store.state.user.id);
        formData.append(
          "job_post_id",
          this.required_qualifications[0].job_post_id
        );
        formData.append("name_of_diploma", this.diploma);
        formData.append("duration", this.duration);
        formData.append("institute", this.institute);
        formData.append("document_name", this.document_name);

        this.$store
          .dispatch("computerKnowledgeSave", formData)
          .then((result) => {
            this.$store.state.computer_knowledge_errors = null;
            this.$store.dispatch("changeStep", {
              next: 1,
              user_id: this.$store.state.user.id,
            });
            Nprogress.done();
          })
          .catch((error) => {
            console.log("error");
          });
      }
    },
  },
  computed: {
    val_errors() {
      return this.$store.state.computer_knowledge_errors;
    },
    // showSkip() {
    //   if (this.required_qualifications[0].job_post.computer_skill == "No") {
    //     return true;
    //   } else {
    //     return false;
    //   }
    // },
  },
  created() {
    axios
      .get(
        global.apiUrl +
          "get_required_qualifications?user_id=" +
          this.$store.state.user.id
      )
      .then((res) => {
        this.required_qualifications = res.data.required_qualifications;
        axios
          .get(
            global.apiUrl +
              "get_computer_knowledge?user_id=" +
              this.$store.state.user.id +
              "&job_post_id=" +
              this.required_qualifications[0].job_post_id
          )
          .then((res) => {
            this.computer_skills = res.data.computer_skills;
            // console.log("lang", this.language_proficiencies);
            this.diploma = this.computer_skills.name_of_diploma;
            this.institute = this.computer_skills.institute;
            this.duration = this.computer_skills.duration;
          })
          .catch((errors) => {
            console.log(errors);
          });
      })
      .catch((errors) => {
        console.log(errors);
      });
  },
  beforeDestroy() {
    clearTimeout(this.timeout);
  },
};
</script>

<style >
</style>
