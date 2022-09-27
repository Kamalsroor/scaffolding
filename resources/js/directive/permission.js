// import { useAuthStore } from "@/V2/stores/auth.store.js";

export default {
  // created(el, binding, vnode, prevVnode) {
  //   console.log('created');
  //   // see below for details on arguments
  // },
  // called right before the element is inserted into the DOM.
  // beforeMount() {},
  // called when the bound element's parent component
  // and all its children are mounted.
  mounted() {
    // console.log('mounted');

  },
  // called before the parent component is updated
  beforeUpdate() {
    // console.log('beforeUpdate');

  },
  // called after the parent component and
  // all of its children have updated
  // updated() {
  //   console.log('updated');


  // },
  // called before the parent component is unmounted
  beforeUnmount() {
    // console.log('beforeUnmount');

  },
  // called when the parent component is unmounted
  unmounted() {
    // console.log('unmounted');
  },
  delay(time) {
    return new Promise(resolve => setTimeout(resolve, time));
  },

  async created(el, binding, vnode) {
    // console.log('hi' ,binding , el);
    const { value } = binding;
    // const checkLoding = useAuthStore().checkLoding;
    // if(checkLoding){
    //   await new Promise(resolve => setTimeout(resolve, 150));
    //   if(useAuthStore().checkLoding){
    //     await new Promise(resolve => setTimeout(resolve, 1000));
    //   }
    // }
    // console.log(value);
    if (value && value instanceof Array && value.length > 0) {
    //   const checkPermission = useAuthStore().checkPermission(value).then((response) => {
    //     if (!response) {
    //       const comment = document.createComment(' ');
    //       Object.defineProperty(comment, 'setAttribute', {
    //         value: () => undefined,
    //       });
    //       vnode.elm = comment;
    //       vnode.text = ' ';
    //       vnode.isComment = true;
    //       vnode.context = undefined;
    //       vnode.tag = undefined;
    //       // vnode.data.directives = undefined;

    //       if (vnode.componentInstance) {
    //         vnode.componentInstance.$el = comment;
    //       }

    //       if (el.parentNode) {
    //         el.parentNode.replaceChild(comment, el);
    //       }

    //       // console.log(el , vnode , vnode.el);
    //       // vnode.el.parentElement.removeChild(vnode.el)
    //       // vnode.el.remove()
    //     }
    //   });

    } else {
      // console.log(value);
      // throw new Error(`Permissions are required! Example: v-can="['manage user','manage permission']"`);
    }
  },

  async updated(el, binding, vnode) {
    // console.log('hi2',binding , el);

    const { value } = binding;
    // const checkLoding = useAuthStore().checkLoding;
    // if(checkLoding){
    //   await new Promise(resolve => setTimeout(resolve, 150));
    //   if(useAuthStore().checkLoding){
    //     await new Promise(resolve => setTimeout(resolve, 1000));
    //   }
    // }
    if (value && value instanceof Array && value.length > 0) {
    //   const checkPermission = useAuthStore().checkPermission(value).then((response) => {
    //     if (!response) {
    //       const comment = document.createComment(' ');
    //       Object.defineProperty(comment, 'setAttribute', {
    //         value: () => undefined,
    //       });
    //       vnode.elm = comment;
    //       vnode.text = ' ';
    //       vnode.isComment = true;
    //       vnode.context = undefined;
    //       vnode.tag = undefined;
    //       // vnode.data.directives = undefined;

    //       if (vnode.componentInstance) {
    //         vnode.componentInstance.$el = comment;
    //       }

    //       if (el.parentNode) {
    //         el.parentNode.replaceChild(comment, el);
    //       }

    //       // console.log(el , vnode , vnode.el);
    //       // vnode.el.parentElement.removeChild(vnode.el)
    //       // vnode.el.remove()
    //     }
    //   });

    } else {
      // console.log(value);
      // throw new Error(`Permissions are required! Example: v-can="['manage user','manage permission']"`);
    }
  },
};

