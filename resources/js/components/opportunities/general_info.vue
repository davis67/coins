<template>
  <div class="row">
    <div class="form-group col-md-12">
      <label>Opportunity Name</label>
      <input class="form-control" v-model.trim="opportunity_name" />
      <span
        class="text-danger"
        v-if="$v.country.$error && !$v.country.required"
      >Opportunity Name is required</span>
    </div>
    <div class="row col-md-12 col-lg-12">
      <div class="form-group col-md-6 col-lg-6">
        <label>Country</label>
        <input class="form-control" v-model.trim="country" />
        <span
          class="text-danger"
          v-if="$v.country.$error && !$v.country.required"
        >Country is required</span>
      </div>

      <div class="form-group col-md-6 col-lg-6">
        <label>Date of Submission</label>
        <input class="form-control" type="date" v-model.trim="external_deadline" />
        <span
          class="text-danger"
          v-if="$v.external_deadline.$error && !$v.external_deadline.required"
        >External Deadline is required</span>
      </div>
    </div>
    <div class="form-group col-md-12">
      <label>Client Name</label>
      <input class="form-control" v-model.trim="client_name" />
      <span
        class="text-danger"
        v-if="$v.client_name.$error && !$v.client_name.required"
      >Client Name is required</span>
    </div>
    <div class="form-group col-md-12">
      <label>Funder</label>
      <input class="form-control" @input="$v.funder.$touch()" v-model.trim="funder" />
      <span
        class="text-danger"
        v-if="$v.funder.$error && !$v.funder.required"
      >The funder is required</span>
    </div>
  </div>
</template>
<script>
import Vue from "vue";
import vuelidate from "vuelidate";
import { required, minLength, email } from "vuelidate/lib/validators";
Vue.use(vuelidate);
export default {
  data() {
    return {
      opportunity_name: "",
      country: "",
      client_name: "",
      funder: "",
      external_deadline: ""
    };
  },
  validations: {
    opportunity_name: {
      required
    },
    country: {
      required
    },
    client_name: {
      required
    },
    funder: {
      required
    },
    external_deadline: {
      required
    },
    form: [
      "opportunity_name",
      "country",
      "client_name",
      "funder",
      "external_deadline"
    ]
  },
  methods: {
    validate() {
      this.$v.form.$touch();
      var isValid = !this.$v.form.$invalid;
      this.$emit("on-validate", this.$data, isValid);
      return isValid;
    }
  }
};
</script>