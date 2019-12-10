<template>
  <div class="w-full">
    <div class="mx-auto w-full shadow-inset text-gray-700 mb-2">
      <div class="mx-auto py-4 pr-6 md:mr-10">
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/4">
            <div
              class="block text-blue-700 font-bold md:text-right mb-1 md:mb-0 pr-4"
              for="inline-full-name"
            >Contact Name:</div>
          </div>
          <div class="md:w-2/4">
            <div class="italic font-semibold">
              <p>{{contact.account_name}}</p>
            </div>
          </div>
        </div>
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/4">
            <label
              class="block text-blue-700 font-bold md:text-right mb-1 md:mb-0 pr-4"
              for="inline-username"
            >Full Address:</label>
          </div>
          <div class="md:w-3/4">
            <p>{{contact.full_address}}</p>
          </div>
        </div>
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/4"></div>
          <div class="md:w-3/4 block font-bold">
            <span class="text-lg">
              <span class="text-blue-700">Country:</span>
              {{contact.country}}
            </span>
          </div>
        </div>
      </div>
      <div class="mx-auto pr-6 md:mr-10">
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/4">
            <div
              class="block text-blue-700 font-bold md:text-right mb-1 md:mb-0 pr-4"
              for="inline-full-name"
            >Alterative Address:</div>
          </div>
          <div class="md:w-2/4">
            <div>{{contact.alternate_address}}</div>
          </div>
        </div>
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/4">
            <label
              class="block text-blue-700 font-bold md:text-right mb-1 md:mb-0 pr-4"
              for="inline-username"
            >Funded By</label>
          </div>
          <div class="md:w-3/4">
            <p>{{contact.account_name}}</p>
          </div>
        </div>
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/4"></div>
          <div class="md:w-3/4 md:flex block font-bold">
            <p>something here</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["contact"],

  created() {
    console.log(this.contact);
  }
};
</script>
