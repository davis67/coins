<template>
    <div>
        <FlashComponent></FlashComponent>
        <div
            class="mt-6 bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6"
        >
            <form
                method="post"
                @submit.prevent="
                    addOpportunity
                "
            >
                <div
                    class="md:grid md:grid-cols-3 md:gap-6"
                >
                    <div
                        class="md:col-span-1"
                    >
                        <h3
                            class="text-lg font-medium leading-6 text-gray-900"
                        >
                            General
                            Information
                        </h3>
                        <p
                            class="mt-1 text-sm leading-5 text-gray-500"
                        >
                            Please
                            provide
                            general
                            name
                            of
                            the
                            Opportunity,
                            its
                            type
                            ,
                            sales
                            stage,
                            client
                            and
                            the
                            country
                            of
                            origin.If
                            the
                            client
                            is
                            new,
                            you
                            need
                            to
                            first
                            register
                            them.
                        </p>
                    </div>

                    <div
                        class="mt-5 md:mt-0 md:col-span-2"
                    >
                        <div
                            class="grid grid-cols-6 gap-6"
                        >
                            <div
                                class="col-span-6"
                            >
                                <InputComponent
                                    :form="
                                        form
                                    "
                                    label="Opportunity Name"
                                    name="opportunity_name"
                                />
                            </div>
                            <div
                                class="col-span-6 sm:col-span-6 lg:col-span-2"
                            >
                                <SelectComponent
                                    :form="
                                        form
                                    "
                                    label="Type"
                                    name="type"
                                    :options="
                                        options_type
                                    "
                                />
                            </div>

                            <div
                                class="col-span-6 sm:col-span-3 lg:col-span-2"
                            >
                                <SelectComponent
                                    :form="
                                        form
                                    "
                                    label="Sales Stage"
                                    name="sales_stage"
                                    :options="
                                        sale_stage_option
                                    "
                                />
                            </div>

                            <div
                                class="col-span-6 sm:col-span-3 lg:col-span-2"
                            >
                                <SelectComponent
                                    :form="
                                        form
                                    "
                                    label="Country"
                                    name="country"
                                    :options="
                                        countries
                                    "
                                />
                            </div>
                            <div
                                class="col-span-6 sm:col-span-4"
                            >
                                <InputComponent
                                    :form="
                                        form
                                    "
                                    label="Client Name"
                                    name="clients_name"
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="md:grid md:grid-cols-3 mt-8 border-t border-gray-400 md:gap-6"
                >
                    <div
                        class="md:col-span-1 pt-4"
                    >
                        <h3
                            class="text-lg font-medium leading-6 text-gray-900"
                        >
                            Funders'
                            Information
                        </h3>
                        <p
                            class="mt-1 text-sm leading-5 text-gray-500"
                        >
                            Input
                            the
                            funders
                            of
                            the
                            opportunity,
                            the
                            lead
                            source
                            and
                            the
                            amount
                            of
                            money
                            allocated
                            on
                            the
                            opportunity
                            on
                            the
                            revenue
                            input.If
                            the
                            amount
                            is
                            not
                            allocated,
                            Record
                            0
                            as
                            the
                            revenue.
                        </p>
                    </div>
                    <div
                        class="mt-5 md:mt-0 pt-6 md:col-span-2"
                    >
                        <div
                            class="grid grid-cols-6 gap-6"
                        >
                            <div
                                class="col-span-6"
                            >
                                <InputComponent
                                    :form="
                                        form
                                    "
                                    label="Funded By"
                                    name="funder"
                                />
                            </div>
                            <div
                                class="col-span-6 sm:col-span-3"
                            >
                                <SelectComponent
                                    :form="
                                        form
                                    "
                                    label="Lead Source"
                                    name="lead_source"
                                    :options="
                                        leads_source_option
                                    "
                                />
                            </div>

                            <div
                                class="col-span-6 sm:col-span-3"
                            >
                                <InputComponent
                                    :form="
                                        form
                                    "
                                    label="Revenue"
                                    name="revenue"
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="md:grid md:grid-cols-3 mt-8 md:gap-6  border-t border-gray-400"
                >
                    <div
                        class="md:col-span-1  pt-4"
                    >
                        <h3
                            class="text-lg font-medium leading-6 text-gray-900"
                        >
                            Assigned
                            Team
                        </h3>
                        <p
                            class="mt-1 text-sm leading-5 text-gray-500"
                        >
                            Assign
                            the
                            opportunity
                            to
                            the
                            relevant
                            team
                            and
                            the
                            team
                            leader
                            will
                            allocate
                            the
                            consultants
                            to
                            work
                            on
                            this
                            opportunity.
                        </p>
                    </div>
                    <div
                        class="mt-5 md:mt-0 md:col-span-2 pt-6"
                    >
                        <div
                            class="grid grid-cols-6 gap-6"
                        >
                            <div
                                class="col-span-6 sm:col-span-4"
                            >
                                <SelectComponent
                                    :form="
                                        form
                                    "
                                    label="Team"
                                    name="team"
                                    :options="
                                        teams
                                    "
                                />
                            </div>
                            <div
                                class="col-span-6 sm:col-span-3"
                            >
                                <DateComponent
                                    :form="
                                        form
                                    "
                                    type="date"
                                    label="Internal Dealine"
                                    name="internal_deadline"
                                />
                            </div>

                            <div
                                class="col-span-6 sm:col-span-3"
                            >
                                <DateComponent
                                    :form="
                                        form
                                    "
                                    type="date"
                                    label="External Dealine"
                                    name="external_deadline"
                                />
                            </div>
                        </div>
                        <div
                            class="flex"
                        >
                            <div
                                class="py-6"
                            >
                                <submitButton
                                    :form="
                                        form
                                    "
                                    type="submit"
                                    text="Add Opportunity"
                                />
                            </div>
                            <div
                                class="px-2 py-6"
                            >
                                <button
                                    type="button"
                                    class="inline-block leading-tight text-red-800 border border-red-800 hover:text-red-700 px-3 py-2 bg-white no-underline"
                                >
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
export default {
    props: [
        "dataCountries",
        "dataTeams"
    ],
    data() {
        return {
            form: new MyForm(
                {}
            ),
            options_type: [
                "Existing Business",
                "New Business"
            ],
            leads_source_option: [
                "Cold call",
                "Existing customer",
                "Self Generated",
                "Employee",
                "Partner",
                "Public Relations",
                "Direct Mail",
                "Conference",
                "Trade Show",
                "website",
                "word of mouth",
                "Email",
                "Compaign",
                "other"
            ],
            sale_stage_option: [
                "Prospecting",
                "EOI",
                "Needs Analysis",
                "Value Proposition",
                "Id Decision Analysis",
                "Perception Analysis",
                "Propasal Price Quote",
                "Negotiation Review",
                "CLosed Won",
                "Closed Lost",
                "Submitted",
                "Did Not Pursue",
                "Not Submitted"
            ],
            countries: this
                .dataCountries,
            teams: this
                .dataTeams
        };
    },
    created() {},
    methods: {
        addOpportunity() {
            this.form
                .post(
                    "/opportunities"
                )
                .then(
                    (
                        data
                    ) => {
                        this.$emit(
                            "created",
                            data
                        );
                        Flash.success(
                            "You have successfully added an Opportunity"
                        );
                        window.location = `/opportunities`;
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
        }
    }
};
</script>
<style
    scoped="scss"
></style>
