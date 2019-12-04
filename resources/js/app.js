import "./bootstrap";

// import "./components";
import "./customComponents";
import "./animations";
import "./icons";
import "./tables";
import "./forms";
import helpers from "./Helpers";
import GlobalMixin from "./mixins/GlobalMixin";
const app = new Vue({
    el: "#app",
    mixins: ["GlobalMixin", "helpers"]
});
