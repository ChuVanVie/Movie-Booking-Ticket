import { createApp } from 'vue'
import App from './App.vue'
import router from "./router";
import { createPinia } from "pinia";
import { FontAwesomeIcon } from "./helper/font-awesome-icons";
import clickOutside from './directive/clickoutside.js'
import esc from './directive/esc.js'

const app = createApp(App)

//Khai báo directive vào app
app.directive("outside", clickOutside);
app.directive("esc", esc);

const pinia = createPinia();

app
  .component("font-awesome-icon", FontAwesomeIcon)
  .use(pinia)
  .use(router)
  .mount("#app");
