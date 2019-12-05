import IndexOpportunities from "./opportunities/Index";
import CreateOpportunities from "./opportunities/Create";
import IndexTeams from "./teams/Index";
import IndexUsers from "./users/Index";
import IndexContacts from "./contacts/Index";
import IndexDocuments from "./documents/Index";
import FlashComponent from "./flash/FlashComponent";


Vue.component("index-opportunities", IndexOpportunities)
Vue.component("create-oppportunities", CreateOpportunities)
Vue.component("index-teams", IndexTeams)
Vue.component("index-users", IndexUsers)
Vue.component("index-contacts", IndexContacts)
Vue.component("index-documents", IndexDocuments)
Vue.component("FlashComponent", FlashComponent)
