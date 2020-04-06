<template>
    <div>
        <FlashComponent></FlashComponent>
        <modal-component
            :size="small"
            :show.sync="isCreating"
            :name="create_team_modal"
        >
            <span slot="modal-title"
                >Create a New Team</span
            >
            <CreateTeams
                @team:created="registeredTeam"
                slot="modal-body"
            ></CreateTeams>
        </modal-component>
        <modal-component
            :size="small"
            :show.sync="isEditing"
        >
            <span slot="modal-title"
                >Update an Existing Team</span
            >
            <EditTeam
                @team:updated="updatedTeam"
                @team:deleted="deletedTeam"
                :team="team"
                slot="modal-body"
            ></EditTeam>
        </modal-component>
        <data-table
            :data="teams"
            title="Showing All Registered Teams"
            :rowClickable="true"
            @rowClicked="getTeam"
        >
            <div class="btn-group" slot="icons">
                <button
                    class="inline-block leading-tight bg-blue-700 border border-blue-700 hover:bg-blue-700 px-3 py-2 text-white no-underline shadow-md"
                    @click.prevent="
                        $modal.show('create_team_modal')
                    "
                >
                    New Team
                </button>
            </div>
            <tableCol
                data-key="team_name"
                label="Team Name"
            ></tableCol>
            <tableCol
                data-key="team_code"
                label="Team Code"
            ></tableCol>
            <tableCol
                data-key="team_leader"
                label="Team Leader"
            ></tableCol>
        </data-table>
    </div>
</template>
<script>
import CreateTeams from "./Create";
import EditTeam from "./Edit";
export default {
    components: {
        CreateTeams,
        EditTeam,
    },
    data() {
        return {
            isOpen: false,
            isCreating: false,
            isEditing: false,
            create_team_modal: "create_team_modal",
            teams: {},
            team: {},
        };
    },
    created() {
        this.fetchTeams();
    },
    methods: {
        getTeam(team) {
            this.isEditing = true;
            this.team = team;
        },
        toggleButton() {
            console.log("clicked");
            this.isCreating = true;
            return this.isCreating;
        },

        async registeredTeam(team) {
            Flash.success(
                "You have successfully added an Team",
            );
            await this.fetchTeams(); // or vue.set(this.teams, team.id, team)
            this.isCreating = false;
        },
        async updatedTeam(team) {
            Flash.success(
                "You have successfully updated Team",
            );
            await this.fetchTeams(); // or vue.set(this.teams, team.id, team)
            this.isEditing = false;
        },

        async deletedTeam(team) {
            Flash.success(
                "You have successfully archived Team",
            );
            await this.fetchTeams();
            this.isEditing = false;
        },
        async fetchTeams() {
            await axios
                .get("/teams/data")
                .then(
                    ({ data: { data } }) =>
                        (this.teams = data),
                );
            console.log(this.teams);
        },
    },
};
</script>
<style lang="sass" scoped></style>
