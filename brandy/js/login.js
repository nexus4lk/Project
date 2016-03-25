// JavaScript Document
$(function() {
  /* validation */
  $("#login-form").validate({
    rules: {
      username: {
        required: true,
        minlength: 5,
        maxlength: 15
      },
      password: {
        required: true,
        minlength: 5,
        maxlength: 15
      },
    },
    messages: {
      username: {
        required: "กรุณากรอก username",
        minlength: "username ควรมีความยาวมากกว่า 5 ตัวอักษร",
        maxlength: "username ควรมีความยาวไม่เกิน 15 ตัวอักษร"
      },
      password: {
        required: "กรุณากรอก password",
        minlength: "password ควรมีความยาวมมากกว่า 5 ตัวอักษร",
        maxlength: "password ควรมีความยาวไม่เกิน 15 ตัวอักษร"
      },
    },
    submitHandler: submitForm
  });
  /* validation */

  /* form submit */
  function submitForm() {
    // var data = $("#register-form").serialize();
    $('#txtUsername').focus();
    var txtUsername = $('#username').val();
    var txtPassword = $('#password').val();
    var type = "login"
    $.ajax({
      type: 'POST',
      url: 'member_manager.php',
      data: {
        username: txtUsername,
        password: txtPassword,
        type: type
      },
      success: function(response) {
        alert(response);
        if (response == "ok") {
          window.location = "index.php";
        } else if (response == "failu") {
          $("#error").html("<span align='left' style='color:#cc0000'>Error:</span> Username นี้ซ้ำกับบุคคลอื่น. ");
        } else {
          $("#error").html("<span align='left' style='color:#cc0000'>Error:</span> กรุณากรอกข้อมูลให้ถูกต้อง ");
        }
      }
    });
  return false;

}
});
