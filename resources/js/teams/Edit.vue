<template>
  <div>
    <div class="w-full mt-4 justify-center align-center lg:flex">
      <form
        class="bg-white rounded px-8 pt-6 pb-8 mb-4"
        method="post"
        @submit.prevent="updateTeam(team)"
      >
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <InputComponent :form="form" label="Team Code" name="team_code" />
          </div>
          <div class="w-full md:w-1/2 px-3">
            <InputComponent :form="form" label="Team Name" name="team_name" />
          </div>
        </div>
        <div class="mb-4">
          <SelectComponent
            :form="form"
            label="Team Leader"
            name="team_leader"
            :options="options_users"
          />
        </div>
        <div class="flex items-center justify-between">
          <submitButton :form="form" type="submit" text="Update a Team" />
          <button
            type="button"
            @click="deleteTeam(team)"
            class="inline-block leading-tight bg-red-700 border border-red-700 hover:bg-red-700 uppercase px-3 py-3 text-white no-underline"
          >Delete a Team</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  props: ["team"],
  data() {
    return {
      form: new MyForm({}),
      options_users: []
    };
  },

  created() {
    this.updatefields(this.form);
    this.fetchUsers();
  },
  mounted() {
    this.$nextTick(function() {
      this.updatefields(this.form);
    });
  },
  methods: {
    updatefields(form) {
      this.form.updateField("team_code", this.team.team_code);
      this.form.updateField("team_name", this.team.team_name);
      this.form.updateField("team_leader", this.team.team_leader);
    },
    updateTeam(team) {
      this.form
        .put(`/teams/${team.id}`)
        .then(data => {
          this.$emit("team:updated", data);
        })
        .catch(errors => Flash.error("Something went wrong! please try again"));
    },
    async deleteTeam(team) {
      await Confirmation.confirm(
        "This action is irreversible",
        "Are you sure about this operation?"
      ).then(done => axios.delete("/teams/" + team.id).then(response => {}));
      this.$emit("team:deleted", team);
    },
    async fetchUsers() {
      await axios
        .get("/users/data")
        .then(({ data }) => (this.options_users = data));
    }
  }
};
</script>
