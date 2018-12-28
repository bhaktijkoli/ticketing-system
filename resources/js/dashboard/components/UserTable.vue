<template>
  <div class="content-wrapper">
    <section class="content">
      <h3>
        All Users
        <small>Manage users</small>
        <!-- Button trigger modal -->
        <button
          type="button"
          class="btn btn-primary"
          data-toggle="modal"
          data-target="#myModal"
        >Add Users</button>
      </h3>
      <!-- Modal -->
      <div
        class="modal fade"
        id="myModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myModalLabel"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title text-center" id="myModalLabel">Start adding a user</h4>
            </div>
            <div class="modal-body">
              <div class="box box-info">
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Name</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                      <div class="col-sm-10">
                        <input
                          type="email"
                          class="form-control"
                          id="inputEmail3"
                          placeholder="Email"
                        >
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                      <div class="col-sm-10">
                        <input
                          type="password"
                          class="form-control"
                          id="inputPassword3"
                          placeholder="Password"
                        >
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Role</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Role">
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info btn-flat">Add User</button>
                  </div>
                  <!-- /.box-footer -->
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--/.add user -->
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Trident</td>
                    <td>
                      Internet
                      Explorer 4.0
                    </td>
                    <td>Win 95+</td>
                    <td>A</td>
                  </tr>
                  <tr>
                    <td>Trident</td>
                    <td>
                      Internet
                      Explorer 5.0
                    </td>
                    <td>Win 95+</td>
                    <td>A</td>
                  </tr>
                  <tr>
                    <td>Trident</td>
                    <td>
                      Internet
                      Explorer 5.5
                    </td>
                    <td>Win 95+</td>
                    <td>A</td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  </div>
</template>

<script>
export default {
  name: "UserTable"
};
</script>
