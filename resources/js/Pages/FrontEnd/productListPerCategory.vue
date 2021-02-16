<template>
  <div class="container py-12 grid grid-rows-2 grid-flow-col gap-2">
    <div class="mx-4 mt-16 row-span-3 ...">
      <ul>
        <label>Subcategories</label>
        <li v-for="(subcategoryItem, index) in subcategories" :key="index">
          <label class="inline-flex items-center mt-3">
            <input
              type="checkbox"
              class="form-checkbox h-5 w-5 text-gray-600"
              :id="index + 1"
              :value="subcategoryItem.id"
              v-model="subcategory"
              @change="shouldBeChecked(subcategoryItem.id)"
            /><span class="ml-2 text-gray-700">{{ subcategoryItem.name }}</span>
          </label>
        </li>
      </ul>
      <div>
        <button
          class="mt-6 mb-6 text-md hover:no-underline border border-indigo-600 px-5 py-2 text-indigo-600 rounded-md"
          @click="filterProducts"
        >
          Filter
        </button>
      </div>
      <ul>
        <label>Price</label>
        <li>
          <label class="inline-flex items-center mt-3">
            <input
              type="text"
              class="w-32 h-8 rounded-md text-gray-600"
              v-model="min"
              placeholder="Min..."
            />
          </label>
        </li>
        <li>
          <label class="inline-flex items-center mt-3">
            <input
              type="text"
              class="w-32 h-8 rounded-md text-gray-600"
              v-model="max"
              placeholder="Max..."
            />
          </label>
        </li>
        <li>
          <label class="inline-flex items-center mt-3">
            <input
              type="hidden"
              class="w-32 h-8 rounded-md text-gray-600"
              v-model="category"
            />
          </label>
        </li>
      </ul>
      <div>
        <button
          class="mt-2 mb-6 text-md hover:no-underline border border-indigo-600 px-5 py-2 text-indigo-600 rounded-md"
          @click="filterProductsByPrice"
        >
          Filter
        </button>
      </div>
      <div>
        <inertia-link :href="route('allProducts', this.slug)">
        <button
          class="mt-2 mb-6 text-md hover:no-underline border bg-indigo-600 px-5 py-2 text-white rounded-md"
        >
          Back
        </button>
        </inertia-link>
      </div>
    </div>

    <div class="col-span-8 ...">
      <div class="font-semibold">Products List</div>
      <div class="flex flex-wrap -mx-1 mt-6 lg:-mx-4">
        <div
          v-for="(product, id) in products"
          :key="id"
          class="my-1 px-1 w-full md:w-2/5 lg:my-4 lg:px-4 lg:w-1/3"
        >
          <!-- Article -->
          <article class="overflow-hidden rounded-lg shadow-lg px-4">
            <img
              alt="Placeholder"
              class="block h-64 w-full"
              :src="`http://localhost:8000/storage/${product.image}`"
            />

            <header class="flex items-center justify-between leading-tight p-2">
              <h1 class="text-lg">
                {{ product.name }}
              </h1>
            </header>

            <footer class="flex items-center justify-between leading-none pb-4">
              <span
                class="flex items-center no-underline hover:underline text-black"
                href="#"
              >
                <inertia-link :href="route('showProduct', product.id)">
                  <button
                    class="ml-2 text-md hover:no-underline border border-indigo-600 px-5 py-3 text-indigo-600 rounded-md"
                  >
                    Detail
                  </button>
                </inertia-link>
              </span>
              <span
                class="flex items-center no-underline hover:underline text-black"
                href="#"
              >
                <button
                  class="mx-2 text-white bg-green-500 border rounded-md p-2 focus:outline-none"
                >
                  <svg
                    class="h-5 w-5"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                    ></path>
                  </svg>
                </button>
              </span>
            </footer>
          </article>
          <!-- END Article -->
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Input from "../../Jetstream/Input.vue";
import Label from '../../Jetstream/Label.vue';
export default {
  data() {
    return {
      subcategory: this.subcategoriesId,
      min: '',
      max: '',
      category: this.categoryId
    };
  },
  components: { Input, Label },
  props: ["products", "subcategories", "slug", "subcategoriesId", "categoryId"],
  methods: {
    filterProducts() {
      this.$inertia.get(this.route("allProducts", this.slug), {
        subcategory: this.subcategory,
      });
    },
    filterProductsByPrice() {
      this.$inertia.get(this.route("allProducts", this.slug), {
        min: this.min,
        max: this.max,
        category: this.category
      });
    },
    shouldBeChecked(val) {
      return this.subcategoriesId.includes(val);
    },
  },
};
</script>