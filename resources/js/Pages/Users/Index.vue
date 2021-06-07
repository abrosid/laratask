<template>
  <breeze-authenticated-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Users</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            Users list
            <inertia-link class="float-right" :href="route('users.create')">
              Create a user
            </inertia-link>
          </div>

          <table class="w-full table-auto">
            <thead
              class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal"
            >
              <tr>
                <th class="py-3 px-6 text-center">Name</th>
                <th class="py-3 px-6 text-center">Email</th>
                <th class="py-3 px-6 text-center">Phone</th>
                <th class="py-3 px-6 text-center">Company</th>
                <th class="py-3 px-6 text-center"></th>
              </tr>
            </thead>
            <tbody class="text-center">
              <tr v-for="item in items.data" :key="item.id" class="border-b">
                <td>
                  <inertia-link
                    :href="route('users.edit', item.id)"
                    class="text-blue-500"
                  >
                    {{ item.firstname }} {{ item.lastname }}
                  </inertia-link>
                </td>
                <td>
                  {{ item.email }}
                </td>
                <td>
                  {{ item.phone }}
                </td>
                <td>
                  <span v-if="item.company">
                    {{ item.company.name }}
                  </span>
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
        <pagination class="mt-6" :links="items.meta.links" />
      </div>
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
    destroy(user) {
      if (
        confirm(
          "Are you sure you want to delete the user: " +
            user.firstname +
            " " +
            user.lastname +
            "?"
        )
      ) {
        this.$inertia.delete(this.route("users.destroy", user.id));
      }
    },
  },
};
</script>
