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
                  </form>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <div class="text-center">
                        <a href="#myModal" class="btn btn-primary" data-toggle="modal">Save Changes</a>
                      </div>
                  </div>

                  <!-- /.box-footer -->

    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
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
          </div>
      </section>
  </div>
  </template>

  <script>
  export default {
      name: 'EditUserForm',
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

  <style scoped>
  .modal-confirm {
		color: #636363;
		width: 325px;
	}
	.modal-confirm .modal-content {
		padding: 20px;
		border-radius: 5px;
		border: none;
	}
	.modal-confirm .modal-header {
		border-bottom: none;
        position: relative;
	}
	.modal-confirm h4 {
		text-align: center;
		font-size: 26px;
		margin: 30px 0 -15px;
	}
	.modal-confirm .form-control, .modal-confirm .btn {
		min-height: 40px;
		border-radius: 3px;
	}
	.modal-confirm .close {
        position: absolute;
		top: -5px;
		right: -5px;
	}
	.modal-confirm .modal-footer {
		border: none;
		text-align: center;
		border-radius: 5px;
		font-size: 13px;
	}
	.modal-confirm .icon-box {
		color: #fff;
		position: absolute;
		margin: 0 auto;
		left: 0;
		right: 0;
		top: -70px;
		width: 95px;
		height: 95px;
		border-radius: 50%;
		z-index: 9;
		background: #82ce34;
		padding: 15px;
		text-align: center;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
	}
	.modal-confirm .icon-box i {
		font-size: 58px;
		position: relative;
		top: 3px;
	}
	.modal-confirm.modal-dialog {
		margin-top: 80px;
	}
    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
		background: #82ce34;
		text-decoration: none;
		transition: all 0.4s;
        line-height: normal;
        border: none;
    }
	.modal-confirm .btn:hover, .modal-confirm .btn:focus {
		background: #6fb32b;
		outline: none;
	}
  </style>
