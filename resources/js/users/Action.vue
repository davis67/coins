<template>
  <div>
    <div>
      <div>
        <p
          class="italic text-xs py-3 bg-blue-300 rounded my-4 border border-blue-500"
        >Dear Admin,This biography belongs to {{user.name}} and {{user.gender =="female"? "she": "he"}} is in {{user.team.team_name}} team.</p>
      </div>
      <button
        @click="changePermissions(user.permission.id)"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4"
      >Change the Permissions</button>
      <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4">Edit User</button>
      <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Archive User</button>
    </div>
  </div>
</template>
<script>
import axios from "axios";
export default {
  props: {
    dataUser: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      form: new MyForm({}),
      user: this.dataUser,
      isEditingPermission: false
    };
  },
  created() {
    // console.log(this.dataUser);
  },
  methods: {
    changePermissions(permissionId) {
      Confirmation.confirm("Do you want to Leave this Page?", "Continue").then(
        done => (window.location = `/permissions/${permissionId}/edit`)
      );
    },

    updatePermissions() {
      console.log(this.form);
      //   axios.put(`/permissions/${this.user.permission.id}`, [
      //     this.actions,
      //     this.resourceAction
      //   ]);
    }
  }
};
</script>
