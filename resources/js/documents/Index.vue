<template>
  <div>
    <data-table
      :data="documents"
      title="Showing All Registered Documents"
      :rowClickable="true"
      @rowClicked="getSingle"
    >
      <div class="btn-group" slot="icons">
        <button
          class="inline-block leading-tight bg-blue-700 border border-blue-700 hover:bg-blue-700 px-3 py-2 text-white no-underline shadow-md"
          @click.prevent="addingTeam = true"
        >New Document</button>
      </div>
      <tableCol data-key="staffId" label="Staff ID"></tableCol>
      <tableCol data-key="name" label="Name"></tableCol>
      <tableCol data-key="gender" label="Gender"></tableCol>
      <tableCol data-key="email" label="Email"></tableCol>
      <tableCol data-key="reportsTo" label="Supervisor"></tableCol>
      <tableCol data-key="userStatus" label="Status"></tableCol>
    </data-table>
  </div>
</template>
<script>
export default {
  props: ["dataDocuments"],
  data() {
    return {
      isOpen: false,
      document: this.dataDocuments
    };
  },
  created() {},
  methods: {
    toggleIsOpen() {
      this.isOpen = !this.isOpen;
      console.log("google", this.isOpen);
    },
    getSingle(document) {
      console.log(document);
    }
  }
};
</script>
<style lang="sass" scoped>
</style>
