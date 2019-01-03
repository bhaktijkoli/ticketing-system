<template>
  <div class="content-wrapper">
    <section class="content">
      <h3>All Ticket</h3>
      <div v-if="tickets==0" class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4>
          <i class="icon fa fa-info"></i> Alert!
        </h4>Sorry their is no ticket to show, create your ticket
        <a href="/new-ticket">here</a>!
      </div>
      <!--/.add user -->
      <div v-if="tickets != 0" class="row">
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
                  <thead>
                    <tr>
                      <th>Create By</th>
                      <th>Subject</th>
                      <th>Details</th>
                      <th>Time</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="ticket in tickets">
                      <td>
                        {{ticket.created_by.name}}
                      </td>
                      <td class="mailbox-subject">
                        <router-link :to="{ name: 'Tbody', params: {id: ticket.id} }">{{ticket.subject}}</router-link>
                      </td>
                      <td class="mailbox-subject">{{ticket.last_message.message.slice(0,20)}} ...</td>

                      <td class="mailbox-date">{{ticket.created_at_format}}</td>
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
                <div class="pull-right">50/200
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
  name: "AllTicket",
  data() {
    return {
      tickets: [],
    };
  },
  mounted() {
    axios.get("api/ticket/get/unassigned").then(res => {
      console.log(res.data);
      this.tickets = res.data;
    });
  }
};
</script>
