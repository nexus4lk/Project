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
    var modal = document.getElementById('dayClick_Modal');
    var txtroomid = $('#roomtype').val();
    var txtdcmtitle = $('#dcmtitle').val();
    var txtdcmstart = $('#dcmstart').val();
    var txtdcmend = $('#dcmend').val();
    var reser = "reser"
    var date = new Date().toISOString().slice(0,10);
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        roomid: txtroomid,
        dcmtitle: txtdcmtitle,
        dcmstart: txtdcmstart,
        dcmend: txtdcmend,
        date:date,
        reser: reser
      },
      success: function(response) {
        alert(response);
         modal.style.display = "none";
      }
    });
    return false;
  }
});
