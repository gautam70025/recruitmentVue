<template id="">
    <div class="container-fluid">
        <form class="detail_form">
            <div class="card step-1">
                <div class="card-header">
                    Work Experience
                    <span class="note"
                        >(*) For Accounts Assistant Position, submit details of
                        any diploma/training/professional experience in
                        Tally.</span
                    >
                    <span style="float: right; margin-left: 7px">
                        <button
                            type="button"
                            class="btn btn-warning"
                            @click="removeField"
                        >
                            Remove
                        </button></span
                    >
                    <span style="float: right">
                        <button
                            type="button"
                            class="btn btn-primary"
                            @click="addField"
                        >
                            Add New
                        </button></span
                    >
                </div>
                <div class="card-body">
                    <div
                        class="row"
                        v-for="(field, index) in fields"
                        :key="index"
                    >
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="organisation"
                                    >Name of Organisation<span class="star"
                                        >*</span
                                    ></label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="field.organisation"
                                />
                                <span
                                    v-if="
                                        val_errors &&
                                            val_errors['organisation.' + index]
                                    "
                                    >x
                                    {{
                                        val_errors["organisation." + index][0]
                                    }}</span
                                >
                            </div>
                        </div>
                        <!-- <div class="col-md-3">
                <div class="form-group">
                  <label for="organisation">Name of Organisation<span class="star">*</span></label>
                  <input type="text" class="form-control" id="" placeholder="" v-model="field.organisation" :class="{
                                                border:
                                                    spanError.field.organisation == true ||
                                                    (val_errors &&
                                                        val_errors.field.organisation != null)
                                            }" >
                  <span>{{ errors.field.organisation }}</span>
                  <span v-if="val_errors && val_errors.organisation">x {{ val_errors.organisation[0] }}</span>
                </div>
              </div> -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="designation"
                                    >Designation<span class="star"
                                        >*</span
                                    ></label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="field.designation"
                                />
                                <span
                                    v-if="
                                        val_errors &&
                                            val_errors['designation.' + index]
                                    "
                                    >x
                                    {{
                                        val_errors["designation." + index][0]
                                    }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="type_of_work"
                                    >Type of Work<span class="star"
                                        >*</span
                                    ></label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="field.type_of_work"
                                />
                                <span
                                    v-if="
                                        val_errors &&
                                            val_errors['type_of_work.' + index]
                                    "
                                    >x
                                    {{
                                        val_errors["type_of_work." + index][0]
                                    }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="from_date"
                                    >From Date<span class="star">*</span></label
                                >
                                <input
                                    type="date"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="field.from_date"
                                />
                                <span
                                    v-if="
                                        val_errors &&
                                            val_errors['from_date.' + index]
                                    "
                                    >x
                                    {{
                                        val_errors["from_date." + index][0]
                                    }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="to_date"
                                    >To Date<span class="star">*</span></label
                                >
                                <input
                                    type="date"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="field.to_date"
                                />
                                <span
                                    v-if="
                                        val_errors &&
                                            val_errors['to_date.' + index]
                                    "
                                    >x
                                    {{
                                        val_errors["to_date." + index][0]
                                    }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="duration"
                                    >File<span class="star"
                                        >*MAX: 100KB(jpg only)</span
                                    ></label
                                >

                                <input
                                    type="file"
                                    name=""
                                    class="form-control"
                                    value=""
                                    @change="getFile($event, index)"
                                />
                                <span
                                    v-if="
                                        val_errors &&
                                            val_errors['document_name.' + index]
                                    "
                                    >x
                                    {{
                                        val_errors["document_name." + index][0]
                                    }}</span
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
                            this.required_qualifications[0].job_post
                                .work_experience == 'No'
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
            fields: [
                {
                    organisation: "",
                    designation: "",
                    from_date: null,
                    to_date: null,
                    type_of_work: "",
                    document_name: null
                }
            ],
            errors: {},
            spanError: {},
            required_qualifications: null,
            work_experience: null,
            disabled: false,
            timeout: null
        };
    },
    methods: {
        removeField() {
            if (this.fields.length != 1) {
                this.fields.pop({
                    organisation: "",
                    designation: "",
                    from_date: null,
                    to_date: null,
                    type_of_work: "",
                    document_name: null
                });
            }
        },
        addField() {
            this.fields.push({
                organisation: "",
                designation: "",
                from_date: null,
                to_date: null,
                type_of_work: "",
                document_name: null
            });
        },
        getFile(event, index) {
            this.fields[index].document_name = event.target.files[0];
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
        onSkip() {
            this.disabled = true;

            this.timeout = setTimeout(() => {
                this.disabled = false;
            }, 5000);
            this.$store.dispatch("changeStep", {
                next: 1,
                user_id: this.$store.state.user.id
            });
        },
        onNext() {
            this.disabled = true;

            this.timeout = setTimeout(() => {
                this.disabled = false;
            }, 5000);
            // console.log(this.fields[0].document_name);
            Nprogress.start();
            const formData = new FormData();
            formData.append("user_id", this.$store.state.user.id);
            formData.append(
                "job_post_id",
                this.required_qualifications[0].job_post_id
            );
            for (var i = 0; i < this.fields.length; i++) {
                formData.append("designation[]", this.fields[i].designation);
                formData.append("organisation[]", this.fields[i].organisation);
                formData.append("from_date[]", this.fields[i].from_date);
                formData.append("to_date[]", this.fields[i].to_date);
                formData.append("type_of_work[]", this.fields[i].type_of_work);
                formData.append(
                    "document_name[]",
                    this.fields[i].document_name
                );
            }
            // formData.append('designation',this.duration)
            // formData.append('from_date',this.institute)
            // formData.append('from_date',this.institute)
            // formData.append('document_name',this.document_name)

            this.$store
                .dispatch("workExperienceSave", formData)
                .then(result => {
                    this.$store.state.work_experience_errors = null;
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
    },
    computed: {
        val_errors() {
            return this.$store.state.work_experience_errors;
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
                axios
                    .get(
                        global.apiUrl +
                            "get_work_experience?user_id=" +
                            this.$store.state.user.id +
                            "&job_post_id=" +
                            this.required_qualifications[0].job_post_id
                    )
                    .then(res => {
                        this.work_experience = res.data.work_experience;
                        // console.log("exp", this.work_experience);
                        for (
                            let index = 0;
                            index < this.work_experience.length;
                            index++
                        ) {
                            if (index > 0) {
                                this.addField();
                            }
                            this.fields[
                                index
                            ].organisation = this.work_experience[
                                index
                            ].organisation;
                            this.fields[
                                index
                            ].designation = this.work_experience[
                                index
                            ].designation;
                            this.fields[index].from_date = this.work_experience[
                                index
                            ].from_date;
                            this.fields[index].to_date = this.work_experience[
                                index
                            ].to_date;
                            this.fields[
                                index
                            ].type_of_work = this.work_experience[
                                index
                            ].type_of_work;
                        }
                    })
                    .catch(errors => {
                        console.log(errors);
                    });
            })
            .catch(errors => {
                console.log(errors);
            });
    },
    beforeDestroy() {
        clearTimeout(this.timeout);
    }
};
</script>

<style></style>
