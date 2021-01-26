<template>
  <div>
    <Applayout />
    <div class="flex flex-wrap">
      <div class="w-full mt-24 px-4 md:ml-64">
        <div class="px-4">
          <!-- component -->
          <div class="flex">
            <div
              class="px-5 py-4 bg-white dark:bg-gray-800 shadow rounded-lg h-auto max-w-lg"
            >
              <div class="flex mb-4">
                <img
                  class="w-12 h-12 rounded-full"
                  :src="`http://localhost:8000/storage/${category.image}`"
                />
                <div class="ml-2 mt-0.5">
                  <span
                    class="block font-medium text-xl leading-snug text-black dark:text-gray-100"
                    >{{ category.name }}</span
                  >
                  <span
                    class="block text-sm text-gray-500 dark:text-gray-400 font-light leading-snug"
                    >{{ category.created_at | formatDate }}</span
                  >
                </div>

                <div>
                  <b-button
                    class="ml-12 mr-4"
                    type="is-success"
                    icon-right="pencil"
                    @click="showModal = true"
                  />
                  <div
                    v-if="showModal"
                    class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex"
                  >
                    <div class="relative w-auto my-4 mx-auto max-w-3xl">
                      <!--content-->
                      <div
                        class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none"
                      >
                        <!--header-->
                        <div
                          class="flex items-start justify-between p-5 border-b border-solid border-gray-300 rounded-t"
                        >
                          <h3 class="text-3xl font-semibold">
                            Update Category
                          </h3>
                          <button
                            class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                            v-on:click="toggleModal()"
                          >
                            <span
                              class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none"
                            >
                              ×
                            </span>
                          </button>
                        </div>
                        <!--body-->
                        <div class="relative">
                          <form enctype="multipart/form-data">
                            <ValidationObserver
                              ref="observer"
                              v-slot="{ handleSubmit }"
                            >
                              <!-- the "handleSubmit" function on the slot-scope executes the callback if validation was successfull -->
                              <section class="section">
                                <ValidationProvider
                                  rules="required"
                                  v-slot="{ errors, valid }"
                                >
                                  <b-field
                                    label="Name"
                                    :type="{
                                      'is-danger': errors[0],
                                      'is-success': valid,
                                    }"
                                    :message="errors"
                                  >
                                    <b-input
                                      type="text"
                                      v-model="form.name"
                                    ></b-input>
                                  </b-field>
                                </ValidationProvider>

                                <ValidationProvider
                                  rules="required"
                                  v-slot="{ errors, valid }"
                                >
                                  <b-field
                                    label="Description"
                                    :type="{
                                      'is-danger': errors[0],
                                      'is-success': valid,
                                    }"
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
                                  <b-upload
                                    v-model="form.image"
                                    class="file-label"
                                  >
                                    <span class="file-cta">
                                      <b-icon
                                        class="file-icon"
                                        icon="upload"
                                      ></b-icon>
                                      <span class="file-label"
                                        >Click to upload</span
                                      >
                                    </span>
                                    <span class="file-name" v-if="form.image">
                                      {{ form.image.name }}
                                    </span>
                                  </b-upload>
                                </b-field>
                                <inertia-link :href="route('category.index')">
                                  <div class="buttons">
                                    <button
                                      class="button is-success"
                                      @click="handleSubmit(submit(form))"
                                    >
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
                        <!--footer-->
                        <div
                          class="flex items-center justify-end px-6 py-3 border-t border-solid border-gray-300 rounded-b"
                        >
                          <button
                            class="text-red-500 bg-transparent hover:text-black active:bg-red-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1"
                            type="button"
                            style="transition: all 0.15s ease"
                            v-on:click="showModal = false"
                          >
                            Close
                          </button>
                          <button
                            class="text-white bg-green-600 font-bold uppercase px-6 py-3 rounded-md text-sm outline-none focus:outline-none mr-1 mb-1"
                            type="button"
                            style="transition: all 0.15s ease"
                            v-on:click="toggleModal()"
                          >
                            Save Changes
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div
                    v-if="showModal"
                    class="opacity-25 fixed inset-0 z-40 bg-black"
                  ></div>
                </div>
                <b-button
                  class="ml-8 mr-4"
                  type="is-danger"
                  icon-right="delete"
                  @click="destroy(category)"
                />
              </div>
              <p
                class="text-gray-800 dark:text-gray-100 leading-snug md:leading-normal"
              >
                Description: {{ category.description }}
              </p>
              <div class="flex justify-between items-center mt-5">
                <div class="ml-1 text-gray-500 dark:text-gray-400 font-light">
                  33 comments
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Applayout from "../../Layouts/Layout";
import { ValidationObserver, ValidationProvider } from "vee-validate";

export default {
  name: "category-edit-page",
  props: ["category"],
  data() {
    return {
      showModal: false,
      form: {
          name: this.category.name,
          description: this.category.description,
          image: ''
      }
    };
  },
  components: {
    Applayout,
    ValidationObserver,
    ValidationProvider
  },
  methods: {
    destroy(category) {
      this.$buefy.dialog.confirm({
        title: "Deleting " + category.name + " category",
        message:
          "Are you sure you want to <b>delete</b>  this Category? This action cannot be undone.",
        confirmText: "Delete Category",
        type: "is-danger",
        hasIcon: true,
        onConfirm() {
          category._method = "DELETE";
          this.$inertia.post("/category/" + category.id, category);
        },
      });
    },
  },
};
</script>