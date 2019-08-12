<template>
  <div>
    <form-wizard shape="shape" color="#3498db">
      <tab-content title="General Info" :before-change="()=>validateStep('general_info')" icon="ti-bookmark-alt">
        <general-info ref="general_info" @on-validate="mergePartialModels"></general-info>
      </tab-content>
      <tab-content title="Other Info" icon="ti-id-badge">
          <other-info></other-Info>
      </tab-content>
      <tab-content title="Contact Info" icon="ti-check">
        <contact-info></contact-info>  
      </tab-content>
    </form-wizard>
  </div>
</template>
<script>
//global
import Vue from "vue";
import VueFormWizard from "vue-form-wizard";
import "vue-form-wizard/dist/vue-form-wizard.min.css";
Vue.use(VueFormWizard);

//local registration
import { FormWizard, TabContent } from "vue-form-wizard";
import "vue-form-wizard/dist/vue-form-wizard.min.css";

//components
import generalInfo from "./general_info";
import otherInfo from "./other_info";
import contactInfo from "./contact_info";
export default {
  components: {
    FormWizard,
    TabContent,
    generalInfo,
    contactInfo,
    otherInfo
  },
  methods:{
    validate() {
      this.$v.form.$touch();
      var isValid = !this.$v.form.$invalid
      this.$emit('on-validate', this.$data, isValid)
      return isValid
    }
  }
};
</script>