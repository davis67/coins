import IndexOpportunities from "./opportunities/Index";
import CreateOpportunities from "./opportunities/Create";
import EditOpportunities from "./opportunities/Edit";
import IndexTeams from "./teams/Index";
import IndexUsers from "./users/Index";
import CreateUsers from "./users/Create";
import IndexContacts from "./contacts/Index";
import EditContacts from "./contacts/Edit";
import CreateContacts from "./contacts/Create";
import IndexDocuments from "./documents/Index";
import FlashComponent from "./flash/FlashComponent";


Vue.component("index-opportunities", IndexOpportunities)
Vue.component("create-oppportunities", CreateOpportunities)
Vue.component("edit-oppportunities", EditOpportunities)
Vue.component("index-teams", IndexTeams)
Vue.component("index-users", IndexUsers)
Vue.component("create-users", CreateUsers)
Vue.component("index-contacts", IndexContacts)
Vue.component("create-contacts", CreateContacts)
Vue.component("edit-contact", EditContacts)
Vue.component("index-documents", IndexDocuments)
Vue.component("FlashComponent", FlashComponent)
