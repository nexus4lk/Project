// JavaScript Document
$(function() {
  /* validation */
  $("#edit_calendar").validate({
    rules: {
      editroom: "required",
      edittitle: "required",
      editstart: "required",
      editend: "required"
      // editmyRadio: "required"
    },
    messages: {
      editroom: "กรุณาเลือกห้องที่ต้องการจอง",
      edittitle: "กรุณากรอกจุดประสงค์การจองห้อง",
      editstart: "กรุณากรอกเวลาเริ่ม",
      editend: "กรุณากรอบเวลาสิ้นสุด",
      // editmyRadio: "กรุณาเลือกช่วงเวลาที่ต้องการจอง"
    },
    submitHandler: submitForm
  });
  /* validation */

  /* form submit */
  function submitForm(){
    var reserId = $('#editsubmit').val();
    var txtroomid = $('#editroom').val();
    var txtdcmtitle = $('#edittitle').val();
    var txtdcmstart = $('#editstart').val();
    var txtdcmend = $('#editend').val();
    var x = checkRadio();
    var editreser = "editreser"
    var date = new Date().toISOString().slice(0,10);
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        reserId:reserId,
        roomid: txtroomid,
        title: txtdcmtitle,
        start: txtdcmstart,
        end: txtdcmend,
        date:date,
        dayTime:x,
        editreser: editreser
      },
      success: function(response) {
        alert(response);
        var modal = document.getElementById('dayClick_Modal');
        modal.style.display = "none";
      }
    });
    return false;
  }

  function checkRadio() {
    var radios = document.getElementsByName('editmyRadio');
    for (var i = 0, length = radios.length; i < length; i++) {
      if (radios[i].checked) {
          return(radios[i].value);
          break;
      }
  }
}
});
