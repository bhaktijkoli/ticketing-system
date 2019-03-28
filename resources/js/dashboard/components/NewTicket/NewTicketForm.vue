<template>
  <div class="content-wrapper">
    <section class="content">
      <h3>New Ticket</h3>
      <div class="row">
        <!-- Main content -->
        <div class="col-xs-12">
          <div class="box box-success">
            <form method="post" id="new-ticket" @submit.prevent="newTicket(subject, message)">
              <div class="box-header with-border">
                <h3 class="box-title">Compose New Ticket</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="form-group">
                  <input class="form-control" name="subject" v-model="subject" id="subject" placeholder="Subject:">
                </div>
                <div class="form-group">
                  <textarea
                    id="message"
                    name="message"
                    v-model="message"
                    class="form-control"
                    style="height: 300px"
                    placeholder="Write Details Here..."
                  ></textarea>
                </div>
                <small>Add files:</small>
                <div class="btn btn-default btn-file">
                  <i class="fa fa-paperclip"></i> Attachment
                  <input type="file" name="files" @change="imgPreview" multiple>
                </div>
                <br>
                <br>
                <div v-if="files.length > 0">
                  <img class="preview" :src="files">
                </div>
              </div>
              <div class="box-footer">
                <button
                  type="submit"
                  class="btn btn-primary text-justify"
                  data-toggle="modal"
                  data-target="#myModal"
                >
                  <i class="fa fa-paper-plane-o"></i> Send
                </button>
                <!-- <a 
                  @click="newTicket(subject,message)"
                  href="#myModal" 
                  class="btn btn-primary" 
                  data-toggle="modal"
                > <i class="fa fa-paper-plane-o"></i> Send </a>-->
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
      <!-- Modal HTML for Successful Creation of Ticket  -->
      <div v-if="success" id="myModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
          <div class="modal-content">
            <div class="modal-header">
              <div class="icon-box">
                <i class="material-icons">&#xE876;</i>
              </div>
              <h4 class="modal-title">Success!</h4>
            </div>
            <div class="modal-body">
              <p class="text-center">Your Ticket has been raised.</p>
            </div>
            <div class="modal-footer">
              <router-link to="/home">
                <button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
              </router-link>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal HTML for Unsuccessful Creation of Ticket -->
      <div v-else id="myModal" class="modal fade">
        <div class="modal-dialog modal-fail">
          <div class="modal-content">
            <div class="modal-header">
              <div class="icon-box">
                <i class="material-icons">clear</i>
              </div>
              <h4 class="modal-title">Failed!</h4>
            </div>
            <div class="modal-body">
              <p class="text-center">Ticket has not been raised.</p>
            </div>
            <div class="modal-footer">
              <router-link to="/new-ticket">
                <button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
              </router-link>
            </div>
          </div>
        </div>
      </div>
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
      success: false,
      img_url: null,
      files:[]
    };
  },
  computed:{
    files_length(){
      if (this.files[0].length == null) return "";
      return this.files[0].length;
    }
  },
  methods: {
    newTicket: function(subject, message) {
      let data = new FormData(
        document.getElementById('new-ticket')
      );
      axios.post("api/ticket/add", data).then(res => {
        if (fh.is_success(res.data)) {
          this.success = true;
          this.subject = res.data.subject;
          this.message = res.data.message;
          this.files = res.data.files;
        } else {
          fh.set_multierrors(res.data);
        }
      });
    },
    imgPreview: function(event) {
      var input = event.target;
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = e => {
          this.files = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
  }
};
</script>
