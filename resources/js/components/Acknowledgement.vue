<template>
    <div>
        <div class="container mt-60">
            <br /><br />
            <div class="card mt-20">
                <div class="card-header">
                    Download Acknowledgement
                    <span style="float: right">
                        <router-link
                            :to="{
                                path: '/recruitment_form'
                            }"
                            >Apply New</router-link
                        >
                    </span>
                </div>
                <div class="card-body text-center">
                    <table class="table" v-if="application_data.length">
                        <tr>
                            <th></th>
                            <th>Post Applied</th>
                            <th>Application Number</th>
                            <th>Download</th>
                        </tr>
                        <tr v-for="data in application_data" :key="data.id">
                            <th></th>
                            <td>{{ data.job_post.name_of_post }}</td>
                            <td>{{ data.application_no }}</td>
                            <td>
                                <router-link
                                    :to="{
                                        name: 'acknowledgementPdf',
                                        query: { app_no: data.application_no }
                                    }"
                                    >Link</router-link
                                >
                            </td>
                        </tr>
                    </table>

                    <div v-if="!application_data.length">
                        It will be created once you fill up an application.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { global } from "../global";
import { jsPDF } from "jspdf";

export default {
    data() {
        return {
            application_data: null
        };
    },

    created() {
        axios
            .get(
                global.apiUrl +
                    "get_application_data?user_id=" +
                    this.$store.state.user.id
            )
            .then(res => {
                this.application_data = res.data.application_data;
            })
            .catch(errors => {
                console.log(errors);
            });
    }
};
</script>
<style scoped>
table th,
table td {
    border: none;
}
</style>
