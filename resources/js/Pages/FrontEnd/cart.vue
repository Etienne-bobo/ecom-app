<template>
  <div class="container mx-auto mt-10">
    <div v-if="cart" class="flex shadow-md my-10">
      <div class="w-3/4 bg-white px-10 py-10">
        <div class="flex justify-between border-b pb-8">
          <h1 class="font-semibold text-2xl">Shopping Cart</h1>
          <h2 class="font-semibold text-2xl">{{Object.keys(cart).length}} Products</h2>
        </div>
        <div class="flex mt-10 mb-5">
          <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">
            Product Details
          </h3>
          <h3
            class="font-semibold text-center text-gray-600 text-xs uppercase w-2/5"
          >
            Quantity
          </h3>
          <h3
            class="font-semibold text-center text-gray-600 text-xs uppercase w-2/5"
          >
            Price
          </h3>
        </div>
        <div v-for="(c, index) in cart" :key="index" class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
          <div class="flex w-2/5">
            <!-- product -->
            <div class="w-20">
              <img
                class="h-24"
                :src="`http://localhost:8000/storage/${c['image']}`"
                alt=""
              /> 
            </div>
            <div class="flex flex-col justify-between ml-4 flex-grow">
              <span class="font-bold text-sm">{{c['name']}}</span>
              <button
               @click="remove(c['id'])"
                class="font-semibold hover:text-red-500 text-red-500 text-xs"
                >Remove</button
              >
            </div>
          </div>
          <div class="flex justify-center w-1/3">
            <b-field class="w-full mt-2">
                <b-numberinput v-model="c['qty']" min="1"></b-numberinput>
              <button class="px-3 py-1 text-white bg-green-500 rounded-md ml-2" @click="update(c['id'], c['qty'])">update</button>
              </b-field>
          </div>
          <span class="text-center w-1/5 font-semibold text-sm">{{c['price']}}$</span>
        </div>
        <a href="/" class="flex font-semibold text-indigo-600 text-sm mt-10">
          <svg
            class="fill-current mr-2 text-indigo-600 w-4"
            viewBox="0 0 448 512"
          >
            <path
              d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"
            />
          </svg>
          Continue Shopping
        </a>
      </div>
      
      <div id="summary" class="w-1/4 px-8 py-10">
        <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
        <div class="flex justify-between mt-10 mb-5">
        </div>
        <div>
          <label class="font-medium inline-block mb-3 text-sm uppercase"
            >Shipping</label
          >
          <select class="block p-2 text-gray-600 w-full text-sm">
            <option>Standard shipping - $10.00</option>
          </select>
        </div>
        <div class="border-t mt-8">
          <div
            class="flex font-semibold justify-between py-6 text-sm uppercase"
          >
            <span>Total cost</span>
            <span>{{cartPrice}}$</span>
          </div>
          <button
            class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full"
          >
            Checkout
          </button>
        </div>
      </div>
    </div>
    <div v-else>
      <div class="flex shadow-md my-10">
      <div class="w-3/4 bg-white px-10 py-10">
        <div class="flex justify-between border-b pb-8">
          <h1 class="font-semibold text-2xl">Shopping Cart</h1>
        </div>
        <div class="flex mt-10 mb-5">
          <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">
            Product Details
          </h3>
          <h3
            class="font-semibold text-center text-gray-600 text-xs uppercase w-2/5"
          >
            Quantity
          </h3>
          <h3
            class="font-semibold text-center text-gray-600 text-xs uppercase w-2/5"
          >
            Price
          </h3>
        </div>
        <div class="flex justify-center items-center">
          <span>No item in the cart</span>
        </div>
        <a href="/" class="flex font-semibold text-indigo-600 text-sm mt-10">
          <svg
            class="fill-current mr-2 text-indigo-600 w-4"
            viewBox="0 0 448 512"
          >
            <path
              d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"
            />
          </svg>
          Continue Shopping
        </a>
      </div>
      
      <div id="summary" class="w-1/4 px-8 py-10">
        <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
        <div class="flex justify-between mt-10 mb-5">
        </div>
        <div>
          <label class="font-medium inline-block mb-3 text-sm uppercase"
            >Shipping</label
          >
          <select class="block p-2 text-gray-600 w-full text-sm">
            <option>Standard shipping - $10.00</option>
          </select>
        </div>
        <div class="border-t mt-8">
          <div
            class="flex font-semibold justify-between py-6 text-sm uppercase"
          >
            <span>Total cost</span>
            <span>0$</span>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</template>
<script>
export default {
    props: ["cart", "cartPrice"],
    data(){
      return{
      }
    },
    methods: {
      update(id, qty){
        this.$inertia.post(route("updateCart", id),  {qty:qty})
      }, 
      remove(id){
        this.$inertia.post(route("removeCart", id), id)
      }
    }
}
</script>