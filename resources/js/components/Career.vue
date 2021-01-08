<template>
    <div class="career container-fluid">
        <div class="career-content">
            <div class="row">
                <div class="col-md-10 offset-md-1 border-custom">
                    <div class="career-header">
                        <p style="font-weight: 600">
                            Detail Advertisement
                            <span>
                                <a
                                    href="images/advertisement.pdf"
                                    target="_blank"
                                >
                                    <i class="fa fa-download"></i>
                                </a>
                            </span>
                        </p>

                        <p style="font-weight: 600">
                            Application Start Date : 04.01.2021
                        </p>
                        <p style="font-weight: 600">
                            Application End Date : 19.01.2021
                        </p>
                    </div>
                    <br />
                    <table class="table">
                        <tr class="text-center tr-background">
                            <th>Post Code</th>
                            <th>Programme</th>
                            <th>Name of Posts</th>

                            <th>Apply Link</th>
                        </tr>
                        <tr
                            class="text-center"
                            v-for="post in posts"
                            :key="post.id"
                        >
                            <th>{{ post.vacancy_no }}</th>
                            <th>{{ post.programme }}</th>
                            <th>{{ post.name_of_post }}</th>
                            <th>
                                <router-link to="/login" class="routerlink"
                                    >Apply Link</router-link
                                >
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { global } from "../global";
export default {
    data() {
        return {
            posts: null
        };
    },
    methods: {},
    created() {
        axios
            .get(global.apiUrl + "get_all_job_posts")
            .then(res => {
                this.posts = res.data.job_posts;
            })
            .catch(errors => {
                console.log(errors);
            });
    },
    // computed:{
    //   post(){
    //     return Object.values(Object.keys(this.programme));
    //   }
    // },
    mounted() {
        axios
            .get(global.apiUrl + "get_all_job_posts")
            .then(res => {
                this.posts = res.data.job_posts;
            })
            .catch(errors => {
                console.log(errors);
            });
    }
};
</script>
<style scoped>
.career-content {
    margin-top: 40px;
    text-align: center;
}
.career-content .row .border-custom {
    border: 1px solid #1e4d92;
    box-shadow: 1px 1px 8px 1px grey;
    padding: 35px;
}
.tr-background {
    background: #d2d2d28c;
}
tr th {
    border: none;
    font-size: 14px;
}
.routerlink {
    text-decoration: none;
}
</style>
