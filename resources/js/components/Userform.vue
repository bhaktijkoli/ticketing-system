<template>
  <div class="container col-sm-4">
    <form class="form" v-on:submit.prevent="onSubmit">
      <label for="email">Email :</label>
      <input
        type="email"
        :class=" {error:$v.email.$error} "
        @input="$v.email.$touch()"
        v-model.trim="email"
        class="form-control"
        placeholder="Enter Email"
      >
      <!-- error message-->
      <div v-if="$v.email.$dirty">
        <span
          class="text-danger"
          v-if="!$v.email.email"
        >Please enter valid email address "example@mail.com "</span>
        <span class="text-warning" v-if="!$v.email.required">*Email required</span>
      </div>
      <br>
      <label for="password">Password :</label>
      <input
        type="password"
        :class=" {error:$v.password.$error} "
        v-model.trim="password"
        @input="$v.password.$touch()"
        class="form-control"
        placeholder="Enter Password"
      >
      <!-- error message-->
      <div v-if="$v.password.$dirty">
        <span class="text-danger" v-if="!$v.password.required">*Password required</span>
        <span class="text-danger" v-if="!$v.password.minLength">Password must greater then 8</span>
      </div>
      <div class="submit">
        <button
        type="submit"
        :disabled="$v.$invalid"
        class="btn btn-outline-success my-4 float-right"
      >SUBMIT</button>
      </div>
    </form>
    <!--Get validators on page  -->
    <!-- <div class="validators">
      <pre> {{$v}} </pre>
    </div>-->
  </div>
</template>

<script>
import { required, email, minLength, sameAs } from "vuelidate/lib/validators";
export default {
  name: "Userform",
  data() {
    return {
      email: "",
      first_name: "",
      last_name: "",
      password: "",
      repeat_password: ""
    };
  },
  validations: {
    email: {
      required,
      email
    },
    password: {
      required,
      minLength: minLength(8)
    }
  },
  methods: {
    onSubmit() {
      if (!this.$v.$invalid) {
        const user = {
          email: this.email,
          first_name: this.first_name,
          last_name: this.last_name,
          password: this.password,
          repeat_password: this.repeat_password
        };
        // console.log(user);
      }
    }
  }
};
</script>


<style scoped>
form{
  padding: 5% 5%;
}
h3 {
  text-align: center;
  font-size: 40px;
}
label {
  font-weight: bold;
}
input:focus {
  outline: none;
}
.error {
  border: 1px solid red;
}
button:disabled {
  cursor: not-allowed;
}
</style>
