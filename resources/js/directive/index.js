import permission from './permission';

const install = function(Vue) {
  console.log('install');
  Vue.directive('permission', permission);
};

if (window.Vue) {
  window['permission'] = permission;
  Vue.use(install); // eslint-disable-line
}
console.log('tsets');

permission.install = install;
export default permission;
