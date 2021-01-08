import Home from "./components/Home.vue";
import Register from "./components/Register.vue";
import Login from "./components/Login.vue";
import Career from "./components/Career.vue";
import Contact from "./components/Contact.vue";
import RecruitmentForm from "./components/RecruitmentForm.vue";
import Acknowledgement from "./components/Acknowledgement.vue";
import AcknowledgementPdf from "./components/AcknowledgementPdf.vue";

export const routes = [
    // { path: "/", component: Home },
    { path: "/", component: Career },
    {
        path: "/register",
        component: Register,
        meta: {
            hideForAuth: true,
            hideHeader: true
        }
    },
    {
        path: "/login",
        component: Login,
        meta: {
            hideForAuth: true,
            hideHeader: true
        }
    },
    {
        path: "/career",
        component: Career
    },
    {
        path: "/contact",
        component: Contact
    },
    {
        path: "/recruitment_form",
        component: RecruitmentForm,
        meta: {
            requiresAuth: true,
            hideHeader: true
        }
    },
    {
        path: "/acknowledgement",
        component: Acknowledgement,
        meta: {
            requiresAuth: true,
            hideHeader: true
        }
    },
    {
        name: "acknowledgementPdf",
        path: "/acknowledgementPdf",
        // path: "/acknowledgementPdf/:app_no",
        component: AcknowledgementPdf,
        meta: {
            requiresAuth: true,
            hideHeader: true
        },
        props: true
    }
    // {
    //     path: "/personal_information",
    //     component: PersonalInformation,
    //     meta: {
    //         requiresAuth: true,
    //         hideHeader: true
    //     }
    // }
];
