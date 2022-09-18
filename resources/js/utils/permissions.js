//create v-can directive
const can =  {
  bind(el, binding, vnode) {
    if (! JSON.parse(localStorage.getItem('permissions'))
        .includes(binding.expression
          .replace(/'/g, "")
            .replace(/"/g, ""))) {
      vnode.elm.style.display = "none";
    }
  },
  unbind() {

  },
}

export default can


