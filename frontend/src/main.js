import { createApp } from 'vue'
import App from './App.vue'
import router from "./router";
import { createPinia } from "pinia";
import piniaPersist from "pinia-plugin-persist";
import { FontAwesomeIcon } from "./helper/font-awesome-icons";
import VueDatePicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";
import "vue3-toastify/dist/index.css";
import clickOutside from './directive/clickoutside.js'
import esc from './directive/esc.js';

const app = createApp(App)

//Khai báo directive vào app
app.directive("outside", clickOutside);
app.directive("esc", esc);

const pinia = createPinia();
pinia.use(piniaPersist);

app
  .component("VueDatePicker", VueDatePicker)
  .component("font-awesome-icon", FontAwesomeIcon)
  .use(pinia)
  .use(router)
  .mount("#app");
