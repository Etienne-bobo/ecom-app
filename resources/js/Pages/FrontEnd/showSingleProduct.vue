<template>
  <div x-data="{ cartOpen: false , isOpen: false }" class="bg-white">
    <header>
      <div class="container mx-auto px-6 py-3">
        <div class="flex items-center justify-between">
          <div
            class="w-full text-gray-700 md:text-center text-2xl font-semibold"
          >
            Vixiza
          </div>
          <div class="flex items-center justify-end w-full">
            <button
              @click="cartOpen = !cartOpen"
              class="text-gray-600 focus:outline-none mx-4 sm:mx-0"
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

            <div class="flex sm:hidden">
              <button
                @click="isOpen = !isOpen"
                type="button"
                class="text-gray-600 hover:text-gray-500 focus:outline-none focus:text-gray-500"
                aria-label="toggle menu"
              >
                <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                  <path
                    fill-rule="evenodd"
                    d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"
                  ></path>
                </svg>
              </button>
            </div>
          </div>
        </div>
        <nav
          :class="isOpen ? '' : 'hidden'"
          class="sm:flex sm:justify-center sm:items-center mt-4"
        >
          <div class="flex flex-col sm:flex-row">
            <a
              class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0"
              href="#"
              >Home</a
            >
            <a
              class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0"
              href="#"
              >Categories</a
            >
          </div>
        </nav>
      </div>
    </header>
    <div
      :class="cartOpen ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'"
      class="fixed right-0 top-0 max-w-xs w-full h-full px-6 py-4 transition duration-300 transform overflow-y-auto bg-white border-l-2 border-gray-300"
    >
      <div class="flex items-center justify-between">
        <h3 class="text-2xl font-medium text-gray-700">Your cart</h3>
        <button
          @click="cartOpen = !cartOpen"
          class="text-gray-600 focus:outline-none"
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
            <path d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
      <hr class="my-3" />
      <div class="flex justify-between mt-6">
        <div class="flex">
          <img
            class="h-20 w-20 object-cover rounded"
            src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80"
            alt=""
          />
          <div class="mx-3">
            <h3 class="text-sm text-gray-600">Mac Book Pro</h3>
            <div class="flex items-center mt-2">
              <button
                class="text-gray-500 focus:outline-none focus:text-gray-600"
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
                    d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                  ></path>
                </svg>
              </button>
              <span class="text-gray-700 mx-2">2</span>
              <button
                class="text-gray-500 focus:outline-none focus:text-gray-600"
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
                  <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
              </button>
            </div>
          </div>
        </div>
        <span class="text-gray-600">20$</span>
      </div>
      <div class="flex justify-between mt-6">
        <div class="flex">
          <img
            class="h-20 w-20 object-cover rounded"
            src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80"
            alt=""
          />
          <div class="mx-3">
            <h3 class="text-sm text-gray-600">Mac Book Pro</h3>
            <div class="flex items-center mt-2">
              <button
                class="text-gray-500 focus:outline-none focus:text-gray-600"
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
                    d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                  ></path>
                </svg>
              </button>
              <span class="text-gray-700 mx-2">2</span>
              <button
                class="text-gray-500 focus:outline-none focus:text-gray-600"
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
                  <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
              </button>
            </div>
          </div>
        </div>
        <span class="text-gray-600">20$</span>
      </div>
      <div class="flex justify-between mt-6">
        <div class="flex">
          <img
            class="h-20 w-20 object-cover rounded"
            src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80"
            alt=""
          />
          <div class="mx-3">
            <h3 class="text-sm text-gray-600">Mac Book Pro</h3>
            <div class="flex items-center mt-2">
              <button
                class="text-gray-500 focus:outline-none focus:text-gray-600"
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
                    d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                  ></path>
                </svg>
              </button>
              <span class="text-gray-700 mx-2">2</span>
              <button
                class="text-gray-500 focus:outline-none focus:text-gray-600"
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
                  <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
              </button>
            </div>
          </div>
        </div>
        <span class="text-gray-600">20$</span>
      </div>
      <div class="mt-8">
        <form class="flex items-center justify-center">
          <input
            class="form-input w-48"
            type="text"
            placeholder="Add promocode"
          />
          <button
            class="ml-3 flex items-center px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500"
          >
            <span>Apply</span>
          </button>
        </form>
      </div>
      <a
        class="flex items-center justify-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500"
      >
        <span>Chechout</span>
        <svg
          class="h-5 w-5 mx-2"
          fill="none"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
        </svg>
      </a>
    </div>
    <main class="my-8">
      <div class="container mx-auto px-6">
        <div class="md:flex md:items-center">
          <div class="w-full h-64 md:w-1/2 lg:h-96">
            <img
              class="h-full w-full rounded-md object-cover max-w-lg mx-auto"
              :src="`http://localhost:8000/storage/${product.image}`"
              alt="Nike Air"
            />
          </div>
          <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
            <h3 class="text-gray-700 font-semibold uppercase text-lg">
              {{ product.name }}
            </h3>
            <span class="text-gray-500 mt-3">{{ product.price }} $</span>
            <hr class="my-3" />
            <div class="mt-2">
              <label class="text-gray-700 text-sm" for="count">Quantity:</label>
              <b-field class="w-1/3 mt-2">
                <b-numberinput v-model="number" min="1"></b-numberinput>
              </b-field>
            </div>
            <div class="mt-3">
              <label class="text-gray-700 text-sm" for="count"
                >Description:</label
              >
              <div
                v-html="product.description"
                class="flex items-center mt-1"
              ></div>
              <label class="text-gray-700 text-sm" for="count"
                >Additional Information::</label
              >
              <div
                v-html="product.additional_info"
                class="flex items-center mt-1"
              ></div>
            </div>
            <div class="flex items-center mt-6">
              <button
                class="px-8 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500"
              >
                Order Now
              </button>
              <button
                class="mx-2 text-gray-600 border rounded-md p-2 hover:bg-gray-200 focus:outline-none"
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
            </div>
          </div>
        </div>
        <div class="mt-16" v-if="topProducts.length != 0">
          <h3 class="text-gray-600 text-2xl font-medium">More Products</h3>
          <div class="flex flex-wrap -mx-1 mt-6 lg:-mx-4">
            <div
              v-for="(product, id) in topProducts"
              :key="id"
              class="my-1 px-1 w-full md:w-1/3 lg:my-4 lg:px-4 lg:w-1/3"
            >
              <!-- Article -->
              <article class="overflow-hidden rounded-lg shadow-lg px-4">
                <img
                  alt="Placeholder"
                  class="block h-64 w-full"
                  :src="`http://localhost:8000/storage/${product.image}`"
                />

                <header
                  class="flex items-center justify-between leading-tight p-2"
                >
                  <h1 class="text-lg">
                    {{ product.name }}
                  </h1>
                </header>

                <footer
                  class="flex items-center justify-between leading-none pb-4"
                >
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
    </main>

    <footer class="bg-gray-200">
      <div
        class="container mx-auto px-6 py-3 flex justify-between items-center"
      >
        <a href="#" class="text-xl font-bold text-gray-500 hover:text-gray-400"
          >Vixiza</a
        >
        <p class="py-2 text-gray-500 sm:py-0">All rights reserved</p>
      </div>
    </footer>
  </div>
</template>
<script>
export default {
  data() {
    return {
      number: 1,
    };
  },
  props: ["product", "topProducts"],
};
</script>