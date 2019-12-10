<template>
  <div>
    <FlashComponent></FlashComponent>
    <div class="mx-auto w-full mt-4 justify-center align-center lg:flex">
      <form
        class="w-2/4 bg-white shadow-lg px-8 pt-6 pb-8 mb-4"
        method="post"
        @submit.prevent="addContact"
      >
        <p class="text-lg border-b-4 border-gray-600 italic">Basic Info</p>
        <div class="mb-4">
          <InputComponent :form="form" label="Account Name" name="account_name" />
        </div>
        <div class="mb-6">
          <SelectComponent
            :form="form"
            label="Country"
            name="contact_country"
            :options="options_countries"
          />
        </div>
        <p class="text-lg border-b-4 border-gray-600 italic">Address Info</p>
        <div class="mb-4">
          <InputComponent :form="form" label="Full Address" name="full_address" />
        </div>
        <div class="mb-4">
          <InputComponent :form="form" label="Alternative Address" name="alternate_address" />
        </div>
        <p class="text-lg border-b-4 border-gray-600 italic">Contact Info</p>
        <div class="mb-4 pt-4">
          <InputComponent :form="form" label="Contact Person" name="contact_person" />
        </div>
        <div class="mb-4">
          <InputComponent :form="form" label="Contact Email" name="contact_email" />
        </div>
        <div class="mb-4">
          <InputComponent :form="form" label="Contact Phone" name="contact_phone" />
        </div>
        <div class="mb-4">
          <InputComponent :form="form" label="Alternative Contact" name="alternative_person" />
        </div>
        <div class="mb-4">
          <InputComponent :form="form" label="Alternative Email" name="alternative_person_email" />
        </div>
        <div class="mb-4">
          <InputComponent
            :form="form"
            label="Alternative Contact Phone"
            name="alternative_person_phone"
          />
        </div>
        <div class="flex items-center justify-between">
          <submitButton :form="form" type="submit" text="Register a Contact" />
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  props: ["dataTitles", "dataUsers", "dataTeams", "dataCountries"],
  data() {
    return {
      form: new MyForm({}),
      options_gender: ["female", "male"],
      options_title: this.dataTitles,
      options_team: this.dataTeams,
      options_users: this.dataUsers,
      options_countries: this.dataCountries
    };
  },
  created() {},
  methods: {
    addContact() {
      this.form
        .post("/contacts")
        .then(data => {
          this.$emit("created", data);
          Flash.success("You have successfully added a Contact");
          window.location = `/contacts`;
        })
        .catch(errors => Flash.error("Something went wrong! please try again"));
    }
  }
};
</script>
