function reportePDF(reser_id) {
  var reser_id = reser_id;
  window.open('PDF.php?reser_id='+reser_id);
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
