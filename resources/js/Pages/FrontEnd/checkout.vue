<template>
  <div class="mx-auto max-w-5xl mt-24">
    <!-- <div class="cell example example1" id="example-1">
      <form class="py-24 px-16">
        <fieldset>
          <div class="row">
            <label
              for="example1-name"
              data-tid="elements_examples.form.name_label"
              >Name</label
            >
            <input
              id="example1-name"
              data-tid="elements_examples.form.name_placeholder"
              type="text"
              placeholder="Jane Doe"
              required=""
              autocomplete="name"
            />
          </div>
          <div class="row">
            <label
              for="example1-email"
              data-tid="elements_examples.form.email_label"
              >Email</label
            >
            <input
              id="example1-email"
              data-tid="elements_examples.form.email_placeholder"
              type="email"
              placeholder="janedoe@gmail.com"
              required=""
              autocomplete="email"
            />
          </div>
          <div class="row">
            <label
              for="example1-phone"
              data-tid="elements_examples.form.phone_label"
              >Phone</label
            >
            <input
              id="example1-phone"
              data-tid="elements_examples.form.phone_placeholder"
              type="tel"
              placeholder="(941) 555-0123"
              required=""
              autocomplete="tel"
            />
          </div>
          <!-- <div class="row">
            <label
              for="example1-address"
              data-tid="elements_examples.form.address_label"
              >Address</label
            >
            <input
              id="example1-address"
              data-tid="elements_examples.form.address_placeholder"
              type="text"
              placeholder="Shimla"
              required=""
              autocomplete="address"
            />
          </div> -->
          <!-- <div class="row">
            <label
              for="example1-zip"
              data-tid="elements_examples.form.zip_label"
              >Zip code</label
            >
            <input
              id="example1-zip"
              data-tid="elements_examples.form.zip_placeholder"
              type="number"
              placeholder="171009"
              required=""
              autocomplete="zip"
            />
          </div> 
        </fieldset>
        <fieldset>
          <div class="row">
            <div id="example1-card"></div>
          </div>
        </fieldset>
        <button
          type="submit"
          @click="charge"
          data-tid="elements_examples.form.pay_button"
        >
          Pay ${{ amount }}
        </button>
      </form>
    </div> -->
    <div>
    <stripe-checkout
      ref="checkoutRef"
      mode="payment"
      :pk="publishableKey"
      :success-url="successURL"
      :cancel-url="cancelURL"
      @loading="v => loading = v"
    />
    <button @click="submit">Pay now!</button>
  </div>
  </div>
</template>


<script>
import { StripeCheckout } from '@vue-stripe/vue-stripe';
export default {
  props: ["amount"],
  components: {
    StripeCheckout,
  },
  data () {
    this.publishableKey = "pk_test_gc8YWoZEKl6MWmeAzr9UJiIG";
    return {
      loading: false,
      lineItems: [
        {
          price: 'some-price-id', // The id of the one-time price you created in your Stripe dashboard
          quantity: 1,
        },
      ],
      successURL: 'http://localhost:8000',
      cancelURL: 'http://localhost:8000',
    };
  },
  methods: {
    submit () {
      // You will be redirected to Stripe's secure checkout page
      this.$refs.checkoutRef.redirectToCheckout();
    },
  },
};
</script>