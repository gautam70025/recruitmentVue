import { global } from "../global.js";
import Nprogress from "nprogress";
import "nprogress/nprogress.css";
// const config = {
//     headers: { Authorization: `Bearer localStorage.getItem("gToken")` }
// };
let actions = {
    register({ commit }, registerData) {
        return new Promise((resolve, reject) => {
            axios
                .post(global.apiUrl + "register", registerData)
                .then(res => {
                    if (res.data.statusCode == 422) {
                        commit("REGISTER_EMAIL_ERR", res.data.message);
                        Nprogress.done();
                        console.log(422);
                        reject(res);
                    } else {
                        commit("REGISTER");
                        resolve(res);
                    }
                })
                .catch(errors => {
                    Nprogress.done();
                    if (errors.response.status == 422) {
                        commit("REGISTER_ERR", {
                            error: errors.response.data
                        });
                    }

                    reject(errors);
                });
        });
    },
    login({ commit }, loginData) {
        return new Promise((resolve, reject) => {
            axios
                .post(global.apiUrl + "login", loginData)
                .then(res => {
                    // console.log(res.data.statusCode);
                    if (res.data.statusCode == 200) {
                        const token = res.data.accessToken;
                        const user = res.data.user;
                        localStorage.setItem("gToken", token);
                        axios.defaults.headers.common[
                            "Authorization"
                        ] = `Bearer ${token}`;
                        localStorage.setItem("gUser", JSON.stringify(user));
                        commit("LOGIN", {
                            user,
                            token
                        });
                        resolve(res);
                    } else {
                        Nprogress.done();

                        commit("AUTH_ERROR", res.data.message);
                        // console.log(res.datamessage);
                        localStorage.removeItem("gToken");
                        reject(res);
                    }
                })
                .catch(err => {
                    console.log(err.response);
                    commit("AUTH_ERROR", err.response.data);
                    localStorage.removeItem("gToken");
                    localStorage.removeItem("gUser");
                    reject(err);
                });
        });
    },
    logout({ commit }) {
        return new Promise((resolve, reject) => {
            commit("LOGOUT");

            localStorage.removeItem("gToken");
            localStorage.removeItem("gUser");
            delete axios.defaults.headers.common["Authorization"];
            resolve();
        }).catch(err => {
            reject(err);
        });
    },
    personalInformationSave({ commit }, formData) {
        return new Promise((resolve, reject) => {
            axios
                .post(global.apiUrl + "personal_info_save", formData)
                .then(res => {
                    if (res.data.statusCode == 200) {
                        commit("PERSONAL_INFORMATION_SAVE");
                        resolve(res);
                        Nprogress.done();
                    } else {
                        reject(res);
                    }
                })
                .catch(errors => {
                    Nprogress.done();
                    console.log(errors.response);
                    if (errors.response.status == 422) {
                        commit("PERSONAL_INFORMATION_ERR", {
                            error: errors.response.data
                        });
                    }

                    reject(errors);
                });
        });
    },
    languageProficiencySave({ commit }, formData) {
        return new Promise((resolve, reject) => {
            axios
                .post(global.apiUrl + "language_proficiency_save", formData)
                .then(res => {
                    if (res.data.statusCode == 200) {
                        commit("LANGUAGE_PROFICIENCY_SAVE");
                        resolve(res);
                        Nprogress.done();
                    } else {
                        reject(res);
                    }
                })
                .catch(errors => {
                    Nprogress.done();
                    console.log(errors.response);
                    if (errors.response.status == 422) {
                        commit("LANGUAGE_PROFICIENCY_ERR", {
                            error: errors.response.data
                        });
                    }

                    reject(errors);
                });
        });
    },
    educationalQualificationSave({ commit }, formData) {
        return new Promise((resolve, reject) => {
            axios
                .post(
                    global.apiUrl + "educational_qualification_save",
                    formData
                )
                .then(res => {
                    if (res.data.statusCode == 200) {
                        commit("EDUCATIONAL_QUALIFICATION_SAVE");
                        resolve(res);
                        Nprogress.done();
                    } else {
                        reject(res);
                    }
                })
                .catch(errors => {
                    Nprogress.done();
                    console.log(errors.response);
                    if (errors.response.status == 422) {
                        commit("EDUCATIONAL_QUALIFICATION_ERR", {
                            error: errors.response.data
                        });
                    }

                    reject(errors);
                });
        });
    },
    computerKnowledgeSave({ commit }, formData) {
        return new Promise((resolve, reject) => {
            axios
                .post(global.apiUrl + "computer_knowledge_save", formData)
                .then(res => {
                    if (res.data.statusCode == 200) {
                        commit("COMPUTER_KNOWLEDGE_SAVE");
                        resolve(res);
                        Nprogress.done();
                    } else {
                        reject(res);
                    }
                })
                .catch(errors => {
                    Nprogress.done();
                    console.log(errors.response);
                    if (errors.response.status == 422) {
                        commit("COMPUTER_KNOWLEDGE_ERR", {
                            error: errors.response.data
                        });
                    }

                    reject(errors);
                });
        });
    },
    workExperienceSave({ commit }, formData) {
        return new Promise((resolve, reject) => {
            axios
                .post(global.apiUrl + "work_experience_save", formData, {
                    headers: {
                        "Content-Type": "multipart/form-data"
                    }
                })
                .then(res => {
                    if (res.data.statusCode == 200) {
                        commit("WORK_EXPERIENCE_SAVE");
                        resolve(res);
                        Nprogress.done();
                    } else {
                        reject(res);
                    }
                })
                .catch(errors => {
                    Nprogress.done();
                    // console.log('workexper',errors.response.data.errors);
                    if (errors.response.status == 422) {
                        commit("WORK_EXPERIENCE_ERR", {
                            error: errors.response.data
                        });
                    }

                    reject(errors);
                });
        });
    },
    documentSave({ commit }, formData) {
        return new Promise((resolve, reject) => {
            axios
                .post(global.apiUrl + "document_save", formData)
                .then(res => {
                    if (res.data.statusCode == 200) {
                        commit("DOCUMENT_SAVE");
                        resolve(res);
                        Nprogress.done();
                    } else {
                        reject(res);
                    }
                })
                .catch(errors => {
                    Nprogress.done();
                    // console.log('workexper',errors.response.data.errors);
                    if (errors.response.status == 422) {
                        commit("DOCUMENT_ERR", {
                            error: errors.response.data
                        });
                    }

                    reject(errors);
                });
        });
    },
    finalSubmit({ commit }, formData) {
        return new Promise((resolve, reject) => {
            axios
                .post(global.apiUrl + "final_submit", formData)
                .then(res => {
                    if (res.data.statusCode == 200) {
                        commit("FINAL_SUBMIT");
                        resolve(res);
                        Nprogress.done();
                    } else {
                        reject(res);
                    }
                })
                .catch(errors => {
                    Nprogress.done();
                    // console.log('workexper',errors.response.data.errors);
                    if (errors.response.status == 422) {
                        commit("FINAL_ERR", {
                            error: errors.response.data
                        });
                    }

                    reject(errors);
                });
        });
    },
    changeStep({ commit }, next) {
        // console.log('next',next);
        return new Promise((resolve, reject) => {
            axios
                .post(global.apiUrl + "change_step", next)
                .then(res => {
                    Nprogress.done();
                    if (res.data.statusCode == 200) {
                        localStorage.setItem(
                            "gUser",
                            JSON.stringify(res.data.user)
                        );
                        commit("CHANGESTEP", res.data.user);
                        resolve(res);
                    }
                })
                .catch(errors => {
                    reject(errors);
                });
        });
    },
    getPersonalInfo({ commit, state }) {
        // console.log('next',next);
        return new Promise((resolve, reject) => {
            axios
                .get(
                    global.apiUrl + "get_personal_info?user_id=" + state.user.id
                )
                .then(res => {
                    if (res.data.statusCode == 200) {
                        commit("GETPERSONALINFO", res.data.personal_details);
                        resolve(res);
                    }
                })
                .catch(errors => {
                    reject(errors);
                });
        });
    },
    checkIfApplied({ commit, state }) {
        // console.log('next',next);
        return new Promise((resolve, reject) => {
            axios
                .get(
                    global.apiUrl + "check_if_applied?user_id=" + state.user.id
                )
                .then(res => {
                    if (res.data.statusCode == 200) {
                        state.isApplied = res.data.checkApplied;
                        // commit("GETPERSONALINFO", res.data.personal_details);
                        resolve(res);
                    }
                })
                .catch(errors => {
                    reject(errors);
                });
        });
    },
    getJobPosts({ commit }) {
        // console.log('next',next);
        return new Promise((resolve, reject) => {
            axios
                .get(global.apiUrl + "get_job_posts")
                .then(res => {
                    if (res.data.statusCode == 200) {
                        commit("GETJOBPOSTS", res.data.job_posts);
                        resolve(res);
                    }
                })
                .catch(errors => {
                    reject(errors);
                });
        });
    }
};
export default actions;
