
$(document).ready(function() {
  $("#Imgid13").change(function() {
    var Img_id = $('#Imgid13').val();
    var getRemoveImg = "getRemoveImg"
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        Img_id: Img_id,
        getRemoveImg: getRemoveImg
      },
      success: function(response) {
        var newResponse = "uploads/"+response
        $('#removeImg').html('<img src="'+newResponse+'" height="400" width="500">');
      } //function
    }); //ajax
  }) //function
});
//
$(function() {
  /* validation */
  $("#RemoveImg-form").validate({
    rules: {
      Imgid13: "required",
    },
    messages: {
      Imgid13: "กรุณาเลือกรูปภาพที่ต้องการลบ",
    },
    submitHandler: submitForm
  });
  /* validation */

  /* form submit */
  function submitForm() {

    var Img_id = $('#Imgid13').val();
    var RemoveImg = "RemoveImg"
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        Img_id:Img_id,
        RemoveImg: RemoveImg
      },
      success: function(response) {
        if (response) {
          loadimgOption();
          $('#removeImg').html('');
          alert("ลบรูปภาพเรียบร้อย");
        }else {
          alert("เกิดข้อผิดพลาด");
        }
      }
    });
    return false;
  }
});
