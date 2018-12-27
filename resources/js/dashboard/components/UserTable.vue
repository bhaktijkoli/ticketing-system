<template>
<div class="content-wrapper">
  <section class="content">
    <h3>
        All Users
        <small>Manage users</small>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="bs-example-modal-sm">Small modal</button>
 </h3>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      ...
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
