<template>
  <div>
    <!--logo-->
    <div class="login-box">
      <div class="login-box-body">
        <div class="text-center">
          <img class="text-center" src="/images/logo.png" alt="logo">
        </div>
        <!-- <div class="text-center">
        <img src="/images/logo.png" alt="logo">
        </div> -->
        <p class="login-box-msg">Login to start your session</p>
        <p class="alert alert-danger" role="alert" v-if="error">
          Incorrect Credentials. Please Try again!
        </p>
        <form @submit.prevent="authUser(email, password)" method="post">
          <div class="form-group has-feedback">
            <span class="fa fa-envelope-o form-control-feedback"></span>
            <input v-model="email" type="email" class="form-control" placeholder="Email">
          </div>
          <div class="form-group has-feedback">
            <span class="fa fa-lock form-control-feedback"></span>
            <input v-model="password" type="password" class="form-control" placeholder="Password">
          </div>
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          <div class="mt-2 passwd">
            <a href="#">I forgot my password</a>
          </div>
          <br>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "Login",
  data() {
    return {
      email: "",
      password: "",
      error: false
    };
  },
  methods: {
    authUser: function(email, password) {
      axios
        .post("/api/auth/login", { email, password })
        .then(response => {
          console.log(response);
          if (response.status == 200) {
            window.location.href = "/home";
          }
        })
        .catch(error => {
          this.error = true;
        });
    }
  }
};
</script>
<style scoped>
.passwd {
  text-align: center;
}
.text-center{
  height: 10vw;
}
</style>
