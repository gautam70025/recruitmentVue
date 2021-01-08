<template id="">
    <div class="container-fluid">
        <form class="detail_form">
            <div class="card step-1">
                <div class="card-header">
                    Language Proficiency
                    <span class="note">(*) Fields are mandatory</span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="lang_name"
                                    >Language<span class="star">*</span></label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="lang_name[0]"
                                    disabled
                                />
                                <span v-if="val_errors && val_errors.lang_name"
                                    >x {{ val_errors.lang_name[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="read"
                                    >Read<span class="star">*</span></label
                                >
                                <select
                                    class="form-control"
                                    v-model="eng_read"
                                    :class="{
                                        border:
                                            spanError.eng_read == true ||
                                            (val_errors &&
                                                val_errors.eng_read != null)
                                    }"
                                >
                                    <option value disabled selected
                                        >Select Yes/No</option
                                    >
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <span>{{ errors.eng_read }}</span>
                                <span v-if="val_errors && val_errors.eng_read"
                                    >x {{ val_errors.eng_read[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="write"
                                    >Write<span class="star">*</span></label
                                >
                                <select
                                    class="form-control"
                                    v-model="eng_write"
                                    :class="{
                                        border:
                                            spanError.eng_write == true ||
                                            (val_errors &&
                                                val_errors.eng_write != null)
                                    }"
                                >
                                    <option value disabled selected
                                        >Select Yes/No</option
                                    >
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <span>{{ errors.eng_write }}</span>
                                <span v-if="val_errors && val_errors.eng_write"
                                    >x {{ val_errors.eng_write[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="speak"
                                    >Speak<span class="star">*</span></label
                                >
                                <select
                                    class="form-control"
                                    v-model="eng_speak"
                                    :class="{
                                        border:
                                            spanError.eng_speak == true ||
                                            (val_errors &&
                                                val_errors.eng_speak != null)
                                    }"
                                >
                                    <option value disabled selected
                                        >Select Yes/No</option
                                    >
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <span>{{ errors.eng_speak }}</span>
                                <span v-if="val_errors && val_errors.eng_speak"
                                    >x {{ val_errors.eng_speak[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="lang_name"
                                    >Language<span class="star">*</span></label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="lang_name[1]"
                                    disabled
                                />
                                <span v-if="val_errors && val_errors.lang_name"
                                    >x {{ val_errors.lang_name[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="read"
                                    >Read<span class="star">*</span></label
                                >
                                <select
                                    class="form-control"
                                    v-model="ass_read"
                                    :class="{
                                        border:
                                            spanError.ass_read == true ||
                                            (val_errors &&
                                                val_errors.ass_read != null)
                                    }"
                                >
                                    <option value disabled selected
                                        >Select Yes/No</option
                                    >
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <span>{{ errors.ass_read }}</span>
                                <span v-if="val_errors && val_errors.ass_read"
                                    >x {{ val_errors.ass_read[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="write"
                                    >Write<span class="star">*</span></label
                                >
                                <select
                                    class="form-control"
                                    v-model="ass_write"
                                    :class="{
                                        border:
                                            spanError.ass_write == true ||
                                            (val_errors &&
                                                val_errors.ass_write != null)
                                    }"
                                >
                                    <option value disabled selected
                                        >Select Yes/No</option
                                    >
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <span>{{ errors.ass_write }}</span>
                                <span v-if="val_errors && val_errors.ass_write"
                                    >x {{ val_errors.ass_write[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="speak"
                                    >Speak<span class="star">*</span></label
                                >
                                <select
                                    class="form-control"
                                    v-model="ass_speak"
                                    :class="{
                                        border:
                                            spanError.ass_speak == true ||
                                            (val_errors &&
                                                val_errors.ass_speak != null)
                                    }"
                                >
                                    <option value disabled selected
                                        >Select Yes/No</option
                                    >
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <span>{{ errors.ass_speak }}</span>
                                <span v-if="val_errors && val_errors.ass_speak"
                                    >x {{ val_errors.ass_speak[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="lang_name"
                                    >Language<span class="star">*</span></label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="lang_name[2]"
                                    disabled
                                />
                                <span v-if="val_errors && val_errors.lang_name"
                                    >x {{ val_errors.lang_name[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="read"
                                    >Read<span class="star">*</span></label
                                >
                                <select
                                    class="form-control"
                                    v-model="ben_read"
                                    :class="{
                                        border:
                                            spanError.ben_read == true ||
                                            (val_errors &&
                                                val_errors.ben_read != null)
                                    }"
                                >
                                    <option value disabled selected
                                        >Select Yes/No</option
                                    >
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <span>{{ errors.ben_read }}</span>
                                <span v-if="val_errors && val_errors.ben_read"
                                    >x {{ val_errors.ben_read[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="write"
                                    >Write<span class="star">*</span></label
                                >
                                <select
                                    class="form-control"
                                    v-model="ben_write"
                                    :class="{
                                        border:
                                            spanError.ben_write == true ||
                                            (val_errors &&
                                                val_errors.ben_write != null)
                                    }"
                                >
                                    <option value disabled selected
                                        >Select Yes/No</option
                                    >
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <span>{{ errors.ben_write }}</span>
                                <span v-if="val_errors && val_errors.ben_write"
                                    >x {{ val_errors.ben_write[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="speak"
                                    >Speak<span class="star">*</span></label
                                >
                                <select
                                    class="form-control"
                                    v-model="ben_speak"
                                    :class="{
                                        border:
                                            spanError.ben_speak == true ||
                                            (val_errors &&
                                                val_errors.ben_speak != null)
                                    }"
                                >
                                    <option value disabled selected
                                        >Select Yes/No</option
                                    >
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <span>{{ errors.ben_speak }}</span>
                                <span v-if="val_errors && val_errors.ben_speak"
                                    >x {{ val_errors.ben_speak[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="lang_name"
                                    >Language<span class="star">*</span></label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="lang_name[3]"
                                    disabled
                                />
                                <span v-if="val_errors && val_errors.lang_name"
                                    >x {{ val_errors.lang_name[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="read"
                                    >Read<span class="star">*</span></label
                                >
                                <select
                                    class="form-control"
                                    v-model="bodo_read"
                                    :class="{
                                        border:
                                            spanError.bodo_read == true ||
                                            (val_errors &&
                                                val_errors.bodo_read != null)
                                    }"
                                >
                                    <option value disabled selected
                                        >Select Yes/No</option
                                    >
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <span>{{ errors.bodo_read }}</span>
                                <span v-if="val_errors && val_errors.bodo_read"
                                    >x {{ val_errors.bodo_read[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="write"
                                    >Write<span class="star">*</span></label
                                >
                                <select
                                    class="form-control"
                                    v-model="bodo_write"
                                    :class="{
                                        border:
                                            spanError.bodo_write == true ||
                                            (val_errors &&
                                                val_errors.bodo_write != null)
                                    }"
                                >
                                    <option value disabled selected
                                        >Select Yes/No</option
                                    >
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <span>{{ errors.bodo_write }}</span>
                                <span v-if="val_errors && val_errors.bodo_write"
                                    >x {{ val_errors.bodo_write[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="speak"
                                    >Speak<span class="star">*</span></label
                                >
                                <select
                                    class="form-control"
                                    v-model="bodo_speak"
                                    :class="{
                                        border:
                                            spanError.bodo_speak == true ||
                                            (val_errors &&
                                                val_errors.bodo_speak != null)
                                    }"
                                >
                                    <option value disabled selected
                                        >Select Yes/No</option
                                    >
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <span>{{ errors.bodo_speak }}</span>
                                <span v-if="val_errors && val_errors.bodo_speak"
                                    >x {{ val_errors.bodo_speak[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="lang_name"
                                    >Language<span class="star">*</span></label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="lang_name[4]"
                                    disabled
                                />
                                <span v-if="val_errors && val_errors.lang_name"
                                    >x {{ val_errors.lang_name[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="read"
                                    >Read<span class="star">*</span></label
                                >
                                <select
                                    class="form-control"
                                    v-model="hindi_read"
                                    :class="{
                                        border:
                                            spanError.hindi_read == true ||
                                            (val_errors &&
                                                val_errors.hindi_read != null)
                                    }"
                                >
                                    <option value disabled selected
                                        >Select Yes/No</option
                                    >
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <span>{{ errors.hindi_read }}</span>
                                <span v-if="val_errors && val_errors.hindi_read"
                                    >x {{ val_errors.hindi_read[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="write"
                                    >Write<span class="star">*</span></label
                                >
                                <select
                                    class="form-control"
                                    v-model="hindi_write"
                                    :class="{
                                        border:
                                            spanError.hindi_write == true ||
                                            (val_errors &&
                                                val_errors.hindi_write != null)
                                    }"
                                >
                                    <option value disabled selected
                                        >Select Yes/No</option
                                    >
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <span>{{ errors.hindi_write }}</span>
                                <span
                                    v-if="val_errors && val_errors.hindi_write"
                                    >x {{ val_errors.hindi_write[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="speak"
                                    >Speak<span class="star">*</span></label
                                >
                                <select
                                    class="form-control"
                                    v-model="hindi_speak"
                                    :class="{
                                        border:
                                            spanError.hindi_speak == true ||
                                            (val_errors &&
                                                val_errors.hindi_speak != null)
                                    }"
                                >
                                    <option value disabled selected
                                        >Select Yes/No</option
                                    >
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <span>{{ errors.hindi_speak }}</span>
                                <span
                                    v-if="val_errors && val_errors.hindi_speak"
                                    >x {{ val_errors.hindi_speak[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="lang_name"
                                    >Language<span class="star">*</span></label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder="Others"
                                    v-model="others_lang"
                                />
                                <span v-if="val_errors && val_errors.lang_name"
                                    >x {{ val_errors.lang_name[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="read"
                                    >Read<span class="star">*</span></label
                                >
                                <select
                                    class="form-control"
                                    v-model="others_read"
                                    :class="{
                                        border:
                                            spanError.others_read == true ||
                                            (val_errors &&
                                                val_errors.others_read != null)
                                    }"
                                >
                                    <option value disabled selected
                                        >Select Yes/No</option
                                    >
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <span>{{ errors.others_read }}</span>
                                <span
                                    v-if="val_errors && val_errors.others_read"
                                    >x {{ val_errors.others_read[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="write"
                                    >Write<span class="star">*</span></label
                                >
                                <select
                                    class="form-control"
                                    v-model="others_write"
                                    :class="{
                                        border:
                                            spanError.others_write == true ||
                                            (val_errors &&
                                                val_errors.others_write != null)
                                    }"
                                >
                                    <option value disabled selected
                                        >Select Yes/No</option
                                    >
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <span>{{ errors.others_write }}</span>
                                <span
                                    v-if="val_errors && val_errors.others_write"
                                    >x {{ val_errors.others_write[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="speak"
                                    >Speak<span class="star">*</span></label
                                >
                                <select
                                    class="form-control"
                                    v-model="others_speak"
                                    :class="{
                                        border:
                                            spanError.others_speak == true ||
                                            (val_errors &&
                                                val_errors.others_speak != null)
                                    }"
                                >
                                    <option value disabled selected
                                        >Select Yes/No</option
                                    >
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <span>{{ errors.others_speak }}</span>
                                <span
                                    v-if="val_errors && val_errors.others_speak"
                                    >x {{ val_errors.others_speak[0] }}</span
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
            lang_name: ["English", "Assamese", "Bengali", "Bodo", "Hindi"],
            eng_read: "",
            eng_write: "",
            eng_speak: "",
            ass_read: "",
            ass_write: "",
            ass_speak: "",
            ben_read: "",
            ben_write: "",
            ben_speak: "",
            bodo_read: "",
            bodo_write: "",
            bodo_speak: "",
            hindi_read: "",
            hindi_write: "",
            hindi_speak: "",
            others_lang: "",
            others_read: "",
            others_write: "",
            others_speak: "",
            required_qualifications: null,
            errors: {},
            spanError: {},
            language_proficiencies: null,
            disabled: false,
            timeout: null
        };
    },
    methods: {
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
            if (!this.eng_read.length) {
                this.errors.eng_read = "x This field is required.";
                this.spanError.eng_read = true;
            } else {
                this.errors.eng_read = null;
                delete this.errors["eng_read"];
                this.spanError.eng_read = false;
            }
            if (!this.eng_write.length) {
                this.errors.eng_write = "x This field is required.";
                this.spanError.eng_write = true;
            } else {
                this.errors.eng_write = null;
                delete this.errors["eng_write"];
                this.spanError.eng_write = false;
            }
            if (!this.eng_speak.length) {
                this.errors.eng_speak = "x This field is required.";
                this.spanError.eng_speak = true;
            } else {
                this.errors.eng_speak = null;
                delete this.errors["eng_speak"];
                this.spanError.eng_speak = false;
            }
            if (!this.ass_read.length) {
                this.errors.ass_read = "x This field is required.";
                this.spanError.ass_read = true;
            } else {
                this.errors.ass_read = null;
                delete this.errors["ass_read"];
                this.spanError.ass_read = false;
            }
            if (!this.ass_write.length) {
                this.errors.ass_write = "x This field is required.";
                this.spanError.ass_write = true;
            } else {
                this.errors.ass_write = null;
                delete this.errors["ass_write"];
                this.spanError.ass_write = false;
            }
            if (!this.ass_speak.length) {
                this.errors.ass_speak = "x This field is required.";
                this.spanError.ass_speak = true;
            } else {
                this.errors.ass_speak = null;
                delete this.errors["ass_speak"];
                this.spanError.ass_speak = false;
            }
            if (!this.ben_read.length) {
                this.errors.ben_read = "x This field is required.";
                this.spanError.ben_read = true;
            } else {
                this.errors.ben_read = null;
                delete this.errors["ben_read"];
                this.spanError.ben_read = false;
            }
            if (!this.ben_write.length) {
                this.errors.ben_write = "x This field is required.";
                this.spanError.ben_write = true;
            } else {
                this.errors.ben_write = null;
                delete this.errors["ben_write"];
                this.spanError.ben_write = false;
            }
            if (!this.ben_speak.length) {
                this.errors.ben_speak = "x This field is required.";
                this.spanError.ben_speak = true;
            } else {
                this.errors.ben_speak = null;
                delete this.errors["ben_speak"];
                this.spanError.ben_speak = false;
            }
            if (!this.bodo_read.length) {
                this.errors.bodo_read = "x This field is required.";
                this.spanError.bodo_read = true;
            } else {
                this.errors.bodo_read = null;
                delete this.errors["bodo_read"];
                this.spanError.bodo_read = false;
            }
            if (!this.bodo_write.length) {
                this.errors.bodo_write = "x This field is required.";
                this.spanError.bodo_write = true;
            } else {
                this.errors.bodo_write = null;
                delete this.errors["bodo_write"];
                this.spanError.bodo_write = false;
            }
            if (!this.bodo_speak.length) {
                this.errors.bodo_speak = "x This field is required.";
                this.spanError.bodo_speak = true;
            } else {
                this.errors.bodo_speak = null;
                delete this.errors["bodo_speak"];
                this.spanError.bodo_speak = false;
            }
            if (!this.hindi_read.length) {
                this.errors.hindi_read = "x This field is required.";
                this.spanError.hindi_read = true;
            } else {
                this.errors.hindi_read = null;
                delete this.errors["hindi_read"];
                this.spanError.hindi_read = false;
            }
            if (!this.hindi_write.length) {
                this.errors.hindi_write = "x This field is required.";
                this.spanError.hindi_write = true;
            } else {
                this.errors.hindi_write = null;
                delete this.errors["hindi_write"];
                this.spanError.hindi_write = false;
            }
            if (!this.hindi_speak.length) {
                this.errors.hindi_speak = "x This field is required.";
                this.spanError.hindi_speak = true;
            } else {
                this.errors.hindi_speak = null;
                delete this.errors["hindi_speak"];
                this.spanError.hindi_speak = false;
            }
            if (Object.keys(this.errors).length == 0) {
                Nprogress.start();
                const formData = {
                    eng_lang: this.lang_name[0],
                    ass_lang: this.lang_name[1],
                    ben_lang: this.lang_name[2],
                    bodo_lang: this.lang_name[3],
                    hindi_lang: this.lang_name[4],
                    others_lang: this.others_lang,
                    eng_read: this.eng_read,
                    eng_write: this.eng_write,
                    eng_speak: this.eng_speak,
                    ass_read: this.ass_read,
                    ass_write: this.ass_write,
                    ass_speak: this.ass_speak,
                    ben_read: this.ben_read,
                    ben_speak: this.ben_speak,
                    ben_write: this.ben_write,
                    bodo_write: this.bodo_write,
                    bodo_read: this.bodo_read,
                    bodo_speak: this.bodo_speak,
                    hindi_write: this.hindi_write,
                    hindi_read: this.hindi_read,
                    hindi_speak: this.hindi_speak,
                    others_write: this.others_write,
                    others_read: this.others_read,
                    others_speak: this.others_speak,
                    user_id: this.$store.state.user.id,
                    job_post_id: this.required_qualifications[0].job_post_id
                };
                this.$store
                    .dispatch("languageProficiencySave", formData)
                    .then(result => {
                        this.$store.state.language_proficiency_errors = null;
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
            return this.$store.state.language_proficiency_errors;
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
                            "get_language_proficiencies?user_id=" +
                            this.$store.state.user.id +
                            "&job_post_id=" +
                            this.required_qualifications[0].job_post_id
                    )
                    .then(res => {
                        this.language_proficiencies =
                            res.data.language_proficiencies;
                        // console.log("lang", this.language_proficiencies);
                        this.eng_read = this.language_proficiencies[0].eng_read;
                        this.eng_write = this.language_proficiencies[0].eng_write;
                        this.eng_speak = this.language_proficiencies[0].eng_speak;
                        this.ass_speak = this.language_proficiencies[0].ass_speak;
                        this.ass_read = this.language_proficiencies[0].ass_read;
                        this.ass_write = this.language_proficiencies[0].ass_write;
                        this.ben_read = this.language_proficiencies[0].ben_read;
                        this.ben_write = this.language_proficiencies[0].ben_write;
                        this.ben_speak = this.language_proficiencies[0].ben_speak;
                        this.bodo_read = this.language_proficiencies[0].bodo_read;
                        this.bodo_write = this.language_proficiencies[0].bodo_write;
                        this.bodo_speak = this.language_proficiencies[0].bodo_speak;
                        this.hindi_read = this.language_proficiencies[0].hindi_read;
                        this.hindi_write = this.language_proficiencies[0].hindi_write;
                        this.hindi_speak = this.language_proficiencies[0].hindi_speak;
                        this.others_lang = this.language_proficiencies[0].others_lang;
                        this.others_read = this.language_proficiencies[0].others_read;
                        this.others_write = this.language_proficiencies[0].others_write;
                        this.others_speak = this.language_proficiencies[0].others_speak;
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
