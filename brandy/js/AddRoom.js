// JavaScript Document
$(function() {
  /* validation */
  $("#add-form").validate({
    rules: {
      roomname: "required",
      roomcapa: "required",
      roomtype: "required"
    },
    messages: {
      roomname: "กรุณากรอกชื่อห้อง",
      roomcapa: "กรุณากรอกความจุของห้อง",
      roomtype: "กรุณาเลือกประเภทห้อง"
    },
    submitHandler: submitForm
  });
  /* validation */

  /* form submit */
  function submitForm() {
    $('#roomname').focus();
    var txtRoomname = $('#roomname').val();
    var txtRoomcapa = $('#roomcapa').val();
    var txtRoomtype = $('#roomtype').val();
    var type = "addroom"
    $.ajax({
      type: 'POST',
      url: 'checksql.php',
      data: {
        roomname: txtRoomname,
        roomcapa: txtRoomcapa,
        roomtype: txtRoomtype,
        type: type
      },
      success: function(response) {
        if (response == "ok") {
          $("#add_error").html("<span align='left' style='color:#cc0000'>Error:</span> 'เพิ่มห้องเรียน' + txtRoomname + 'เรียบร้อยแล้ว' ");
        } else if (response == "failname") {
          $("#add_error").html("<span align='left' style='color:#cc0000'>Error:</span> 'ห้อง' + txtRoomname + 'มีอยู่ในระบบแล้ว' ");
        } else {
          $("#add_error").html("<span align='left' style='color:#cc0000'>Error:</span> กรุณากรอกข้อมูลให้ครบถ้วน ");
        }
      }
    });
    return false;
  }
});
