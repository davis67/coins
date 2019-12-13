<template>
  <div class="w-full h-auto">
    <div class="mx-auto h-auto w-full shadow-inset text-gray-700 mb-2">
      <div class="py-4 pr-6 md:mr-10">
        <p class="text-lg border-b-4 border-gray-700">Client Info</p>
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-2/4">
            <div
              class="block text-blue-700 font-bold md:text-right mb-1 md:mb-0 pr-4"
              for="inline-full-name"
            >Client Name:</div>
          </div>
          <div class="md:w-2/4">
            <div class="italic font-semibold">
              <p>{{contact.account_name}}</p>
            </div>
          </div>
        </div>
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-2/4">
            <div class="block text-blue-700 font-bold md:text-right mb-1 md:mb-0 pr-4">Full Address:</div>
          </div>
          <div class="md:w-2/4 italic font-semibold">
            <p>{{contact.full_address}}</p>
          </div>
        </div>
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-2/4">
            <div class="block text-blue-700 font-bold md:text-right mb-1 md:mb-0 pr-4">Country:</div>
          </div>
          <div class="md:w-2/4 italic block font-bold">
            <span class="text-lg">{{contact.country}}</span>
          </div>
        </div>
        <div v-if="contact.alternative_person_email" class="md:flex md:items-center mb-6">
          <div class="md:w-2/4">
            <div
              class="block text-blue-700 font-bold md:text-right mb-1 md:mb-0 pr-4"
            >Alternative Address:</div>
          </div>
          <div class="md:w-2/4 italic font-semibold">
            <p>{{contact.alternate_address}}</p>
          </div>
        </div>
      </div>
      <p class="text-lg border-b-4 border-gray-700">Contact Person</p>
      <div class="md:flex">
        <div class="md:w-1/2">
          <div class="md:flex mb-6">
            <div class="md:w-2/4">
              <div
                class="block text-blue-700 font-bold md:text-right mb-1 md:mb-0 pr-4"
                for="inline-full-name"
              >Name:</div>
            </div>
            <div class="md:w-2/4 italic font-semibold">
              <div>{{contact.contact_person}}</div>
            </div>
          </div>
          <div class="md:flex mb-6">
            <div class="md:w-2/4">
              <div
                class="block text-blue-700 font-bold md:text-right mb-1 md:mb-0 pr-4"
                for="inline-full-name"
              >Email:</div>
            </div>
            <div class="md:w-2/4 italic font-semibold">
              <div>{{contact.contact_email}}</div>
            </div>
          </div>
          <div class="md:flex mb-6">
            <div class="md:w-2/4">
              <div
                class="block text-blue-700 font-bold md:text-right mb-1 md:mb-0 pr-4"
                for="inline-full-name"
              >Phone:</div>
            </div>
            <div class="md:w-2/4 italic font-semibold">
              <div>{{contact.contact_phone}}</div>
            </div>
          </div>
        </div>
        <div class="md:w-1/2">
          <div v-if="contact.alternative_person" class="md:flex">
            <div class="md:w-2/4">
              <div
                class="block text-blue-700 font-bold md:text-right mb-1 md:mb-0 pr-4"
                for="inline-full-name"
              >AName:</div>
            </div>
            <div class="md:w-2/4 italic font-semibold">
              <div>{{contact.alternative_person}}</div>
            </div>
          </div>
          <div v-if="contact.alternative_person_email" class="md:flex md:items-center mb-6">
            <div class="md:w-2/4">
              <div
                class="block text-blue-700 font-bold md:text-right mb-1 md:mb-0 pr-4"
                for="inline-full-name"
              >AEmail:</div>
            </div>
            <div class="md:w-2/4 italic font-semibold">
              <div>{{contact.alternative_person_email}}</div>
            </div>
          </div>
          <div class="md:flex md:items-center mb-6" v-if="contact.alternative_person_phone">
            <div class="md:w-2/4">
              <div
                class="block text-blue-700 font-bold md:text-right mb-1 md:mb-0 pr-4"
                for="inline-full-name"
              >APhone:</div>
            </div>
            <div class="md:w-2/4 italic font-semibold">
              <div>{{contact.alternative_person_phone}}</div>
            </div>
          </div>
        </div>
      </div>
      <div class="md:flex md:items-center mb-6">
        <div class="md:w-2/4">
          <button
            @click="editContact(contact)"
            class="inline-block leading-tight bg-blue-700 border border-blue-700 hover:bg-blue-600 px-3 py-2 text-white no-underline"
          >Edit Contact</button>
        </div>
        <div class="md:w-2/4 italic font-semibold">
          <button
            @click="deleteContact(contact)"
            class="inline-block leading-tight bg-red-700 border border-red-700 hover:bg-red-600 px-3 py-2 text-white no-underline"
          >Delete Contact</button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["contact"],
  methods: {
    async editContact(contact) {
      console.log("contact", contact);
      window.location = `/contacts/${contact.id}/edit`;
    },

    async deleteContact(contact) {
      await Confirmation.confirm(
        "This action is irreversible",
        "Are you sure about this operation?"
      ).then(done =>
        axios.delete("/contacts/" + contact.id).then(response => {})
      );
      await Flash.success("You have successfully archived Contact");
      //   this.$emit("contact:deleted", team);

      window.location = `/contacts`;
    }
  },
  created() {
    console.log(this.contact);
  }
};
</script>
