<template>
  <div class="container">
    <FlashComponent></FlashComponent>
    <div class="container-fluid">
      <div class="mx-auto w-full mt-4 justify-center align-center lg:flex">
      <form method="post"@submit.prevent="addContact">
              <div class="md:grid md:grid-cols-3 md:gap-6">
                  <div class="md:col-span-1">
                      <h3 class="text-lg font-medium leading-6 text-gray-900">
                          General Information
                      </h3>
                      <p class="mt-1 text-sm leading-5 text-gray-500" >
                          Something here
                      </p>
                  </div>
                  <div class="mt-5 md:mt-0 md:col-span-2">
                      <div class="grid grid-cols-6 gap-6">
                          <div class="col-span-6">
                          <InputComponent :form="form" label="Account Name" name="account_name" />                  </div>
                          <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                              <SelectComponent
                                :form="form"
                                label="Country"
                                name="contact_country"
                                :options="options_countries"
                              />
                          </div>
                      </div>
                  </div>
              </div>
              <div class="md:grid md:grid-cols-3 mt-8 border-t border-gray-400 md:gap-6">
                  <div class="md:col-span-1 pt-4">
                      <h3 class="text-lg font-medium leading-6 text-gray-900">
                          Address' Information
                      </h3>
                      <p class="mt-1 text-sm leading-5 text-gray-500">
                        something here
                      </p>
                  </div>
                  <div  class="mt-5 md:mt-0 pt-6 md:col-span-2">
                      <div class="grid grid-cols-6 gap-6">
                          <div class="col-span-6">
                            <InputComponent :form="form" label="Full Address" name="full_address" />
                          </div>
                          <div class="col-span-6 sm:col-span-3">
                              <InputComponent :form="form" label="Alternative Address" name="alternate_address" />
                          </div>
                      </div>
                  </div>
              </div>
              <div class="md:grid md:grid-cols-3 mt-8 border-t border-gray-400 md:gap-6">
                  <div class="md:col-span-1 pt-4">
                      <h3 class="text-lg font-medium leading-6 text-gray-900">
                          Other Contacts' Information
                      </h3>
                      <p class="mt-1 text-sm leading-5 text-gray-500">
                        something here
                      </p>
                  </div>
                  <div  class="mt-5 md:mt-0 pt-6 md:col-span-2">
                      <div class="grid grid-cols-6 gap-6">
                          <div class="col-span-6">
                             <InputComponent :form="form" label="Contact Person" name="contact_person" />
                          </div>
                          <div class="col-span-6 sm:col-span-3">
                               <InputComponent :form="form" label="Contact Email" name="contact_email" />
                          </div>
                          <div class="col-span-6">
                             <InputComponent :form="form" label="Contact Phone" name="contact_phone" />
                          </div>
                          <div class="col-span-6 sm:col-span-3">
                                <InputComponent :form="form" label="Alternative Contact" name="alternative_person" />
                          </div>
                           <div class="col-span-6 sm:col-span-3">
                              <InputComponent :form="form" label="Alternative Email" name="alternative_person_email" />
                          </div>
                           <div class="col-span-6 sm:col-span-3">
                              <InputComponent :form="form" label="Alternative Contact" name="alternative_person_phone" />
                          </div>
                      </div>
                       <div class="flex">
                      <div class="py-6">
                          <submitButton :form="form" type="submit" text="Add Contact"/>
                      </div>
                      <div class="px-2 py-6">
                          <button type="button" class="inline-block leading-tight text-red-800 border border-red-800 hover:text-red-700 px-3 py-2 bg-white no-underline">
                              Cancel
                          </button>
                      </div>
                  </div>
                  </div>
              </div>
      </form>
    </div>
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
