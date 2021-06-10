<template>
  <breeze-authenticated-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
        Company form
      </h2>
    </template>
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <breeze-validation-errors class="mb-4" />

          <form @submit.prevent="update">
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
              <breeze-label for="website" value="Website" />
              <breeze-input
                id="website"
                type="text"
                class="mt-1 block w-full"
                v-model="form.website"
              />
            </div>
            <div class="mt-4">
              <breeze-label class="" for="logo" value="Logo" />
              <div class="flex">
                <breeze-input
                  id="logo"
                  type="file"
                  class="mt-1 block w-full border p-2"
                  accept="image/*"
                  ref="file"
                  @change="preview"
                />
              </div>
            </div>
            <div class="mt-4" v-if="logoPreview">
              <img :src="logoPreview" class="object-cover h-32 w-32" />
              <breeze-button type="button" class="my-2" @click="clearFile">
                Remove logo
              </breeze-button>
            </div>

            <div class="flex items-center justify-between mt-4 border-t pt-4">
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
  </breeze-authenticated-layout>
</template>

<script>
import BreezeButton from "@/Components/Button";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeInput from "@/Components/Input";
import BreezeLabel from "@/Components/Label";
import FileInput from "@/Components/FileInput";
import BreezeValidationErrors from "@/Components/ValidationErrors";

export default {
  components: {
    BreezeButton,
    BreezeInput,
    BreezeLabel,
    FileInput,
    BreezeValidationErrors,
    BreezeAuthenticatedLayout,
  },

  props: {
    auth: Object,
    errors: Object,
    company: Object,
  },

  data() {
    return {
      logoPreview: this.company.data.logo_url,
      form: this.$inertia.form({
        _method: "put",
        name: this.company.data.name,
        email: this.company.data.email,
        logo_url: this.company.data.logo_url,
        logo: null,
        website: this.company.data.website,
      }),
    };
  },

  methods: {
    clearFile() {
      this.form.reset("logo");
      this.logoPreview = null;
      this.form.logo=null;
      document.getElementById('logo').value="";
    },
    preview(e) {
      this.form.logo = e.target.files[0];
      const reader = new FileReader();
      reader.onload = (e) => {
        this.logoPreview = e.target.result;
      };
      reader.readAsDataURL(e.target.files[0]);
    },
    update() {
      this.form.post(this.route("companies.update", this.company.data.id));
    },
  },
};
</script>
