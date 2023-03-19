import store from '@/store';

export default {
   // created(el, binding, vnode, prevVnode) {
  //   // console.log('created');
  //   // see below for details on arguments
  // },
  // called right before the element is inserted into the DOM.
  // beforeMount() {},
  // called when the bound element's parent component
  // and all its children are mounted.
  mounted() {
    // // console.log('mounted');

  },
  // called before the parent component is updated
  beforeUpdate() {
    // // console.log('beforeUpdate');

  },
  // called after the parent component and
  // all of its children have updated
  // updated() {
  //   // console.log('updated');


  // },
  // called before the parent component is unmounted
  beforeUnmount() {
    // // console.log('beforeUnmount');

  },
  // called when the parent component is unmounted
  unmounted() {
    // // console.log('unmounted');
  },
  delay(time) {
    return new Promise(resolve => setTimeout(resolve, time));
  },

  async created(el, binding, vnode) {
    const { value } = binding;



    if (value && value instanceof Array && value.length > 0) {

      if(!store.state.permissions.isLoding){
        const requiredPermissions = value;
        const permissions = store.state.permissions.permissions;
        console.log('created 1, value : ' , value);
        const hasPermission = permissions.some(permission => {
          return requiredPermissions.includes(permission);
        });

        if (!hasPermission) {
        console.log('created 2, value : ' , value);
          const comment = document.createComment(' ');
          Object.defineProperty(comment, 'setAttribute', {
            value: () => undefined,
          });
          vnode.elm = comment;
          vnode.text = ' ';
          vnode.isComment = true;
          vnode.context = undefined;
          vnode.tag = undefined;
          // vnode.data.directives = undefined;
          console.log('created 3, value : ' , value);
          if (vnode.componentInstance) {
            vnode.componentInstance.$el = comment;
          }
          console.log('created 4, value : ' , value , el);
          if(!el.parentNode){
            do {
              await new Promise(resolve => setTimeout(resolve, 5));
            } while (!el.parentNode);
          }

          if (el.parentNode) {
            console.log('created 5, value : ' , value , el);

            el.parentNode.replaceChild(comment, el);
          }

        }
      }

    } else {
      throw new Error(`Permissions are required! Example: v-permission="['manage user','manage permission']"`);
    }

  },

  async updated(el, binding, vnode) {
    const { value } = binding;



    if (value && value instanceof Array && value.length > 0) {

      if(!store.state.permissions.isLoding){
        const requiredPermissions = value;
        const permissions = store.state.permissions.permissions;
        console.log('update 1, value : ' , value);
        const hasPermission = permissions.some(permission => {
          return requiredPermissions.includes(permission);
        });
        console.log('update 2, value : ' , value);

        if (!hasPermission) {
          console.log('update 3, value : ' , value);

          const comment = document.createComment(' ');
          Object.defineProperty(comment, 'setAttribute', {
            value: () => undefined,
          });
          vnode.elm = comment;
          vnode.text = ' ';
          vnode.isComment = true;
          vnode.context = undefined;
          vnode.tag = undefined;
          // vnode.data.directives = undefined;

          if (vnode.componentInstance) {
            vnode.componentInstance.$el = comment;
          }
          console.log('update 4, value : ' , value , el);

          if (el.parentNode) {
            console.log('update 5, value : ' , value , el);
            el.parentNode.replaceChild(comment, el);
          }

          // // console.log(el , vnode , vnode.el);
          // vnode.el.parentElement.removeChild(vnode.el)
          // vnode.el.remove()

          // console.log('hi kamal' , value , hasPermission , el);
          // el.parentNode && el.parentNode.removeChild(el);
        }
      }

    } else {
      throw new Error(`Permissions are required! Example: v-permission="['manage user','manage permission']"`);
    }

  },


  inserted(el, binding, vnode) {
    console.log('hi kamal');
    const { value } = binding;
    const permissions = store.getters && store.getters.permissions;

    if (value && value instanceof Array && value.length > 0) {
      const requiredPermissions = value;
      const hasPermission = permissions.some(permission => {
        return requiredPermissions.includes(permission);
      });

      if (!hasPermission) {
        el.parentNode && el.parentNode.removeChild(el);
      }
    } else {
      throw new Error(`Permissions are required! Example: v-permission="['manage user','manage permission']"`);
    }
  },
};
