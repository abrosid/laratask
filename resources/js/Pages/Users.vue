<template>
  <breeze-authenticated-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Users</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">Users list</div>

          <table class="w-full table-auto">
            <thead
              class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal"
            >
              <tr>
                <th class="py-3 px-6 text-left">Firstname</th>
                <th class="py-3 px-6 text-left">Lastname</th>
                <th class="py-3 px-6 text-center">Email</th>
                <th class="py-3 px-6 text-center">Phone</th>
                <th class="py-3 px-6 text-center">Company</th>
                <th class="py-3 px-6 text-center">Actions</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <tr v-for="item in items.data" :key="item.id" class="border-b">
                <td>{{ item.firstname }}</td>
                <td>{{ item.lastname }}</td>
                <td>{{ item.email }}</td>
                <td>{{ item.phone }}</td>
                <td>
                  <span v-if="item.company">
                    {{ item.company.name }}
                  </span>
                </td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";

export default {
  components: {
    BreezeAuthenticatedLayout,
  },
  //   data() {
  //     return {
  //       items: [],
  //       loading: true,
  //       errored: false,
  //     };
  //   },
  props: {
    auth: Object,
    errors: Object,
    items: Object,
  },
};
</script>
