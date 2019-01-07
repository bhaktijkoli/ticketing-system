<template>
  <div class="content-wrapper">
    <section class="content">
      <div v-show="success" class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4>
          <i class="icon fa fa-check"></i> Success!
        </h4>Your Ticket has been created successfully!
      </div>
      <h3>New Ticket</h3>
      <!--/.add user -->
      <div class="row">
        <!-- /.box -->
        <!-- Main content -->
        <div class="col-xs-12">
          <div class="box box-success">
            <form @submit.prevent="newTicket(subject,message)" method="post">
              <div class="box-header with-border">
                <h3 class="box-title">Compose New Ticket</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="form-group">
                  <input class="form-control" v-model="subject" id="subject" placeholder="Subject">
                </div>
                <div class="form-group">
                  <textarea
                    id="message"
                    v-model="message"
                    class="form-control"
                    style="height: 300px"
                    placeholder="Write Details Here..."
                  ></textarea>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary text-justify">
                  <i class="fa fa-paper-plane-o"></i> Send
                </button>
                <button type="reset" class="btn btn-danger text-justify">
                  <i class="fa fa-times"></i> Discard
                </button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /. box -->
        </div>
      </div>
      <!-- /.row -->
      <!-- <div v-if="success" id="myModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
          <div class="modal-content">
            <div class="modal-header">
              <div class="icon-box">
                <i class="material-icons">&#xE876;</i>
              </div>
              <h4 class="modal-title">Awesome!</h4>
            </div>
            <div class="modal-body">
              <p class="text-center">Changes have been saved!</p>
            </div>
            <div class="modal-footer">
              <router-link to="/home">
                <button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
              </router-link>
            </div>
          </div>
        </div>
      </div>-->
    </section>
  </div>
</template>
<script>
export default {
  name: "NewTicketForm",
  data() {
    return {
      subject: "",
      message: "",
      success: false
    };
  },
  methods: {
    newTicket: function(subject, message) {
      axios.post("api/ticket/add", { subject, message }).then(res => {
        if (fh.is_success(res.data)) {
          this.success = true;
          window.location.href = "/home";
        } else {
          fh.set_multierrors(res.data);
        }
      });
    }
  }
};
</script>
