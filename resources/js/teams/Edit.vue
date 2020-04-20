<template>
    <div>
        <div
            class="w-full mt-4 justify-center align-center lg:flex"
        >
            <form
                class="bg-white rounded px-8 pt-6 pb-8 mb-4"
                method="post"
                @submit.prevent="
                    updateTeam()
                "
            >
                <div
                    class="flex flex-wrap -mx-3 mb-6"
                >
                    <div
                        class="w-full md:w-1/2 px-3 mb-6 md:mb-0"
                    >
                        <InputComponent
                            :form="
                                form
                            "
                            label="Team Code"
                            name="team_code"
                        />
                    </div>
                    <div
                        class="w-full md:w-1/2 px-3"
                    >
                        <InputComponent
                            :form="
                                form
                            "
                            label="Team Name"
                            name="team_name"
                        />
                    </div>
                </div>
                <div
                    class="mb-4"
                >
                    <SelectComponent
                        :form="
                            form
                        "
                        label="Team Leader"
                        name="team_leader"
                        :options="
                            options_users
                        "
                    />
                </div>
                <div
                    class="flex items-center"
                >
                    <submitButton
                        :form="
                            form
                        "
                        type="submit"
                        text="Update a Team"
                    />
                    <button
                        type="button"
                        @click="
                            cancelOperation()
                        "
                        class="inline-block leading-tight ml-2 bg-white border border-red-700 hover:text-red-700  px-2 py-2 text-red-800 no-underline"
                    >
                        Cancel
                    </button>
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
            form: new MyForm(
                {}
            ),
            options_users: []
        };
    },

    created() {
        console.log(
            "team-ccjnscdcnscnscnscns",
            this
                .team
        );
        this.updatefields(
            this
                .form
        );
        this.fetchUsers();
    },
    mounted() {
        this.$nextTick(
            function() {
                this.updatefields(
                    this
                        .form
                );
            }
        );
    },
    methods: {
        updatefields(
            form
        ) {
            form.updateField(
                "team_code",
                this
                    .team
                    .team_code
            );
            form.updateField(
                "team_name",
                this
                    .team
                    .team_name
            );
            form.updateField(
                "team_leader",
                this
                    .team
                    .team_leader
            );
        },
        updateTeam() {
            this.form
                .put(
                    `/teams/${this.team.id}`
                )
                .then(
                    (
                        data
                    ) => {
                        this.$emit(
                            "team:updated",
                            data
                        );
                    }
                )
                .catch(
                    (
                        errors
                    ) =>
                        Flash.error(
                            "Something went wrong! please try again"
                        )
                );
        },
        async cancelOperation() {
            this.$emit(
                "operation:cancelled"
            );
        },
        async fetchUsers() {
            await axios
                .get(
                    "/users/data"
                )
                .then(
                    ({
                        data: {
                            data
                        }
                    }) =>
                        (this.options_users = data)
                );
        }
    }
};
</script>
