function loadimgOption(){
  var loadimgOption = "loadimgOption";
    $.ajax({
        type: 'POST',
        url: 'room_manager.php',
        data: {
          loadimgOption: loadimgOption
        },
        success: function(response) {
          $('#Imgid12 option[value!="0"]').remove();
          $('#Imgid13 option[value!="0"]').remove();
          var json_obj = jQuery.parseJSON(response);
          $.each(json_obj, function(key, value) {
            var IId = value.IId;
            var IName = value.IName;
            $("#Imgid12").append("<option value="+IId+">"+IName+"</option>");
            $("#Imgid13").append("<option value="+IId+">"+IName+"</option>");
          });// each

        } //function
    });
}


$(document).ready(function() {
  $("#Imgid12").change(function() {
    var Img_id = $('#Imgid12').val();
    var geteditImg = "geteditImg"
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        Img_id: Img_id,
        geteditImg: geteditImg
      },
      success: function(response) {
        var json_obj = jQuery.parseJSON(response);
        $.each(json_obj, function(key, value) {
        var Img = value.Img;
        var roomId = value.roomId;
        var newResponse = "uploads/"+Img
        $('#editPreview').html('<img src="'+newResponse+'" height="400" width="500">');
        document.getElementById("roomid12").value = roomId;
        });// each
      } //function
    }); //ajax
  }) //function
});

$(function() {
  /* validation */
  $("#editImg-form").validate({
    rules: {
      Imgid12: "required",
      roomid12: "required"
    },
    messages: {
      Imgid12: "กรุณาเลือกรูปภาพที่ต้องการแก้ไขห้อง",
      roomid12: "กรุณาเลือกห้อง"
    },
    submitHandler: submitForm
  });
  /* validation */

  /* form submit */
  function submitForm() {
    var editImg = "editImg"
    var Img_id = $('#Imgid12').val();
    var roomid = $('#roomid12').val();
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        Img_id: Img_id,
        roomid:roomid,
        editImg: editImg
      },
      success: function(response) {
        if (response) {
          alert("แก้ไขรูปห้องเสร็จเรียบร้อย");
        }else {
          alert("เกิดข้อผิดพลาด");
        }
      } //function
    }); //ajax
    return false;
  }
});
