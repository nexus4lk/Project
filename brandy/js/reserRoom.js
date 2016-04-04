// JavaScript Document
$(function() {
  /* validation */
  $("#new_calendar").validate({
    rules: {
      roomtype: "required",
      dcmtitle: "required",
      dcmstart: "required",
      dcmend: "required"
    },
    messages: {
      roomtype: "กรุณาเลือกห้องที่ต้องการจอง",
      dcmtitle: "กรุณากรอกจุดประสงค์การจองห้อง",
      dcmstart: "กรุณากรอกเวลาเริ่ม",
      dcmend: "กรุณากรอบเวลาสิ้นสุด"
    },
    submitHandler: submitForm
  });
  /* validation */

  /* form submit */
  function submitForm() {
    $('#dcmtitle').focus();
    var txtusername = "<?php echo  $_SESSION['user_session']; ?>";
    alert(txtusername);
    var txtroomtype = $('#roomtype').val();
    var txtdcmtitle = $('#dcmtitle').val();
    var txtdcmstart = $('#dcmstart').val();
    var txtdcmend = $('#dcmend').val();
    var type = "reser"
    $.ajax({
      type: 'POST',
      url: 'json_event.php',
      data: {
        roomtype: txtroomtype,
        dcmtitle: txtdcmtitle,
        dcmstart: txtdcmstart,
        dcmend: txtdcmend,
        type: type
      },
      success: function(response) {
        if (response == "ok") {
          $("#add_error").html("<span align='left' style='color:#cc0000'>Error:</span> 'เพิ่มห้องเรียน' + txtRoomname + 'เรียบร้อยแล้ว' ");
          // alert("เพิ่มห้องเรียน" + txtRoomname + "เรียบร้อยแล้ว");
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
