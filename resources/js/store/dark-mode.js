export default {
    namespaced: true,
    state:{
        darkModeValue: localStorage.getItem("darkMode") === "true",
    },
    getters:{
        darkMode(state) {
            if (localStorage.getItem("darkMode") === null) {
              localStorage.setItem("darkMode", false);
            }

            return state.darkModeValue;
        },
    },
    mutations:{
        SET_DARKMODEVALUE (state, value) {
            state.darkModeValue = value
        },
    },
    actions:{
        setDarkMode(darkMode) {
            localStorage.setItem("darkMode", darkMode);
            commit('SET_DARKMODEVALUE',darkMode)

            this.darkModeValue = darkMode;
        },
    }
}
