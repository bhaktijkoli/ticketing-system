<template>
  <div class="content-wrapper">
    <section class="content">
      <h3>All Tickets</h3>
      <div v-if="tickets==0" class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4>
          <i class="icon fa fa-info"></i> Alert!
        </h4>Sorry their is no ticket to show, create your ticket
        <a href="/new-ticket">here</a>!
      </div>
      <div v-if="tickets != 0" class="row">
        <!-- Main content -->
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Inbox</h3>
            </div>
            <div class="box-body table-responsive borderless">
              <table class="table">
                <!-- <thead>
                  <tr>
                    <th>Create By</th>
                    <th>Subject</th>
                    <th>Last Message</th>
                    <th>Handled By</th>
                    <th>Status</th>
                    <th>Time</th>
                  </tr>
                </thead>-->
                <tbody>
                  <tr v-for="ticket in tickets">
                    <td>
                      <img
                        v-bind:src="'https://ui-avatars.com/api/?name='+ticket.created_by.name"
                        class="user-image hover-img"
                        alt="user-img"
                      >
                      <!-- {{ticket.created_by.name}} -->
                    </td>
                    <td class="mailbox-subject">
                      <router-link
                        :to="{ name: 'TicketDetails', params: {id: ticket.id} }"
                      >{{ticket.subject}}</router-link>
                    </td>
                    <td class="mailbox-subject">
                      {{ticket.last_message.created_by.name}}:
                      <small>{{ticket.last_message.message.slice(0,60)}} ...</small>
                    </td>
                    <!-- reply from admin side -->
                    <td
                      class="mailbox-subject"
                      v-if="ticket.created_by.name!=ticket.last_message.created_by.name"
                    >
                      Handled by:
                      <b>{{ticket.last_message.created_by.name}}</b>
                    </td>
                    <!-- reply not come -->
                    <td
                      class="mailbox-subject"
                      v-if="ticket.created_by.name==ticket.last_message.created_by.name"
                    >Unhandled</td>
                    <td v-if="ticket.status==1" class="mailbox-subject status-open">
                      <span class="label label-danger">OPENED</span>
                    </td>
                    <td v-if="ticket.status==0" class="mailbox-subject status-close">
                      <span class="label label-success">CLOSED</span>
                    </td>
                    <td class="mailbox-date">{{ticket.created_at_format}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <div class="pull-right">50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fa fa-chevron-left"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fa fa-chevron-right"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
  height: 45px;
}
</style>
