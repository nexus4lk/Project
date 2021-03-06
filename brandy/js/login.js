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
    var login = "login"
    $.ajax({
      type: 'POST',
      url: 'member_manager.php',
      data: {
        username: txtUsername,
        password: txtPassword,
        login: login
      },
      success: function(response) {

        switch (response) {
          case "ADMIN":
            window.location = "admin.php";
            break;
          case "USER":
            window.location = "index.php";
            break;
          case "fail":
            $("#error").html("<span align='left' style='color:#cc0000'>Error:</span> กรุณากรอกข้อมูลให้ถูกต้อง ");
            break;
        }
      }
    });
    return false;

  }
});
