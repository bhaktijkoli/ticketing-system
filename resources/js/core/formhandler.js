// Form Handler
window.fh = {
  set_success: function(element, message) {
    $(element).closest('.form-group').removeClass('has-danger');
    $(element).closest('.form-group').addClass('has-success');
    $(element).closest('.form-group').find('.help-block').html(message);
  },
  set_multisuccess: function(data) {
    errors = data.messages;
    for(var key in errors) {
      this.set_success('#' + key, errors[key]);
    }
  },
  set_single_error: function(data) {
    $('#error-result').show(100);
    $('#error-result').html(data.messages);
  },
  set_error: function(element, error) {
    console.log(element);
    console.log($(element).closest('.form-group'));
    $(element).closest('.form-group').addClass('has-danger');
    $(element).closest('.form-group').removeClass('has-success');
    $(element).closest('.form-group').find('.help-block').html(error);

  },

  remove_error: function(element) {
    $(element).closest('.form-group').removeClass('has-danger');
    $(element).closest('.form-group').find('.help-block').html('');

  },

  remove_all_errros: function(element) {
    $(element).find('.form-group').removeClass('has-danger');
    $(element).find('.form-group').find('.help-block').html('');
  },

  set_multierrors: function(data) {
    errors = data.messages;
    for(var key in errors) {
      this.set_error('#' + key, errors[key]);
    }
  },

  hide_element: function(element) {
    $(element).closest('.form-group').css("display", "none");
  },

  show_element: function(element) {
    $(element).closest('.form-group').css("display", "block");
  },

  is_success: function(data) {
    return data.success;
  },

  clear_all: function(element) {
    $(element).find("input, textarea").val("");
  },

  redirect: function(data) {
    window.location = data.redirect;
  },

  hide_button: function(){
    btn = $(document.activeElement);
    document.btntext = btn[0].innerHTML;
    btn[0].innerHTML = '<i class="fa fa-circle-o-notch fa-spin fa-fw"></i>';
    btn.prop('disabled', true);
    window.lastbutton = btn;
  },

  show_button: function() {
    var btn = window.lastbutton;
    btn[0].innerHTML = document.btntext;
    btn.prop('disabled', false);
  },

  show_errorpage: function(error) {
    console.log(error);
    this.show_button(window.lastbutton); // Remove This
  }
}
