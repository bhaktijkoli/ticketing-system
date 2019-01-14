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
                <div v-for="msg in messages" class="direct-chat-messages">
                  <!-- Message. Default to the left -->
                  <div v-if="msg.created_by.id != userid" class="direct-chat-msg left">
                    <!-- /.direct-chat-info -->
                    <img
                      class="direct-chat-img pull-left"
                      :src="'https://ui-avatars.com/api/?name='+msg.created_by.name"
                      alt="message user image"
                    >
                    <div class="direct-chat-text pull-left">
                      <p>
                        {{msg.message}}
                        <br>
                        <span class="direct-chat-timestamp pull-right">{{msg.created_at_format}}</span>
                      </p>
                    </div>
                  </div>
                  <!-- Message to the right -->
                  <div v-if="msg.created_by.id == userid" class="direct-chat-msg right">
                    <img
                      class="direct-chat-img"
                      :src="'https://ui-avatars.com/api/?name='+msg.created_by.name"
                      alt="message user image"
                    >
                    <div class="direct-chat-text pull-right">
                      <p>
                        {{msg.message}}
                        <br>
                        <span class="direct-chat-timestamp pull-right">{{msg.created_at_format}}</span>
                      </p>
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->
                </div>
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
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- Action btn -->
        <div class="col-xs-12">
          <br>
          <button
            type="button"
            onclick="window.print()"
            class="btn btn-default pull-left"
            style="margin-right: 5px;"
          >
            <i class="fa fa-print"></i> Print
          </button>
          <button
            v-on:click.prevent="closeTicket()"
            type="submit"
            class="btn btn-primary pull-right"
            style="margin-right: 5px;"
          >Close Ticket</button>
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
    },
    userid() {
      if (this.$store.state.user == null) return "";
      return this.$store.state.user.id;
    }
  },
  mounted() {
    axios
      .get("/api/ticket/get/details/" + this.$route.params.id)
      .then(response => {
        this.ticket = response.data;
        this.date = response.data.created_at_format_long;
        this.messages = response.data.messages;
        setTimeout(function() {
          $(".box-body").scrollTop($(".box-body")[0].scrollHeight);
        }, 100);
        window.Echo.channel(response.data.token).listen("NewMessage", e => {
          this.messages.push(e.message);
          var audio = new Audio(
            "http://soundbible.com/mp3/Elevator Ding-SoundBible.com-685385892.mp3"
          );
          audio.play();
          audio.volume = 0.5;
          setTimeout(function() {
            $(".box-body").scrollTop($(".box-body")[0].scrollHeight);
          }, 100);
        });
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
    },
    closeTicket: function() {
      let data = {
        ticket: this.$route.params.id,
        status: "0"
      };
      axios.post("/api/ticket/status", data).then(res => {
        if (fh.is_success(res.data)) {
          // console.log(this.status);
          window.location.href = "/home";
        } else {
          fh.set_multierrors(res.data);
        }
      });
    }
  }
};
</script>
