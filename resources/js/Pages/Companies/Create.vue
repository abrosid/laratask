<template>
  <breeze-authenticated-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
        Company form
      </h2>
    </template>
    <div class="py-12">
      <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <breeze-validation-errors class="mb-4" />

            <form @submit.prevent="submit">
              <div>
                <breeze-label for="name" value="Name" />
                <breeze-input
                  id="name"
                  type="text"
                  class="mt-1 block w-full"
                  v-model="form.name"
                  required
                  autofocus
                />
              </div>
              <div class="mt-4">
                <breeze-label for="email" value="Email" />
                <breeze-input
                  id="email"
                  type="email"
                  class="mt-1 block w-full"
                  v-model="form.email"
                  required
                />
              </div>
              <div class="mt-4">
                <breeze-label for="logo" value="Logo" />
                <breeze-input
                  id="logo"
                  type="text"
                  class="mt-1 block w-full"
                  v-model="form.logo_url"
                />
              </div>
              <div class="mt-4">
                <breeze-label for="website" value="Website" />
                <breeze-input
                  id="website"
                  type="text"
                  class="mt-1 block w-full"
                  v-model="form.website"
                  
                />
              </div>
              <div class="flex items-center justify-between mt-4">
                <inertia-link
                  :href="route('companies.index')"
                  class="underline text-sm text-gray-600 hover:text-gray-900"
                >
                  Cancel
                </inertia-link>

                <breeze-button
                  class="ml-4"
                  :class="{ 'opacity-25': form.processing }"
                  :disabled="form.processing"
                >
                  Save
                </breeze-button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </breeze-authenticated-layout>
</template>

<script>
import BreezeButton from "@/Components/Button";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeInput from "@/Components/Input";
import BreezeLabel from "@/Components/Label";
import BreezeValidationErrors from "@/Components/ValidationErrors";

export default {
  components: {
    BreezeButton,
    BreezeInput,
    BreezeLabel,
    BreezeValidationErrors,
    BreezeAuthenticatedLayout,
  },

  props: {
    auth: Object,
    errors: Object
  },

  data() {
    return {
      form: this.$inertia.form({
        name: "",
        email: "",
        logo_url: "",
        website: "",
      }),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("companies.store"));
    },
  },
};
</script>
