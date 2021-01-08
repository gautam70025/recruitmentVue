<template id="">
    <div class="container-fluid">
        <form class="detail_form">
            <div class="card step-1">
                <div class="card-header">
                    Educational Qualification
                    <span class="note"
                        >Type N/A for not applicable columns</span
                    >
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="Exam/Degree">Particulars</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="degree[0].first"
                                    :class="{
                                        border:
                                            spanError.degree_first == true ||
                                            (val_errors &&
                                                val_errors.degree_first != null)
                                    }"
                                    disabled
                                />
                                <span>{{ errors.degree_first }}</span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="university_board"
                                    >Board/Council/University</label
                                >
                                <select
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="university[0].first"
                                    :class="{
                                        border:
                                            spanError.university_first ==
                                                true ||
                                            (val_errors &&
                                                val_errors.university_first !=
                                                    null)
                                    }"
                                >
                                    <option value="" selected disabled
                                        >Select</option
                                    >
                                    <option value="SEBA">SEBA</option>
                                    <option value="CBSE">CBSE</option>
                                    <option value="ICSE">ICSE</option>
                                </select>
                                <span>{{ errors.university_first }}</span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="college">College/Institution</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="college[0].first"
                                    :class="{
                                        border:
                                            spanError.college_first == true ||
                                            (val_errors &&
                                                val_errors.college_first !=
                                                    null)
                                    }"
                                />
                                <span>{{ errors.college_first }}</span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="college">Duration(Years)</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="duration[0].first"
                                    disabled
                                />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="year_of_passing"
                                    >Year of Passing</label
                                >
                                <input
                                    type="number"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="year_of_passing[0].first"
                                    :class="{
                                        border:
                                            spanError.year_of_passing_first ==
                                                true ||
                                            (val_errors &&
                                                val_errors.year_of_passing_first !=
                                                    null)
                                    }"
                                />
                                <span>{{ errors.year_of_passing_first }}</span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="percentage">Percentage</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="percentage[0].first"
                                    :class="{
                                        border:
                                            spanError.percentage_first ==
                                                true ||
                                            (val_errors &&
                                                val_errors.percentage_first !=
                                                    null)
                                    }"
                                />
                                <span>{{ errors.percentage_first }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="degree[0].second"
                                    :class="{
                                        border:
                                            spanError.degree_second == true ||
                                            (val_errors &&
                                                val_errors.degree_second !=
                                                    null)
                                    }"
                                    disabled
                                />

                                <span>{{ errors.degree_second }}</span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="university[0].second"
                                    :class="{
                                        border:
                                            spanError.university_second ==
                                                true ||
                                            (val_errors &&
                                                val_errors.university_second !=
                                                    null)
                                    }"
                                >
                                    <option value="" selected disabled
                                        >Select</option
                                    >
                                    <option value="AHSEC">AHSEC</option>
                                    <option value="CBSE">CBSE</option>
                                    <option value="ICSE">ICSE</option>
                                    <!-- <option value="Polytechnic"
                                        >Polytechnic</option
                                    > -->
                                </select>
                                <span>{{ errors.university_second }}</span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="college[0].second"
                                    :class="{
                                        border:
                                            spanError.college_second == true ||
                                            (val_errors &&
                                                val_errors.college_second !=
                                                    null)
                                    }"
                                />
                                <span>{{ errors.college_second }}</span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="duration[0].second"
                                    disabled
                                />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input
                                    type="number"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="year_of_passing[0].second"
                                    :class="{
                                        border:
                                            spanError.year_of_passing_second ==
                                                true ||
                                            (val_errors &&
                                                val_errors.year_of_passing_second !=
                                                    null)
                                    }"
                                />
                                <span>{{ errors.year_of_passing_second }}</span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input
                                    type="number"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="percentage[0].second"
                                    :class="{
                                        border:
                                            spanError.percentage_second ==
                                                true ||
                                            (val_errors &&
                                                val_errors.percentage_second !=
                                                    null)
                                    }"
                                />
                                <span>{{ errors.percentage_second }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- ...diploma row -->
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder="Enter your Diploma"
                                    list="both"
                                    v-model="degree[0].third"
                                    :class="{
                                        border:
                                            spanError.degree_third == true ||
                                            (val_errors &&
                                                val_errors.degree_third != null)
                                    }"
                                />
                                <datalist id="both">
                                    <option value disabled selected
                                        >Select or Type</option
                                    >
                                    <option
                                        v-for="value in this
                                            .diploma_qualifications"
                                        :value="value.qualification"
                                        :key="value.id"
                                        >{{ value.qualification }}</option
                                    >
                                </datalist>
                                <span>{{ errors.degree_third }}</span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <!-- <select
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="university[0].third"
                                >
                                    <option value="Polytechnic"
                                        >Polytechnic</option
                                    >
                                </select> -->
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Select or type"
                                    id="board"
                                    list="lboard"
                                    v-model="university[0].third"
                                />
                                <datalist id="lboard">
                                    <option value="SCTE(Assam)"
                                        >SCTE(Assam)</option
                                    >
                                    <option value="SCTE(Others)"
                                        >SCTE(Others)</option
                                    >
                                </datalist>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="college[0].third"
                                />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="duration[0].third"
                                    disabled
                                />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input
                                    type="number"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="year_of_passing[0].third"
                                />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input
                                    type="number"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="percentage[0].third"
                                />
                            </div>
                        </div>
                    </div>
                    <!-- ....degree -->
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <select
                                    class="form-control"
                                    id=""
                                    placeholder="Degree"
                                    v-model="degree[0].fourth"
                                    @change="getDiploma"
                                >
                                    <option :value="null" selected disabled
                                        >Degree</option
                                    >
                                    <option
                                        v-for="value in this
                                            .degree_qualifications"
                                        :value="value.id"
                                        :key="value.id"
                                        >{{ value.qualification }}</option
                                    >
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="university[0].fourth"
                                />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="college[0].fourth"
                                />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="duration[0].fourth"
                                    disabled
                                />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input
                                    type="number"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="year_of_passing[0].fourth"
                                />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input
                                    type="number"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="percentage[0].fourth"
                                />
                            </div>
                        </div>
                    </div>
                    <!-- ....pg... -->
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <select
                                    class="form-control"
                                    name=""
                                    v-model="degree[0].fifth"
                                    @change="getDiploma"
                                >
                                    <option :value="null" disabled selected>
                                        PG
                                    </option>
                                    <option
                                        :value="data.id"
                                        v-for="data in this.pg_qualifications"
                                        :key="data.id"
                                    >
                                        {{ data.qualification }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="university[0].fifth"
                                />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="college[0].fifth"
                                />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input
                                    type="number"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="duration[0].fifth"
                                />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input
                                    type="number"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="year_of_passing[0].fifth"
                                />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input
                                    type="number"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="percentage[0].fifth"
                                />
                            </div>
                        </div>
                    </div>
                    <!-- tech diploma -->
                    <div class="row" v-if="diploma_names.length">
                        <div class="col-md-2">
                            <div class="form-group">
                                <select
                                    class="form-control"
                                    name=""
                                    v-model="degree[0].sixth"
                                >
                                    <option value="" disabled selected
                                        >Select Diploma</option
                                    >
                                    <option
                                        :value="data.diploma_name"
                                        v-for="data in diploma_names"
                                        :key="data.diploma_name"
                                    >
                                        {{ data.diploma_name }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="university[0].sixth"
                                />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="college[0].sixth"
                                />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="duration[0].sixth"
                                    disabled
                                />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input
                                    type="number"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="year_of_passing[0].sixth"
                                />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input
                                    type="number"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="percentage[0].sixth"
                                />
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
            degree: [
                {
                    first: "HSLC",
                    second: "HS",
                    third: "",
                    fourth: null,
                    fifth: null,
                    sixth: ""
                }
            ],
            university: [
                {
                    first: "",
                    second: "",
                    third: "",
                    fourth: "",
                    fifth: "",
                    sixth: ""
                }
            ],
            college: [
                {
                    first: "",
                    second: "",
                    third: "",
                    fourth: "",
                    fifth: "",
                    sixth: ""
                }
            ],
            year_of_passing: [
                {
                    first: "",
                    second: "",
                    third: "",
                    fourth: "",
                    fifth: "",
                    sixth: ""
                }
            ],
            percentage: [
                {
                    first: "",
                    second: "",
                    third: "",
                    fourth: "",
                    fifth: "",
                    sixth: ""
                }
            ],
            duration: [
                {
                    first: "N/A",
                    second: "N/A",
                    third: "N/A",
                    fourth: "N/A",
                    fifth: "",
                    sixth: "N/A"
                }
            ],
            required_qualifications: null,
            diploma_qualifications: [],
            degree_qualifications: [],
            pg_qualifications: [],
            diploma_names: [],
            errors: {},
            spanError: {},
            educational_qualifications: null,
            disabled: false,
            timeout: null
        };
    },
    methods: {
        getDiploma() {
            if (this.degree[0].fourth && !this.diploma_names.length) {
                axios
                    .get(
                        global.apiUrl +
                            "get_diploma_names?required_qualification_id=" +
                            this.degree[0].fourth
                    )
                    .then(res => {
                        this.diploma_names = res.data.diploma_names;
                    })
                    .catch(errors => {
                        console.log(errors);
                    });
            }
            if (this.degree[0].fifth && !this.diploma_names.length) {
                axios
                    .get(
                        global.apiUrl +
                            "get_diploma_names?required_qualification_id=" +
                            this.degree[0].fifth
                    )
                    .then(res => {
                        this.diploma_names = res.data.diploma_names;
                    })
                    .catch(errors => {
                        console.log(errors);
                    });
            }
        },
        onPrev() {
            this.disabled = true;

            this.timeout = setTimeout(() => {
                this.disabled = false;
            }, 5000);
            this.$store.dispatch("changeStep", {
                next: 0,
                user_id: this.$store.state.user.id
            });
        },
        onNext() {
            this.disabled = true;

            this.timeout = setTimeout(() => {
                this.disabled = false;
            }, 5000);
            this.errors = {};
            if (!this.degree[0].first.length) {
                this.errors.degree_first = "x This field is required.";
                this.spanError.degree_first = true;
            } else {
                this.errors.degree_first = null;
                delete this.errors["degree_first"];
                this.spanError.degree_first = false;
            }
            if (!this.university[0].first.length) {
                this.errors.university_first = "x This field is required.";
                this.spanError.university_first = true;
            } else {
                this.errors.university_first = null;
                delete this.errors["university_first"];
                this.spanError.university_first = false;
            }
            if (!this.college[0].first.length) {
                this.errors.college_first = "x This field is required.";
                this.spanError.college_first = true;
            } else {
                this.errors.college_first = null;
                delete this.errors["college_first"];
                this.spanError.college_first = false;
            }
            if (!this.year_of_passing[0].first.toString().length) {
                this.errors.year_of_passing_first = "x This field is required.";
                this.spanError.year_of_passing_first = true;
            } else {
                this.errors.year_of_passing_first = null;
                delete this.errors["year_of_passing_first"];
                this.spanError.year_of_passing_first = false;
            }
            if (!this.percentage[0].first.toString().length) {
                this.errors.percentage_first = "x This field is required.";
                this.spanError.percentage_first = true;
            } else {
                this.errors.percentage_first = null;
                delete this.errors["percentage_first"];
                this.spanError.percentage_first = false;
            }
            // if (!this.degree[0].second.length) {
            //     this.errors.degree_second = "x This field is required.";
            //     this.spanError.degree_second = true;
            // } else {
            //     this.errors.degree_second = null;
            //     delete this.errors["degree_second"];
            //     this.spanError.degree_second = false;
            // }
            // if (!this.university[0].second.length) {
            //     this.errors.university_second = "x This field is required.";
            //     this.spanError.university_second = true;
            // } else {
            //     this.errors.university_second = null;
            //     delete this.errors["university_second"];
            //     this.spanError.university_second = false;
            // }
            // if (!this.college[0].second.length) {
            //     this.errors.college_second = "x This field is required.";
            //     this.spanError.college_second = true;
            // } else {
            //     this.errors.college_second = null;
            //     delete this.errors["college_second"];
            //     this.spanError.college_second = false;
            // }
            // if (!this.year_of_passing[0].second.toString().length) {
            //     this.errors.year_of_passing_second =
            //         "x This field is required.";
            //     this.spanError.year_of_passing_second = true;
            // } else {
            //     this.errors.year_of_passing_second = null;
            //     delete this.errors["year_of_passing_second"];
            //     this.spanError.year_of_passing_second = false;
            // }
            // if (!this.percentage[0].second.toString().length) {
            //     this.errors.percentage_second = "x This field is required.";
            //     this.spanError.percentage_second = true;
            // } else {
            //     this.errors.percentage_second = null;
            //     delete this.errors["percentage_second"];
            //     this.spanError.percentage_second = false;
            // }
            // if (!this.degree[0].third.toString().length) {
            //     this.errors.degree_third = "x This field is required.";
            //     this.spanError.degree_third = true;
            // } else {
            //     this.errors.degree_third = null;
            //     delete this.errors["degree_third"];
            //     this.spanError.degree_third = false;
            // }
            // if (!this.university[0].third.length) {
            //     this.errors.university_third = "x This field is required.";
            //     this.spanError.university_third = true;
            // } else {
            //     this.errors.university_third = null;
            //     delete this.errors["university_third"];
            //     this.spanError.university_third = false;
            // }
            // if (!this.college[0].third.length) {
            //     this.errors.college_third = "x This field is required.";
            //     this.spanError.college_third = true;
            // } else {
            //     this.errors.college_third = null;
            //     delete this.errors["college_third"];
            //     this.spanError.college_third = false;
            // }
            // if (!this.year_of_passing[0].third.toString().length) {
            //     this.errors.year_of_passing_third = "x This field is required.";
            //     this.spanError.year_of_passing_third = true;
            // } else {
            //     this.errors.year_of_passing_third = null;
            //     delete this.errors["year_of_passing_third"];
            //     this.spanError.year_of_passing_third = false;
            // }
            // if (!this.percentage[0].third.toString().length) {
            //     this.errors.percentage_third = "x This field is required.";
            //     this.spanError.percentage_third = true;
            // } else {
            //     this.errors.percentage_third = null;
            //     delete this.errors["percentage_third"];
            //     this.spanError.percentage_third = false;
            // }

            if (Object.keys(this.errors).length == 0) {
                Nprogress.start();
                const formData = {
                    user_id: this.$store.state.user.id,
                    job_post_id: this.required_qualifications[0].job_post_id,
                    degree: this.degree,
                    college: this.college,
                    university: this.university,
                    year_of_passing: this.year_of_passing,
                    percentage: this.percentage,
                    duration: this.duration
                };
                this.$store
                    .dispatch("educationalQualificationSave", formData)
                    .then(result => {
                        this.$store.state.educational_qualification_errors = null;
                        this.$store.dispatch("changeStep", {
                            next: 1,
                            user_id: this.$store.state.user.id
                        });
                        Nprogress.done();
                    })
                    .catch(error => {
                        console.log("error");
                    });
            }
        }
    },
    computed: {
        val_errors() {
            return this.$store.state.educational_qualifications_errors;
        }
    },
    created() {
        axios
            .get(
                global.apiUrl +
                    "get_required_qualifications?user_id=" +
                    this.$store.state.user.id
            )
            .then(res => {
                this.required_qualifications = res.data.required_qualifications;
                // console.log(this.required_qualifications);

                axios
                    .get(
                        global.apiUrl +
                            "get_educational_qualifications?user_id=" +
                            this.$store.state.user.id +
                            "&job_post_id=" +
                            this.required_qualifications[0].job_post_id
                    )
                    .then(res => {
                        this.educational_qualifications =
                            res.data.educational_qualifications;
                        console.log("edu", this.educational_qualifications);
                        for (
                            let index = 0;
                            index < this.educational_qualifications.length;
                            index++
                        ) {
                            if (index == 0) {
                                this.college[0].first = this.educational_qualifications[
                                    index
                                ].college;
                                this.degree[0].first = this.educational_qualifications[
                                    index
                                ].degree;
                                this.university[0].first = this.educational_qualifications[
                                    index
                                ].university;
                                this.year_of_passing[0].first = this.educational_qualifications[
                                    index
                                ].year_of_passing;
                                this.percentage[0].first = this.educational_qualifications[
                                    index
                                ].percentage;
                            }
                            if (index == 1) {
                                this.college[0].second = this.educational_qualifications[
                                    index
                                ].college;
                                this.degree[0].second = this.educational_qualifications[
                                    index
                                ].degree;
                                this.university[0].second = this.educational_qualifications[
                                    index
                                ].university;
                                this.year_of_passing[0].second = this.educational_qualifications[
                                    index
                                ].year_of_passing;
                                this.percentage[0].second = this.educational_qualifications[
                                    index
                                ].percentage;
                            }
                            if (index == 2) {
                                this.college[0].third = this.educational_qualifications[
                                    index
                                ].college;
                                this.degree[0].third = this.educational_qualifications[
                                    index
                                ].degree;
                                this.university[0].third = this.educational_qualifications[
                                    index
                                ].university;
                                this.year_of_passing[0].third = this.educational_qualifications[
                                    index
                                ].year_of_passing;
                                this.percentage[0].third = this.educational_qualifications[
                                    index
                                ].percentage;
                            }
                            // if (index == 3) {
                            //     let qualification = this.required_qualifications.filter(
                            //         item => {
                            //             return (
                            //                 item.qualification ==
                            //                 this.educational_qualifications[
                            //                     index
                            //                 ].degree
                            //             );
                            //         }
                            //     );
                            //     this.degree[0].fourth = qualification[0].id;
                            //     this.college[0].fourth = this.educational_qualifications[
                            //         index
                            //     ].college;
                            //     this.university[0].fourth = this.educational_qualifications[
                            //         index
                            //     ].university;
                            //     this.year_of_passing[0].fourth = this.educational_qualifications[
                            //         index
                            //     ].year_of_passing;
                            //     this.percentage[0].fourth = this.educational_qualifications[
                            //         index
                            //     ].percentage;
                            //     this.getDiploma();
                            // }
                            // if (index == 4) {
                            //     this.college[0].fourth = this.educational_qualifications[
                            //         index
                            //     ].college;
                            //     this.degree[0].fourth = this.educational_qualifications[
                            //         index
                            //     ].degree;
                            //     this.university[0].fourth = this.educational_qualifications[
                            //         index
                            //     ].university;
                            //     this.year_of_passing[0].fourth = this.educational_qualifications[
                            //         index
                            //     ].year_of_passing;
                            //     this.percentage[0].fourth = this.educational_qualifications[
                            //         index
                            //     ].percentage;
                            // }
                        }
                        this.diploma_qualifications = this.required_qualifications.filter(
                            value => {
                                return value.level == "diploma";
                            }
                        );
                        this.degree_qualifications = this.required_qualifications.filter(
                            value => {
                                return value.level == "degree";
                            }
                        );
                        this.pg_qualifications = this.required_qualifications.filter(
                            value => {
                                return value.level == "pg";
                            }
                        );
                        console.log("dip", this.pg_qualifications);
                        console.log("dip", this.degree_qualifications);
                    })
                    .catch(errors => {
                        console.log(errors);
                    });
            })
            .catch(errors => {
                console.log(errors);
            });
    },
    mounted() {
        // this.degree='HSLC'
        // console.log('a',this.degree);
    },
    beforeDestroy() {
        clearTimeout(this.timeout);
    }
};
</script>

<style></style>
