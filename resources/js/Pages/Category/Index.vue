<template>
  <div>
    <Applayout />
    <div class="flex flex-wrap">
      <div class="md:mt-10 w-full px-4 md:ml-64">
        <div class="container my-12 mx-auto px-4 md:px-12">
          <div class="flex flex-wrap -mx-1 mt-12 lg:-mx-4">
            <!-- Column -->
            <div v-for="(category, id) in categories" :key="id" class="my-1 px-1 w-full md:w-1/3 lg:my-4 lg:px-4 lg:w-1/3">
              <!-- Article -->
              <article class="overflow-hidden rounded-lg shadow-lg px-4">
                <inertia-link :href="route('category.edit', category.id)">
                  <img
                    alt="Placeholder"
                    class="block h-64 w-full"
                    :src="`storage/${category.image}`"
                  />
                </inertia-link>

                <header
                  class="flex items-center justify-between leading-tight p-2 md:p-4"
                >
                  <h1 class="text-lg">
                    <inertia-link class="no-underline text-green-600" :href="route('category.edit', category.id)">
                      {{category.name}}
                    </inertia-link>
                  </h1>
                </header>

                <footer
                  class="flex items-center justify-between leading-none pb-4"
                >
                  <span
                    class="flex items-center no-underline hover:underline text-black"
                    href="#"
                  >
                    <p class="ml-2 text-sm">{{category.description}}</p>
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
  name: "category-page",
  props: ['categories'],
  components: {
    Applayout,
  },
};
</script>