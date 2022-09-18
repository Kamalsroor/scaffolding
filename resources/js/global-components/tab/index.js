import {
  h,
  defineComponent,
  resolveDirective,
  withDirectives,
  provide,
  inject,
} from "vue";
import dom from "@left4code/tw-starter/dist/js/dom";
import "@left4code/tw-starter/dist/js/tab";

const init = (el, { props, emit }) => {
  const tabPanels = dom(el).find(".tab-content").first();
  const tabPanes = dom(tabPanels).children(".tab-pane");
  const tabList = [];
  const ids = [];

  dom(el)
    .find(".nav")
    .each(function () {
      if (dom(this).closest(".tab-content")[0] !== tabPanels[0]) {
        tabList.push(this);
      }
    });

  tabList.forEach((node) => {
    dom(node)
      .find(".nav-item")
      .each(function (key, el) {
        let id = "_" + Math.random().toString(36).substr(2, 9);
        if (ids[key] !== undefined) {
          id = ids[key];
        } else {
          ids[key] = id;
        }

        dom(this)
          .find(".nav-link")
          .attr({
            "data-tw-target": `#${id}`,
            "aria-controls": id,
            "aria-selected": false,
          });

        if (tabPanes[key] !== undefined) {
          dom(tabPanes[key]).attr({
            id: id,
            "aria-labelledby": `${id}-tab`,
          });
        }
        console.log('key : ' ,key );
        if (key === props.selectedIndex) {
          const tab = tailwind.Tab.getOrCreateInstance(
            dom(el).find(".nav-link")[0]
          );
          tab.show();
          dom(tabPanes).removeAttr("style");
        }

        const navLink = dom(el).find(".nav-link")[0];
        if (navLink["__initiated"] === undefined) {
          navLink["__initiated"] = true;

          navLink.addEventListener("show.tw.tab", () => {
            emit("change", key);
          });
        }
      });
  });
};

// Tab wrapper
const TabGroup = defineComponent({
  name: "TabGroup",
  props: {
    selectedIndex: {
      type: Number,
      default: 0,
    },
    tag: {
      type: String,
      default: "div",
    },
    horizontal: {
      type: Boolean,
      default: false,
    },
  },
  directives: {
    tab: {
      mounted(el, { value }) {
        init(el, value);
      },
      updated(el, { value }) {
        init(el, value);
      },
    },
  },
  setup(props, { slots, attrs, emit }) {
    const tabDirective = resolveDirective("tab");
    provide("tabWrapperProps", props);
    return () =>
      withDirectives(h(props.tag,{class : ` ${props.horizontal ? 'grid grid-cols-12 gap-6': 'flex flex-col'}`}, slots.default()), [
        [tabDirective, { props, emit }],
      ]);
  },
});

// Tab wrapper
const TabList = defineComponent({
  name: "TabList",
  props: {
    horizontal: {
      type: Boolean,
      default: false,
    },
  },
  directives: {
    tab: {
      updated(el, { value }) {
        init(dom(el).parent(), {
          emit: value.emit,
          props: value.tabWrapperProps,
        });
      },
    },
  },
  setup(props, { slots, attrs, emit }) {
    const tabDirective = resolveDirective("tab");
    const tabWrapperProps = inject("tabWrapperProps");
    return () =>
      withDirectives(
        h(
          "ul",
          {
            class: `nav ${props.horizontal ? "col-span-3 flex flex-col border-r pr-3" : "border-b"}  nav-link-tabs border-slate-200`,
            role: "tablist",
          },
          slots.default()
        ),
        [[tabDirective, { props, emit, tabWrapperProps }]]
      );
  },
});

const Tab = defineComponent({
  name: "Tab",
  props: {
    fullWidth: {
      type: Boolean,
      default: true,
    },
    tag: {
      type: String,
      default: "a",
    },
    class: {
      type: String,
      default: "",
    },
  },
  setup(props, { slots, attrs, emit }) {
    return () =>
      h(
        "li",
        {
          class: `nav-item ${props.fullWidth ? "" : ""}`,
          role: "presentation",
        },
        [
          h(
            props.tag,
            {
              class: `nav-link ${props.class}`,
              type: "button",
              role: "tab",
            },
            slots.default()
          ),
        ]
      );
  },
});

const TabPanels = defineComponent({
  name: "TabPanels",
  props: {
    horizontal: {
      type: Boolean,
      default: false,
    },
  },
  setup(props, { slots, attrs, emit }) {
    return () =>
      h(
        "div",
        {
          class: `tab-content w-full  ${props.horizontal ? 'col-span-9' : ''}`,
        },
        slots.default()
      );
  },
});

const TabPanel = defineComponent({
  name: "TabPanel",
  setup(props, { slots, attrs, emit }) {
    return () =>
      h(
        "div",
        {
          class: "tab-pane",
          role: "tabpanel",
        },
        slots.default()
      );
  },
});

export { TabGroup, TabList, Tab, TabPanels, TabPanel };
