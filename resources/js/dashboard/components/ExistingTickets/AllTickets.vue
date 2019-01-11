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
          <!-- /.box -->
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Inbox</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive borderless">
              <table class="table">
                <thead>
                  <tr>
                    <th>Create By</th>
                    <th>Subject</th>
                    <th>Last Message</th>
                    <th>Handled By</th>
                    <th>Status</th>
                    <th>Time</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="ticket in tickets">
                    <td>
                      <img
                        v-bind:src="'https://ui-avatars.com/api/?name='+ticket.created_by.name"
                        class="user-image hover-img"
                        alt="User Image"
                      >
                      {{ticket.created_by.name}}
                    </td>
                    <td class="mailbox-subject">
                      <router-link
                        :to="{ name: 'TicketDetails', params: {id: ticket.id} }"
                      >{{ticket.subject}}</router-link>
                    </td>
                    <td class="mailbox-subject">
                      {{ticket.last_message.created_by.name}}:
                      <small>{{ticket.last_message.message.slice(0,100)}} ...</small>
                    </td>
                    <td class="mailbox-subject">{{ticket.last_message.created_by.name}}</td>
                    <td v-if="ticket.status==1" class="mailbox-subject status-open">
                      <span class="label label-danger">OPEN</span>
                    </td>
                    <td v-if="ticket.status==0" class="mailbox-subject status-close">
                      <span class="label label-success">CLOSE</span>
                    </td>
                    <td class="mailbox-date">{{ticket.created_at_format}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
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
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <div class="clearfix"></div>
  </div>
</template>


<script>
export default {
  name: "AllTickets",
  data() {
    return {
      tickets: []
    };
  },
  mounted() {
    axios.get("/api/ticket/get/unassigned").then(res => {
      this.tickets = res.data;
    });
  }
};
</script>
<style scoped>
.table {
    border-bottom: 0px !important;
}

.table th,
.table td {
    border: 1px !important;
}

.fixed-table-container {
    border: 0px !important;
}

.table tr {
    height: 50px;
}
</style>
