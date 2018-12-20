<template>
  <div>
    <!-- logo -->

    
    <div class="login-box">
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form method="post">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
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
export default {
  name: "Login"
};
</script>
<style scoped>
.passwd{
  text-align: center;
}
</style>


