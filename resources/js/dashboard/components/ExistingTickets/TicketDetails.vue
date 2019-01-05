<template>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ticket
        <small>#{{ticket.id}}</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-hand-o-right"></i>
            {{ticket.subject}}
            <small class="pull-right">Date: {{this.date}}</small>
          </h2>
        </div>
        <!-- Ticket details -->
        <div class="row">
          <div class="col-xs-12">
            <!-- DIRECT CHAT -->
            <div class="box box-warning direct-chat direct-chat-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Direct Chat</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                  <!-- Message. Default to the left -->
                  <div class="direct-chat-msg">
                    <div class="direct-chat-info clearfix">
                      <span class="direct-chat-name pull-left">
                        <!-- {{username}} -->
                      </span>
                      <!-- <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span> -->
                    </div>
                    <!-- /.direct-chat-info -->
                    <!-- <img
                      class="direct-chat-img"
                      v-bind:src="'https://ui-avatars.com/api/?name='+username"
                      alt="message user image"
                    >-->
                    <!-- /.direct-chat-img -->
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->
                  <!-- Message to the right -->
                  <div v-for="msg in messages" class="direct-chat-msg right">
                    <div class="direct-chat-info clearfix pull-right">
                      <!-- <span class="direct-chat-name pull-right">{{username}}</span> -->
                      <span class="direct-chat-timestamp">{{msg.created_at_format}}</span>
                    </div>
                    <!-- /.direct-chat-info -->
                    <img
                      class="direct-chat-img pull-right"
                      :src="'https://ui-avatars.com/api/?name='+msg.created_by.name"
                      alt="message user image"
                    >
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text pull-right">
                      <p>{{msg.message}}</p>
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>

                  <!-- /.direct-chat-msg -->
                </div>
                <!--/.direct-chat-messages-->
                <!-- Contacts are loaded here -->
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <form @submit.prevent="addMessage()" method="post">
                  <div class="input-group">
                    <input
                      type="text"
                      name="message"
                      v-model="message"
                      id="newMessage"
                      placeholder="Type Message ..."
                      class="form-control"
                    >
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-warning btn-flat">Send</button>
                    </span>
                  </div>
                </form>
              </div>
              <!-- /.box-footer-->
            </div>
            <!--/.direct-chat -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
        </div>
        <!-- Action btn -->
        <div class="col-xs-12">
          <br>
          <a href="invoice-print.html" target="_blank" class="btn btn-default">
            <i class="fa fa-print"></i> Print
          </a>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </section>
  </div>
</template>


<script>
export default {
  name: "TicketDetails",
  data() {
    return {
      ticket: "",
      message: "",
      id: "",
      date: "",
      messages: []
    };
  },
  computed: {
    checkticket() {
      if (this.ticket == null) return null;
      return this.ticket;
    },

    checkdate() {
      if (this.date == null) return null;
      return this.date;
    }
  },
  mounted() {
    axios
      .get("/api/ticket/get/details/" + this.$route.params.id)
      .then(response => {
        this.ticket = response.data;
        this.date = response.data.created_at_format_long;
        this.messages = response.data.messages;
      });

    window.Echo.channel(`channel-name`).listen("NewMessage", e => {
      this.messages.push(e.message);
    });
  },
  methods: {
    addMessage: function() {
      let data = {
        ticket: this.$route.params.id,
        message: this.message
      };
      axios.post("/api/message/add", data).then(response => {
        if (fh.is_success(response.data)) {
          this.message = "";
        } else {
          fh.set_multierrors(response.data);
        }
      });
    }
  }
};
</script>
