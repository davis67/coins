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
      <!-- <tableCol>
        <svg
          @click="toggleIsOpen"
          style="cursor:pointer"
          class="mr-6 md:mr-1 h-12 w-6 fill-current text-grey-dark"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 20 20"
        >
          <path
            d="M4 12a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm6 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm6 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"
          />
        </svg>

        <div v-if="isOpen = true"  class="w-24 bg-white rounded-lg shadow-md">
          <a class="block px-4 py-2 text-gray-800 hover:bg-indigo-500" href>Edit</a>
          <a class="block px-4 py-2 text-gray-800 hover:bg-indigo-500" href>View</a>
          <a class="block px-4 py-2 text-gray-800 hover:bg-indigo-500" href>Delete</a>
      </tableCol>-->
    </data-table>
  </div>
</template>
<script>
export default {
  props: ["dataOpportunities"],
  data() {
    return {
      isOpen: false,
      opportunities: this.dataOpportunities
    };
  },
  created() {},
  methods: {
    getSingle(opportunity) {
      console.log(opportunity);
    }
  }
};
</script>
<style lang="sass" scoped>
</style>
