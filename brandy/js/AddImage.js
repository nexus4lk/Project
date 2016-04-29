
$(document).ready(function() {
  $("#fileToUpload").change(function() {
    if (this.files && this.files[0]) {
    var reader = new FileReader();
    reader.onload = imageIsLoaded;
    reader.readAsDataURL(this.files[0]);
    }
  }) //function
});

function imageIsLoaded(e) {
    img =  e.target.result;
    $('#preview').html('<img src="'+e.target.result+'" height="400" width="500">');

};

$(function() {
  /* validation */
  $("#upload-form").validate({
    rules: {
      fileToUpload: "required",
      roomid11: "required"
    },
    messages: {
      fileToUpload: "กรุณาเลือกรูปภาพที่ต้องการอัพโหลด",
      roomid11: "กรุณาเลือกห้องที่ต้องการอัพโหลดรูปภาพ"
    },
    submitHandler: submitForm
  });
  /* validation */

  /* form submit */
  function submitForm() {

    var formData = new FormData($('#upload-form')[0]);
    $.ajax({
    url: "upload.php",
    type: "POST",
    data: formData,
    contentType: false,
    cache: false,
    processData:false,
    success: function(data)
    {
      alert(data);
    }
    });
    return false;
  }
});
