import vue from "vue";

import axios from "axios";
import Flash from "./flash/Flash";
import {
    Confirmation
} from "./flash/Confirmation";

window.Vue = vue;

window.axios = axios;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common["X-CSRF-TOKEN"] = token.content;
} else {
    console.error(
        "CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token"
    );
}


window.hasOwnProp = function (obj, prop) {
    return obj && Object.prototype.hasOwnProperty.call(obj, prop);
};

window.GlobalBus = new Vue();

window.Flash = Flash;

window.Confirmation = new Confirmation();
