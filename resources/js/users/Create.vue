<template>
  <div>
    <FlashComponent></FlashComponent>
    <div class="mx-auto w-full mt-4 justify-center align-center lg:flex">
      <form
        class="w-8/12 bg-white shadow-lg rounded px-8 pt-6 pb-8 mb-4"
        method="post"
        @submit.prevent="addUser"
      >
        <div class="mb-4">
          <InputComponent :form="form" label="Staff ID Number" name="staffId" />
        </div>
        <div class="mb-4">
          <InputComponent :form="form" label="Staff Name" name="name" />
        </div>
        <div class="mb-4">
          <InputComponent :form="form" label="Email" name="email" />
        </div>
        <div class="mb-6">
          <SelectComponent :form="form" label="Gender" name="gender" :options="options_gender" />
        </div>

        <div class="mb-6">
          <InputComponent :form="form" label="Telephone " name="mobilePhone" />
        </div>
        <div class="mb-6">
          <InputComponent :form="form" label="Telephone 2" name="alternativePhone" />
        </div>
        <div class="mb-6">
          <SelectComponent :form="form" label="Team" name="team_id" :options="options_team" />
        </div>
        <div class="mb-6">
          <SelectComponent :form="form" label="Title" name="title_id" :options="options_title" />
        </div>
        <div class="mb-6">
          <SelectComponent
            :form="form"
            label="Reports To"
            name="reportsTo"
            :options="options_users"
          />
        </div>
        <div class="flex items-center justify-between">
          <submitButton :form="form" type="submit" text="Register User" />
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  props: ["dataTitles", "dataUsers", "dataTeams"],
  data() {
    return {
      form: new MyForm({}),
      options_gender: ["female", "male"],
      options_title: this.dataTitles,
      options_team: this.dataTeams,
      options_users: this.dataUsers
    };
  },
  created() {},
  methods: {
    addUser() {
      this.form
        .post("/users")
        .then(data => {
          this.$emit("created", data);
          Flash.success("You have successfully added an User");
          window.location = `/users`;
        })
        .catch(errors => Flash.error("Something went wrong! please try again"));
    }
  }
};
</script>
