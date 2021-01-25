<template>
  <div>
    <Applayout />
    <div class="flex flex-wrap mx-auto">
      <div class="w-full lg:w-8/12 max-w-2xl mt-12 px-4 md:ml-64">
        <div class="bg-green-500 text-center mt-12 py-4 px-4">
          <div
            class="p-2 bg-indigo-600 items-center text-indigo-100 leading-none rounded-full flex lg:inline-flex"
            role="alert"
          >
            <span
              class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3"
              >New</span
            >
            <span class="font-semibold mr-2 text-left flex-auto"
              >Create new Category</span
            >
            <svg
              class="fill-current opacity-75 h-4 w-4"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
            >
              <path
                d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"
              />
            </svg>
          </div>
        </div>
        <form enctype="multipart/form-data">
          <ValidationObserver ref="observer" v-slot="{ handleSubmit }">
            <!-- the "handleSubmit" function on the slot-scope executes the callback if validation was successfull -->
            <section class="section">
              <ValidationProvider
                rules="required"
                v-slot="{ errors, valid }"
              >
                <b-field
                  label="Name"
                  :type="{ 'is-danger': errors[0], 'is-success': valid }"
                  :message="errors"
                >
                  <b-input type="text" v-model="form.name"></b-input>
                </b-field>
              </ValidationProvider>

              <ValidationProvider
                rules="required"
                v-slot="{ errors, valid }"
              >
                <b-field
                  label="Description"
                  :type="{ 'is-danger': errors[0], 'is-success': valid }"
                  :message="errors"
                >
                  <b-input
                    maxlength="200"
                    v-model="form.description"
                    type="textarea"
                  ></b-input>
                </b-field>
              </ValidationProvider>
              <b-field
                class="file is-primary mt-4"
                :class="{ 'has-name': !!form.image }"
              >
                <b-upload v-model="form.image" class="file-label">
                  <span class="file-cta">
                    <b-icon class="file-icon" icon="upload"></b-icon>
                    <span class="file-label">Click to upload</span>
                  </span>
                  <span class="file-name" v-if="form.image">
                    {{ form.image.name }}
                  </span>
                </b-upload>
              </b-field>
              <inertia-link :href="route('category.index')">
              <div class="buttons">
                <button class="button is-success" @click="handleSubmit(submit(form))">
                  <span class="icon is-small">
                    <i class="fas fa-check"></i>
                  </span>
                  <span>Submit</span>
                </button>
              </div>
              </inertia-link>
            </section>
          </ValidationObserver>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
import { ValidationObserver, ValidationProvider } from "vee-validate";
import Applayout from "../../Layouts/Layout";
export default {
  name: "category-create-page",
  data() {
    return {
      form: {
        name: "",
        description: "",
        image: null,
      },
      
    };
  },
  components: {
    Applayout,
    ValidationObserver,
    ValidationProvider,
  },
  methods: {
    submit: function (data) {
      this.$inertia.post("/category", data);
      this.$buefy.snackbar.open({
        duration: 10000,
        message: 'success category created ......',
        type: "is-danger",
        position: "is-top",
        actionText: "close",
        queue: false,
      });
    },
  },
};
</script>