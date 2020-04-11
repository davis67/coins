<template>
    <div class="w-full mx-auto justify-center items-center">
        <FlashComponent></FlashComponent>

        <form
            class="mx-auto px-4 w-10/12 pt-6 pb-8 mb-4"
            method="post"
            @submit.prevent="addUser"
        >
            <div class="mt-2 px-4 py-2">
                <p class="text-lg">Company Information</p>
                <span class="text-sm text-gray-500"
                    >This iformation is given to you by the
                    company</span
                >

                <div class="mb-4">
                    <InputComponent
                        :form="form"
                        label="Staff Name"
                        name="name"
                    />
                </div>
                <div class="mb-4 flex">
                    <div class="mb-4">
                        <InputComponent
                            :form="form"
                            label="Staff ID Number"
                            name="staffId"
                        />
                    </div>

                    <div class=" ml-3 mb-4">
                        <InputComponent
                            :form="form"
                            label="Email"
                            name="email"
                        />
                    </div>
                </div>
            </div>
            <div class="mt-2 px-4 py-2">
                <p class="text-lg">Other Information</p>
                <span class="text-sm text-gray-500"
                    >This information is given to you by the
                    company</span
                >
                <div class="mb-4 flex w-full">
                    <div class="flex-1">
                        <SelectComponent
                            :form="form"
                            label="Team"
                            name="team_id"
                            :options="options_team"
                        />
                    </div>
                    <div class="ml-2 flex-1">
                        <SelectComponent
                            :form="form"
                            label="Title"
                            name="title_id"
                            :options="options_title"
                        />
                    </div>
                    <div class="ml-2 flex-1">
                        <SelectComponent
                            :form="form"
                            label="Reports To"
                            name="reportsTo"
                            :options="options_users"
                        />
                    </div>
                </div>
            </div>
            <div class=" px-4 py-4 ">
                <p class="text-lg">Personal Information</p>
                <span class="text-sm text-gray-500"
                    >This information is given to you by the
                    company</span
                >
                <div class="mb-6">
                    <InputComponent
                        :form="form"
                        label="Address"
                        name="address"
                    />
                </div>
                <div class="mb-4 flex w-full">
                    <div class="">
                        <InputComponent
                            :form="form"
                            label="Telephone "
                            name="mobilePhone"
                        />
                    </div>
                    <div class="ml-2">
                        <InputComponent
                            :form="form"
                            label="Telephone 2"
                            name="alternativePhone"
                        />
                    </div>
                    <div class="ml-2">
                        <SelectComponent
                            :form="form"
                            label="Gender"
                            name="gender"
                            :options="options_gender"
                        />
                    </div>
                </div>
            </div>
            <div
                class="flex items-center border-t-2 border-gray-400"
            >
                <div class="mt-2">
                    <submitButton
                        :form="form"
                        type="submit"
                        text="Register User"
                    />
                </div>
                <div class="mt-2 ml-2">
                    <button
                        type="button"
                        class="inline-block leading-tight text-red-800 border border-red-800 hover:text-red-700 px-3 py-2 bg-white no-underline"
                    >
                        Cancel
                    </button>
                </div>
            </div>
        </form>
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
            options_users: this.dataUsers,
        };
    },
    created() {},
    methods: {
        addUser() {
            this.form
                .post("/users")
                .then((data) => {
                    this.$emit("created", data);
                    Flash.success(
                        "You have successfully added an User",
                    );
                    window.location = `/users`;
                })
                .catch((errors) =>
                    Flash.error(
                        "Something went wrong! please try again",
                    ),
                );
        },
    },
};
</script>
