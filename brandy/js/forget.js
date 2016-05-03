// JavaScript Document
$(function() {
  /* validation */
  $("#forget-form").validate({
    rules: {
      emailorusername: "required"
    },
    messages: {
      emailorusername: "กรุณากรอก Username หรือ Email",
    },
    submitHandler: submitForm
  });
  /* validation */

  /* form submit */
  function submitForm() {
    var txtUsernameoremail = $('#emailorusername').val();
    var forget = "forget";
    $.ajax({
      type: 'POST',
      url: 'member_manager.php',
      data: {
        Usernameoremail: txtUsernameoremail,
        forget: forget
      },
      success: function(response) {
        if (response) {
          alert(response);
          // window.location = "login.php";
        }else {
          alert("Username หรือ Email ผิด");
        }
      }
    });
  return false;

}
});
