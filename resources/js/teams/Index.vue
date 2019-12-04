<template>
  <div>
    <data-table
      :data="teams"
      title="Showing All Registered Teams"
      :rowClickable="true"
      @rowClicked="getSingle"
    >
      <div class="btn-group" slot="icons">
        <button
          class="inline-block leading-tight bg-blue-700 border border-blue-700 hover:bg-blue-700 px-3 py-2 text-white no-underline shadow-md"
          @click.prevent="addingTeam = true"
        >New Team</button>
      </div>
      <tableCol data-key="team_name" label="Team Name"></tableCol>
      <tableCol data-key="team_code" label="Team Code"></tableCol>
      <tableCol data-key="team_leader" label="Team Leader"></tableCol>
    </data-table>
  </div>
</template>
<script>
export default {
  props: ["dataTeams"],
  data() {
    return {
      isOpen: false,
      teams: this.dataTeams
    };
  },
  created() {},
  methods: {
    toggleIsOpen() {
      this.isOpen = !this.isOpen;
      console.log("google", this.isOpen);
    },
    getSingle(team) {
      console.log(team);
    }
  }
};
</script>
<style lang="sass" scoped>
</style>
