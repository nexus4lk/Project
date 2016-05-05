function loadroomOption(){
  var loadroomOption = "loadroomOption";
    $.ajax({
        type: 'POST',
        url: 'room_manager.php',
        data: {
          loadroomOption: loadroomOption
        },
        success: function(response) {
          console.log(response);
          $('#roomid3 option[value!="0"]').remove();
          $('#roomid4 option[value!="0"]').remove();
          $('#roomid11 option[value!="0"]').remove();
          $('#roomid12 option[value!="0"]').remove();

          var json_obj = jQuery.parseJSON(response);
          $.each(json_obj, function(key, value) {
            var Id = value.Id;
            var Name = value.Name;
            $("#roomid3").append("<option value="+Id+">"+Name+"</option>");
            $("#roomid4").append("<option value="+Id+">"+Name+"</option>");
            $("#roomid11").append("<option value="+Id+">"+Name+"</option>");
            $("#roomid12").append("<option value="+Id+">"+Name+"</option>");
            // $('#roomid3').html('{list}<option value="{Id}">{Name}</option>{/list}');
          });// each

        } //function
    });
}


$(document).ready(function() {
  $("#roomid3").change(function() {
    var roomid = $('#roomid3').val();
    var selectroom = "selectroom"
    $("#roomname3").val(""); //ล้างข้อมูล
    $("#roomcapa3").val(""); //ล้างข้อมูล
    $("#Building3").val(""); //ล้างข้อมูล
    document.getElementById('floor3').options.length = 0; //ล้างข้อมูล
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        roomid: roomid,
        selectroom: selectroom
      },
      success: function(response) {
        console.log(response);
        var json_obj = jQuery.parseJSON(response);
        $.each(json_obj, function(key, value) {
          var RName = value.RName;
          var RType = value.RType;
          var RCapa = value.RCapa;
          var Building = value.Building;
          var Bfloor = value.Bfloor;
          document.getElementById("roomname3").value = RName;
          document.getElementById("roomcapa3").value = RCapa;
          document.getElementById("roomtype3").value = RType;
          document.getElementById("Building3").value = Building;
          var building_id = Building;
          var getfloor = "getfloor"
          $.ajax({
            type: 'POST',
            url: 'room_manager.php',
            data: {
              building_id: building_id,
              getfloor: getfloor
            },
            success: function(response) {
              for (var i = 1; i <= response; i++) {
                $("#floor3").append("<option value="+i+">"+i+"</option>");
              }
            } //function
          }); //ajax
          document.getElementById("floor3").value = Bfloor;
        }); //each
      } //function
    }); //ajax
  }) //function
});

$(function() {
  /* validation */
  $("#edit-form").validate({
    rules: {
      roomname3: "required",
      roomcapa3: "required",
      roomtype3: "required",
      Building3: "required",
      floor3: "required"
    },
    messages: {
      roomname3: "กรุณากรอกชื่อห้อง",
      roomcapa3: "กรุณากรอกความจุของห้อง",
      roomtype3: "กรุณาเลือกประเภทห้อง",
      Building3: "กรุณาเลือกอาคาร",
      floor3: "กรุณาเลือกชั้นของห้อง"
    },
    submitHandler: submitForm
  });
  /* validation */

  /* form submit */
  function submitForm() {
    $('#roomname').focus();
    var txtRoomname = $('#roomname3').val();
    var txtRoomcapa = $('#roomcapa3').val();
    var txtRoomtype = $('#roomtype3').val();
    var txtBuilding = $('#Building3').val();
    var txtfloor = $('#floor3').val();
    var roomid = $('#roomid3').val();
    var editroom = "editroom"
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        roomname: txtRoomname,
        roomcapa: txtRoomcapa,
        roomtype: txtRoomtype,
        Building:txtBuilding,
        floor:txtfloor,
        roomid: roomid,
        editroom: editroom
      },
      success: function(response) {
        loadroomOption();
        if (response == "success") {
          alert('แก้ไขห้องเรียน ' + txtRoomname + ' เรียบร้อยแล้ว');
        }  else {
          alert('แก้ไขห้องเรียน ' + txtRoomname + ' เรียบร้อยแล้ว');
        }
      }
    });
    return false;
  }
  $(document).ready(function() {
    $("#Building3").change(function() {
      var building_id = $('#Building3').val();
      var getfloor = "getfloor"
      document.getElementById('floor3').options.length = 0;
      $.ajax({
        type: 'POST',
        url: 'room_manager.php',
        data: {
          building_id: building_id,
          getfloor: getfloor
        },
        success: function(response) {
          for (var i = 1; i <= response; i++) {
            $("#floor3").append("<option value="+i+">"+i+"</option>");
          }
        } //function
      }); //ajax
    }) //function
  });

});
