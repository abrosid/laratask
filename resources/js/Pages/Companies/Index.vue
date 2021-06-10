<template>
  <breeze-authenticated-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Companies
      </h2>
    </template>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          Companies list
          <inertia-link class="float-right" :href="route('companies.create')">
            Create a company
          </inertia-link>
        </div>

        <table class="w-full table-auto">
          <thead
            class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal text-left"
          >
            <tr>
              <th class="py-3">Logo</th>
              <th class="py-3">Company</th>
              <th class="py-3">Users</th>
              <th class="py-3">Updated</th>
              <th class="py-3"></th>
            </tr>
          </thead>
          <tbody class="text-left">
            <tr v-for="item in items.data" :key="item.id" class="border-b">
              <td class="py-3 px-6 w-32">
                <inertia-link
                  :href="route('companies.edit', item.id)"
                  class="text-blue-500"
                >
                  <div class="mr-2 float-left">
                    <img
                      class="object-cover h-32 w-32"
                      v-bind:src="item.logo_url"
                    />
                  </div>
                </inertia-link>
              </td>
              <td>
                <inertia-link
                  :href="route('companies.edit', item.id)"
                  class="text-blue-500"
                >
                  {{ item.name }}
                </inertia-link>
                <div v-if="item.email">Email: {{ item.email }}</div>
                <div v-if="item.website">
                  Web:
                  <a :href="item.website" class="text-blue-500" target="_blank">
                    {{ item.website }}
                  </a>
                </div>
              </td>
              <td>
                {{ item.usersCount }}
              </td>
              <td>
                {{ item.updated_at }}
              </td>
              <td>
                <button
                  class="text-red-600 hover:underline"
                  tabindex="-1"
                  type="button"
                  @click="destroy(item)"
                >
                  Delete
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <pagination class="py-6" :links="items.meta.links" />
    </div>
  </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import Pagination from "@/Components/Pagination";

export default {
  components: {
    BreezeAuthenticatedLayout,
    Pagination,
  },

  props: {
    auth: Object,
    errors: Object,
    items: Object,
  },
  methods: {
    destroy(company) {
      if (
        confirm(
          "Are you sure you want to delete the copmpany: " + company.name + "?"
        )
      ) {
        this.$inertia.delete(this.route("companies.destroy", company.id));
      }
    },
  },
};
</script>
