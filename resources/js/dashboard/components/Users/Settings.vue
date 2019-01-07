<template>
  <div class="content-wrapper">
    <section class="content">
      <h3>Settings</h3>
      <!--/.add user -->
      <div v-if="tickets != 0" class="row">
        <!-- Main content -->
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Change and save your settings here!</h3>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="table-responsive mailbox-messages"></div>
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
