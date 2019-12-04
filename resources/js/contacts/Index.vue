<template>
  <div>
    <data-table
      :data="contacts"
      title="Showing All Registered Contacts"
      :rowClickable="true"
      @rowClicked="getSingle"
    >
      <div class="btn-group" slot="icons">
        <button
          class="inline-block leading-tight bg-blue-700 border border-blue-700 hover:bg-blue-700 px-3 py-2 text-white no-underline shadow-md"
          @click.prevent="addingTeam = true"
        >New Contact</button>
      </div>
      <tableCol data-key="associate_id" label="Associate"></tableCol>
      <tableCol data-key="opportunity_id" label="Opportunity"></tableCol>
      <tableCol data-key="description" label="Description"></tableCol>
      <tableCol data-key="created_by" label="Added By"></tableCol>
    </data-table>
  </div>
</template>
<script>
export default {
  props: ["dataContacts"],
  data() {
    return {
      isOpen: false,
      contacts: this.dataContacts
    };
  },
  created() {},
  methods: {
    toggleIsOpen() {
      this.isOpen = !this.isOpen;
      console.log("google", this.isOpen);
    },
    getSingle(contact) {
      console.log(contact);
    }
  }
};
</script>
<style lang="sass" scoped>
</style>
