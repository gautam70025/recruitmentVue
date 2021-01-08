let mutations = {
    REGISTER(state) {
        state.register_status = "success";
    },
    REGISTER_ERR(state, errors) {
        state.register_status = "error";
        state.register_errors = errors.error.errors;
    },
    REGISTER_EMAIL_ERR(state, message) {
        state.register_email_errors = message;
    },
    AUTH_ERROR(state, errors) {
        state.login_status = "Authentication Failed";
        state.login_errors = errors;
        // console.log("muta", errors);
    },
    LOGIN(state, { user, token }) {
        state.login_status = "Successfully Login";
        state.token = token;
        state.user = user;
        // console.log("user", state.user);
    },
    LOGOUT(state) {
        state.token = "";
        state.user = {};
        state.login_status = "";
    },
    PERSONAL_INFORMATION_SAVE(state) {
        state.personal_information_status = "success";
    },
    PERSONAL_INFORMATION_ERR(state, errors) {
        state.personal_information_status = "error";
        state.personal_information_errors = errors.error.errors;
    },
    CHANGESTEP(state, user) {
        state.user = user;
    },
    GETPERSONALINFO(state, personalInfo) {
        state.personalInfo = personalInfo;
    },
    LANGUAGE_PROFICIENCY_SAVE(state) {
        state.language_proficiency_status = "success";
    },
    LANGUAGE_PROFICIENCY_ERR(state, errors) {
        state.language_proficiency_status = "error";
        state.language_proficiency_errors = errors.error.errors;
    },
    GETJOBPOSTS(state, posts) {
        state.jobPosts = posts;
        console.log("pos", state.jobPosts);
    },
    EDUCATIONAL_QUALIFICATION_SAVE(state) {
        state.educational_qualification_status = "success";
    },
    EDUCATIONAL_QUALIFICATION_err(state, errors) {
        state.educational_qualification_status = "error";
        state.educational_qualification_errors = errors.error.errors;
    },
    COMPUTER_KNOWLEDGE_SAVE(state) {
        state.computer_knowledge_status = "success";
    },
    COMPUTER_KNOWLEDGE_ERR(state, errors) {
        state.computer_knowledge_status = "error";
        state.computer_knowledge_errors = errors.error.errors;
    },
    WORK_EXPERIENCE_SAVE(state) {
        state.work_experience_status = "success";
    },
    WORK_EXPERIENCE_ERR(state, errors) {
        state.work_experience_status = "error";
        state.work_experience_errors = errors.error.errors;
    },
    DOCUMENT_SAVE(state) {
        state.document_save_status = "success";
    },
    DOCUMENT_ERR(state, errors) {
        state.document_save_status = "error";
        state.document_save_errors = errors.error.errors;
    },
    FINAL_SUBMIT(state) {
        state.final_status = "success";
    },
    FINAL_ERR(state, errors) {
        state.final_status = "error";
        state.final_errors = errors.error.errors;
    }
};
export default mutations;
