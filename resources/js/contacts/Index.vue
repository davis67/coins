<template>
  <div>
      <FlashComponent></FlashComponent>
      <div class="flex flex-col">
          <div class="flex justify-between">
              <div class="mb-6">
                  <nav class="sm:hidden">
                      <a href="#" class="flex items-center text-sm leading-5 font-medium text-gray-500 hover:text-gray-700 focus:outline-none focus:underline transition duration-150 ease-in-out">
                          <svg class="flex-shrink-0 -ml-1 mr-1 h-5 w-5 text-gray-400"
                              fill="currentColor" viewBox="0 0 20 20">
                              <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/>
                          </svg>
                          Back
                      </a>
                  </nav>
                  <nav
                      class="hidden sm:flex items-center text-sm leading-5 font-medium"
                  >
                      <a href="#"
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
                          >contacts</a
                      >
                      <svg class="flex-shrink-0 mx-2 h-5 w-5 text-gray-400"
                          fill="currentColor" viewBox="0 0 20 20"
                      >
                          <path fill-rule="evenodd"
                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                              clip-rule="evenodd"
                          />
                      </svg>
                      <a href="#"
                          class="text-gray-500 hover:text-gray-700 focus:outline-none focus:underline transition duration-150 ease-in-out"
                          >All Contacts
                      </a>
                  </nav>
              </div>
              <div class="btn-group" @click.prevent="addContact">
                  <button class="inline-block leading-tight bg-red-800 border border-red-700 hover:bg-red-700 text-sm lg:text-md px-2 md:px-3 py-1 md:py-2 text-white no-underline shadow-md">
                      New Contact
                  </button>
              </div>
          </div>
          <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
              <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200"
              >
                  <div class="flex justify-between mb-4">
                      <div class="flex justify-between items-center">
                          <span class="mx-2 font-size-1 md:font-size-2 text-dark">
                          Show
                        </span>
                          <select class="block appearance-none md:font-size-1 bg-white border border-gray-700 py-1 px-2 md:pr-8 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                              @change="changePerPage">
                              <option selected>5</option>
                              <option>10</option>
                              <option>25</option>
                              <option>50</option>
                              <option>100</option>
                              <option>All</option>
                          </select>
                          <span class="mx-2 font-size-2 hidden text-dark lg:block">
                              Entries
                          </span>
                      </div>
                      <div class="hidden lg:block">
                          Page
                          <span >{{ pagination.currentPage }}</span >
                          of
                          <span>{{ pagination.lastPage }}</span>
                      </div>
                      <input
                          class="block appearance-none bg-white border border-gray-700 py-1 px-1 pr-8 rounded focus:outline-none focus:bg-white focus:border-gray-500 w-3/4 ml-2 lg:w-auto lg:py-2 lg:px-2"
                          type="search"
                          placeholder="Search..."
                          v-model="query"
                      />
                  </div>
                  <table class="min-w-full">
                      <thead>
                          <tr>
                              <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                              >
                                  #
                              </th>
                              <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                              >
                                Contact Name
                              </th>
                              <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                              >
                                  Telephone
                              </th>
                              <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                              >
                                  Email
                              </th>
                              <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                              >
                                  Country
                              </th>
                              <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                              >
                                  Address
                              </th>
                              <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"
                              ></th>
                          </tr>
                      </thead>
                      <tbody class="bg-white">
                          <tr v-for="(contact,index) in pagination.collection"
                              :key="contact.id" class="hover:bg-gray-100" >
                              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium text-gray-900">
                                  {{ index + 1 }}
                              </td>
                              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500"
                              >
                                  {{  contact.account_name }}
                              </td>
                              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                  {{ contact.contact_phone   }}
                              </td>
                               <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                  {{ contact.contact_email   }}
                              </td>
                              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500"
                              >
                                  {{ contact.country }}
                              </td>
                              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                  {{ contact.full_address }}
                              </td>
                              <td
                                  class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium"
                              >
                                  <a href="#" @click.prevent="editContact(contact)"
                                      class="text-indigo-00 hover:text-indigo-900 focus:outline-none focus:underline mr-2"
                                      ><i class="fas fa-pen" ></i></a>
                                  <a href="#" @click.prevent="deleteContact(contact)"
                                      class="text-red-800 hover:text-red-700 focus:outline-none focus:underline">
                                      <i class="fas fa-trash"></i>
                                  </a>
                              </td>
                          </tr>
                      </tbody>
                  </table>
                  <pagination-links :paginator="pagination"
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
  props: ["dataContacts"],
  data() {
    return {
      isOpen: false,
      isCreating: false,
      isEditing: false,
      create_contact_modal:"create_contact_modal",
      edit_contact_modal:"edit_contact_modal",
      query:"",
      rows: [],
      isShowing: false,
      contacts: [],
      contact: {}
    };
  },
  components: {
    PaginationLinks
  },
  created() {
    this.fetchContacts()
    console.log("de",this.contacts)
  },
  methods: {
     async fetchContacts() {
            try {
                this.contacts = new Paginator(this.dataContacts);
                this.rows = this.contacts.items;
            } catch (error) {
                console.log(error);
            }
        },
    changePerPage(event){
            this.contacts.perPage = event.target.value;
        },
    toggleIsOpen() {
      this.isOpen = !this.isOpen;
      console.log("google", this.isOpen);
    },
    addContact() {
      window.location = "/contacts/create";
    },
    editContact(contact){
       Confirmation.confirm("Do you want to Leave this Page?","Continue")
       .then((done) =>(window.location = `/contacts/${contact.id}/edit`));
    },
    async deleteContact(contact){
       await Confirmation.confirm(
                "This action is irreversible",
                "Do you want to delete a Contact?"
            ).then((done) =>
                        axios.delete("/contacts/" + contact.id)
                        .then((response) => {})
                ).catch((error) => {
                        console.log(error);
                    }
                );
      Flash.success("You have successfully deleted a contact");
      window.location = `/contacts`;
    },
    getSingleContact(contact) {
      this.contact = contact;
      this.isShowing = true;
    },
  performFilter(contacts){
    return contacts.filter((row) => {
      return Object.keys(row).some((key) => {
            return ( String(row[key])
                    .toLowerCase()
                    .indexOf(this.query.toLowerCase()) >-1);
          });
        }
    );
  }
},
computed: {
  filteredContacts() {
    this.contacts.items = this.rows;
      if (this.query){
        return this.performFilter(this.contacts.items);
      }
      return this.contacts.items;
  },
  pagination() {
    let contacts = this.contacts;
    contacts.items = this.filteredContacts;
    return contacts;
    }
  }
};
</script>
<style lang="sass" scoped>
</style>
