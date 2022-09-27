// import dayjs from "dayjs";
// import duration from "dayjs/plugin/duration";
// import { useSettingStore } from "@/V2/stores/settings.store.js";
import { createToast, withProps } from 'mosha-vue-toastify';

import CustomSuccessNotification from "@/global-components/notification/successNotification.vue";

// dayjs.extend(duration);

const helpers = {
  cutText(text, length) {
    if (text.split(" ").length > 1) {
      const string = text.substring(0, length);
      const splitText = string.split(" ");
      splitText.pop();
      return splitText.join(" ") + "...";
    } else {
      return text;
    }
  },
  notify(title = '' , message = ''){
    createToast(withProps(CustomSuccessNotification , { title: title , message: message , type: 'success' }) , {transition:'slide', type: 'success' , position : 'bottom-right' , timeout : 7000})
  },
  errorNotify(title = '' , message = ''){
    createToast(withProps(CustomSuccessNotification , { title: title , message: message , type: 'danger' }) , {transition:'slide', type: 'danger' , position : 'bottom-right' , timeout : 7000})
  },
  checkBoolean(value){
    if(value == true || value == 'true' || value == 1){
      return true;
    }else if(value == false || value == 'false' || value == 0){
      return false;
    }
 },
  formatDate(date, format) {
    return dayjs(date).format(format);
  },
  capitalizeFirstLetter(string) {
    if (string) {
      return string.charAt(0).toUpperCase() + string.slice(1);
    } else {
      return "";
    }
  },
  snakeCaseToWord(string) {
    return string.split('_').map(s => s.charAt(0).toUpperCase() + s.slice(1)).join(' ');
  },

  WordToSnakeCase(string) {
    return string.split(' ').map(s => s.charAt(0).toLowerCase() + s.slice(1)).join('_');
  },
  toKebabCase(string){
    return string!= null && string
    .match(/[A-Z]{2,}(?=[A-Z][a-z]+[0-9]*|\b)|[A-Z]?[a-z]+[0-9]*|[A-Z]|[0-9]+/g)
    .map(s => s.toLowerCase())
    .join('-');
  },
  onlyNumber(string) {
    if (string) {
      return string.replace(/\D/g, "");
    } else {
      return "";
    }
  },
  formatCurrency(number) {
    if (number) {
      const formattedNumber = number.toString().replace(/\D/g, "");
      const rest = formattedNumber.length % 3;
      let currency = formattedNumber.substr(0, rest);
      const thousand = formattedNumber.substr(rest).match(/\d{3}/g);
      let separator;

      if (thousand) {
        separator = rest ? "," : "";
        currency += separator + thousand.join(".");
      }

      return currency;
    } else {
      return "";
    }
  },
  timeAgo(time) {
    const date = new Date(
      (time || "").replace(/-/g, "/").replace(/[TZ]/g, " ")
    );
    const diff = (new Date().getTime() - date.getTime()) / 1000;
    const dayDiff = Math.floor(diff / 86400);

    if (isNaN(dayDiff) || dayDiff < 0 || dayDiff >= 31) {
      return dayjs(time).format("MMMM DD, YYYY");
    }

    return (
      (dayDiff === 0 &&
        ((diff < 60 && "just now") ||
          (diff < 120 && "1 minute ago") ||
          (diff < 3600 && Math.floor(diff / 60) + " minutes ago") ||
          (diff < 7200 && "1 hour ago") ||
          (diff < 86400 && Math.floor(diff / 3600) + " hours ago"))) ||
      (dayDiff === 1 && "Yesterday") ||
      (dayDiff < 7 && dayDiff + " days ago") ||
      (dayDiff < 31 && Math.ceil(dayDiff / 7) + " weeks ago")
    );
  },
  diffTimeByNow(time) {
    const startDate = dayjs(dayjs().format("YYYY-MM-DD HH:mm:ss").toString());
    const endDate = dayjs(dayjs(time).format("YYYY-MM-DD HH:mm:ss").toString());

    const duration = dayjs.duration(endDate.diff(startDate));
    const milliseconds = Math.floor(duration.asMilliseconds());

    const days = Math.round(milliseconds / 86400000);
    const hours = Math.round((milliseconds % 86400000) / 3600000);
    let minutes = Math.round(((milliseconds % 86400000) % 3600000) / 60000);
    const seconds = Math.round(
      (((milliseconds % 86400000) % 3600000) % 60000) / 1000
    );

    if (seconds < 30 && seconds >= 0) {
      minutes += 1;
    }

    return {
      days: days.toString().length < 2 ? "0" + days : days,
      hours: hours.toString().length < 2 ? "0" + hours : hours,
      minutes: minutes.toString().length < 2 ? "0" + minutes : minutes,
      seconds: seconds.toString().length < 2 ? "0" + seconds : seconds,
    };
  },
  isset(obj) {
    if (obj !== null && obj !== undefined) {
      if (typeof obj === "object" || Array.isArray(obj)) {
        return Object.keys(obj).length;
      } else {
        return obj.toString().length;
      }
    }

    return false;
  },
  toRaw(obj) {
    return JSON.parse(JSON.stringify(obj));
  },
  randomNumbers(from, to, length) {
    const numbers = [0];
    for (let i = 1; i < length; i++) {
      numbers.push(Math.ceil(Math.random() * (from - to) + to));
    }

    return numbers;
  },

  getSettingByName(group, attr, section = null, defaultValue = null) {
    // if(!useSettingStore().checkLoding){
    //   if (section) {
    //     return useSettingStore().currentSettings[group][attr] != 'undefined' && useSettingStore().currentSettings[group][section][attr] != null && useSettingStore().currentSettings[group][section][attr] != '' ? useSettingStore().currentSettings[group][section][attr] : defaultValue;
    //   } else {
    //     return useSettingStore().currentSettings[group][attr] != 'undefined' && useSettingStore().currentSettings[group][attr] != null && useSettingStore().currentSettings[group][attr] != '' ? useSettingStore().currentSettings[group][attr] : defaultValue;
    //   }
    // }
    return defaultValue;
  },
  toRGB(colors) {
    const tempColors = Object.assign({}, colors);
    const rgbColors = Object.entries(tempColors);
    for (const [key, value] of rgbColors) {
      if (typeof value === "string") {
        if (value.replace("#", "").length == 6) {
          const aRgbHex = value.replace("#", "").match(/.{1,2}/g);
          tempColors[key] = (opacity = 1) =>
            `rgb(${parseInt(aRgbHex[0], 16)} ${parseInt(
              aRgbHex[1],
              16
            )} ${parseInt(aRgbHex[2], 16)} / ${opacity})`;
        }
      } else {
        tempColors[key] = helpers.toRGB(value);
      }
    }
    return tempColors;
  },
};

const install = (app) => {
  app.config.globalProperties.$h = helpers;
};

export { install as default, helpers as helper };
