<template>
  <breeze-authenticated-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Companies
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            Companies list
          </div>

          <table class="w-full table-auto">
            <thead
              class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal"
            >
              <tr>
                <th class="py-3 px-6 text-left">Name</th>
                <th class="py-3 px-6 text-center">Email</th>
                <th class="py-3 px-6 text-center">Website</th>
                <th class="py-3 px-6 text-center">Users</th>
                <th class="py-3 px-6 text-center">Actions</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <tr v-for="item in items.data" :key="item.id" class="border-b">
                <td class="py-3 px-6 text-left">
                  <div class="mr-2">
                    <img v-bind:src="item.logo_url" />
                  </div>
                  <span>{{ item.name }}</span>
                </td>
                <td>{{ item.email }}</td>
                <td>{{ item.website }}</td>
                <td>
                  {{ item.usersCount }}
                  <!-- <div v-for="user in item.users" :key="user.id">
                      {{ user.firstname }} {{ user.lastname }}
                    </div> -->
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
import Pagination from '@/Components/Pagination';

export default {
  components: {
    BreezeAuthenticatedLayout,
    Pagination
  },
  
  props: {
    auth: Object,
    errors: Object,
    items: Object,
  },
  
};
</script>
