
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
        alert(response);
        var json_obj = jQuery.parseJSON(response);
        $.each(json_obj, function(key, value) {
        var Img = value.Img;
        var roomId = value.roomId;
        var newResponse = "uploads/"+Img
        $('#editPreview1').html('<img src="'+newResponse+'" height="400" width="500">');
        document.getElementById("roomid12").value = roomId;
        });// each
      } //function
    }); //ajax
  }) //function
});

$(document).ready(function() {
  $("#fileToUpload2").change(function() {
    if (this.files && this.files[0]) {
    var reader = new FileReader();
    reader.onload = imageIsLoaded;
    reader.readAsDataURL(this.files[0]);
    }
  }) //function
});

function imageIsLoaded(e) {
    img =  e.target.result;
    $('#editPreview2').html('<img src="'+e.target.result+'" height="400" width="500">');

};
//
$(function() {
  /* validation */
  $("#editImg-form").validate({
    rules: {
      Imgid12: "required",
      fileToUpload2: "required",
      roomid12: "required"
    },
    messages: {
      Imgid12: "กรุณาเลือกรูปภาพที่ต้องการจัดการ",
      fileToUpload2: "กรุณาเลือกรูปภาพที่ต้องการอัพโหลด",
      roomid12: "กรุณาเลือกห้อง"
    },
    submitHandler: submitForm
  });
  /* validation */

  /* form submit */
  function submitForm() {

    var formData = new FormData($('#editImg-form')[0]);
    $.ajax({
    url: "upload.php", // Url to which the request is send
    type: "POST",             // Type of request to be send, called as method
    data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
    contentType: false,       // The content type used when sending data to the server.
    cache: false,             // To unable request pages to be cached
    processData:false,        // To send DOMDocument or non processed data file it is set to false
    success: function(data)   // A function to be called if request succeeds
    {
      alert(data);
    }
    });
    return false;
  }
});
