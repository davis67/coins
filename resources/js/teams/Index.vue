<template>
  <div>
    <FlashComponent></FlashComponent>
    <modal-component
      :name="
        create_team_modal
      "
    >
      <span
        slot="modal-title"
        >Create a
        New
        Team</span
      >
      <CreateTeams
        @team:created="
          registeredTeam
        "
        slot="modal-body"
      ></CreateTeams>
    </modal-component>
    <modal-component
      :name="
        edit_team_modal
      "
      @before-open="
        beforeOpen
      "
    >
      <span
        slot="modal-title"
        >Update an
        Existing
        Team</span
      >
      <EditTeam
        @team:updated="
          updatedTeam
        "
        @operation:cancelled="cancelEditing"
        :team="team"
        slot="modal-body"
      ></EditTeam>
    </modal-component>
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
              >Teams</a
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
              teams</a
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
              $modal.show(
                'create_team_modal',
              )
            "
          >
            New Team
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
            class="flex justify-between mb-4"
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
                  #
                </th>
                <th
                  class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                >
                  Team
                  Name
                </th>
                <th
                  class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                >
                  Team
                  Code
                </th>
                <th
                  class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                >
                  Team
                  Leader
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
                v-for="(team,
                index) in pagination.collection"
                :key="
                  team.id
                " class="hover:bg-gray-100"
              >
                <td
                  class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium text-gray-900"
                >
                  {{
                    index +
                      1
                  }}
                </td>
                <td
                  class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500"
                >
                  {{
                    team.team_name
                  }}
                </td>
                <td
                  class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500"
                >
                  {{
                    team.team_code
                  }}
                </td>
                <td
                  class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500"
                >
                  {{
                    team.team_leader
                  }}
                </td>
                <td
                  class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium"
                >
                  <a
                    href="#"
                    @click.prevent="
                      beforeOpen(team)
                    "
                    class="text-indigo-00 hover:text-indigo-900 focus:outline-none focus:underline mr-2"
                    ><i
                      class="fas fa-pen"
                    ></i
                  ></a>
                  <a
                    href="#" @click.prevent = "deleteTeam(team)"
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
import CreateTeams from "./Create";
import EditTeam from "./Edit";
import Paginator from "../tables/Paginator";
import PaginationLinks from "../tables/links";
export default {
  components: {
    CreateTeams,
    EditTeam,
    PaginationLinks,
  },
  data() {
    return {
      isOpen: false,
      isCreating: false,
      isEditing: false,
      create_team_modal:
        "create_team_modal",
      edit_team_modal:
        "edit_team_modal",
      teams: [],
      query: "",
      rows: [],
      team: {},
    };
  },
  created() {
    console.log(
      this.teams,
    );
    this.fetchTeams();
  },
  methods: {
    beforeOpen(
      team,
    ) {
     this.team = team
      this.$modal.show(
        "edit_team_modal",
        {
          team:
            "team",
        },
      );
    },
    changePerPage(
      event,
    ) {
      this.teams.perPage =
        event.target.value;
    },
    getTeam(team) {
      this.isEditing = true;
      this.team = team;
    },

    async registeredTeam(
      team,
    ) {
      Flash.success(
        "You have successfully added an Team",
      );
      await this.fetchTeams(); // or vue.set(this.teams, team.id, team)
      this.isCreating = false;
    },
    async updatedTeam(
      team,
    ) {
      Flash.success(
        "You have successfully updated Team",
      );
      await this.fetchTeams(); // or vue.set(this.teams, team.id, team)
       await this.$modal.hide(
        "edit_team_modal")
    },

    cancelEditing(){
        this.$modal.hide(
        "edit_team_modal")

    },
    async deleteTeam(
      team,
    ) {
      await Confirmation.confirm(
        "This action is irreversible",
        "Do you want to delete a team?",
      ).then(
        (done) =>
          axios.delete(
              "/teams/" +team.team_id)
            .then(
              (
                response,
              ) => {},
            ),
      ).catch(error => {
          console.log(error)
      });

     await this.fetchTeams(); // or vue.set(this.teams, team.id, team)

      Flash.success(
              "You have successfully deleted a team",
            ),
      this.$emit(
        "team:deleted",
        team,
      );
    },
    async fetchTeams() {
      try {
        let teams = await axios.get(
          "/teams/data",
        );
        this.teams = new Paginator(
          teams.data.data,
        );
        this.rows = this.teams.items;
      } catch (error) {
        console.log(
          error,
        );
      }
    },
    performFilter(
      teams,
    ) {
      return teams.filter(
        (row) => {
          return Object.keys(
            row,
          ).some(
            (
              key,
            ) => {
              return (
                String(
                  row[
                    key
                  ],
                )
                  .toLowerCase()
                  .indexOf(
                    this.query.toLowerCase(),
                  ) >
                -1
              );
            },
          );
        },
      );
    },
  },

  computed: {
    filteredTeams() {
      this.teams.items = this.rows;
      if (
        this.query
      ) {
        return this.performFilter(
          this.teams
            .items,
        );
      }
      return this
        .teams
        .items;
    },
    pagination() {
      let teams = this
        .teams;
      teams.items = this.filteredTeams;
      return teams;
    },
  },
};
</script>
<style
    lang="sass"
    scoped
></style>
