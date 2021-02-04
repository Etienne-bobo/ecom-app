<template>
  <nav
    class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg"
  >
    <div
      class="container px-4 mx-auto flex flex-wrap items-center justify-between"
    >
      <div
        class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start"
      >
        <a
          class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-no-wrap uppercase text-white"
          href="/"
          >Vixiza</a
        ><button
          class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
          type="button"
          v-on:click="toggleNavbar()"
        >
          <i class="text-white fas fa-bars"></i>
        </button>
      </div>
      <div
        class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none"
        v-bind:class="{ hidden: !showMenu, block: showMenu }"
      >
        <ul class="flex flex-col lg:flex-row list-none mr-auto">
          <li class="flex items-center">
            <div class="flex flex-wrap">
              <div class="w-full mt-2 px-4">
                <div class="relative inline-flex align-middle w-full">
                  <button
                    class="text-white font-bold text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 bg-green-600 w-full"
                    type="button"
                    v-on:click="toggleDropdown()"
                    ref="btnDropdownRef"
                  >
                    Categories
                  </button>
                  <div
                    v-bind:class="{
                      hidden: !dropdownPopoverShow,
                      block: dropdownPopoverShow,
                    }"
                   
                    class="bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1"
                    style="min-width: 12rem"
                    ref="popoverDropdownRef"
                  >
                    <a
                     v-for="(category, id) in categories"
                    :key="id"
                      href="#pablo"
                      class="text-sm py-2 px-4 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800"
                    >
                      {{category.name}}
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </ul>
        <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
          <li class="flex items-center">
            <a
              class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
              href="#pablo"
              ><i
                class="lg:text-gray-300 text-gray-500 fab fa-facebook text-lg leading-lg"
              ></i
              ><span class="lg:hidden inline-block ml-2">Share</span></a
            >
          </li>
          <li class="flex items-center">
            <a
              class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
              href="#pablo"
              ><i
                class="lg:text-gray-300 text-gray-500 fab fa-twitter text-lg leading-lg"
              ></i
              ><span class="lg:hidden inline-block ml-2">Tweet</span></a
            >
          </li>
          <li class="flex items-center">
            <a
              class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
              href="#pablo"
              ><i
                class="lg:text-gray-300 text-gray-500 fab fa-github text-lg leading-lg"
              ></i
              ><span class="lg:hidden inline-block ml-2">Star</span></a
            >
          </li>
          <li class="flex items-center">
            <inertia-link :href="route('login')">
              <button
                class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
                type="button"
                style="transition: all 0.15s ease 0s"
              >
                <i class="fas fa-arrow-alt-circle-down"></i> Login
              </button>
            </inertia-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>
<script>
import Popper from "popper.js";
export default {
  data() {
    return {
      showMenu: false,
      dropdownPopoverShow: false
    };
  },
  props: ["categories"],
  methods: {
    toggleNavbar: function () {
      this.showMenu = !this.showMenu;
    },
    toggleDropdown: function(){
      if(this.dropdownPopoverShow){
        this.dropdownPopoverShow = false;
      } else {
        this.dropdownPopoverShow = true;
        new Popper(this.$refs.btnDropdownRef, this.$refs.popoverDropdownRef, {
          placement: "bottom-start"
        });
      }
    }
  },
};
</script>