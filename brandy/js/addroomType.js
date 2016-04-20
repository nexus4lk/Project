// JavaScript Document
$(function() {
  /* validation */
  $("#roomType-form").validate({
    rules: {
      addroomtype: "required"
    },
    messages: {
      addroomtype: "กรุณากรอกประเภทของห้อง"
    },
    submitHandler: submitForm
  });
  /* validation */

  /* form submit */
  function submitForm() {
    $('#roomname').focus();
    var txtRoomtype = $('#addroomtype').val();
    var addroomtype = "addroomtype"
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        roomtype: txtRoomtype,
        addroomtype: addroomtype
      },
      success: function(response) {
        if (response == "success") {
        loadroomtypeOption();
        alert('เพิ่มประเภทห้อง '+  txtRoomtype + ' เรียบร้อยแล้ว');
        } else  {
        alert('ห้องประเภท ' + txtRoomtype + ' มีอยู่ในระบบแล้ว');
        }
      }
    });
    return false;
  }
});
