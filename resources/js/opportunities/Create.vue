<template>
  <div>
    <FlashComponent></FlashComponent>
    <form method="post" @submit.prevent="addOpportunity" class="container mx-auto mt-8 w-8/12">
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <InputComponent :form="form" label="Opportunity Name" name="opportunity_name" />
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-2">
        <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
          <SelectComponent :form="form" label="Type" name="type" :options="options_type" />
        </div>
        <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
          <SelectComponent
            :form="form"
            label="Sales Stage"
            name="sales_stage"
            :options="sale_stage_option"
          />
        </div>
        <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
          <SelectComponent :form="form" label="Country" name="country" :options="countries" />
        </div>
        <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
          <InputComponent :form="form" label="Client Name" name="clients_name" />
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <DateComponent
            :form="form"
            type="date"
            label="Internal Dealine"
            name="internal_deadline"
          />
        </div>
        <div class="w-full md:w-1/2 px-3">
          <DateComponent
            :form="form"
            type="date"
            label="External Dealine"
            name="external_deadline"
          />
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <SelectComponent :form="form" label="Team" name="team" :options="teams" />
        </div>
      </div>

      <div class="flex flex-wrap -mx-3 mb-2">
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
          <InputComponent :form="form" label="Funded By" name="funder" />
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
          <SelectComponent
            :form="form"
            label="Lead Source"
            name="lead_source"
            :options="leads_source_option"
          />
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
          <InputComponent :form="form" label="Revenue" name="revenue" />
        </div>
      </div>

      <div class="py-6">
        <submitButton :form="form" type="submit" text="Add Opportunity" />
      </div>
    </form>
  </div>
</template>
<script>
export default {
  props: ["dataCountries", "dataTeams"],
  data() {
    return {
      form: new MyForm({}),
      options_type: ["Existing Business", "New Business"],
      leads_source_option: [
        "Cold call",
        "Existing customer",
        "Self Generated",
        "Employee",
        "Partner",
        "Public Relations",
        "Direct Mail",
        "Conference",
        "Trade Show",
        "website",
        "word of mouth",
        "Email",
        "Compaign",
        "other"
      ],
      sale_stage_option: [
        "Prospecting",
        "EOI",
        "Needs Analysis",
        "Value Proposition",
        "Id Decision Analysis",
        "Perception Analysis",
        "Propasal Price Quote",
        "Negotiation Review",
        "CLosed Won",
        "Closed Lost",
        "Submitted",
        "Did Not Pursue",
        "Not Submitted"
      ],
      countries: this.dataCountries,
      teams: this.dataTeams
    };
  },
  created() {},
  methods: {
    addOpportunity() {
      this.form
        .post("/opportunities")
        .then(data => {
          this.$emit("created", data);
          Flash.success("You have successfully added an Opportunity");
          window.location = `/opportunities`;
        })
        .catch(errors => Flash.error("Something went wrong! please try again"));
    }
  }
};
</script>
<style scoped="scss">
</style>
