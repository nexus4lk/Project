// JavaScript Document
$(function() {
  /* validation */
  $("#remove-form").validate({
    rules: {
      roomid4: "required"
    },
    messages: {
      roomid4: "กรุณาเลือกห้อง"
    },
    submitHandler: submitForm
  });
  /* validation */

  /* form submit */
  function submitForm() {

    var roomid = $('#roomid4').val();
    var getroomNameremove = "getroomNameremove"
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        roomid: roomid,
        getroomNameremove: getroomNameremove
      },
      success: function(response) {
        var r = confirm("ข้อมูลทั้งหมดที่เกี่ยวข้องจะถูกลบทั้งหมด คุณแน่ใจที่จะลบ "+response+" ใช่หรือไม่");
        if (r == true) {
          var removeroom = "removeroom"

              $.ajax({
                type: 'POST',
                url: 'room_manager.php',
                data: {
                  roomid: roomid,
                  removeroom: removeroom
                },
                success: function(response) {
                  if (response) {
                    loadBuildingOption();
                    loadroomOption();
                    loadroomtypeOption();
                  alert(response);
                  } else  {
                  alert(response);
                  alert('ไม่สามารถลบห้องนี้ได้');
                  }
                }
              });
        }
      }
      });

    return false;
  }
});
