<template>
  <div class="content-wrapper">
    <section class="content">
      <h3>Settings</h3>
      <!--/.add user -->
      <div class="row">
        <!-- Main content -->
        <div class="col-xs-12">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Change and save your settings here!</h3>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <form method="post" class="form-horizontal">
                <div class="box-body">
                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                      <input
                        v-model="name"
                        type="text"
                        class="form-control"
                        id="name"
                        placeholder="Name"
                      >
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
                </div>
              </form>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <div class="pull-right">
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary">Save</button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

    <!-- </section> -->
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
</template>

<script>
export default {
  name: "Settings"
};
</script>
