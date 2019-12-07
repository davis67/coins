<template>
  <div>
    <data-table
      :data="users"
      title="Showing All Registered Users"
      :rowClickable="true"
      @rowClicked="getSingle"
    >
      <div class="btn-group" slot="icons">
        <button
          class="inline-block leading-tight bg-red-700 border border-red-700 hover:bg-red-500 px-3 py-2 text-white no-underline shadow-md"
          @click.prevent="addingTeam = true"
        >Archived Users</button>
        <button
          class="inline-block leading-tight bg-blue-700 border border-blue-700 hover:bg-blue-700 px-3 py-2 text-white no-underline shadow-md"
          @click.prevent="addingUser"
        >New User</button>
      </div>
      <tableCol data-key="staffId" label="Staff ID"></tableCol>
      <tableCol data-key="name" label="Full Names"></tableCol>
      <tableCol data-key="gender" label="Gender"></tableCol>
      <tableCol data-key="email" label="Email"></tableCol>
      <tableCol data-key="reportsTo" label="Supervisor"></tableCol>
      <tableCol data-key="userStatus" label="Status"></tableCol>
    </data-table>
  </div>
</template>
<script>
export default {
  data() {
    return {
      isOpen: false,
      users: {}
    };
  },
  created() {
    this.fetchUsers();
  },
  methods: {
    toggleIsOpen() {
      this.isOpen = !this.isOpen;
      console.log("google", this.isOpen);
    },
    async fetchUsers() {
      await axios.get("/users/data").then(({ data }) => (this.users = data));
    },
    addingUser() {
      Confirmation.confirm("Do you want to Leave this Page?", "Continue").then(
        done => (window.location = `/users/create`)
      );
    }
  }
};
</script>
<style lang="sass" scoped>
</style>
