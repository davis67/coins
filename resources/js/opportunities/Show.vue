<template>
    <div>
        <FlashComponent></FlashComponent>
        <div
            class="flex flex-col"
        >
            <div
                class="bg-white shadow overflow-hidden  sm:rounded-lg"
            >
                <div
                    class="px-4 py-5 border-b border-gray-200 sm:px-6"
                >
                    <h3
                        class="text-lg leading-6 font-medium text-gray-900"
                    >
                        Opportunity
                        Information
                    </h3>
                    <p
                        class="mt-1 max-w-2xl text-sm leading-5 text-gray-500"
                    >
                        Describes
                        the
                        information
                        about
                        the
                        opportunity.
                    </p>
                </div>
                <div
                    class="px-6 py-5 sm:p-0"
                >
                    <dl>
                        <div
                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5"
                        >
                            <dt
                                class="text-sm leading-5 font-medium text-gray-500"
                            >
                                Client
                                Name
                            </dt>
                            <dd
                                class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2"
                            >
                                {{
                                    opportunity.clients_name
                                }}
                            </dd>
                        </div>

                        <div
                            class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5"
                        >
                            <dt
                                class="text-sm leading-5 font-medium text-gray-500"
                            >
                                General
                                Opportunity
                                Information
                            </dt>
                            <dd
                                class="flex w-full justify-around mt-1 p-4 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2"
                            >
                                <div
                                    class="sm:ml-2 ml-8 col-span-2"
                                >
                                    <div
                                        class="text-sm leading-5 font-medium text-gray-900"
                                    >
                                        Lead
                                        Source
                                    </div>
                                    <span
                                        class="text-sm leading-5 text-gray-500"
                                    >
                                        {{
                                            opportunity.lead_source
                                        }}
                                    </span>
                                </div>
                                <div
                                    class="sm:ml-2 ml-8 col-span-2"
                                >
                                    <div
                                        class="text-sm leading-5 font-medium text-gray-900"
                                    >
                                        OM
                                        Number
                                    </div>
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-200 text-red-800"
                                    >
                                        {{
                                            opportunity.om_number
                                        }}
                                    </span>
                                </div>
                                <div
                                    class="sm:ml-2 ml-8 col-span-2"
                                >
                                    <div
                                        class="text-sm leading-5 font-medium text-gray-900"
                                    >
                                        Type
                                    </div>
                                    <div
                                        class="text-sm leading-5 text-gray-500"
                                    >
                                        {{
                                            opportunity.type
                                        }}
                                    </div>
                                </div>
                                <div
                                    class="sm:ml-2 ml-8"
                                >
                                    <div
                                        class="text-sm leading-5 font-medium text-gray-900"
                                    >
                                        Sales
                                        Stage
                                    </div>
                                    <div
                                        class="text-sm leading-5 text-gray-500"
                                    >
                                        {{
                                            opportunity.sales_stage
                                        }}
                                    </div>
                                </div>
                                <div
                                    class="sm:ml-2 ml-8 "
                                >
                                    <div
                                        class="text-sm leading-5 font-medium text-gray-900"
                                    >
                                        Country
                                    </div>
                                    <div
                                        class="text-sm leading-5 text-gray-500"
                                    >
                                        {{
                                            opportunity.country
                                        }}
                                    </div>
                                </div>
                            </dd>
                        </div>
                        <div
                            class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5"
                        >
                            <dt
                                class="text-sm leading-5 font-medium text-gray-500"
                            >
                                Funder
                            </dt>
                            <dd
                                class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2"
                            >
                                {{
                                    opportunity.funder
                                }}
                            </dd>
                        </div>
                        <div
                            class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5"
                        >
                            <dt
                                class="text-sm leading-5 font-medium text-gray-500"
                            >
                                Revenue
                                expectation
                            </dt>
                            <dd
                                class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2"
                            >
                                {{
                                    opportunity.revenue
                                }}
                            </dd>
                        </div>
                        <div
                            class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5"
                        >
                            <dt
                                class="text-sm leading-5 font-medium text-gray-500"
                            >
                                Team
                                working
                                on
                                this
                                Opportunity
                            </dt>
                            <dd
                                class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2"
                            >
                                <span
                                    class=" m-4 ml-8 capitalise font-bold text-lg text-center"
                                    v-if="
                                        opportunity.team
                                    "
                                    >{{
                                        opportunity
                                            .team
                                            .team_name
                                    }}
                                </span>
                                <span
                                    class="text-center m-4"
                                    v-else
                                    >This
                                    opportunity
                                    has
                                    not
                                    yet
                                    been
                                    assigned
                                    to
                                    a
                                    team.Click
                                    on
                                    Edit
                                    opportunity
                                    to
                                    assign
                                    it
                                    to
                                    a
                                    team.</span
                                >
                                <div
                                    class="flex justify-around mt-4"
                                >
                                    <span>
                                        <span
                                            class="font-bold uppercase"
                                            >Internal
                                            Deadline:</span
                                        >
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-200 text-red-800"
                                        >
                                            {{
                                                opportunity.internal_deadline
                                            }}
                                        </span>
                                    </span>
                                    <span>
                                        <span
                                            class="font-bold uppercase"
                                            >External
                                            Deadline:</span
                                        >
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-200 text-red-800"
                                        >
                                            {{
                                                opportunity.external_deadline
                                            }}
                                        </span>
                                    </span>
                                </div>
                            </dd>
                        </div>
                        <div
                            class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5"
                        >
                            <dt
                                class="text-sm leading-5 font-medium text-gray-500"
                            >
                                Assigned
                                Consultants
                            </dt>
                            <dd
                                class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2"
                            >
                                <form
                                    @submit.prevent="
                                        assignConsultant
                                    "
                                    class="flex"
                                >
                                    <select
                                        v-model="
                                            consultant_id
                                        "
                                        class="block appearance-none md:font-size-1 bg-white border border-gray-700 py-1 px-2 md:pr-8 w-full m-4 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                                    >
                                        <!-- <option
                                            >Select
                                            consultants</option
                                        > -->
                                        <option
                                            v-for="consultant in consultants"
                                            :key="
                                                consultant.id
                                            "
                                            :value="
                                                consultant.id
                                            "
                                            >{{
                                                consultant.name
                                            }}</option
                                        >
                                    </select>
                                    <button
                                        type="submit"
                                        class="appearance-none md:font-size-1 bg-red-800 text-white border border-red-700 py-1 px-2 rounded  m-4 focus:border-red-800"
                                    >
                                        select
                                    </button>
                                </form>
                                <div
                                    v-if="
                                        opportunity
                                            .consultants
                                            .data
                                            .length !==
                                            0
                                    "
                                >
                                    <ul
                                        v-for="assigned in opportunity
                                            .consultants
                                            .data"
                                        :key="
                                            assigned.id
                                        "
                                        class="border border-gray-200 rounded-md"
                                    >
                                        <li
                                            class="pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5"
                                        >
                                            <div
                                                class="w-0 flex-1 flex items-center"
                                            >
                                                <svg
                                                    class="flex-shrink-0 h-5 w-5 text-gray-400"
                                                    fill="currentColor"
                                                    viewBox="0 0 20 20"
                                                >
                                                    <path
                                                        d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"
                                                    />
                                                </svg>
                                                <span
                                                    class="ml-2 flex-1 w-0 truncate"
                                                >
                                                    {{
                                                        assigned.name
                                                    }}
                                                </span>
                                            </div>
                                            <div
                                                class="ml-4 flex-shrink-0"
                                            >
                                                <a
                                                    href="#"
                                                    @click.prevent="
                                                        detachConsultant(
                                                            assigned
                                                        )
                                                    "
                                                    class="font-medium text-red-800 hover:text-red-600 transition duration-150 ease-in-out"
                                                >
                                                    Remove
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div
                                    v-else
                                >
                                    <ul
                                        class="border border-gray-200 rounded-md"
                                    >
                                        <li
                                            class="pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5"
                                        >
                                            No
                                            consultants
                                            assigned
                                            to
                                            this
                                            opportunity
                                            yet
                                        </li>
                                    </ul>
                                </div>
                            </dd>
                        </div>
                        <div
                            class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5"
                        >
                            <dt
                                class="text-sm leading-5 font-medium text-gray-500"
                            >
                                Document
                                Attachment
                            </dt>
                            <dd
                                class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2"
                            >
                                <form
                                    @submit.prevent="
                                        attachDocument
                                    "
                                    class="flex items-center"
                                    enctype="multipart/form-data"
                                    method="POST"
                                >
                                    <input
                                        type="file"
                                        id="file"
                                        ref="file"
                                        v-on:change="
                                            handleFileUpload
                                        "
                                        class="w-full"
                                    />

                                    <button
                                        type="submit"
                                        class="appearance-none md:font-size-1 bg-red-800 text-white border border-red-700 py-1 px-2 rounded  m-4 focus:border-red-800"
                                    >
                                        upload
                                    </button>
                                </form>
                                <div
                                    v-if="
                                        opportunity
                                            .documents
                                            .length !=
                                            0
                                    "
                                >
                                    <ul
                                        class="border border-gray-200 rounded-md"
                                        v-for="document in opportunity.documents"
                                        :key="
                                            document.id
                                        "
                                    >
                                        <li
                                            class="pl-3 pr-4 py-3 border border-gray-200 flex items-center justify-between text-sm leading-5"
                                        >
                                            <div
                                                class="w-0 flex-1 flex items-center"
                                            >
                                                <svg
                                                    class="flex-shrink-0 h-5 w-5 text-gray-400"
                                                    fill="currentColor"
                                                    viewBox="0 0 20 20"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                                <span
                                                    class="ml-2 flex-1 w-0 truncate"
                                                    >{{
                                                        document.original_name
                                                    }}</span
                                                >
                                            </div>
                                            <div
                                                class="ml-4 flex-shrink-0"
                                            >
                                                <a
                                                    href="#"
                                                    @click.prevent="
                                                        downloadDocument(
                                                            document
                                                        )
                                                    "
                                                    class="font-medium text-red-800 hover:text-red-600 transition duration-150 ease-in-out"
                                                >
                                                    Download
                                                </a>
                                                <a
                                                    href="#"
                                                    @click.prevent="
                                                        removeDocument(
                                                            document
                                                        )
                                                    "
                                                    class="font-medium text-red-800 hover:text-red-600 transition duration-150 ease-in-out"
                                                >
                                                    Remove
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div
                                    v-else
                                >
                                    <ul
                                        class="border border-gray-200 rounded-md"
                                    >
                                        <li
                                            class="pl-3 pr-4 py-3 border border-gray-200 flex items-center justify-between text-sm leading-5"
                                        >
                                            Opps,
                                            No
                                            documents
                                            attached
                                        </li>
                                    </ul>
                                </div>
                            </dd>
                            <div
                                class="p-4"
                            >
                                <a
                                    href="#"
                                    @click.prevent="
                                        editOpportunity
                                    "
                                    class="inline-block leading-tight bg-red-800 border border-red-800 hover:bg-red-700 px-3 py-2 text-white no-underline rounded"
                                >
                                    Edit
                                    Opportunity
                                </a>
                            </div>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: [
        "dataOpportunity"
    ],
    data() {
        return {
            isCreating: false,
            consultants: [],
            consultant_id:
                "",
            file:
                "",
            opportunity: this
                .dataOpportunity
        };
    },
    created() {
        this.getUsers();
        console.log(
            this
                .dataOpportunity
        );
    },
    methods: {
        downloadDocument(
            document
        ) {
            axios
                .get(
                    `/opportunities/${this.opportunity.id}/download/${document.id}`
                )
                .then(
                    (
                        response
                    ) => {
                        if (
                            response
                        ) {
                        }
                    }
                )
                .catch(
                    (
                        error
                    ) => {
                        console.log(
                            error
                        );
                    }
                );
        },
        async removeDocument(
            document
        ) {
            await Confirmation.confirm(
                "Do you want to delete a file?",
                "Continue"
            ).then(
                (
                    done
                ) => {
                    axios
                        .get(
                            `/opportunities/${this.opportunity.id}/remove/${document.id}`
                        )
                        .then(
                            (
                                response
                            ) => {
                                if (
                                    response
                                ) {
                                    console.log(
                                        response
                                    );
                                }
                                window.location = `/opportunities/${this.opportunity.id}`;
                            }
                        )
                        .catch(
                            (
                                error
                            ) => {
                                console.log(
                                    error
                                );
                            }
                        );
                }
            );
        },
        handleFileUpload(
            e
        ) {
            this.file =
                e.target.files[0];
        },
        attachDocument() {
            let formData = new FormData();
            formData.append(
                "file",
                this
                    .file
            );

            axios
                .post(
                    `/opportunities/${this.opportunity.id}/upload`,
                    formData,
                    {
                        headers: {
                            "Content-Type":
                                "multipart/form-data"
                        }
                    }
                )
                .then(
                    (
                        response
                    ) => {
                        if (
                            response.data ==
                            "success"
                        ) {
                            Flash.success(
                                "You have successfully assigned consultant to this opportunity"
                            );
                            window.location = `/opportunities/${this.opportunity.id}`;
                        }
                    }
                )
                .catch(
                    (
                        error
                    ) => {
                        console.log(
                            error
                        );
                    }
                );
        },
        async assignConsultant() {
            try {
                let response = await axios.get(
                    `/opportunities/${this.opportunity.id}/assign/${this.consultant_id}`
                );
                if (
                    response.data ==
                    "success"
                ) {
                    this.consultant_id =
                        "";
                    Flash.success(
                        "You have successfully assigned consultant to this opportunity"
                    );
                    window.location = `/opportunities/${this.opportunity.id}`;
                }
            } catch (error) {
                console.log(
                    error
                );
            }
        },
        async detachConsultant(
            consultant
        ) {
            console.log(
                consultant
            );
            await Confirmation.confirm(
                "Do you want to remove this consultant?",
                "Continue"
            ).then(
                (
                    done
                ) => {
                    axios
                        .get(
                            `/opportunities/${this.opportunity.id}/removeconsultant/${consultant.id}`
                        )
                        .then(
                            (
                                response
                            ) => {
                                Flash.success(
                                    "You have successfully assigned consultant to this opportunity"
                                );
                                window.location = `/opportunities/${this.opportunity.id}`;
                            }
                        )
                        .catch(
                            (
                                error
                            ) => {
                                console.log(
                                    error
                                );
                            }
                        );
                }
            );
        },
        async getUsers() {
            try {
                let consultants = await axios.get(
                    "/users/data"
                );
                this.consultants =
                    consultants.data.data;
            } catch (error) {
                console.log(
                    error
                );
            }
        },
        addingOpportunity() {
            Confirmation.confirm(
                "Do you want to Leave this Page?",
                "Continue"
            ).then(
                (
                    done
                ) =>
                    (window.location = `/opportunities/create`)
            );
        },
        editOpportunity() {
            Confirmation.confirm(
                "Do you want to Leave this Page?",
                "Continue"
            ).then(
                (
                    done
                ) =>
                    (window.location = `/opportunities/${this.opportunity.id}/edit`)
            );
        },
        async deleteOpportunity(
            opportunity
        ) {
            await Confirmation.confirm(
                "This action is irreversible",
                "Do you want to delete a opportunity?"
            )
                .then(
                    (
                        done
                    ) =>
                        axios
                            .delete(
                                "/opportunities/" +
                                    opportunity.opportunity_id
                            )
                            .then(
                                (
                                    response
                                ) => {}
                            )
                )
                .catch(
                    (
                        error
                    ) => {
                        console.log(
                            error
                        );
                    }
                );

            await this.fetchOpportunities(); // or vue.set(this.opportunities, opportunity.id, opportunity)

            Flash.success(
                "You have successfully deleted a opportunity"
            ),
                this.$emit(
                    "opportunity:deleted",
                    opportunity
                );
        }
    },

    computed: {
        filteredOpportunities() {
            this.opportunities.items = this.rows;
            if (
                this
                    .query
            ) {
                return this.performFilter(
                    this
                        .opportunities
                        .items
                );
            }
            return this
                .opportunities
                .items;
        },
        pagination() {
            let opportunities = this
                .opportunities;
            opportunities.items = this.filteredOpportunities;
            return opportunities;
        }
    }
};
</script>
<style
    scoped
></style>
