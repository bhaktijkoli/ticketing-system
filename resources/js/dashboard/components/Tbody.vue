<template>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ticket
            <!-- <small># {{ticket.id}}</small> -->
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
                    <!-- <small class="pull-right">Date: {{ticket.created_at.date}}</small> -->
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
                                        <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                                    </div>
                                    <!-- /.direct-chat-info -->
                                    <!-- <img
                      class="direct-chat-img"
                      v-bind:src="'https://ui-avatars.com/api/?name='+username"
                      alt="message user image"
                    >-->
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">Message from admin:)</div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->
                                <!-- Message to the right -->
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-info clearfix">
                                        <!-- <span class="direct-chat-name pull-right">{{username}}</span> -->
                                        <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                                    </div>
                                    <!-- /.direct-chat-info -->
                                    <!-- <img
                      class="direct-chat-img"
                      v-bind:src="'https://ui-avatars.com/api/?name='+username"
                      alt="message user image"
                    >-->
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        <p v-for="msg in message">{{msg.message}}</p>
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->
                            </div>
                            <!--/.direct-chat-messages-->
                            <!-- Contacts are loaded here -->
                            <div class="direct-chat-contacts">
                                <ul class="contacts-list">
                                    <li>
                                        <a href="#">
                                            <!-- <img
                          class="contacts-list-img"
                          v-bind:src="'https://ui-avatars.com/api/?name='+username"
                          alt="User Image"
                        >-->
                                            <div class="contacts-list-info">
                                                <span class="contacts-list-name">
                                                    Count Dracula
                                                    <small class="contacts-list-date pull-right">2/28/2015</small>
                                                </span>
                                                <span class="contacts-list-msg">How have you been? I was...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                </ul>
                                <!-- /.contatcts-list -->
                            </div>
                            <!-- /.direct-chat-pane -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <form method="post">
                                <div class="input-group">
                                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-warning btn-flat">Send</button>
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
    name: "Tbody",
    data() {
        return {
            ticket: '',
            message: ''
        };
    },
    // computed: {
    //   date() {
    //     if (this.ticket == null) return null;
    //     return this.ticket;
    //   }
    // },
    mounted() {
        axios
            .get('api/ticket/get/details/' + this.$route.params.id)
            .then(response => {
                // console.log(response.data);
                this.ticket = response.data;
                // this.message = response.data.messages;
                // console.log(this.message);
            });
    }
};
</script>
