<template>
  <div>
    <Applayout />
    <div class="flex flex-wrap">
      <div class="md:mt-10 w-full px-4 md:ml-64">
        <div class="container my-12 mx-auto px-4 md:px-12">
          <inertia-link :href="route('subcategory.create')">
            <b-button class="mt-12" type="is-primary" icon-left="plus">
              Add new Subcategory
            </b-button>
          </inertia-link>

          <div class="flex flex-wrap -mx-1 mt-6 lg:-mx-4">
            <!-- Column -->
            <div
              v-for="(subcategory, id) in subcategories"
              :key="id"
              class="my-1 px-1 w-full md:w-1/3 lg:my-4 lg:px-4 lg:w-1/3"
            >
              <!-- Article -->
              <inertia-link :href="route('subcategory.edit', subcategory.id)">
                <article class="overflow-hidden rounded-lg shadow-lg px-4">
                  <header
                    class="flex items-center justify-between leading-tight p-2 md:p-4"
                  >
                    <h1 class="text-lg">
                      <span class="no-underline text-green-600">
                        {{ subcategory.name }}
                      </span>
                    </h1>
                  </header>

                  <footer
                    class="flex items-center justify-between leading-none pb-4"
                  >
                    <span
                      class="flex items-center no-underline text-black"
                      href="#"
                    >
                      <p v-if="subcategory.category" class="ml-2 text-sm">
                        Category: {{ subcategory.category.name }}
                      </p>
                    </span>
                    <a
                      class="no-underline text-grey-darker hover:text-red-dark"
                      href="#"
                    >
                      <span class="hidden">Like</span>
                      <i class="fa fa-heart"></i>
                    </a>
                  </footer>
                </article>
              </inertia-link>
              <!-- END Article -->
            </div>
            <!-- END Column -->
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Applayout from "../../Layouts/Layout";
export default {
  name: "subcategory-page",
  props: ["subcategories"],
  components: {
    Applayout,
  },
};
</script>