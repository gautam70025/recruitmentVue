<template id="">
    <div class="container-fluid">
        <form class="detail_form">
            <div class="card step-1">
                <div class="card-header">
                    Document Upload
                    <span class="note"
                        >(*) All fileds are mandatory. Upload certificates as
                        per requirement</span
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
                        <div class="col-md-3 offset-md-3">
                            <div class="form-group">
                                <label for="document_name"
                                    >Name of Document<span class="star"
                                        >*</span
                                    ></label
                                >
                                <select
                                    class="form-control"
                                    name=""
                                    v-model="field.document_name"
                                >
                                    <option value="" selected disabled
                                        >Select Document</option
                                    >
                                    <option
                                        :value="value.value"
                                        v-for="value in document_list"
                                        :key="value.id"
                                        >{{ value.name }}</option
                                    >
                                </select>
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
                                    required
                                />
                                <span
                                    v-if="
                                        val_errors &&
                                            val_errors['document_file.' + index]
                                    "
                                    >x
                                    {{
                                        val_errors["document_file." + index][0]
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
                        @click.once="onPrev"
                        :disabled="disabled"
                    >
                        Prev
                    </button>
                    <button
                        type="submit"
                        class="btn custom-primary"
                        @click.once="onNext"
                        :disabled="disabled"
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
            fields: [{ document_name: "", document_file: null }],
            errors: {},
            spanError: {},
            required_qualifications: null,
            document_data: null,
            disabled: false,
            timeout: null,
            document_list: []
        };
    },
    methods: {
        removeField() {
            if (this.fields.length != 1) {
                this.fields.pop({ document_name: "", document_file: null });
            }
        },
        addField() {
            this.fields.push({ document_name: "", document_file: null });
        },
        getFile(event, index) {
            this.fields[index].document_file = event.target.files[0];
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
            // console.log(this.fields[0].document_name);
            Nprogress.start();
            const formData = new FormData();
            formData.append("user_id", this.$store.state.user.id);
            formData.append(
                "job_post_id",
                this.required_qualifications[0].job_post_id
            );
            for (var i = 0; i < this.fields.length; i++) {
                formData.append(
                    "document_name[]",
                    this.fields[i].document_name
                );
                formData.append(
                    "document_file[]",
                    this.fields[i].document_file
                );
            }
            // formData.append('designation',this.duration)
            // formData.append('from_date',this.institute)
            // formData.append('from_date',this.institute)
            // formData.append('document_name',this.document_name)

            this.$store
                .dispatch("documentSave", formData)
                .then(result => {
                    this.$store.state.document_save_errors = null;
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
            return this.$store.state.document_save_errors;
        }
    },
    created() {
        axios
            .get(global.apiUrl + "list_of_documents")
            .then(res => {
                this.document_list = res.data.document_list;
            })
            .catch(errors => {
                console.log(errors);
            });
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
                            "get_document_data?user_id=" +
                            this.$store.state.user.id +
                            "&job_post_id=" +
                            this.required_qualifications[0].job_post_id
                    )
                    .then(res => {
                        this.document_data = res.data.document_data;
                        // console.log("exp", this.document_data);
                        for (
                            let index = 0;
                            index < this.document_data.length;
                            index++
                        ) {
                            if (index > 0) {
                                this.addField();
                            }
                            this.fields[
                                index
                            ].document_name = this.document_data[
                                index
                            ].document_name;
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
