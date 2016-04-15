// JavaScript Document
$(function() {
  /* validation */
  $("#add-form").validate({
    rules: {
      roomname2: "required",
      roomcapa2: "required",
      roomtype2: "required"
    },
    messages: {
      roomname2: "กรุณากรอกชื่อห้อง",
      roomcapa2: "กรุณากรอกความจุของห้อง",
      roomtype2: "กรุณาเลือกประเภทห้อง"
    },
    submitHandler: submitForm
  });
  /* validation */

  /* form submit */
  function submitForm() {
    $('#roomname').focus();
    var txtRoomname = $('#roomname2').val();
    var txtRoomcapa = $('#roomcapa2').val();
    var txtRoomtype = $('#roomtype2').val();
    var addroom = "addroom"
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        roomname: txtRoomname,
        roomcapa: txtRoomcapa,
        roomtype: txtRoomtype,
        addroom: addroom
      },
      success: function(response) {
        if (response == "success") {
        alert('เพิ่มห้องเรียน ' + txtRoomname + ' เรียบร้อยแล้ว');
        } else  {
        alert('ห้อง ' + txtRoomname + ' มีอยู่ในระบบแล้ว');
        }
      }
    });
    return false;
  }
});
