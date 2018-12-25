<template>
  <div>
    <!-- logo -->
    <div class="login-box">
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form @submit.prevent="authUser(email, password)" method="post">
          <div class="form-group has-feedback">
            <span class="fa fa-envelope-o form-control-feedback"></span>
            <input type="email" class="form-control" placeholder="Email" v-model="email">
          </div>
          <div class="form-group has-feedback">
            <span class="fa fa-lock form-control-feedback"></span>
            <input type="password" class="form-control" placeholder="Password" v-model="password">
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
import axios from 'axios'
export default {
  name: "Login",
  data() {
    return {
      email: '',
      password: '',
      error: ''
    };
  },
  methods: {
    authUser: function(email, password) {
      axios
        .post("api/auth/login")
        .then(response => {
          // this.email = response.data.email;
          // this.password = response.data.password;
          console.log(response);
        })
        .catch(error => {
          // this.error = error;
          console.log(error);
        });
    }
  }
};
</script>
<style scoped>
.passwd {
  text-align: center;
}
</style>


