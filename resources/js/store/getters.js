let getters = {
    isLoggedIn: state => {
        return state.token;
    },

    user: state => {
        return state.user;
    }
};
export default getters;
