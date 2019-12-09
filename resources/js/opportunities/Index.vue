<template>
  <div>
    <data-table
      :data="opportunities"
      title="Showing All Registered Opportunities"
      :rowClickable="true"
      @rowClicked="getSingle"
    >
      <tableCol data-key="om_number" label="OM Number"></tableCol>
      <tableCol data-key="clients_name" label="Client Name"></tableCol>
      <tableCol data-key="country" label="Country"></tableCol>
      <tableCol data-key="opportunity_name" label="Opportunity Name"></tableCol>
      <tableCol data-key="funder" label="Funded By"></tableCol>
      <tableCol data-key="internal_deadline" label="Internal Deadline"></tableCol>
      <tableCol data-key="external_deadline" label="External Deadline"></tableCol>
    </data-table>
  </div>
</template>
<script>
export default {
  props: ["dataOpportunities"],
  data() {
    return {
      isOpen: false,
      clicked: true,
      opportunities: this.dataOpportunities
    };
  },
  created() {},
  methods: {
    async getSingle(opportunity) {
      await Confirmation.confirm(
        "Continue",
        "Click Yes to view more details?"
      ).then(done => (window.location = `/opportunities/${opportunity.id}`));
    },
    editOpportunity() {
      this.clicked = false;
      console.log("ello");
    }
  }
};
</script>
<style lang="sass" scoped>
</style>
