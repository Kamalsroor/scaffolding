// import Vue from 'vue';
import { createI18n } from 'vue-i18n'
import messages from '../translations';

// Vue.use(VueI18n);
// export const i18n = new createI18n({
//   locale: 'en',
//   fallbackLocale: 'en',
//   messages,
// });



export function getLanguage() {
  const chooseLanguage = Cookies.get('language');
  if (chooseLanguage) {
    return chooseLanguage;
  }

  // if has not choose language
  const language = (navigator.language || navigator.browserLanguage).toLowerCase();
  const locales = Object.keys(messages);
  for (const locale of locales) {
    if (language.indexOf(locale) > -1) {
      return locale;
    }
  }
  return 'en';
}


const instance = createI18n({
    legacy: false, // you must set `false`, to use Composition API
    locale: 'en', // set locale
    fallbackLocale: 'en', // set fallback locale
    messages,
    // something vue-i18n options here ...
  });

  
export default instance;

export const i18n = instance.global;

// export const i18n = createI18n({
//   locale: 'en', // set locale
//   fallbackLocale: 'en', // set fallback locale
//   messages,
//   // something vue-i18n options here ...
// })

// export const i18n = instance.global;
