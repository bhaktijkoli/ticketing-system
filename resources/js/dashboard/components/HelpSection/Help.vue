<template>
  <div class="content-wrapper">
    <section class="content">
      <h3>Help</h3>
      <div class="row">
        <!-- Main content -->
        <div class="col-xs-12">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Frequently Asked Questions</h3>
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
                  <input type="checkbox" id="faq2">
                  <label for="faq2">
                    <h4>Howdy Fam?</h4>
                    <i class="fa fa-angle-up"></i>
                  </label>
                  <p>Cool</p>
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

<style scoped>
.container {
  width: 80%;
  margin: 2em auto;
}

hr {
  color: coral;
}

input {
  display: none;
}

h1 {
  font-size: 2em;
  font-family: "Trebuchet MS", Helvetica, sans-serif;
}

h4 {
  margin: auto;
  color: dimgrey;
  float: left;
  margin-right: 0.3em;
}

p {
  clear: both;
}

label > i {
  float: right;
  margin: 0.3em;
  transition: all 0.2s linear;
}

input:checked + label > i {
  transform: rotate(-180deg);
}

label + p {
  line-height: 0%;
  color: darkslategray;
  transform: rotateX(90deg);
  transition: all 0.2s linear;
}

input:checked + label + p {
  transform: rotateX(0);
  line-height: 100%;
  line-height: auto;
}
</style>
