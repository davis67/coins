<template>
  <div>
    <div class="row">
      <div class="row col-md-12 col-lg-12">
        <div class="form-group col-md-6 col-lg-6">
          <label>Internal Date</label>
          <input
            class="form-control"
            type="date"
            @input="$v.internal_deadline.$touch()"
            v-model.trim="internal_deadline"
          />
          <span
            class="text-danger"
            v-if="$v.internal_deadline.$error && !$v.internal_deadline.required"
          >The Email is required</span>
        </div>

        <div class="form-group col-md-6 col-lg-6">
          <label>Type of Opportunity</label>
          <input class="form-control" @input="$v.type.$touch()" type="text" v-model.trim="type" />
          <span
            class="text-danger"
            v-if="$v.type.$error && !$v.type.required"
          >The Type of Opportunity is required</span>
        </div>
      </div>
      <div class="row col-md-12 col-lg-12">
        <div class="form-group col-md-6 col-lg-6">
          <label>Revenue</label>
          <input class="form-control" @input="$v.revenue.$touch()" v-model.trim="revenue" />
          <span
            class="text-danger"
            v-if="$v.revenue.$error && !$v.revenue.required"
          >The Revenue field is required</span>
        </div>

        <div class="form-group col-md-6 col-lg-6">
          <label>Leads Source</label>
          <input
            class="form-control"
            type="text"
            @input="$v.leads_source.$touch()"
            v-model.trim="leads_source"
          />
          <span
            class="text-danger"
            v-if="$v.leads_source.$error && !$v.leads_source.required"
          >The Lead Source field is required</span>
        </div>
      </div>
      <div class="form-group col-md-12">
        <label>Probability</label>
        <input class="form-control" @input="$v.probability.$touch()" v-model.trim="probability" />
        <span
          class="text-danger"
          v-if="$v.probability.$error && !$v.probability.required"
        >The Probability is required</span>
      </div>
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
      internal_deadline: "",
      probability: "",
      leads_source: "",
      revenue: "",
      email: "",
      title: "",
      type: ""
    };
  },
  validations: {
    internal_deadline: {
      required
    },
    probability: {
      required
    },
    leads_source: {
      required
    },
    email: {
      required
    },
    title: {
      required
    },
    type: {
      required
    },
    form: [
      "type",
      "email",
      "title",
      "leads_source",
      "probability",
      "internal_deadline"
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