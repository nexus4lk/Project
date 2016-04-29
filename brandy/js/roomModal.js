// JavaScript Document
function roomModal() {
  $('#roomModal_header').empty();
  $('#Modal_roomname').empty();
  $('#Modal_roomcapa').empty();
  $('#Modal_roomtype').empty();
  $('#Modal_building').empty();
  $('#Modal_roomfloor').empty();
  $('#Modal_roomImg').empty();
  var count = 0
  var roomid = $('#roomid').val();
  var modal = document.getElementById('room_Modal');
  modal.style.display = "block";
  var get_roomDetail = "get_roomDetail"
  // document.getElementById("dcmstart").value = Reser_Startdate
  // document.getElementById("dcmend").value = Reser_Enddate
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
  $.ajax({
    type: 'POST',
    url: 'room_manager.php',
    data: {
      roomid: roomid,
      get_roomDetail: get_roomDetail
    },
    success: function(response) {
      console.log(response);
      var json_obj = jQuery.parseJSON(response);
      $.each(json_obj, function(key, value) {
        var roomName = value.roomName;
        var roomCapa = value.roomCapa;
        var floor = value.floor;
        var roomType = value.roomType;
        var buildingName = value.buildingName;
        $('#roomModal_header').html('<h3>'+ roomName +'</h3>');
        $('#Modal_roomname').append('<font size="5" color="#000000" >ห้อง :&nbsp;&nbsp;</font>');
        $('#Modal_roomname').append('<font size="5" color="#000000" >'+ roomName +'</font>');
        $('#Modal_roomcapa').append('<font size="5" color="#000000" >จำนวนที่นั่ง :&nbsp;&nbsp;</font>');
        $('#Modal_roomcapa').append('<font size="5" color="#000000" >'+ roomCapa +'</font>');
        $('#Modal_roomtype').append('<font size="5" color="#000000" >ประเภทของห้อง :&nbsp;&nbsp;</font>');
        $('#Modal_roomtype').append('<font size="5" color="#000000" >'+ roomType +'</font>');
        $('#Modal_building').append('<font size="5" color="#000000" >อาคาร :&nbsp;&nbsp;</font>');
        $('#Modal_building').append('<font size="5" color="#000000" >'+ buildingName +'</font>');
        $('#Modal_roomfloor').append('<font size="5" color="#000000" >ชั้น :&nbsp;&nbsp;</font>');
        $('#Modal_roomfloor').append('<font size="5" color="#000000" >'+ floor +'</font>');
        });
        var get_Img = "get_Img"
        $.ajax({
          type: 'POST',
          url: 'room_manager.php',
          data: {
            roomid: roomid,
            get_Img: get_Img
          },
          success: function(response) {
            var json_obj = jQuery.parseJSON(response);
            $.each(json_obj, function(key, value) {
              count = count+1
              var Img = value.Image;
              var image = "uploads/"+Img
              $('#Modal_roomImg').append('<p align="center"><img id="myImg'+count+'" src="'+image+'" height="500" width="800"></p>');
              });
          }
        });
    }
  });

  }
