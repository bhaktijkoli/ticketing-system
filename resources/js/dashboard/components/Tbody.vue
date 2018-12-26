<template>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ticket
        <small>#007612</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-hand-o-right"></i> Subject
            <small class="pull-right">Date: 2/10/2014</small>
          </h2>
        </div>
        <!-- Ticket details -->
        <div class="detail-view ticket-body">
          <h3>Details</h3>
        </div>
        <!-- Action btn -->
        <div class="row no-print">
          <div class="col-xs-12">
            <span>action btns</span>
            <br>
            <a href="invoice-print.html" target="_blank" class="btn btn-default">
              <i class="fa fa-print"></i> Print
            </a>
            <button type="button" class="btn btn-success pull-right">
              <i class="fa fa-credit-card"></i> Submit Payment
            </button>
            <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
              <i class="fa fa-download"></i> Generate PDF
            </button>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
</template>


<script>
export default {
  name: "Tbody"
};
</script>

