import { createStore } from 'vuex'
import createPersistedState from 'vuex-persistedstate'
import auth from '@/store/auth'
import darkMode from '@/store/dark-mode'
import mainMenu from '@/store/main-menu-new'
import settings from '@/store/settings'
import permissions from '@/store/permissions'
const store = createStore({
    plugins:[
        createPersistedState()
    ],
    modules:{
        auth,
        darkMode,
        mainMenu,
        settings,
        permissions
    }
})
export default store
