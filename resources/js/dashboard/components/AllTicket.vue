<template>
  <div class="content-wrapper">
    <section class="content">
      <h3>All Ticket</h3>
      <!--/.add user -->
      <div class="row">
        <!-- Main content -->
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Inbox</h3>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                    <tr>
                      <td class="mailbox-name">
                        <a href="/ticket">Alexander Pierce</a>
                      </td>
                      <td class="mailbox-subject">
                        <b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
                      </td>
                      <td class="mailbox-date">5 mins ago</td>
                    </tr>
                    <tr>
                      <td class="mailbox-name">
                        <a href="/ticket">Alexander Pierce</a>
                      </td>
                      <td class="mailbox-subject">
                        <b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
                      </td>
                      <td class="mailbox-date">5 mins ago</td>
                    </tr>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <div class="pull-right">1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fa fa-chevron-left"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fa fa-chevron-right"></i>
                    </button>
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
  name: "AllTicket"
};
</script>


