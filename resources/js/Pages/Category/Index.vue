<template>
  <div>
    <Applayout />
    <div class="flex flex-wrap">
      <div class="lg:mt-10 w-full px-4 md:ml-64">
        <div class="container my-12 mx-auto px-4 md:px-12">
          <div class="flex flex-wrap -mx-1 mt-12 lg:-mx-4">
            <!-- Column -->
            <div v-for="(category, id) in categories" :key="id" class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
              <!-- Article -->
              <article class="overflow-hidden rounded-lg shadow-lg">
                <a href="#">
                  <img
                    alt="Placeholder"
                    class="block h-auto w-full"
                    :src="category.image"
                  />
                </a>

                <header
                  class="flex items-center justify-between leading-tight p-2 md:p-4"
                >
                  <h1 class="text-lg">
                    <a class="no-underline hover:underline text-black" href="#">
                      {{category.name}}
                    </a>
                  </h1>
                </header>

                <footer
                  class="flex items-center justify-between leading-none p-2 md:p-4"
                >
                  <a
                    class="flex items-center no-underline hover:underline text-black"
                    href="#"
                  >
                    <p class="ml-2 text-sm">{{category.description}}</p>
                  </a>
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