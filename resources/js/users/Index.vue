<template>
    <div>
        <div
            class="flex flex-col"
        >
            <div
                class="flex justify-between"
            >
                <div
                    class="mb-6"
                >
                    <nav
                        class="sm:hidden"
                    >
                        <a
                            href="#"
                            class="flex items-center text-sm leading-5 font-medium text-gray-500 hover:text-gray-700 focus:outline-none focus:underline transition duration-150 ease-in-out"
                        >
                            <svg
                                class="flex-shrink-0 -ml-1 mr-1 h-5 w-5 text-gray-400"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                            Back
                        </a>
                    </nav>
                    <nav
                        class="hidden sm:flex items-center text-sm leading-5 font-medium"
                    >
                        <a
                            href="#"
                            class="text-gray-500 hover:text-gray-700 focus:outline-none focus:underline transition duration-150 ease-in-out"
                            >Home</a
                        >
                        <svg
                            class="flex-shrink-0 mx-2 h-5 w-5 text-gray-400"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"
                            />
                        </svg>
                        <a
                            href="#"
                            class="text-gray-500 hover:text-gray-700 focus:outline-none focus:underline transition duration-150 ease-in-out"
                            >users</a
                        >
                        <svg
                            class="flex-shrink-0 mx-2 h-5 w-5 text-gray-400"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"
                            />
                        </svg>
                        <a
                            href="#"
                            class="text-gray-500 hover:text-gray-700 focus:outline-none focus:underline transition duration-150 ease-in-out"
                            >view
                            all
                            users</a
                        >
                    </nav>
                </div>
                <div
                    class="btn-group"
                    slot="icons"
                >
                    <button
                        class="inline-block leading-tight bg-red-800 border border-red-700 hover:bg-red-700 text-sm lg:text-md px-2 md:px-3 py-1 md:py-2 text-white no-underline shadow-md"
                        @click.prevent="
                            addingUser
                        "
                    >
                        New
                        user
                    </button>
                </div>
            </div>
            <div
                class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8"
            >
                <div
                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200"
                >
                    <div
                        class="flex justify-between p-4 m-4"
                    >
                        <div
                            class="flex justify-between items-center"
                        >
                            <span
                                class="mx-2 font-size-1 md:font-size-2 text-dark"
                                >Show</span
                            >
                            <select
                                class="block appearance-none md:font-size-1 bg-white border border-gray-700 py-1 px-2 md:pr-8 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                                @change="
                                    changePerPage
                                "
                            >
                                <option
                                    selected
                                    >5</option
                                >
                                <option
                                    >10</option
                                >
                                <option
                                    >25</option
                                >
                                <option
                                    >50</option
                                >
                                <option
                                    >100</option
                                >
                                <option
                                    >All</option
                                >
                            </select>
                            <span
                                class="mx-2 font-size-2 hidden text-dark lg:block"
                                >Entries</span
                            >
                        </div>
                        <div
                            class="hidden lg:block"
                        >
                            Page
                            <span
                                >{{
                                    pagination.currentPage
                                }}</span
                            >
                            of
                            <span
                                >{{
                                    pagination.lastPage
                                }}</span
                            >
                        </div>
                        <input
                            class="block appearance-none bg-white border border-gray-700 py-1 px-1 pr-8 rounded focus:outline-none focus:bg-white focus:border-gray-500 w-3/4 ml-2 lg:w-auto lg:py-2 lg:px-2"
                            type="search"
                            placeholder="Search..."
                            v-model="
                                query
                            "
                        />
                    </div>
                    <table
                        class="min-w-full"
                    >
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    StaffId
                                </th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Name
                                </th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Title
                                </th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Status
                                </th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Reports
                                    To
                                </th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Role
                                </th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50"
                                ></th>
                            </tr>
                        </thead>
                        <tbody
                            class="bg-white"
                        >
                            <tr
                                v-for="user in pagination.collection"
                                :key="
                                    user.id
                                "
                                class="hover:bg-gray-100"
                            >
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500"
                                >
                                    {{
                                        user.staffId
                                    }}
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"
                                >
                                    <div
                                        class="flex items-center"
                                    >
                                        <div
                                            class="flex-shrink-0 h-10 w-10"
                                        >
                                            <img
                                                class="h-10 w-10 rounded-full"
                                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                alt=""
                                            />
                                        </div>
                                        <div
                                            class="ml-4"
                                        >
                                            <div
                                                class="text-sm leading-5 font-medium text-gray-900"
                                            >
                                                {{
                                                    user.name
                                                }}
                                            </div>
                                            <div
                                                class="text-sm leading-5 text-gray-500"
                                            >
                                                {{
                                                    user.email
                                                }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"
                                >
                                    <div
                                        class="text-sm leading-5 text-gray-900"
                                    >
                                        Director
                                    </div>
                                    <div
                                        class="text-sm leading-5 text-gray-500"
                                    >
                                        Human
                                        Resources
                                    </div>
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"
                                >
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"
                                    >
                                        Active
                                    </span>
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500"
                                >
                                    Owner
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500"
                                >
                                    {{
                                        user.reportsTo
                                    }}
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium"
                                >
                                    <a
                                        href="#"
                                        @click.prevent="
                                            beforeOpen(
                                                user
                                            )
                                        "
                                        class="text-indigo-00 hover:text-indigo-900 focus:outline-none focus:underline mr-2"
                                        ><i
                                            class="fas fa-pen"
                                        ></i
                                    ></a>
                                    <a
                                        href="#"
                                        @click.prevent="
                                            deleteuser(
                                                user
                                            )
                                        "
                                        class="text-red-800 hover:text-red-700 focus:outline-none focus:underline"
                                        ><i
                                            class="fas fa-trash"
                                        ></i
                                    ></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <pagination-links
                        :paginator="
                            pagination
                        "
                    ></pagination-links>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Paginator from "../tables/Paginator";
import PaginationLinks from "../tables/links";
export default {
    components: {
        PaginationLinks
    },
    data() {
        return {
            isOpen: false,
            isViewing: false,
            large: false,
            query:
                "",
            users: {},
            user: {}
        };
    },
    created() {
        this.fetchUsers();
    },
    methods: {
        async fetchUsers() {
            try {
                let users = await axios.get(
                    "/users/data"
                );
                console.log(
                    users
                );
                this.users = new Paginator(
                    users.data.data
                );
                this.rows = this.users.items;
            } catch (error) {
                console.log(
                    error
                );
            }
        },
        addingUser() {
            Confirmation.confirm(
                "Do you want to Leave this Page?",
                "Continue"
            ).then(
                (
                    done
                ) =>
                    (window.location = `/users/create`)
            );
        },
        changePerPage(
            event
        ) {
            this.users.perPage =
                event.target.value;
        },
        getUser(
            user
        ) {
            this.isEditing = true;
            this.user = user;
        },

        async getSingleUser(
            user
        ) {
            this.isViewing = true;
            this.user = user;
        },
        performFilter(
            users
        ) {
            return users.filter(
                (
                    row
                ) => {
                    return Object.keys(
                        row
                    ).some(
                        (
                            key
                        ) => {
                            return (
                                String(
                                    row[
                                        key
                                    ]
                                )
                                    .toLowerCase()
                                    .indexOf(
                                        this.query.toLowerCase()
                                    ) >
                                -1
                            );
                        }
                    );
                }
            );
        }
    },
    computed: {
        filteredUsers() {
            this.users.items = this.rows;
            if (
                this
                    .query
            ) {
                return this.performFilter(
                    this
                        .users
                        .items
                );
            }
            return this
                .users
                .items;
        },
        pagination() {
            let users = this
                .users;
            users.items = this.filteredUsers;
            return users;
        }
    }
};
</script>
<style
    lang="sass"
    scoped
></style>
