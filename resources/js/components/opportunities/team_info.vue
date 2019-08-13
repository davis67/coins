<template>
  <div class="row">
    <div class="form-group col-md-12">
      <label>Team Name</label>
      <input class="form-control" v-model.trim="team" />
      <span class="text-danger" v-if="$v.team.$error && !$v.team.required">Team field is required</span>
    </div>
    <div class="row col-md-12 col-lg-12">
      <div class="form-group col-md-6 col-lg-6">
        <label>Assigned To</label>
        <input class="form-control" v-model.trim="assigned_to" />
        <span
          class="text-danger"
          v-if="$v.assigned_to.$error && !$v.assigned_to.required"
        >Opportunity must be assigned to atleast one consultant</span>
      </div>

      <div class="form-group col-md-6 col-lg-6">
        <label>Internal Deadline</label>
        <input class="form-control" type="date" v-model.trim="internal_deadline" />
        <span
          class="text-danger"
          v-if="$v.internal_deadline.$error && !$v.internal_deadline.required"
        >Internal Deadline field is required</span>
      </div>
    </div>
    <div class="form-group col-md-12">
      <label>Client Name</label>
      <input class="form-control" v-model.trim="client_name" />
      <span
        class="text-danger"
        v-if="$v.client_name.$error && !$v.client_name.required"
      >The client Name field is required</span>
    </div>
    <div class="form-group col-md-12">
      <label>Funder</label>
      <input class="form-control" v-model.trim="funder" />
      <span
        class="text-danger"
        v-if="$v.funder.$error && !$v.funder.required"
      >Funder field is required</span>
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
      team: "",
      assigned_to: "",
      client_name: "",
      funder: "",
      internal_deadline: ""
    };
  },
  validations: {
    team: { required },
    assigned_to: { required },
    client_name: { required },
    internal_deadline: { required },
    form: ["team", "assigned_to", "client_name", "internal_deadline"]
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