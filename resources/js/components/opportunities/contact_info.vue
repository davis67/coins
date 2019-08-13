<template>
  <div class="row">
    <div class="form-group col-md-12">
      <label>Address</label>
      <input class="form-control" v-model.trim="address" />
      <span
        class="text-danger"
        v-if="$v.address.$error && !$v.address.required"
      >The Contact field is required</span>
    </div>
    <div class="form-group col-md-12">
      <label>Title of Contact Person</label>
      <input class="form-control" v-model.trim="title" />
    </div>
    <div class="row col-md-12 col-lg-12">
      <div class="form-group col-md-6 col-lg-6">
        <label>Name of contact Person</label>
        <input class="form-control" v-model.trim="name_of_contact_person" />
      </div>

      <div class="form-group col-md-6 col-lg-6">
        <label>contact</label>
        <input class="form-control" type="text" @input="$v.contact.$touch()" v-model.trim="contact" />
        <span
          class="text-danger"
          v-if="$v.funder.$error && !$v.funder.required"
        >The Contact field is required</span>
      </div>
    </div>
    <div class="form-group col-md-12">
      <label>Email</label>
      <input class="form-control" @input="$v.email.$touch()" v-model.trim="email" />
      <span class="text-danger" v-if="$v.email.$error && !$v.email.required">The Email is required</span>
    </div>
    <div class="form-group col-md-12">
      <label>Website</label>
      <input class="form-control" v-model.trim="website" />
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
      email: "",
      website: "",
      contact: "",
      name_of_contact_person: "",
      address: "",
      title: ""
    };
  },
  validations: {
    email: {
      required,
      email
    },
    contact: {
      required
    },
    form: [
      "email",
      "website",
      "contact",
      "name_of_contact_person",
      "address",
      "title"
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