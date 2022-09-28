import {useI18n} from 'vue-i18n';


/**
 * Simulate a login
 * @param {string} a
 * @param {string} p
 */
function translate(string, opject) {
    return string;
  const {t} = useI18n();
  return t(string, opject);
}



export default {
    namespaced: true,
    state:{
        menu: [],
    },
    getters: {
        getMenu (state) {
          return state.menu
        }
    },
    mutations:{
        SET_MenuList (state, value) {
            state.menu = value
        },
    },
    actions:{
        setMenuList() {
            commit('SET_MenuList',[
                // "OVERVIEW",
                {
                    icon: "MonitorIcon",
                    pageName: "dashboard",
                    title: "Event Dashboard",
                    // permission:['test']
                },
                {
                    icon: "ListIcon",
                    pageName: "admins",
                    title: "Admins",
                    subMenu: [
                    {
                        pageName: "admins",
                        title: translate('admins.plural'),
                        permission: ['list-admin'],
                    },
                    ]
                },
            ])

            // this.menu = list;
        },
    }





}


//
// subMenu: [
//   {
//     icon: "",
//     pageName: "dashboard-overview-1",
//     title: "Overview 1",
//   },
// ],
