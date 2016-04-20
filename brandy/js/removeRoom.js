// JavaScript Document
$(function() {
  /* validation */
  $("#remove-form").validate({
    rules: {
      roomid2: "required"
    },
    messages: {
      roomid2: "กรุณาเลือกห้อง"
    },
    submitHandler: submitForm
  });
  /* validation */

  /* form submit */
  function submitForm() {
    $('#roomname').focus();
    var roomid = $('#roomid4').val();
    var removeroom = "removeroom"
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        roomid: roomid,
        removeroom: removeroom
      },
      success: function(response) {
        alert(response);
        // if (response == "success") {
        // alert('ลบห้องเรียบร้อยแล้ว');
        // } else  {
        // alert('ไม่สามารถลบห้องนี้ได้ได้');
        // }
      }
    });
    return false;
  }
});
