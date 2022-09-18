import { createStore } from 'vuex'
import createPersistedState from 'vuex-persistedstate'
import auth from '@/store/auth'
import darkMode from '@/store/dark-mode'
import mainMenu from '@/store/main-menu'
const store = createStore({
    plugins:[
        createPersistedState()
    ],
    modules:{
        auth,
        darkMode,
        mainMenu,
    }
})
export default store
