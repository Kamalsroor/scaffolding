import dom from "@left4code/tw-starter/dist/js/dom";
import {mapActions} from 'vuex'

// Setup side menu
const findActiveMenu = (subMenu, route) => {
  let match = false;
  subMenu.forEach((item) => {
    if (
      ((route.forceActiveMenu !== undefined &&
        item.pageName === route.forceActiveMenu) ||
        (route.forceActiveMenu === undefined &&
          item.pageName === route.name)) &&
      !item.ignore
    ) {
      match = true;
    } else if (!match && item.subMenu) {
      match = findActiveMenu(item.subMenu, route);
    }
  });
  return match;
};

// Setup side menu
const findParmasInMenu = (menu, route) => {
  let match = false;
  if(menu.params !== undefined){
    for (const [key, value] of Object.entries(menu.params)) {
      if(route.params[key]){
        match = route.params[key] === value;
      }
    }
  }
  return match;
};
function isEmpty(object) {
  for (const property in object) {
    return false;
  }
  return true;
}



const nestedMenu = (menu, route , permissions , server) => {
  menu.forEach((item, key) => {
    if (typeof item !== "string") {
      let menuItem = menu[key];
      menuItem.active =
        ((route.forceActiveMenu !== undefined &&
          item.pageName === route.forceActiveMenu) ||
          (route.forceActiveMenu === undefined &&
            item.pageName === route.name && isEmpty(route.params) ) ||
          (route.forceActiveMenu === undefined && !isEmpty(route.params) && item.params !== undefined &&
              item.pageName === route.name && findParmasInMenu(item , route)) ||
          (item.subMenu && findActiveMenu(item.subMenu, route))) &&
        !item.ignore;
        menuItem.show = true;
        if(permissions && permissions instanceof Array && permissions.length > 0 && menuItem.permission){
          // console.log(perimssions);

          const requiredPermissions = menuItem.permission;
          const hasPermission = permissions.some(permission => {
            return requiredPermissions.includes(permission);
          });

          if(!hasPermission){
            menuItem.show = false;
          }
        // const checkPermission = useAuthStore().checkPermission(menuItem.permission).then((responses) => {
        // });
      }
      if(server && menuItem.server){
          if(menuItem.server != "all" && menuItem.server instanceof Array && menuItem.server.length > 0){
            const hasServer = menuItem.server.includes(server);
            if(!hasServer){
              menuItem.show = false;
            }
          }
      }
      if (item.subMenu) {
        menuItem.activeDropdown = findActiveMenu(item.subMenu, route);
        menuItem = {
          ...item,
          ...nestedMenu(item.subMenu, route ,permissions,server),
        };
      }
    }
  });

  return menu;
};

const linkTo = (menu, router, event) => {
  console.log('linkTo12');

  if (menu.subMenu) {
    menu.activeDropdown = !menu.activeDropdown;
  } else if(menu.query &&  menu.params){

    event.preventDefault();
    router.replace({
      name: menu.pageName,
      params: menu.params,
      query: menu.query,
    });

  } else if(menu.query){

    event.preventDefault();
    router.replace({
      name: menu.pageName,
      query: menu.query
    });

  } else if(menu.params){

    event.preventDefault();
    router.replace({
      name: menu.pageName,
      params: menu.params
    });
  }else {
    event.preventDefault();
    router.push({
      name: menu.pageName,
    });
  }
};

const enter = (el, done) => {
  dom(el).slideDown(300);
};

const leave = (el, done) => {
  dom(el).slideUp(300);
};

export { nestedMenu, linkTo, enter, leave };
