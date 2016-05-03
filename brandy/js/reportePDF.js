function reportePDF(reser_id) {
  var reser_id = reser_id;
  var getresername = "getresername"
  $('#PDFTitle').empty();
  $.ajax({
    type: 'POST',
    url: 'room_manager.php',
    data: {
      reser_id: reser_id,
      getresername:getresername
    },
    success: function(response) {
      $('#PDFTitle').append('<font size="5" color="#000000" >'+response+'</font>');
    }
  });
  var modal = document.getElementById('PDF_Modal');
  modal.style.display = "block";
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
    $("#PDF-form").validate({
      rules: {
        txt1: "required",
        txt2: "required"
      },
      messages: {
        txt1: "กรุณากรอกส่วนราชการ",
        txt2: "กรุณากรอกที่"
      },
      submitHandler: submitForm
    });
    /* validation */

    /* form submit */
    function submitForm() {
      var txt1 = $('#txt1').val();
      var txt2 = $('#txt2').val();
      window.open('PDF.php?reser_id='+reser_id+'&txt1='+txt1+'&txt2='+txt2);
      modal.style.display = "none";

      return false;
    }

  // window.open('PDF.php?reser_id='+reser_id);
  // var getroomName = "getroomName"
  // $.ajax({
  //   type: 'POST',
  //   url: 'room_manager.php',
  //   data: {
  //     reser_id: reser_id,
  //     getroomName: getroomName
  //   },
  //   success: function(response) {
  //     // alert(response);
  //     // window.open('PDF.php?reser_id='+reser_id);
  //   }
  //   });
      }
}
