<template>
  <div>
    <Applayout />
     <div class="flex flex-wrap">
    <div class="w-full lg:w-8/12 max-w-xl mt-12 px-4 md:ml-64">
     <ValidationObserver ref="observer" v-slot="{ handleSubmit }">
    <!-- the "handleSubmit" function on the slot-scope executes the callback if validation was successfull -->
    <section class="section">
      <ValidationProvider rules="required" name="name" v-slot="{ errors, valid }">
        <b-field
          label="Name"
          :type="{ 'is-danger': errors[0], 'is-success': valid }"
          :message="errors"
        >
          <b-input type="text" v-model="name"></b-input>
        </b-field>
      </ValidationProvider>

      <ValidationProvider
        rules="required"
        name="description"
        v-slot="{ errors, valid }"
      >
        <b-field
          label="Description"
          :type="{ 'is-danger': errors[0], 'is-success': valid }"
          :message="errors"
        >
          <b-input type="text" v-model="description"></b-input>
        </b-field>
      </ValidationProvider>
    <b-field class="file is-primary" :class="{'has-name': !!file}">
        <b-upload v-model="file" class="file-label">
            <span class="file-cta">
                <b-icon class="file-icon" icon="upload"></b-icon>
                <span class="file-label">Click to upload</span>
            </span>
            <span class="file-name" v-if="file">
                {{ file.name }}
            </span>
        </b-upload>
    </b-field>
      <div class="buttons">
        <button class="button is-success" @click="handleSubmit(submit)">
          <span class="icon is-small">
            <i class="fas fa-check"></i>
          </span>
          <span>Submit</span>
        </button>
      </div>
    </section>
  </ValidationObserver>
    </div>
  </div>
    </div>
</template>
<script>
import { ValidationObserver, ValidationProvider } from 'vee-validate';
import Applayout from "../../Layouts/Layout";
export default {
  name: "category-create-page",
  components: {
    Applayout,
    ValidationObserver,
    ValidationProvider
  },
  methods: {
      submit() {
      console.log("Form submitted yay!");
    },
  }
};
</script>