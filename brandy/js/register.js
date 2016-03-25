// JavaScript Document
$(function() {
  /* validation */
  $("#register-form").validate({
    rules: {
      txtfname: "required",
      txtlname: "required",
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
      cpassword: {
        required: true,
        equalTo: '#password'
      },
      txtemail: {
        required: true,
        email: true
      },
      txttel: {
        required: true,
        minlength: 10,
        maxlength: 11
      },
    },
    messages: {
      txtfname: "กรุณากรอกชื่อ",
      txtlname: "กรุณากรอกนามสกุล",
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
      txttel: {
        required: "กรุณากรอกเบอร์โทรศัพท์",
        minlength: "กรุณากรอบเบอร์โทรศัพท์ให้ถูกต้อง",
        maxlength: "กรุณากรอบเบอร์โทรศัพท์ให้ถูกต้อง"
      },
      txtemail: "กรุณากรอกที่อยู่อีเมล",
      cpassword: {
        required: "กรุณากรอก password อีกครั้ง",
        equalTo: "password ไม่ตรงกัน"
      }
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
    var txtConPassword = $('#cpassword').val();
    var txtfname = $('#txtfname').val();
    var txtlname = $('#txtlname').val();
    var txtemail = $('#txtemail').val();
    var txttel = $('#txttel').val();
    var type = "signup"
    $.ajax({
      type: 'POST',
      url: 'checksql.php',
      data: {
        reusername: txtUsername,
        repassword: txtPassword,
        reconpassword: txtConPassword,
        refname: txtfname,
        relname: txtlname,
        reemail: txtemail,
        retel: txttel,
        type: type
      },
      success: function(response) {
        if (response == "ok") {
          window.location = "login.html";
        } else if (response == "failu") {
          $("#error").html("<span align='left' style='color:#cc0000'>Error:</span> Username นี้ซ้ำกับบุคคลอื่น. ");
        } else {
          $("#error").html("<span align='left' style='color:#cc0000'>Error:</span> กรุณากรอกข้อมูลให้ครบถ้วน ");
        }
      }
    });
  return false;

}
});
