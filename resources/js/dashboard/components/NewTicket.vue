<template>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>New Ticket</h1>
    </section>
    <!-- Main content -->
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Compose New Ticket</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="form-group">
            <input class="form-control" placeholder="Subject:">
          </div>
          <div class="form-group">
            <textarea
              id="compose-textarea"
              class="form-control"
              style="height: 300px"
              placeholder="Write Details Here!"
            ></textarea>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <div class="pull-right">
            <button type="submit" class="btn btn-primary">
              <i class="fa fa-paper-plane-o"></i> Send
            </button>
          </div>
          <button type="reset" class="btn btn-danger">
            <i class="fa fa-times"></i> Discard
          </button>
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- /. box -->
    </div>
  </div>
</template>
<script>
export default {
  name: "NewTicket"
};
</script>
