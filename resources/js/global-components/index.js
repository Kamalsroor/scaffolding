import "zoom-vanilla.js/dist/zoom-vanilla.min.js";
// import Chart from "./chart/Main.vue";
// import Litepicker from "./litepicker/Main.vue";
import Tippy from "./tippy/Main.vue";
import TippyContent from "./tippy-content/Main.vue";
import TomSelect from "./tom-select/Main.vue";
// import Select2 from 'vue3-select2-component';

import LoadingIcon from "./loading-icon/Main.vue";
import TinySlider from "./tiny-slider/Main.vue";
// import ClassicEditor from "./ckeditor/ClassicEditor.vue";
// import FileUploader from "./file-uploader/Main.vue";
// import BalloonBlockEditor from './ckeditor/BalloonBlockEditor.vue'
// import BalloonEditor from './ckeditor/BalloonEditor.vue'
// import DocumentEditor from './ckeditor/DocumentEditor.vue'
// import InlineEditor from './ckeditor/InlineEditor.vue'
// import Dropzone from "./dropzone/Main.vue";
import TomSelectInline from "./tom-select-inline/Main.vue";
// import FullCalendar from "./calendar/Main.vue";
// import FullCalendarDraggable from "./calendar/Draggable.vue";
import Icon from './icon/Icon.vue';


// import DatePicker from './input-field/DatePicker.vue'
import InputField from './input-field/Field.vue'
// import ListInputs from './input-field/ListInputs.vue'
import SelectField from './input-field/Select.vue'
// import InputTextarea from './input-field/Textarea.vue'
// import InputTexteditor from './input-field/Texteditor.vue'
// import InputTag from './input-field/Tag.vue'
import Switch from './input-field/Switch.vue'
import Notification from "./notification/Main.vue";
import SuccessNotification from "./notification/successNotification.vue";
import {Modal, ModalBody, ModalFooter, ModalHeader} from "./modal";
import {
  Dropdown,
  DropdownContent,
  DropdownDivider,
  DropdownFooter,
  DropdownHeader,
  DropdownItem,
  DropdownMenu,
  DropdownToggle,
} from "./dropdown";
// import {Tab, TabGroup, TabList, TabPanel, TabPanels} from "./tab";
// import {Accordion, AccordionGroup, AccordionItem, AccordionPanel,} from "./accordion";
import {Alert} from "./alert";
// import {Highlight, Preview, PreviewComponent, Source,} from "./preview-component";
import LucideIcons from "./lucide";
import {VueGoodTable} from 'vue-good-table-next';


export default (app) => {
//   app.component("Chart", Chart);
//   app.component("Litepicker", Litepicker);
  app.component("Tippy", Tippy);
  app.component("TippyContent", TippyContent);
//   app.component("TomSelect", TomSelect);
//   app.component("Select2", Select2);
  app.component("SelectField", SelectField);
  app.component("LoadingIcon", LoadingIcon);
//   app.component("FileUploader", FileUploader);
  app.component("TinySlider", TinySlider);
//   app.component("Dropzone", Dropzone);
//   app.component("ClassicEditor", ClassicEditor);
  app.component("TomSelectInline", TomSelectInline);
  // app.component('BalloonBlockEditor', BalloonBlockEditor)
  // app.component('BalloonEditor', BalloonEditor)
  // app.component('DocumentEditor', DocumentEditor)
  // app.component('InlineEditor', InlineEditor)
  // app.component("FullCalendar", FullCalendar);
  // app.component("FullCalendarDraggable", FullCalendarDraggable);
  app.component("Notification", Notification);
  app.component("SuccessNotification", SuccessNotification);
  app.component("Modal", Modal);
  app.component("ModalHeader", ModalHeader);
  app.component("ModalBody", ModalBody);
  app.component("ModalFooter", ModalFooter);
  app.component("Dropdown", Dropdown);
  app.component("DropdownToggle", DropdownToggle);
  app.component("DropdownMenu", DropdownMenu);
  app.component("DropdownContent", DropdownContent);
  app.component("DropdownItem", DropdownItem);
  app.component("DropdownHeader", DropdownHeader);
  app.component("DropdownFooter", DropdownFooter);
  app.component("DropdownDivider", DropdownDivider);
//   app.component("TabGroup", TabGroup);
//   app.component("TabList", TabList);
//   app.component("Tab", Tab);
//   app.component("TabPanels", TabPanels);
//   app.component("TabPanel", TabPanel);
//   app.component("AccordionGroup", AccordionGroup);
//   app.component("AccordionItem", AccordionItem);
//   app.component("Accordion", Accordion);
//   app.component("AccordionPanel", AccordionPanel);
  app.component("Alert", Alert);
//   app.component("PreviewComponent", PreviewComponent);
//   app.component("Preview", Preview);
//   app.component("Source", Source);
//   app.component("Highlight", Highlight);
  app.component("Icon", Icon);
  app.component("InputField", InputField);
//   app.component("ListInputs", ListInputs);
//   app.component("InputTextarea", InputTextarea);
//   app.component("InputTexteditor", InputTexteditor);
//   app.component("InputTag", InputTag);
//   app.component("DatePicker", DatePicker);
  app.component("Switch", Switch);
  app.component("VueGoodTable", VueGoodTable);

  for (const [key, icon] of Object.entries(LucideIcons)) {
    app.component(key, icon);
  }
};
