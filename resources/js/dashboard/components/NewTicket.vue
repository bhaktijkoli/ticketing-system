<template>
  <div class="content-wrapper">
    <section class="content">
      <h3>New Ticket</h3>
      <!--/.add user -->
      <div class="row">
        <!-- /.box -->
        <!-- Main content -->
        <div class="col-xs-12">
          <div class="box box-primary">
            <form @submit.prevent="newticket(subject,message)" method="post">
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
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">
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
        <!-- /.box -->
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  </div>
</template>
<script>
export default {
  name: "NewTicket",
  data() {
    return {
      subject: "",
      message: "",
      success: false
    };
  },
  methods: {
    newticket: function(subject, message) {
      axios.post("api/ticket/add", { subject, message }).then(res => {
        if (fh.is_success(res.data)) {
          // alert("Your Ticket has been created successfully!");
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