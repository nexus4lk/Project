// JavaScript Document
$(function() {
  /* validation */
  $("#removeRT-form").validate({
    rules: {
      roomtype7: "required"
    },
    messages: {
      roomtype7: "กรุณาเลือกห้อง"
    },
    submitHandler: submitForm
  });
  /* validation */

  /* form submit */
  function submitForm() {
    var roomTypeid = $('#roomtype7').val();
    var getroomTypeName = "getroomTypeName"
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        roomTypeid: roomTypeid,
        getroomTypeName: getroomTypeName
      },
      success: function(response) {
        var r = confirm("คุณแน่ใจที่จะอนุมัติ "+response+" เพื่อดำเนินการจองใช่หรือไม่");
        if (r == true) {
          var removeroomType = "removeroomType"
              $.ajax({
                type: 'POST',
                url: 'room_manager.php',
                data: {
                  roomTypeid: roomTypeid,
                  removeroomType: removeroomType
                },
                success: function(response) {
                  if (response) {
                    loadBuildingOption();
                    loadroomOption();
                    loadroomtypeOption();
                  alert(response);
                  } else  {
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
