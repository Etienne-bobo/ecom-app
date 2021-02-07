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
                  :src="`http://localhost:8000/storage/${product.image}`"
                />
                <div class="ml-2 mt-0.5">
                  <span
                    class="block font-medium text-xl leading-snug text-black dark:text-gray-100"
                    >{{ product.name }}</span
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
                    <div class="w-auto h-3/4 my-4 mx-auto max-w-6xl">
                      <!--content-->
                      <div
                        class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none"
                      >
                        <!--header-->
                        <div
                          class="flex items-start justify-between px-5 py-3 border-b border-solid border-gray-300 rounded-t"
                        >
                          <h3 class="text-xl font-semibold">Update Product</h3>
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
                                    label="Price"
                                    :type="{
                                      'is-danger': errors[0],
                                      'is-success': valid,
                                    }"
                                    :message="errors"
                                  >
                                    <b-input
                                      type="number"
                                      v-model="form.price"
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
                                    <vue-editor
                                      v-model="form.description"
                                    ></vue-editor>
                                  </b-field>
                                </ValidationProvider>
                                <b-field label="Additional Info">
                                  <vue-editor
                                    v-model="form.additional_info"
                                  ></vue-editor>
                                </b-field>
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
                                    <select
                                      v-model="form.category"
                                      placeholder="Select Category"
                                      @change="getSubcategories"
                                      class="text-gray-400 appearance-none border inline-block py-3 pl-3 pr-8 rounded leading-tight w-full"
                                    >
                                      <option
                                        v-for="(category, id) in categories"
                                        :key="id"
                                        :value="category.id"
                                      >
                                        {{ category.name }}
                                      </option>
                                    </select>
                                  </b-field>
                                </ValidationProvider>

                                <b-field
                                  v-if="subCat.length != 0"
                                  label="Subcategory"
                                >
                                  <select
                                    v-model="form.subcategory"
                                    placeholder="Select SubCategory"
                                    class="text-gray-600 appearance-none border inline-block py-3 pl-3 pr-8 rounded leading-tight w-full"
                                  >
                                    <option
                                      v-for="(subcategory, id) in subCat"
                                      :key="id"
                                      :value="subcategory.id"
                                    >
                                      <span>
                                        {{ subcategory.name }}
                                      </span>
                                    </option>
                                  </select>
                                </b-field>

                                <b-field
                                  class="file is-primary mt-4"
                                  :class="{ 'has-name': !!form.image }"
                                >
                                  <b-upload
                                    v-model="form.image"
                                    ref="image"
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
                                    <span v-else>
                                      <img
                                        class="w-12 h-12 rounded-full ml-4"
                                        :src="`http://localhost:8000/storage/${product.image}`"
                                      />
                                    </span>
                                  </b-upload>
                                </b-field>
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
                                  v-on:click="handleSubmit(update)"
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
                  @click="destroy(product)"
                />
              </div>
              <p
                class="text-gray-800 dark:text-gray-100 leading-snug md:leading-normal"
              >
                Price: {{ product.price }} $
              </p>
              <p
                class="text-gray-800 dark:text-gray-100 leading-snug md:leading-normal"
              >
                Description: <span v-html="product.description"></span>
              </p>
              <p
                v-if="product.additional_info"
                class="text-gray-800 dark:text-gray-100 leading-snug md:leading-normal"
              >
                Additional Info: <span v-html="product.additional_info"></span>
              </p>
              <p
                v-if="product.subcategory"
                class="text-gray-800 dark:text-gray-100 leading-snug md:leading-normal"
              >
                Subcategory: {{ product.subcategory.name }}
              </p>
              <p
                v-if="product.category"
                class="text-gray-800 dark:text-gray-100 leading-snug md:leading-normal"
              >
                Category: {{ product.category.name }}
              </p>
              <div class="flex justify-between items-center mt-5">
                <div class="ml-1 text-gray-500 dark:text-gray-400 font-light">
                  <span
                    class="block text-sm text-gray-500 dark:text-gray-400 font-light leading-snug"
                    >{{ product.created_at | formatDate }}</span
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
import { VueEditor } from "vue2-editor";

export default {
  name: "product-edit-page",
  props: ["product", "categories"],
  data() {
    return {
      showModal: false,
      sending: false,

      form: this.$inertia.form({
        _method: "PUT",
        name: this.product.name,
        price: this.product.price,
        description: this.product.description,
        additional_info: this.product.additional_info,
        category: this.product.category.id,
        subcategory: '',
        image: null,
      }),
      subCat: [],
    };
  },
  components: {
    Applayout,
    ValidationObserver,
    ValidationProvider,
    VueEditor,
  },
  methods: {
    getSubcategories: function () {
      axios.get("/subcategories/" + this.form.category).then(
        function (response) {
          this.subCat = response.data;
        }.bind(this)
      );
    },
    update: function () {
      this.form.post(route("product.update", this.product.id), {
        errorBag: "updateProduct",
        preserveScroll: true,
      });
      this.showModal = false;
      this.$buefy.snackbar.open({
        duration: 5000,
        message: "success Product updated ......",
        type: "is-success",
        position: "is-top",
        actionText: "close",
        queue: false,
      });
    },
    destroy(product) {
      this.$buefy.dialog.confirm({
        title: "Deleting product",
        message:
          "Are you sure you want to <b>delete</b>  this Product? This action cannot be undone.",
        confirmText: "Delete Product",
        type: "is-danger",
        hasIcon: true,
        onConfirm() {
          product._method = "DELETE";
          this.$inertia.post("/product/" + product.id, product);
          this.$buefy.snackbar.open({
            duration: 5000,
            message: "success category deleted ......",
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