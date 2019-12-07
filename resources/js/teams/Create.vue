<template>
  <div>
    <div class="w-full mt-4 justify-center align-center lg:flex">
      <form class="bg-white rounded px-8 pt-6 pb-8 mb-4" method="post" @submit.prevent="addTeam">
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
          <submitButton :form="form" type="submit" text="Add a Team" />
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: new MyForm({}),
      options_users: []
    };
  },
  created() {
    this.fetchUsers();
  },
  methods: {
    addTeam() {
      this.form
        .post("/teams")
        .then(data => {
          this.$emit("team:created", data);
        })
        .catch(errors => Flash.error("Something went wrong! please try again"));
    },
    async fetchUsers() {
      await axios
        .get("/users/data")
        .then(({ data }) => (this.options_users = data));
    }
  }
};
</script>
