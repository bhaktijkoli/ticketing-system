  <template>
  <div class="content-wrapper">
    <section class="content">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Edit User</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="post" class="form-horizontal">
          <div class="box-body">
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">Name</label>

              <div class="col-sm-10">
                <input v-model="name" type="text" class="form-control" id="name" placeholder="Name">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-sm-2 control-label">Email</label>

              <div class="col-sm-10">
                <input
                  v-model="email"
                  type="email"
                  class="form-control"
                  id="email"
                  placeholder="Email"
                >
                <p class="help-block"></p>
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="col-sm-2 control-label">Change Password</label>

              <div class="col-sm-10">
                <input
                  v-model="password"
                  type="password"
                  class="form-control"
                  id="password"
                  placeholder="Password"
                >
                <p class="help-block"></p>
              </div>
            </div>
            <div class="form-group">
              <label for="role" class="col-sm-2 control-label">Role</label>
              <div class="col-sm-10">
                <select v-model="role" id="role" class="form-control">
                  <option value="0">Admin</option>
                  <option value="1">Support</option>
                  <option value="2">User</option>
                </select>
                <p class="help-block"></p>
              </div>
            </div>
          </div>
        </form>
        <!-- /.box-body -->
        <div class="box-footer">
          <div class="text-center">
            <a
              @click="updateUserData(name, email, password, role)"
              href="#myModal"
              class="btn btn-primary"
              data-toggle="modal"
            >Save Changes</a>
          </div>
        </div>

        <!-- /.box-footer -->
        <!-- Modal HTML for Successful Updation of User -->
        <div v-if="success" id="myModal" class="modal fade">
          <div class="modal-dialog modal-confirm">
            <div class="modal-content">
              <div class="modal-header">
                <div class="icon-box">
                  <i class="material-icons">&#xE876;</i>
                </div>
                <h4 class="modal-title">Awesome!</h4>
              </div>
              <div class="modal-body">
                <p class="text-center">Changes have been saved!</p>
              </div>
              <div class="modal-footer">
                <router-link to="/users">
                  <button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
                </router-link>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal HTML for Unsuccessful Updation of User -->
        <div v-else id="myModal" class="modal fade">
          <div class="modal-dialog modal-fail">
            <div class="modal-content">
              <div class="modal-header">
                <div class="icon-box">
                  <i class="material-icons">clear</i>
                </div>
                <h4 class="modal-title">Updation Failed!</h4>
              </div>
              <div class="modal-body">
                <p class="text-center">Changes haven't been saved!</p>
              </div>
              <div class="modal-footer">
                <router-link to="/users">
                  <button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
                </router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

  <script>
export default {
  name: "EditUserForm",
  data() {
    return {
      name: "",
      email: "",
      password: "",
      role: "",
      success: false
    };
  },
  mounted() {
    this.getUserData();
  },
  methods: {
    getUserData: function() {
      axios
        .get("/api/user/get/details/" + this.$route.params.id)
        .then(response => {
          this.name = response.data.name;
          this.email = response.data.email;
          this.password = response.data.password;
          this.role = response.data.role;
        });
    },
    updateUserData: function(name, email, password, role) {
      axios
        .post("/api/user/edit/", {
          user: this.$route.params.id,
          name,
          email,
          password,
          role
        })
        .then(response => {
          this.name = response.data.name;
          this.email = response.data.email;
          this.password = response.data.password;
          this.role = response.data.role;
          if (fh.is_success(response.data)) {
            this.success = true;
          } else {
            fh.set_multierrors(response.data);
          }
        });
    }
  }
};
</script>
