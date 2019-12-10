<template>
  <div>
    <modal-component :size="modalSize" :show.sync="isShowing">
      <span slot="modal-title">View Contact Details</span>
      <Show slot="modal-body" :contact="contact"></Show>
    </modal-component>
    <data-table
      :data="contacts"
      title="Showing All Registered Contacts"
      :rowClickable="true"
      @rowClicked="getSingleContact"
    >
      <div class="btn-group" slot="icons">
        <a
          style="cursor:pointer"
          class="inline-block leading-tight bg-blue-700 border border-blue-700 hover:bg-blue-700 px-3 py-2 text-white no-underline shadow-md"
          @click.prevent="addingTeam"
        >New Contact</a>
      </div>
      <tableCol data-key="account_name" label="Account Name"></tableCol>
      <tableCol data-key="country" label="Country"></tableCol>
      <tableCol data-key="full_address" label="Full Address"></tableCol>
      <tableCol data-key="created_by" label="Added By"></tableCol>
    </data-table>
  </div>
</template>
<script>
import Show from "./Show";
export default {
  props: ["dataContacts"],
  data() {
    return {
      isShowing: false,
      modalSize: "large",
      contacts: this.dataContacts,
      contact: {}
    };
  },
  components: {
    Show
  },
  created() {},
  methods: {
    toggleIsOpen() {
      this.isOpen = !this.isOpen;
      console.log("google", this.isOpen);
    },
    addingTeam() {
      window.location = "/contacts/create";
    },
    getSingleContact(contact) {
      this.contact = contact;
      this.isShowing = true;
    }
  }
};
</script>
<style lang="sass" scoped>
</style>
