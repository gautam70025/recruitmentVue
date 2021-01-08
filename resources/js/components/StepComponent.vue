<template id="">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12 text-center">
        <div class="card-optional px-0 pt-4 pb-0 mt-3 mb-3">
          <h4 id="heading">ONLINE APPLICATION FORM</h4>
          <br />
          <ul id="progressbar">
            <li
              id="personal_info"
              :class="{
                active:
                  step == 1 ||
                  step == 2 ||
                  step == 3 ||
                  step == 4 ||
                  step == 5 ||
                  step == 6 ||
                  step == 7,
              }"
            >
              <strong>Personal Information</strong>
            </li>
            <li
              id="education"
              :class="{
                active:
                  step == 2 ||
                  step == 3 ||
                  step == 4 ||
                  step == 5 ||
                  step == 6 ||
                  step == 7,
              }"
            >
              <strong>Educational Qualification</strong>
            </li>
            <li
              id="language"
              :class="{
                active:
                  step == 3 || step == 4 || step == 5 || step == 6 || step == 7,
              }"
            >
              <strong>Language Proficiency</strong>
            </li>
            <li
              id="computer_knowledge"
              :class="{
                active: step == 4 || step == 5 || step == 6 || step == 7,
              }"
            >
              <strong>Computer Knowledge</strong>
            </li>
            <li
              id="work_experience"
              :class="{ active: step == 5 || step == 6 || step == 7 }"
            >
              <strong>Work Experience</strong>
            </li>
            <li id="document" :class="{ active: step == 6 || step == 7 }">
              <strong>Document Upload</strong>
            </li>
            <!-- <li id="post_preference" :class="{active:step==6}"><strong>Preference of Posts</strong></li> -->
            <li id="confirm" :class="{ active: step == 7 }">
              <strong>Finish</strong>
            </li>
          </ul>
          <div class="progress">
            <div
              class="progress-bar progress-bar-striped progress-bar-animated"
              role="progressbar"
              aria-valuemin="0"
              aria-valuemax="100"
              :style="{ width: barWidth + '%' }"
            ></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["step", "barWidth"],
  data() {
    return {};
  },
};
</script>
<style >
h4#heading {
  text-transform: uppercase;
  color: #1e4d92;
}
.card-optional {
  z-index: 0;
  border: none;
  position: relative;
}

#progressbar {
  margin-bottom: 30px;
  overflow: hidden;
  color: lightgrey;
  margin-left: -35px;
}

#progressbar .active {
  color: #673ab7;
}

#progressbar li {
  list-style-type: none;
  font-size: 15px;
  width: 14.28%;
  /* width: 16.6%; */
  float: left;
  position: relative;
  font-weight: 400;
}

#progressbar #personal_info:before {
  font-family: FontAwesome;
  content: "\f007";
}

#progressbar #document:before {
  font-family: FontAwesome;
  content: "\f1c5";
}

#progressbar #education:before {
  font-family: FontAwesome;
  content: "\f19d";
}
#progressbar #language:before {
  font-family: FontAwesome;
  content: "\f1ab";
}

#progressbar #computer_knowledge:before {
  font-family: FontAwesome;
  content: "\f109";
}

#progressbar #work_experience:before {
  font-family: FontAwesome;
  content: "\f0b1";
}

#progressbar #post_preference:before {
  font-family: FontAwesome;
  content: "\f030";
}

#progressbar #confirm:before {
  font-family: FontAwesome;
  content: "\f058";
}

#progressbar li:before {
  width: 50px;
  height: 50px;
  line-height: 45px;
  display: block;
  font-size: 20px;
  color: #ffffff;
  background: lightgray;
  border-radius: 50%;
  margin: 0 auto 10px auto;
  padding: 2px;
}

#progressbar li:after {
  content: "";
  width: 100%;
  height: 2px;
  background: lightgray;
  position: absolute;
  left: 0;
  top: 25px;
  z-index: -1;
}

#progressbar li.active:before,
#progressbar li.active:after {
  background: #673ab7;
}

.progress {
  height: 10px;
}

.progress-bar {
  background-color: #673ab7;
}

.fit-image {
  width: 100%;
  object-fit: cover;
}
</style>
