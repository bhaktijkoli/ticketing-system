<template>
  <div class="content-wrapper">
    <section class="content">
      <h3>Help</h3>
      <div class="row">
        <!-- Main content -->
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Change and save your settings here!</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="table-responsive mailbox-messages">
                <!-- temp  for now -->
                <div class="container">
                  <input type="checkbox" id="faq0">
                  <label for="faq0">
                    <h4>Question</h4>
                    <i class="fa fa-angle-up"></i>
                  </label>
                  <p>Answer</p>
                  <hr>
                  <input type="checkbox" id="faq1">
                  <label for="faq1">
                    <h4>How old is Donald Tusk?</h4>
                    <i class="fa fa-angle-up"></i>
                  </label>
                  <p>Donald Tusk is 61 years old</p>

                  <hr>
                </div>
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
    </section>
  </div>
</template>
<script>
export default {
  name: "Help"
};
</script>
