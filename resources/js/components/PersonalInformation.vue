<template id="">
    <div class="container-fluid">
        <form class="detail_form">
            <div class="card step-1">
                <div class="card-header">
                    Post Applied
                    <span class="note">(*) Fields are mandatory</span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <select
                                    class="form-control"
                                    name=""
                                    @change="changePosts"
                                    v-model="programme"
                                    :class="{
                                        border:
                                            spanError.programme == true ||
                                            (val_errors &&
                                                val_errors.programme != null)
                                    }"
                                >
                                    <!-- <option value="programme" v-for="programme in Object.keys(posts)">{{programme}}</option> -->
                                    <option value="" disabled selected
                                        >Select Programme</option
                                    >
                                    <option
                                        :value="key"
                                        v-for="(post, key) in posts"
                                        :key="key"
                                    >
                                        {{ key }}
                                    </option>
                                </select>
                                <span>{{ errors.programme }}</span>

                                <span v-if="val_errors && val_errors.programme"
                                    >x {{ val_errors.programme[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select
                                    class="form-control"
                                    name=""
                                    v-model="post"
                                    :class="{
                                        border:
                                            spanError.post == true ||
                                            (val_errors &&
                                                val_errors.post != null)
                                    }"
                                >
                                    <option value="" selected disabled
                                        >Select Post</option
                                    >
                                    <option
                                        :value="post.id"
                                        v-for="post in filteredPost"
                                        :key="post.id"
                                    >
                                        {{ post.name_of_post }}
                                    </option>
                                </select>
                                <span>{{ errors.post }}</span>

                                <span v-if="val_errors && val_errors.post"
                                    >x {{ val_errors.post[0] }}</span
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    Personal Information
                    <span class="note">(*) Fields are mandatory</span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">
                                    Name
                                    <span class="star">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    v-model="name"
                                    :class="{
                                        border:
                                            spanError.name == true ||
                                            (val_errors &&
                                                val_errors.name != null)
                                    }"
                                    disabled
                                />
                                <span>{{ errors.name }}</span>
                                <span v-if="val_errors && val_errors.name"
                                    >x {{ val_errors.name[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">
                                    Email Id
                                    <span class="star">*</span>
                                </label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    v-model="email"
                                    :class="{
                                        border: spanError.email == true
                                    }"
                                    disabled
                                />
                                <span>{{ errors.email }}</span>

                                <span v-if="val_errors && val_errors.email"
                                    >x {{ val_errors.email[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phone_no">
                                    Phone No
                                    <span class="star">*</span>
                                </label>
                                <input
                                    type="number"
                                    class="form-control"
                                    id="phone_no"
                                    v-model="phone_no"
                                    :class="{
                                        border:
                                            spanError.phone_no == true ||
                                            (val_errors &&
                                                val_errors.phone_no != null)
                                    }"
                                    disabled
                                />
                                <span>{{ errors.phone_no }}</span>
                                <span v-if="val_errors && val_errors.phone_no">
                                    x
                                    {{ val_errors.phone_no[0] }}
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="father_name"
                                    >Father's Name<span class="star"
                                        >*</span
                                    ></label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="father_name"
                                    :class="{
                                        border:
                                            spanError.father_name == true ||
                                            (val_errors &&
                                                val_errors.father_name != null)
                                    }"
                                />
                                <span>{{ errors.father_name }}</span>
                                <span
                                    v-if="val_errors && val_errors.father_name"
                                    >x {{ val_errors.father_name[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mother_name"
                                    >Mother's Name<span class="star"
                                        >*</span
                                    ></label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="mother_name"
                                    :class="{
                                        border:
                                            spanError.mother_name == true ||
                                            (val_errors &&
                                                val_errors.mother_name != null)
                                    }"
                                />
                                <span>{{ errors.mother_name }}</span>
                                <span
                                    v-if="val_errors && val_errors.mother_name"
                                    >x {{ val_errors.mother_name[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="employment_reg_no"
                                    >Employment Exchange Registration No</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="employment_reg_no"
                                />
                                <!-- <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="employment_reg_no"
                                    :class="{
                                        border:
                                            spanError.employment_reg_no ==
                                                true ||
                                            (val_errors &&
                                                val_errors.employment_reg_no !=
                                                    null)
                                    }"
                                /> -->
                                <!-- <span>{{ errors.employment_reg_no }}</span>
                                <span
                                    v-if="
                                        val_errors &&
                                            val_errors.employment_reg_no
                                    "
                                    >x
                                    {{ val_errors.employment_reg_no[0] }}</span
                                > -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="dob">
                                    DOB
                                    <span class="star">*</span>
                                </label>
                                <input
                                    type="date"
                                    class="form-control"
                                    id="dob"
                                    v-model="dob"
                                    :class="{
                                        border:
                                            spanError.dob == true ||
                                            (val_errors &&
                                                val_errors.dob != null)
                                    }"
                                    placeholder="mm/dd/yyyy"
                                />
                                <span>{{ errors.dob }}</span>
                                <span v-if="val_errors && val_errors.dob"
                                    >x {{ val_errors.dob[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gender">
                                    Gender
                                    <span class="star">*</span>
                                </label>

                                <select
                                    class="form-control"
                                    id="gender"
                                    v-model="gender"
                                    :class="{
                                        border:
                                            spanError.gender == true ||
                                            (val_errors &&
                                                val_errors.gender != null)
                                    }"
                                >
                                    <option value disabled selected
                                        >Select Gender</option
                                    >
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>
                                </select>
                                <span>{{ errors.gender }}</span>
                                <span v-if="val_errors && val_errors.gender"
                                    >x {{ val_errors.gender[0] }}</span
                                >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nationality">
                                    Nationality
                                    <span class="star">*</span>
                                </label>

                                <select
                                    class="form-control"
                                    id="nationality"
                                    v-model="nationality"
                                    :class="{
                                        border:
                                            spanError.nationality == true ||
                                            (val_errors &&
                                                val_errors.nationality != null)
                                    }"
                                >
                                    <option value disabled selected
                                        >Select Nationality</option
                                    >
                                    <option value="Indian">Indian</option>
                                    <option value="Others">Others</option>
                                </select>
                                <span>{{ errors.nationality }}</span>
                                <span
                                    v-if="val_errors && val_errors.nationality"
                                >
                                    x
                                    {{ val_errors.nationality[0] }}
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="caste">
                                    Caste
                                    <span class="star">*</span>
                                </label>

                                <select
                                    class="form-control"
                                    id="caste"
                                    v-model="caste"
                                    :class="{
                                        border:
                                            spanError.caste == true ||
                                            (val_errors &&
                                                val_errors.caste != null)
                                    }"
                                >
                                    <option value disabled selected
                                        >Select Caste</option
                                    >
                                    <option value="General">General</option>
                                    <option value="OBC">OBC</option>
                                    <option value="SC">SC</option>
                                    <option value="ST(H)">ST(H)</option>
                                    <option value="ST(P)">ST(P)</option>
                                </select>
                                <span>{{ errors.caste }}</span>
                                <span v-if="val_errors && val_errors.caste"
                                    >x {{ val_errors.caste[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gender">
                                    Differently Abled?
                                    <span class="star">*</span>
                                </label>

                                <select
                                    class="form-control"
                                    id="pwd"
                                    v-model="pwd"
                                    :class="{
                                        border:
                                            spanError.pwd == true ||
                                            (val_errors &&
                                                val_errors.pwd != null)
                                    }"
                                >
                                    <option value disabled selected
                                        >Select yes/no</option
                                    >
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <span>{{ errors.pwd }}</span>
                                <span v-if="val_errors && val_errors.pwd"
                                    >x {{ val_errors.pwd[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-4" v-if="pwd == 'Yes'">
                            <div class="form-group">
                                <label for="gender">
                                    Category of PWD
                                    <span class="star">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="PWD Category"
                                    id="pwd_category"
                                    list="lpwd_category"
                                    v-model="pwd_category"
                                    :class="{
                                        border:
                                            spanError.pwd_category == true ||
                                            (val_errors &&
                                                val_errors.pwd_category != null)
                                    }"
                                />
                                <datalist id="lpwd_category">
                                    <option value disabled selected
                                        >Select yes/no</option
                                    >
                                    <option value="OH"
                                        >Orthopaedically Handicapped</option
                                    >
                                    <option value="HI"
                                        >Hearing Impairment</option
                                    >
                                    <option value="VI"
                                        >Visually Impaired</option
                                    >
                                </datalist>
                                <span>{{ errors.pwd_category }}</span>
                                <span
                                    v-if="val_errors && val_errors.pwd_category"
                                >
                                    x
                                    {{ val_errors.pwd_category[0] }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header">Permanent Address</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="state"
                                    >State<span class="star">*</span></label
                                >
                                <select
                                    class="form-control"
                                    v-model="state"
                                    :class="{
                                        border:
                                            spanError.state == true ||
                                            (val_errors &&
                                                val_errors.state != null)
                                    }"
                                >
                                    <option value disabled selected
                                        >Select State</option
                                    >
                                    <option value="Assam">Assam</option>
                                </select>
                                <span>{{ errors.state }}</span>
                                <span v-if="val_errors && val_errors.state"
                                    >x {{ val_errors.state[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="district"
                                    >District<span class="star">*</span></label
                                >
                                <select
                                    class="form-control"
                                    v-model="district"
                                    :class="{
                                        border:
                                            spanError.district == true ||
                                            (val_errors &&
                                                val_errors.district != null)
                                    }"
                                    @change="getBlock"
                                >
                                    <option value disabled selected
                                        >Select District</option
                                    >
                                    <option
                                        :value="district.id"
                                        v-for="district in districts"
                                        :key="district.id"
                                    >
                                        {{ district.district_name }}
                                    </option>
                                </select>
                                <span>{{ errors.district }}</span>
                                <span v-if="val_errors && val_errors.district"
                                    >x {{ val_errors.district[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="district"
                                    >Panchayat/Municipality/VCDC<span
                                        class="star"
                                        >*</span
                                    ></label
                                >
                                <select
                                    class="form-control"
                                    v-model="panchayat_municipality"
                                    :class="{
                                        border:
                                            spanError.panchayat_municipality ==
                                                true ||
                                            (val_errors &&
                                                val_errors.panchayat_municipality !=
                                                    null)
                                    }"
                                >
                                    <option value disabled selected>
                                        Select Panchayat/VCDC/Municipality
                                    </option>
                                    <option value="Panchayat"
                                        >Panchayat/VCDC</option
                                    >
                                    <option value="Municipality"
                                        >Municipality</option
                                    >
                                </select>
                                <span>{{ errors.panchayat_municipality }}</span>
                            </div>
                        </div>
                        <div
                            class="col-md-4"
                            v-show="panchayat_municipality == 'Panchayat'"
                        >
                            <div class="form-group">
                                <label for="block"
                                    >Block<span class="star">*</span></label
                                >
                                <select
                                    class="form-control"
                                    v-model="block"
                                    :class="{
                                        border:
                                            spanError.block == true ||
                                            (val_errors &&
                                                val_errors.block != null)
                                    }"
                                    @change="getPanchayat"
                                >
                                    <option value disabled selected
                                        >Select Block</option
                                    >
                                    <option
                                        :value="block.id"
                                        v-for="block in blocks"
                                        :key="block.id"
                                    >
                                        {{ block.block_name }}
                                    </option>
                                </select>
                                <span>{{ errors.block }}</span>
                                <!-- <span v-if="val_errors && val_errors.block">x {{ val_errors.block[0] }}</span> -->
                            </div>
                        </div>
                        <div
                            class="col-md-4"
                            v-show="panchayat_municipality == 'Panchayat'"
                        >
                            <div class="form-group">
                                <label for="panchayat"
                                    >Panchayat/VCDC<span class="star"
                                        >*</span
                                    ></label
                                >
                                <select
                                    class="form-control"
                                    v-model="panchayat"
                                    :class="{
                                        border:
                                            spanError.panchayat == true ||
                                            (val_errors &&
                                                val_errors.panchayat != null)
                                    }"
                                >
                                    <option value disabled selected
                                        >Select Panchayat</option
                                    >
                                    <option
                                        :value="panchayat.id"
                                        v-for="panchayat in panchayats"
                                        :key="panchayat.id"
                                    >
                                        {{ panchayat.gram_panchyat_name }}
                                    </option>
                                </select>
                                <span>{{ errors.panchayat }}</span>
                                <!-- <span v-if="val_errors && val_errors.panchyats">x {{ val_errors.panchyats[0] }}</span> -->
                            </div>
                        </div>
                        <div
                            class="col-md-4"
                            v-show="panchayat_municipality == 'Municipality'"
                        >
                            <div class="form-group">
                                <label for="municipality"
                                    >Municipality<span class="star"
                                        >*</span
                                    ></label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="municipality"
                                    :class="{
                                        border:
                                            spanError.municipality == true ||
                                            (val_errors &&
                                                val_errors.municipality != null)
                                    }"
                                />
                                <span>{{ errors.municipality }}</span>
                            </div>
                        </div>
                        <div
                            class="col-md-4"
                            v-show="panchayat_municipality == 'Municipality'"
                        >
                            <div class="form-group">
                                <label for="ward_no"
                                    >Ward No<span class="star">*</span></label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="ward_no"
                                    :class="{
                                        border:
                                            spanError.ward_no == true ||
                                            (val_errors &&
                                                val_errors.ward_no != null)
                                    }"
                                />
                                <span>{{ errors.ward_no }}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="village_town"
                                    >Address<span class="star">*</span></label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="village_town"
                                    :class="{
                                        border:
                                            spanError.village_town == true ||
                                            (val_errors &&
                                                val_errors.village_town != null)
                                    }"
                                />
                                <span>{{ errors.village_town }}</span>
                                <span
                                    v-if="val_errors && val_errors.village_town"
                                    >x {{ val_errors.village_town[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="post_office"
                                    >Post Office<span class="star"
                                        >*</span
                                    ></label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="post_office"
                                    :class="{
                                        border:
                                            spanError.post_office == true ||
                                            (val_errors &&
                                                val_errors.post_office != null)
                                    }"
                                />
                                <span>{{ errors.post_office }}</span>
                                <span
                                    v-if="val_errors && val_errors.post_office"
                                    >x {{ val_errors.post_office[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="police_station"
                                    >Police Station<span class="star"
                                        >*</span
                                    ></label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="police_station"
                                    :class="{
                                        border:
                                            spanError.police_station == true ||
                                            (val_errors &&
                                                val_errors.police_station !=
                                                    null)
                                    }"
                                />
                                <span>{{ errors.police_station }}</span>
                                <span
                                    v-if="
                                        val_errors && val_errors.police_station
                                    "
                                    >x {{ val_errors.police_station[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pincode"
                                    >Pin Code<span class="star">*</span></label
                                >
                                <input
                                    type="number"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="pincode"
                                    :class="{
                                        border:
                                            spanError.pincode == true ||
                                            (val_errors &&
                                                val_errors.pincode != null)
                                    }"
                                />
                                <span>{{ errors.pincode }}</span>
                                <span v-if="val_errors && val_errors.pincode"
                                    >x {{ val_errors.pincode[0] }}</span
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    Correspondence Address
                    <span style="float: right">
                        <div class="form-check">
                            <input
                                type="checkbox"
                                class="form-check-input"
                                v-model="sameAddr"
                                @change="checkAddr"
                            />
                            <label class="form-check-label" for="exampleCheck1"
                                >Click If Personal Address is same as
                                correspondence address.</label
                            >
                        </div>
                    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="c_state"
                                    >State<span class="star">*</span></label
                                >
                                <select
                                    class="form-control"
                                    v-model="c_state"
                                    :class="{
                                        border:
                                            spanError.c_state == true ||
                                            (val_errors &&
                                                val_errors.c_state != null)
                                    }"
                                >
                                    <option value disabled selected
                                        >Select State</option
                                    >
                                    <option value="Assam">Assam</option>
                                </select>
                                <span>{{ errors.c_state }}</span>
                                <span v-if="val_errors && val_errors.c_state"
                                    >x {{ val_errors.c_state[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="c_district"
                                    >District<span class="star">*</span></label
                                >
                                <select
                                    class="form-control"
                                    v-model="c_district"
                                    :class="{
                                        border:
                                            spanError.c_district == true ||
                                            (val_errors &&
                                                val_errors.c_district != null)
                                    }"
                                    @change="getBlock"
                                >
                                    <option value disabled selected
                                        >Select District</option
                                    >
                                    <option
                                        :value="district.id"
                                        v-for="district in districts"
                                        :key="district.id"
                                    >
                                        {{ district.district_name }}
                                    </option>
                                </select>
                                <span>{{ errors.c_district }}</span>
                                <span v-if="val_errors && val_errors.c_district"
                                    >x {{ val_errors.c_district[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="district"
                                    >Panchayat/Municipality/VCDC<span
                                        class="star"
                                        >*</span
                                    ></label
                                >
                                <select
                                    class="form-control"
                                    v-model="c_panchayat_municipality"
                                    :class="{
                                        border:
                                            spanError.c_panchayat_municipality ==
                                                true ||
                                            (val_errors &&
                                                val_errors.c_panchayat_municipality !=
                                                    null)
                                    }"
                                >
                                    <option value disabled selected>
                                        Select Panchayat/VCDC/Municipality
                                    </option>
                                    <option value="Panchayat"
                                        >Panchayat/VCDC</option
                                    >
                                    <option value="Municipality"
                                        >Municipality</option
                                    >
                                </select>
                                <span>{{
                                    errors.c_panchayat_municipality
                                }}</span>
                            </div>
                        </div>
                        <div
                            class="col-md-4"
                            v-show="c_panchayat_municipality == 'Panchayat'"
                        >
                            <div class="form-group">
                                <label for="c_block"
                                    >Block<span class="star">*</span></label
                                >
                                <select
                                    class="form-control"
                                    v-model="c_block"
                                    :class="{
                                        border:
                                            spanError.c_block == true ||
                                            (val_errors &&
                                                val_errors.c_block != null)
                                    }"
                                    @change="getPanchayat"
                                >
                                    <option value disabled selected
                                        >Select Block</option
                                    >
                                    <option
                                        :value="block.id"
                                        v-for="block in c_blocks"
                                        :key="block.id"
                                    >
                                        {{ block.block_name }}
                                    </option>
                                </select>
                                <span>{{ errors.c_block }}</span>
                                <span v-if="val_errors && val_errors.c_block"
                                    >x {{ val_errors.c_block[0] }}</span
                                >
                            </div>
                        </div>
                        <div
                            class="col-md-4"
                            v-show="c_panchayat_municipality == 'Panchayat'"
                        >
                            <div class="form-group">
                                <label for="c_panchayat"
                                    >Panchayat/VCDC<span class="star"
                                        >*</span
                                    ></label
                                >
                                <select
                                    class="form-control"
                                    v-model="c_panchayat"
                                    :class="{
                                        border:
                                            spanError.c_panchayat == true ||
                                            (val_errors &&
                                                val_errors.c_panchayat != null)
                                    }"
                                >
                                    <option value disabled selected
                                        >Select Panchayat</option
                                    >
                                    <option
                                        :value="panchayat.id"
                                        v-for="panchayat in c_panchayats"
                                        :key="panchayat.id"
                                    >
                                        {{ panchayat.gram_panchyat_name }}
                                    </option>
                                </select>
                                <span>{{ errors.c_panchayat }}</span>
                                <span v-if="val_errors && val_errors.c_panchyat"
                                    >x {{ val_errors.panchyat[0] }}</span
                                >
                            </div>
                        </div>
                        <div
                            class="col-md-4"
                            v-show="c_panchayat_municipality == 'Municipality'"
                        >
                            <div class="form-group">
                                <label for="c_municipality"
                                    >Municipality<span class="star"
                                        >*</span
                                    ></label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="c_municipality"
                                    :class="{
                                        border:
                                            spanError.c_municipality == true ||
                                            (val_errors &&
                                                val_errors.c_municipality !=
                                                    null)
                                    }"
                                />
                                <span>{{ errors.c_municipality }}</span>
                            </div>
                        </div>
                        <div
                            class="col-md-4"
                            v-show="c_panchayat_municipality == 'Municipality'"
                        >
                            <div class="form-group">
                                <label for="ward_no"
                                    >Ward No<span class="star">*</span></label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="c_ward_no"
                                    :class="{
                                        border:
                                            spanError.c_ward_no == true ||
                                            (val_errors &&
                                                val_errors.c_ward_no != null)
                                    }"
                                />
                                <span>{{ errors.c_ward_no }}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="c_village_town"
                                    >Address<span class="star">*</span></label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="c_village_town"
                                    :class="{
                                        border:
                                            spanError.c_village_town == true ||
                                            (val_errors &&
                                                val_errors.c_village_town !=
                                                    null)
                                    }"
                                />
                                <span>{{ errors.c_village_town }}</span>
                                <span
                                    v-if="
                                        val_errors && val_errors.c_village_town
                                    "
                                    >x {{ val_errors.c_village_town[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="c_post_office"
                                    >Post Office<span class="star"
                                        >*</span
                                    ></label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="c_post_office"
                                    :class="{
                                        border:
                                            spanError.c_post_office == true ||
                                            (val_errors &&
                                                val_errors.c_post_office !=
                                                    null)
                                    }"
                                />
                                <span>{{ errors.c_post_office }}</span>
                                <span
                                    v-if="
                                        val_errors && val_errors.c_post_office
                                    "
                                    >x {{ val_errors.c_post_office[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="c_police_station"
                                    >Police Station<span class="star"
                                        >*</span
                                    ></label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="c_police_station"
                                    :class="{
                                        border:
                                            spanError.c_police_station ==
                                                true ||
                                            (val_errors &&
                                                val_errors.c_police_station !=
                                                    null)
                                    }"
                                />
                                <span>{{ errors.c_police_station }}</span>
                                <span
                                    v-if="
                                        val_errors &&
                                            val_errors.c_police_station
                                    "
                                    >x
                                    {{ val_errors.c_police_station[0] }}</span
                                >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="c_pincode"
                                    >Pin Code<span class="star">*</span></label
                                >
                                <input
                                    type="number"
                                    class="form-control"
                                    id=""
                                    placeholder=""
                                    v-model="c_pincode"
                                    :class="{
                                        border:
                                            spanError.c_pincode == true ||
                                            (val_errors &&
                                                val_errors.c_pincode != null)
                                    }"
                                />
                                <span>{{ errors.c_pincode }}</span>
                                <span v-if="val_errors && val_errors.c_pincode"
                                    >x {{ val_errors.c_pincode[0] }}</span
                                >
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-center">
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
            posts: null,
            post: "",
            programme: "",
            filteredPost: null,
            districts: null,
            blocks: null,
            c_blocks: null,
            panchayats: null,
            c_panchayats: null,
            dob: "",
            gender: "",
            religion: "",
            nationality: "",
            caste: "",
            pwd: "",
            pwd_category: "",
            existing_employee: "",
            existing_emp_year: "",
            ews: "",
            ex_serviceman: "",
            father_name: "",
            mother_name: "",
            employment_reg_no: "",
            village_town: "",
            post_office: "",
            police_station: "",
            pincode: "",
            district: "",
            state: "",
            block: "",
            panchayat: "",
            ward_no: "",
            municipality: "",
            panchayat_municipality: "",
            c_block: "",
            c_panchayat: "",
            c_ward_no: "",
            c_municipality: "",
            c_village_town: "",
            c_post_office: "",
            c_police_station: "",
            c_pincode: "",
            c_district: "",
            c_state: "",
            c_block: "",
            c_panchayat: "",
            c_panchayat_municipality: "",
            sameAddr: "",
            errors: {},
            spanError: {},
            disabled: false,
            timeout: null
        };
    },
    methods: {
        checkAddr() {
            if (this.sameAddr) {
                this.c_state = this.state;
                this.c_district = this.district;
                this.c_village_town = this.village_town;
                this.c_pincode = this.pincode;
                this.c_police_station = this.police_station;
                this.c_post_office = this.post_office;
                this.c_panchayat_municipality = this.panchayat_municipality;
                this.c_block = this.block;
                this.getPanchayat();

                this.c_panchayat = this.panchayat;
                this.c_ward_no = this.ward_no;
                this.c_municipality = this.municipality;
            }
        },
        changePosts() {
            this.filteredPost = this.posts[this.programme];
            // this.filteredPost=this.posts.filter(function(value){
            //  return value.programme == this.programme;
            //  });
        },
        getBlock() {
            if (this.district.toString().length) {
                var data = this.districts.filter(item => {
                    return item.id == this.district;
                });
                this.blocks = data[0].blocks;
            }
            if (this.c_district.toString().length) {
                var data = this.districts.filter(item => {
                    return item.id == this.c_district;
                });
                this.c_blocks = data[0].blocks;
            }
        },
        getPanchayat() {
            if (this.block.toString().length) {
                axios
                    .get(
                        global.apiUrl + "get_panchayats?block_id=" + this.block
                    )
                    .then(res => {
                        this.panchayats = res.data.panchayats;
                    })
                    .catch(errors => {
                        console.log(errors);
                    });
            }
            if (this.c_block.toString().length) {
                axios
                    .get(
                        global.apiUrl +
                            "get_panchayats?block_id=" +
                            this.c_block
                    )
                    .then(res => {
                        this.c_panchayats = res.data.panchayats;
                    })
                    .catch(errors => {
                        console.log(errors);
                    });
            }
        },
        onNext() {
            this.disabled = true;

            this.timeout = setTimeout(() => {
                this.disabled = false;
            }, 5000);

            this.errors = {};
            if (!this.programme.length) {
                this.errors.programme = "x This field is required.";
                this.spanError.programme = true;
            } else {
                this.errors.programme = null;
                delete this.errors["programme"];

                this.spanError.programme = false;
            }
            if (!this.post.toString().length) {
                this.errors.post = "x This field is required.";
                this.spanError.post = true;
            } else {
                this.errors.post = null;
                delete this.errors["post"];

                this.spanError.post = false;
            }
            if (!this.dob.length) {
                this.errors.dob = "x This field is required.";
                this.spanError.dob = true;
            } else {
                this.errors.dob = null;
                delete this.errors["dob"];

                this.spanError.dob = false;
            }
            if (!this.gender.length) {
                this.errors.gender = "x This field is required.";
                this.spanError.gender = true;
            } else {
                this.errors.gender = null;
                delete this.errors["gender"];

                this.spanError.gender = false;
            }

            if (!this.nationality.length) {
                this.errors.nationality = "x This field is required.";
                this.spanError.nationality = true;
            } else {
                this.errors.nationality = null;
                delete this.errors["nationality"];

                this.spanError.nationality = false;
            }
            if (!this.caste.length) {
                this.errors.caste = "x This field is required.";
                this.spanError.caste = true;
            } else {
                this.errors.caste = null;
                delete this.errors["caste"];

                this.spanError.caste = false;
            }
            if (!this.pwd.length) {
                this.errors.pwd = "x This field is required.";
                this.spanError.pwd = true;
            } else {
                this.errors.pwd = null;
                delete this.errors["pwd"];

                this.spanError.pwd = false;
            }
            // if (this.pwd == "Yes" && !this.pwd_category.length) {
            //   this.errors.pwd_category = "x This field is required.";
            //   this.spanError.pwd_category = true;
            // } else {
            //   this.errors.pwd_category = null;
            //   delete this.errors["pwd_category"];
            //
            //   this.spanError.pwd_category = false;
            // }

            if (!this.father_name.length) {
                this.errors.father_name = "x This field is required.";
                this.spanError.father_name = true;
            } else {
                this.errors.father_name = null;
                delete this.errors["father_name"];
                this.spanError.father_name = false;
            }
            if (!this.mother_name.length) {
                this.errors.mother_name = "x This field is required.";
                this.spanError.mother_name = true;
            } else {
                this.errors.mother_name = null;
                delete this.errors["mother_name"];
                this.spanError.mother_name = false;
            }
            // if (!this.employment_reg_no.length) {
            //     this.errors.employment_reg_no = "x This field is required.";
            //     this.spanError.employment_reg_no = true;
            // } else {
            //     this.errors.employment_reg_no = null;
            //     delete this.errors["employment_reg_no"];
            //     this.spanError.employment_reg_no = false;
            // }
            if (!this.village_town.length) {
                this.errors.village_town = "x This field is required.";
                this.spanError.village_town = true;
            } else {
                this.errors.village_town = null;
                delete this.errors["village_town"];
                this.spanError.village_town = false;
            }
            if (!this.panchayat_municipality.length) {
                this.errors.panchayat_municipality =
                    "x This field is required.";
                this.spanError.panchayat_municipality = true;
            } else {
                this.errors.panchayat_municipality = null;
                delete this.errors["panchayat_municipality"];
                this.spanError.panchayat_municipality = false;
            }
            if (
                this.panchayat_municipality == "Panchayat" &&
                !this.panchayat.toString().length
            ) {
                this.errors.panchayat = "x This field is required.";
                this.spanError.panchayat = true;
            } else {
                this.errors.panchayat = null;
                delete this.errors["panchayat"];
                this.spanError.panchayat = false;
            }
            if (
                this.panchayat_municipality == "Panchayat" &&
                !this.block.toString().length
            ) {
                this.errors.block = "x This field is required.";
                this.spanError.block = true;
            } else {
                this.errors.block = null;
                delete this.errors["block"];
                this.spanError.block = false;
            }
            if (
                this.panchayat_municipality == "Municipality" &&
                !this.municipality.length
            ) {
                this.errors.municipality = "x This field is required.";
                this.spanError.municipality = true;
            } else {
                this.errors.municipality = null;
                delete this.errors["municipality"];
                this.spanError.municipality = false;
            }
            if (
                this.panchayat_municipality == "Municipality" &&
                !this.ward_no.length
            ) {
                this.errors.ward_no = "x This field is required.";
                this.spanError.ward_no = true;
            } else {
                this.errors.ward_no = null;
                delete this.errors["ward_no"];
                this.spanError.ward_no = false;
            }
            if (!this.c_panchayat_municipality.length) {
                this.errors.c_panchayat_municipality =
                    "x This field is required.";
                this.spanError.c_panchayat_municipality = true;
            } else {
                this.errors.c_panchayat_municipality = null;
                delete this.errors["c_panchayat_municipality"];
                this.spanError.c_panchayat_municipality = false;
            }
            if (
                this.c_panchayat_municipality == "Panchayat" &&
                !this.c_panchayat.toString().length
            ) {
                this.errors.c_panchayat = "x This field is required.";
                this.spanError.c_panchayat = true;
            } else {
                this.errors.c_panchayat = null;
                delete this.errors["c_panchayat"];
                this.spanError.c_panchayat = false;
            }
            if (
                this.c_panchayat_municipality == "Panchayat" &&
                !this.c_block.toString().length
            ) {
                this.errors.c_block = "x This field is required.";
                this.spanError.c_block = true;
            } else {
                this.errors.c_block = null;
                delete this.errors["c_block"];
                this.spanError.c_block = false;
            }
            if (
                this.c_panchayat_municipality == "Municipality" &&
                !this.c_municipality.length
            ) {
                this.errors.c_municipality = "x This field is required.";
                this.spanError.c_municipality = true;
            } else {
                this.errors.c_municipality = null;
                delete this.errors["c_municipality"];
                this.spanError.c_municipality = false;
            }
            if (
                this.c_panchayat_municipality == "Municipality" &&
                !this.c_ward_no.length
            ) {
                this.errors.c_ward_no = "x This field is required.";
                this.spanError.c_ward_no = true;
            } else {
                this.errors.c_ward_no = null;
                delete this.errors["c_ward_no"];
                this.spanError.c_ward_no = false;
            }
            if (!this.c_village_town.length) {
                this.errors.c_village_town = "x This field is required.";
                this.spanError.c_village_town = true;
            } else {
                this.errors.c_village_town = null;
                delete this.errors["c_village_town"];
                this.spanError.c_village_town = false;
            }
            if (!this.post_office.length) {
                this.errors.post_office = "x This field is required.";
                this.spanError.post_office = true;
            } else {
                this.errors.post_office = null;
                delete this.errors["post_office"];
                this.spanError.post_office = false;
            }
            if (!this.c_post_office.length) {
                this.errors.c_post_office = "x This field is required.";
                this.spanError.c_post_office = true;
            } else {
                this.errors.c_post_office = null;
                delete this.errors["c_post_office"];
                this.spanError.c_post_office = false;
            }
            if (!this.police_station.length) {
                this.errors.police_station = "x This field is required.";
                this.spanError.police_station = true;
            } else {
                this.errors.police_station = null;
                delete this.errors["police_station"];
                this.spanError.police_station = false;
            }
            if (!this.c_police_station.length) {
                this.errors.c_police_station = "x This field is required.";
                this.spanError.c_police_station = true;
            } else {
                this.errors.c_police_station = null;
                delete this.errors["c_police_station"];
                this.spanError.c_police_station = false;
            }
            if (!this.pincode.toString().length) {
                this.errors.pincode = "x This field is required.";
                this.spanError.pincode = true;
            } else {
                this.errors.pincode = null;
                delete this.errors["pincode"];
                this.spanError.pincode = false;
            }
            if (!this.c_pincode.toString().length) {
                this.errors.c_pincode = "x This field is required.";
                this.spanError.c_pincode = true;
            } else {
                this.errors.c_pincode = null;
                delete this.errors["c_pincode"];
                this.spanError.c_pincode = false;
            }
            if (!this.district.toString().length) {
                this.errors.district = "x This field is required.";
                this.spanError.district = true;
            } else {
                this.errors.district = null;
                delete this.errors["district"];
                this.spanError.district = false;
            }
            if (!this.c_district.toString().length) {
                this.errors.c_district = "x This field is required.";
                this.spanError.c_district = true;
            } else {
                this.errors.c_district = null;
                delete this.errors["c_district"];
                this.spanError.c_district = false;
            }
            if (!this.state.length) {
                this.errors.state = "x This field is required.";
                this.spanError.state = true;
            } else {
                this.errors.state = null;
                delete this.errors["state"];
                this.spanError.state = false;
            }
            if (!this.c_state.length) {
                this.errors.c_state = "x This field is required.";
                this.spanError.c_state = true;
            } else {
                this.errors.c_state = null;
                delete this.errors["c_state"];
                this.spanError.c_state = false;
            }

            if (Object.keys(this.errors).length == 0) {
                Nprogress.start();
                const formData = {
                    programme: this.programme,
                    job_post_id: this.post,
                    dob: this.dob,
                    gender: this.gender,
                    nationality: this.nationality,
                    caste: this.caste,
                    pwd: this.pwd,
                    pwd_category: this.pwd_category,

                    father_name: this.father_name,
                    mother_name: this.mother_name,
                    user_id: this.$store.state.user.id,
                    employment_reg_no: this.employment_reg_no,
                    village_town: this.village_town,
                    post_office: this.post_office,
                    police_station: this.police_station,
                    pincode: this.pincode,
                    district_id: this.district,
                    state: this.state,
                    gram_panchyat_id: this.panchayat,
                    block_id: this.block,
                    municipality: this.municipality,
                    ward_no: this.ward_no,
                    c_gram_panchyat_id: this.c_panchayat,
                    c_block_id: this.c_block,
                    c_municipality: this.c_municipality,
                    c_ward_no: this.c_ward_no,
                    c_village_town: this.c_village_town,
                    c_post_office: this.c_post_office,
                    c_police_station: this.c_police_station,
                    c_pincode: this.c_pincode,
                    c_district_id: this.c_district,
                    c_state: this.c_state
                };
                this.$store
                    .dispatch("personalInformationSave", formData)
                    .then(result => {
                        this.$store.state.personal_information_errors = null;
                        this.$store.dispatch("changeStep", {
                            next: 1,
                            user_id: this.$store.state.user.id
                        });

                        Nprogress.done();
                    })
                    .catch(error => {
                        console.log(error);
                        swal("Done!", error.data.message, "error").then(() => {
                            this.$router.go();
                            window.scrollTo(0, 0);
                        });
                    });
            }
        }
    },
    created() {
        axios
            .get(global.apiUrl + "get_job_posts")
            .then(res => {
                this.posts = res.data.job_posts;
            })
            .catch(errors => {
                console.log(errors);
            });
        axios
            .get(global.apiUrl + "get_districts")
            .then(res => {
                this.districts = res.data.districts;
            })
            .catch(errors => {
                console.log(errors);
            });

        this.name = this.$store.state.user.name;
        this.email = this.$store.state.user.email;
        this.phone_no = this.$store.state.user.phone_no;
        this.$store.dispatch("getPersonalInfo").then(() => {
            this.programme = this.$store.state.personalInfo.job_post.programme;
            this.changePosts();
            this.post = this.$store.state.personalInfo.job_post.id;
            this.dob = this.$store.state.personalInfo.dob;
            this.gender = this.$store.state.personalInfo.gender;
            this.nationality = this.$store.state.personalInfo.nationality;
            this.caste = this.$store.state.personalInfo.caste;
            this.pwd = this.$store.state.personalInfo.pwd;
            this.pwd_category = this.$store.state.personalInfo.pwd_category;

            this.father_name = this.$store.state.personalInfo.father_name;
            this.mother_name = this.$store.state.personalInfo.mother_name;
            this.employment_reg_no = this.$store.state.personalInfo.employment_reg_no;
            this.village_town = this.$store.state.personalInfo.village_town;
            this.state = this.$store.state.personalInfo.state;
            this.c_state = this.$store.state.personalInfo.c_state;
            this.post_office = this.$store.state.personalInfo.post_office;
            this.police_station = this.$store.state.personalInfo.police_station;
            this.pincode = this.$store.state.personalInfo.pincode;
            this.district = this.$store.state.personalInfo.district.id;

            this.municipality = this.$store.state.personalInfo.municipality;
            this.ward_no = this.$store.state.personalInfo.ward_no;
            this.c_village_town = this.$store.state.personalInfo.c_village_town;
            this.c_post_office = this.$store.state.personalInfo.c_post_office;
            this.c_police_station = this.$store.state.personalInfo.c_police_station;
            this.c_pincode = this.$store.state.personalInfo.c_pincode;
            this.c_municipality = this.$store.state.personalInfo.c_municipality;
            this.c_ward_no = this.$store.state.personalInfo.c_ward_no;
            this.c_district = this.$store.state.personalInfo.c_district.id;
            this.getBlock();
            this.block = this.$store.state.personalInfo.block
                ? this.$store.state.personalInfo.block.id
                : "";
            this.c_block = this.$store.state.personalInfo.c_block
                ? this.$store.state.personalInfo.c_block.id
                : "";
            this.getPanchayat();
            this.panchayat = this.$store.state.personalInfo.gram_panchyat
                ? this.$store.state.personalInfo.gram_panchyat.id
                : "";
            this.c_panchayat = this.$store.state.personalInfo.c_gram_panchyat
                ? this.$store.state.personalInfo.c_gram_panchyat.id
                : "";

            // console.log("p", this.post);
            // console.log("t", this.panchayat);
        });
    },
    computed: {
        val_errors() {
            return this.$store.state.personal_information_errors;
        },
        personalInfo() {
            return this.$store.state.personalInfo;
        }
    },

    mounted() {
        axios
            .get(global.apiUrl + "get_job_posts")
            .then(res => {
                this.posts = res.data.job_posts;
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

<style media="screen">
.form-group span {
    color: red;
    font-size: 12px;
}
.border {
    border: 1px solid red !important;
}
.note {
    color: #007bff;
    background: yellow;
    font-size: 14px;
    padding: 2px 5px;
    width: fit-content;
}
</style>
