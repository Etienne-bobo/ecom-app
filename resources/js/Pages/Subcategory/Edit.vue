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
                <div class="ml-2 mt-0.5">
                  <span
                    class="block font-medium text-xl leading-snug text-black dark:text-gray-100"
                    >{{ subcategory.name }}</span
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
                    <div class="relative w-2/5 my-4 mx-auto max-w-3xl">
                      <!--content-->
                      <div
                        class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none"
                      >
                        <!--header-->
                        <div
                          class="flex items-start justify-between px-5 py-3 border-b border-solid border-gray-300 rounded-t"
                        >
                          <h3 class="text-xl font-semibold">
                            Update SubCategory
                          </h3>
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
                                    label="Category"
                                    :type="{
                                      'is-danger': errors[0],
                                      'is-success': valid,
                                    }"
                                    :message="errors"
                                  >
                                    <b-select
                                      v-model="form.category"
                                      icon="earth"
                                    >
                                      <option
                                        v-for="(category, id) in categories"
                                        :key="id"
                                        :value="category.id"
                                      >
                                        {{ category.name }}
                                      </option>
                                    </b-select>
                                  </b-field>
                                </ValidationProvider>
                              </section>

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
                                  @click.prevent="handleSubmit(update)"
                                >
                                  Save Changes
                                </button>
                              </div>
                            </ValidationObserver>
                          </form>
                        </div>

                        <!--footer-->
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
                  @click="destroy(subcategory)"
                />
              </div>
              <p
                v-if="subcategory.category"
                class="text-gray-800 dark:text-gray-100 leading-snug md:leading-normal"
              >
                Category: {{ subcategory.category.name }}
              </p>
              <div class="flex justify-between items-center mt-5">
                <div class="ml-1 text-gray-500 dark:text-gray-400 font-light">
                  <span
                    class="block text-sm text-gray-500 dark:text-gray-400 font-light leading-snug"
                    >{{ subcategory.created_at | formatDate }}</span
                  >
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
  props: ["subcategory", "categories"],
  data() {
    return {
      showModal: false,
      sending: false,
      form: {
        name: this.subcategory.name,
        category: this.subcategory.category.id,
      },
    };
  },
  components: {
    Applayout,
    ValidationObserver,
    ValidationProvider,
  },
  methods: {
    update: function () {
      if (this.$refs.observer.validate()) {
        this.$inertia.put(route("subcategory.update", this.subcategory.id), this.form);
        this.showModal = false;
        this.$buefy.snackbar.open({
          duration: 5000,
          message: "success subcategory updated ......",
          type: "is-success",
          position: "is-top",
          actionText: "close",
          queue: false,
        });
      }
    },
    destroy(subcategory) {
      this.$buefy.dialog.confirm({
        title: "Deleting subcategory",
        message:
          "Are you sure you want to <b>delete</b>  this Category? This action cannot be undone.",
        confirmText: "Delete Category",
        type: "is-danger",
        hasIcon: true,
        onConfirm() {
          subcategory._method = "DELETE";
          this.$inertia.post("/subcategory/" + subcategory.id, subcategory);
          this.$buefy.snackbar.open({
            duration: 5000,
            message: "success subcategory deleted ......",
            type: "is-danger",
            position: "is-top",
            actionText: "close",
            queue: false,
          });
        },
      });
    },
  },
};
</script>