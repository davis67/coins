<template>
    <div>
        <modal-component
            :size="large"
            :show.sync="isViewing"
        >
            <span slot="modal-title"
                >Choose a preferred action</span
            >
            <Action
                @user:actioned="ActionTriggered"
                :data-user="user"
                slot="modal-body"
            ></Action>
        </modal-component>
        <data-table
            :data="users"
            title="Showing All Registered Users"
            :rowClickable="true"
            @rowClicked="getSingleUser"
        >
            <div class="btn-group" slot="icons">
                <button
                    class="inline-block leading-tight text-red-800 border border-red-800 hover:text-red-700 px-3 py-2 bg-white no-underline shadow-md"
                    @click.prevent="addingTeam = true"
                >
                    Archived Users
                </button>
                <button
                    class="inline-block leading-tight bg-red-800 border border-red-800 hover:bg-red-700 px-3 py-2 text-white no-underline shadow-md"
                    @click.prevent="addingUser"
                >
                    New User
                </button>
            </div>
            <tableCol
                data-key="staffId"
                label="Staff ID"
            ></tableCol>
            <tableCol
                data-key="name"
                label="Full Names"
            ></tableCol>
            <tableCol
                data-key="gender"
                label="Gender"
            ></tableCol>
            <tableCol
                data-key="email"
                label="Email"
            ></tableCol>
            <tableCol
                data-key="reportsTo"
                label="Supervisor"
            ></tableCol>
            <tableCol
                data-key="userStatus"
                label="Status"
            ></tableCol>
        </data-table>
    </div>
</template>
<script>
import Action from "./Action";
export default {
    components: { Action },
    data() {
        return {
            isOpen: false,
            isViewing: false,
            large: false,
            users: {},
            user: {},
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
            await axios
                .get("/users/data")
                .then(
                    ({ data: { data } }) =>
                        (this.users = data),
                );
        },
        addingUser() {
            Confirmation.confirm(
                "Do you want to Leave this Page?",
                "Continue",
            ).then(
                (done) =>
                    (window.location = `/users/create`),
            );
        },
        async getSingleUser(user) {
            this.isViewing = true;
            this.user = user;
        },
    },
};
</script>
<style lang="sass" scoped></style>
