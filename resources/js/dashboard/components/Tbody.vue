<template>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ticket
        <small>#number</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-hand-o-right"></i> {{ subject }}
            <small class="pull-right">Date: 2/10/2014</small>
          </h2>
        </div>
        <!-- Ticket details -->
        <div class="col-xs-12">
          <h3>{{ details }}</h3>
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
  data(){
    return{
      user: '',
      subject:'',
      details: '',
    }
  },
  mounted(){
    axios
      .get('')
      .then(response => {
        this.subject = response.data.message;
      })
  }
};
</script>
