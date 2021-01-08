<template>
    <div class="container-fluid">
        <button @click="printDiv" class="btn btn-link" id="pbtn">
            Download
        </button>
        <div ref="content" style="">
            <div class="card">
                <div class="card-header">
                    Personal Information
                    <!-- <span
                        ><button @click="downloadPdf" class="btn btn-link">
                            Download
                        </button></span
                    > -->
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <table class="table">
                                <tr>
                                    <th>Application No.</th>
                                    <td>
                                        {{ app_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Post Applied</th>
                                    <td>
                                        {{
                                            personal_data.job_post.name_of_post
                                        }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>Name</th>
                                    <td>
                                        {{ personal_data.user.name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Father Name</th>
                                    <td>{{ personal_data.father_name }}</td>
                                </tr>
                                <tr>
                                    <th>Mother Name</th>
                                    <td>{{ personal_data.mother_name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ personal_data.user.email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone No</th>
                                    <td>{{ personal_data.user.phone_no }}</td>
                                </tr>
                                <tr>
                                    <th>DOB</th>
                                    <td>{{ personal_data.dob }}</td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>{{ personal_data.gender }}</td>
                                </tr>
                                <tr>
                                    <th>Nationality</th>
                                    <td>{{ personal_data.nationality }}</td>
                                </tr>
                                <tr>
                                    <th>Caste</th>
                                    <td>{{ personal_data.caste }}</td>
                                </tr>
                                <tr>
                                    <th>PWD</th>
                                    <td>{{ personal_data.pwd }}</td>
                                </tr>

                                <tr>
                                    <th>PWD Category</th>
                                    <td>
                                        {{
                                            personal_data.pwd_category
                                                ? personal_data.pwd_category
                                                : ""
                                        }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table">
                                <p><b> Permanent Address </b></p>

                                <tr>
                                    <th>Address</th>
                                    <td>{{ personal_data.village_town }}</td>
                                </tr>

                                <tr>
                                    <th>Panchayat/VCDC</th>
                                    <td>
                                        {{
                                            personal_data.gram_panchyat
                                                ? personal_data.gram_panchyat
                                                      .gram_panchyat_name
                                                : ""
                                        }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Block</th>
                                    <td>
                                        {{
                                            personal_data.block
                                                ? personal_data.block.block_name
                                                : ""
                                        }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Municipality</th>
                                    <td>
                                        {{
                                            personal_data.municipality
                                                ? personal_data.municipality
                                                : ""
                                        }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Ward No</th>
                                    <td>
                                        {{
                                            personal_data.ward_no
                                                ? personal_data.ward_no
                                                : ""
                                        }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Post Office</th>
                                    <td>{{ personal_data.post_office }}</td>
                                </tr>
                                <tr>
                                    <th>Pincode</th>
                                    <td>{{ personal_data.pincode }}</td>
                                </tr>
                                <tr>
                                    <th>Police Station</th>
                                    <td>{{ personal_data.police_station }}</td>
                                </tr>
                                <tr>
                                    <th>District</th>
                                    <td>
                                        {{
                                            personal_data.district
                                                ? personal_data.district
                                                      .district_name
                                                : ""
                                        }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>State</th>
                                    <td>{{ personal_data.state }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table">
                                <p><b> Present Address </b></p>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ personal_data.c_village_town }}</td>
                                </tr>

                                <tr>
                                    <th>Panchayat/VCDC</th>
                                    <td>
                                        {{
                                            personal_data.c_gram_panchyat
                                                ? personal_data.c_gram_panchyat
                                                      .gram_panchyat_name
                                                : ""
                                        }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Block</th>
                                    <td>
                                        {{
                                            personal_data.c_block
                                                ? personal_data.c_block
                                                      .block_name
                                                : ""
                                        }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Municipality</th>
                                    <td>
                                        {{
                                            personal_data.c_municipality
                                                ? personal_data.c_municipality
                                                : ""
                                        }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Ward No</th>
                                    <td>
                                        {{
                                            personal_data.c_ward_no
                                                ? personal_data.c_ward_no
                                                : ""
                                        }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Post Office</th>
                                    <td>{{ personal_data.c_post_office }}</td>
                                </tr>
                                <tr>
                                    <th>Pincode</th>
                                    <td>{{ personal_data.c_pincode }}</td>
                                </tr>
                                <tr>
                                    <th>Police Station</th>
                                    <td>
                                        {{ personal_data.c_police_station }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>District</th>
                                    <td>
                                        {{
                                            personal_data.c_district
                                                ? personal_data.c_district
                                                      .district_name
                                                : ""
                                        }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>State</th>
                                    <td>{{ personal_data.c_state }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-2 text-center">
                            <p>
                                <img
                                    :src="imgUrl + passportPhoto"
                                    target="_blank"
                                    height="200px"
                                    width="150px"
                                />
                            </p>
                            <p>
                                <img
                                    :src="imgUrl + signature"
                                    target="_blank"
                                    height="40px"
                                    width="150px"
                                />
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Educational Qualification</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Particulars</th>
                            <th>College/Institution</th>
                            <th>Board/University</th>
                            <th>Year Of Passing</th>
                            <th>Percentage/CGPA</th>
                        </tr>
                        <tr v-for="data in educational_data" :key="data.id">
                            <td>
                                {{ data.degree }}
                            </td>
                            <td>{{ data.college }}</td>
                            <td>{{ data.university }}</td>
                            <td>{{ data.year_of_passing }}</td>
                            <td>{{ data.percentage }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">Language Proficiency</div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Language</th>
                                    <th>Read</th>
                                    <th>Write</th>
                                    <th>Speak</th>
                                </tr>
                                <tr>
                                    <td>
                                        {{ language_data.ass_lang }}
                                    </td>
                                    <td>{{ language_data.ass_read }}</td>
                                    <td>{{ language_data.ass_write }}</td>
                                    <td>{{ language_data.ass_speak }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ language_data.eng_lang }}
                                    </td>
                                    <td>{{ language_data.eng_read }}</td>
                                    <td>{{ language_data.eng_write }}</td>
                                    <td>{{ language_data.eng_speak }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ language_data.ben_lang }}
                                    </td>
                                    <td>{{ language_data.ben_read }}</td>
                                    <td>{{ language_data.ben_write }}</td>
                                    <td>{{ language_data.ben_speak }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ language_data.bodo_lang }}
                                    </td>
                                    <td>{{ language_data.bodo_read }}</td>
                                    <td>{{ language_data.bodo_write }}</td>
                                    <td>{{ language_data.bodo_speak }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ language_data.hindi_lang }}
                                    </td>
                                    <td>{{ language_data.hindi_read }}</td>
                                    <td>{{ language_data.hindi_write }}</td>
                                    <td>{{ language_data.hindi_speak }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ language_data.others_lang }}
                                    </td>
                                    <td>{{ language_data.others_read }}</td>
                                    <td>{{ language_data.others_write }}</td>
                                    <td>{{ language_data.others_speak }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">Computer Proficiency</div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Diploma/Degree</th>
                                    <th>Institute</th>
                                    <th>Duration(in years)</th>
                                    <th>Document</th>
                                </tr>
                                <tr v-if="computer_data">
                                    <td>
                                        {{ computer_data.name_of_diploma }}
                                    </td>
                                    <td>{{ computer_data.institute }}</td>
                                    <td>{{ computer_data.duration }}</td>
                                    <td>
                                        {{
                                            computer_data.document_name
                                                ? "Yes"
                                                : "No"
                                        }}
                                    </td>
                                </tr>
                                <tr v-else>
                                    <td colspan="3" class="text-center">
                                        Not required
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">Work Experiences</div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Organisation</th>
                                    <th>Designation</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <th>Document</th>
                                </tr>
                                <tr
                                    v-for="work_data in work_data"
                                    :key="work_data.id"
                                >
                                    <td>
                                        {{ work_data.organisation }}
                                    </td>
                                    <td>{{ work_data.designation }}</td>
                                    <td>{{ work_data.from_date }}</td>
                                    <td>{{ work_data.to_date }}</td>
                                    <td>
                                        {{
                                            work_data.document_name
                                                ? "Yes"
                                                : "No"
                                        }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">Document Uploads</div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Document Name</th>
                                </tr>
                                <tr
                                    v-for="data in document_data"
                                    :key="data.id"
                                >
                                    <td>
                                        {{ data.document_name }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { global } from "../global";
import jspdf from "jspdf";
export default {
    data() {
        return {
            personal_data: null,
            educational_data: null,
            language_data: null,
            computer_data: null,
            work_data: null,
            document_data: null,
            app_no: this.$route.query.app_no
        };
    },
    methods: {
        downloadPdf() {
            var doc = new jspdf("l", "pt", "a4", true);
            // const contentHtml = this.$refs.content.innerHTML;
            // console.log(contentHtml);
            // // doc.fromHTML(contentHtml, 1500, 1500, {
            // //     width: 170
            // // });
            // // doc.save("sample.pdf");
            doc.html(this.$refs.content, {
                callback: function(doc) {
                    doc.save();
                }
            });
            doc.setFontSize(2);
        },
        printDiv() {
            // var divContents = document.getElementById("GFG").innerHTML;
            var divContents = this.$refs.content.innerHTML;
            // var a = window.open("", "", "height=500, width=500");
            // a.document.write("<html>");
            // a.document.write("<body > <h1>Div contents are <br>");
            // a.document.write(divContents);
            // a.document.write("</body></html>");
            // a.document.close();
            window.print();
        }
    },

    computed: {
        imgUrl() {
            return global.imgUrl;
        },
        passportPhoto() {
            var passport = this.document_data.filter(item => {
                return item.document_name == "Passport";
            });
            if (passport.length) {
                return passport[0].document_file;
            }
        },
        signature() {
            var passport = this.document_data.filter(item => {
                return item.document_name == "Signature";
            });
            if (passport.length) {
                return passport[0].document_file;
            }
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
                            "get_candidate_data?user_id=" +
                            this.$store.state.user.id +
                            "&job_post_id=" +
                            this.required_qualifications[0].job_post_id
                    )
                    .then(res => {
                        this.personal_data = res.data.personal_data;
                        this.educational_data = res.data.educational_data;
                        this.language_data = res.data.language_data;
                        this.computer_data = res.data.computer_data;
                        this.work_data = res.data.work_data;
                        this.document_data = res.data.document_data;
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
        console.log(this.$route.query.app_no);
    }
};
</script>

<style scoped>
tr th {
    font-size: 13px;
}
tr td {
    font-size: 13px;
}
table td,
table th {
    border: none;
}
</style>
