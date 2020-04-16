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
                                    class=" m-4 ml-8 capitalise font-bold text-center"
                                    v-if="
                                        opportunity.team_name
                                    "
                                    >{{
                                        opportunity.team_name
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
                                <ul
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
                                                Agaba
                                                Davis
                                            </span>
                                        </div>
                                        <div
                                            class="ml-4 flex-shrink-0"
                                        >
                                            <a
                                                href="#"
                                                class="font-medium text-red-800 hover:text-red-600 transition duration-150 ease-in-out"
                                            >
                                                Remove
                                            </a>
                                        </div>
                                    </li>
                                    <li
                                        class="border-t border-gray-200 pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5"
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
                                                Agaba
                                                Davis
                                            </span>
                                        </div>
                                        <div
                                            class="ml-4 flex-shrink-0"
                                        >
                                            <a
                                                href="#"
                                                class="font-medium text-red-800 hover:text-red-600 transition duration-150 ease-in-out"
                                            >
                                                Remove
                                            </a>
                                        </div>
                                    </li>
                                </ul>
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
                                <ul
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
                                                    fill-rule="evenodd"
                                                    d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                            <span
                                                class="ml-2 flex-1 w-0 truncate"
                                            >
                                                resume_back_end_developer.pdf
                                            </span>
                                        </div>
                                        <div
                                            class="ml-4 flex-shrink-0"
                                        >
                                            <a
                                                href="#"
                                                class="font-medium text-red-800 hover:text-red-600 transition duration-150 ease-in-out"
                                            >
                                                Download
                                            </a>
                                        </div>
                                    </li>
                                    <li
                                        class="border-t border-gray-200 pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5"
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
                                            >
                                                coverletter_back_end_developer.pdf
                                            </span>
                                        </div>
                                        <div
                                            class="ml-4 flex-shrink-0"
                                        >
                                            <a
                                                href="#"
                                                class="font-medium text-red-800 hover:text-red-600 transition duration-150 ease-in-out"
                                            >
                                                Download
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </dd>
                            <div
                                class="p-4"
                            >
                                <a
                                    href="#"
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
            isOpen: false,
            isCreating: false,
            isEditing: false,
            opportunity: this
                .dataOpportunity
        };
    },
    created() {
        console.log(
            this
                .dataOpportunity
        );
    },
    methods: {
        getopportunity(
            opportunity
        ) {
            this.isEditing = true;
            this.opportunity = opportunity;
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
        viewOpportunity(
            opportunity
        ) {
            Confirmation.confirm(
                "Do you want to Leave this Page?",
                "Continue"
            ).then(
                (
                    done
                ) =>
                    (window.location = `/opportunities/${opportunity.id}`)
            );
        },

        async registeredopportunity(
            opportunity
        ) {
            Flash.success(
                "You have successfully added an opportunity"
            );
            await this.fetchopportunities(); // or vue.set(this.opportunities, opportunity.id, opportunity)
            this.isCreating = false;
        },
        async updatedOpportunity(
            opportunity
        ) {
            Flash.success(
                "You have successfully updated opportunity"
            );
            await this.fetchOpportunities(); // or vue.set(this.opportunities, opportunity.id, opportunity)
        },

        cancelEditing() {
            this.$modal.hide(
                "edit_opportunity_modal"
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
    lang="sass"
    scoped
></style>
