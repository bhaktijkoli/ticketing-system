  <template>
  <div class="content-wrapper">
      <section class="content">
          <div class="box box-info">
              <div class="box-header with-border">
                  <h3 class="box-title">Edit User</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form @submit.prevent="updateUserData(name, email, password, role)" method="post" class="form-horizontal">
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
                              <input v-model="email" type="email" class="form-control" id="email" placeholder="Email">
                              <p class="help-block"></p>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="password" class="col-sm-2 control-label">Change Password</label>

                          <div class="col-sm-10">
                              <input v-model="password" type="password" class="form-control" id="password" placeholder="Password">
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
                  <!-- /.box-body -->
                  <div class="box-footer">
                      <button type="submit" class="btn btn-info btn-flat">Save Changes</button>
                  </div>
                  <!-- /.box-footer -->
              </form>
          </div>
          <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
  <!--End of Modal content-->
      </section>
  </div>
  </template>

  <script>
  export default {
      name: 'EditUser',
      data() {
          return {
              name: '',
              email: '',
              password: '',
              role: ''
          }
      },
      mounted() {
          this.getUserData();
      },
      methods: {
          getUserData: function() {
              axios
                  .get('/api/user/get/details/' + this.$route.params.id)
                  .then(response => {
                      this.name = response.data.name;
                      this.email = response.data.email;
                      this.password = response.data.password;
                      this.role = response.data.role;
                  })
          },
          updateUserData: function(name, email, password, role) {
              axios
                  .post('/api/user/edit/', {user: this.$route.params.id, name, email, password, role})
                  .then(response => {
                      if (fh.is_success(response.data)) {
                          this.$router.push({ path: '/users'})
                      } else {
                          fh.set_multierrors(response.data)
                      }
                  })
          }
      }
  }
  </script>

  <style lang="css" scoped>
  </style>
