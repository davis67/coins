import MyForm from "./Form";
import InputComponent from "./templates/InputComponent"
import DateComponent from "./templates/DateComponent"
import SelectComponent from "./templates/SelectComponent"
// import CheckboxComponent from "./templates/CheckboxComponent"
import SubmitButton from "./templates/submitButton"
window.MyForm = MyForm;
Vue.component("InputComponent", InputComponent);
Vue.component("DateComponent", DateComponent);
Vue.component("SelectComponent", SelectComponent);
// Vue.component("CheckboxComponent", CheckboxComponent);
Vue.component("SubmitButton", SubmitButton);
