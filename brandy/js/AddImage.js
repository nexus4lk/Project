$(document).ready(function (e) {
$("#upload-form").on('submit',(function(e) {
e.preventDefault();
$.ajax({
url: "upload.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
  var txtFile = $('#fileToUpload').val();
  var filename = txtFile;
  var lastIndex = filename.lastIndexOf("\\");
  if (lastIndex >= 0) {
    filename = filename.substring(lastIndex + 1);
    alert(filename);
  }
  var upload = "upload";
  var filename = filename
  var txtRoomid = $('#roomid11').val();
  $.ajax({
          type: 'POST',
          url: 'upload.php',
          data: {
            filename: filename,
            txtRoomid: txtRoomid,
            upload: upload
          },
         success: function(response) {
           // if (response == "success") {
           // loadroomOption();
           // alert('เพิ่มห้องเรียน ' + txtRoomname + ' เรียบร้อยแล้ว');
           // } else  {
           // alert('ห้อง ' + txtRoomname + ' มีอยู่ในระบบแล้ว');
           // }
           alert(response);
         }
       });
}
});
}));

// JavaScript Document
// $(function() {
//   /* validation */
//   $("#upload-form").validate({
//     rules: {
//       fileToUpload: "required",
//       roomid11: "required"
//     },
//     messages: {
//       fileToUpload: "กรุณาเลือกรูปภาพจากคอมของท่าน",
//       roomid11: "กรุณาเลือกห้องที่ต้องการอัพโหลดรูปภาพ"
//     },
//     submitHandler: submitForm
//   });
//   /* validation */
//
//   /* form submit */
//   function submitForm() {
//
//     var txtFile = $('#fileToUpload').val();
//     var filename = txtFile;
//     var lastIndex = filename.lastIndexOf("\\");
//     if (lastIndex >= 0) {
//         filename = filename.substring(lastIndex + 1);
//         alert(filename);
//     }
//
//     var txtRoomid = $('#roomid11').val();
//     var upload = "upload"
//     $.ajax({
//       url: "upload.php", // Url to which the request is send
//       type: "POST",             // Type of request to be send, called as method
//       data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
//       contentType: false,       // The content type used when sending data to the server.
//       cache: false,             // To unable request pages to be cached
//       processData:false,        // To send DOMDocument or non processed data file it is set to false
//       success: function(response) {
//         // if (response == "success") {
//         // loadroomOption();
//         // alert('เพิ่มห้องเรียน ' + txtRoomname + ' เรียบร้อยแล้ว');
//         // } else  {
//         // alert('ห้อง ' + txtRoomname + ' มีอยู่ในระบบแล้ว');
//         // }
//         alert(response);
//       }
//     });
//     return false;
//   }
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
      $('#preview').html('<img src="'+e.target.result+'">');

  };
  // $(document).ready(function() {
  //   document.getElementById('fileToUpload').onchange = uploadOnChange;
  //
  //   function uploadOnChange() {
  //       var filename = this.value;
  //       var lastIndex = filename.lastIndexOf("\\");
  //       if (lastIndex >= 0) {
  //           filename = filename.substring(lastIndex + 1);
  //       }
  //
  //       if (this.files && this.files[0]) {
  //           var reader = new FileReader();
  //           reader.onload = imageIsLoaded;
  //           reader.readAsDataURL(this.files[0]);
  //       }
  //   }
  // });
});
