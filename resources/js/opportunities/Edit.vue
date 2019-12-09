<template>
  <div>
    <FlashComponent></FlashComponent>
    <form method="post" @submit.prevent="editOpportunity" class="container mx-auto mt-8 w-8/12">
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
          <SelectComponent :form="form" label="Team" name="team_id" :options="teams" />
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

      <div class="py-6 flex items-center justify-between">
        <submitButton :form="form" type="submit" text="Update an Opportunity" />
        <button
          type="button"
          @click="deleteOpportunity(opportunity)"
          class="inline-block leading-tight bg-red-700 border border-red-700 hover:bg-red-700 uppercase px-3 py-3 text-white no-underline"
        >Delete an Opportunity</button>
      </div>
    </form>
  </div>
</template>
<script>
export default {
  props: ["dataOpportunity", "dataCountries", "dataTeams"],
  data() {
    return {
      form: new MyForm({}),
      opportunity: this.dataOpportunity,
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
  mounted() {
    this.updatefields(this.form);
  },
  created() {
    this.updatefields(this.form);
  },
  methods: {
    async deleteOpportunity(opportunity) {
      await Confirmation.confirm(
        "This action is irreversible",
        "Are you sure about this operation?"
      ).then(done =>
        axios.delete("/opportunities/" + opportunity.id).then(response => {})
      );
      await Flash.success("You have successfully archived an Opportunity");
      window.location = "/opportunities";
    },
    updatefields(form) {
      this.form.updateField(
        "opportunity_name",
        this.opportunity.opportunity_name
      );
      this.form.updateField("clients_name", this.opportunity.clients_name);
      this.form.updateField("country", this.opportunity.country);

      this.form.updateField("funder", this.opportunity.funder);

      this.form.updateField("type", this.opportunity.type);
      this.form.updateField("lead_source", this.opportunity.lead_source);

      this.form.updateField("revenue", this.opportunity.revenue);
      this.form.updateField(
        "internal_deadline",
        this.opportunity.internal_deadline
      );
      this.form.updateField(
        "external_deadline",
        this.opportunity.external_deadline
      );
      this.form.updateField("team_id", this.opportunity.team_id);
    },
    editOpportunity() {
      this.form
        .put(`/opportunities/${this.opportunity.id}`)
        .then(data => {
          this.$emit("updated", data);
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
