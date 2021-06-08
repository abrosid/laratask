<template>
  <breeze-authenticated-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
        User form
      </h2>
    </template>
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <breeze-validation-errors class="mb-4" />

          <form @submit.prevent="submit">
            <div>
              <breeze-label for="firstname" value="Firstname" />
              <breeze-input
                id="firstname"
                type="text"
                class="mt-1 block w-full"
                v-model="form.firstname"
                required
                autofocus
              />
            </div>
            <div>
              <breeze-label for="lastname" value="Lastname" />
              <breeze-input
                id="lastname"
                type="text"
                class="mt-1 block w-full"
                v-model="form.lastname"
                required
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
              <breeze-label for="phone" value="Phone" />
              <breeze-input
                id="phone"
                type="text"
                class="mt-1 block w-full"
                v-model="form.phone"
              />
            </div>
            <div class="mt-4">
              <breeze-label for="password" value="Password" />
              <breeze-input
                id="password"
                type="password"
                class="mt-1 block w-full"
                v-model="form.password"
                required
              />
            </div>
            <div class="mt-4">
              <breeze-label for="company_id" value="Company" />
              <select
                id="company_id"
                v-model="form.company_id"
                class="
                  border-gray-300
                  focus:border-indigo-300
                  focus:ring focus:ring-indigo-200 focus:ring-opacity-50
                  rounded-md
                  shadow-sm
                  mt-1
                  block
                  w-full
                "
              >
                <option :value="null">Select Company</option>

                <option
                  v-for="option in this.companies"
                  :key="option.key"
                  :value="option.key"
                >
                  {{ option.value }}
                </option>
              </select>
            </div>
            <div class="flex items-center justify-between mt-4">
              <inertia-link
                :href="route('users.index')"
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
    errors: Object,
    companies: Array,
  },

  data() {
    return {
      form: this.$inertia.form({
        firstname: "",
        lastname: "",
        email: "",
        phone: "",
        password: "",
        company_id: null,
      }),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("users.store"), {
        onFinish: () => this.form.reset("password"),
      });
    },
  },
};
</script>
