function loadroomOption(){
  var option = '{list}<option value="{Id}">{Name}</option>{/list}';
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
          var json_obj = jQuery.parseJSON(response);
          $.each(json_obj, function(key, value) {
            var Id = value.Id;
            var Name = value.Name;
            // var x = document.getElementById("roomid3");
            // var option = document.createElement("option");
            // option.text = Name;
            // x.add(option);

            $("#roomid3").append("<option value="+Id+">"+Name+"</option>");
            $("#roomid4").append("<option value="+Id+">"+Name+"</option>");
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
          document.getElementById("roomname3").value = RName;
          document.getElementById("roomcapa3").value = RCapa;
          // document.getElementById("roomtype").value = RType;
          document.getElementById("roomtype3").selectedIndex = RType;
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
      roomtype3: "required"
    },
    messages: {
      roomname3: "กรุณากรอกชื่อห้อง",
      roomcapa3: "กรุณากรอกความจุของห้อง",
      roomtype3: "กรุณาเลือกประเภทห้อง"
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
    var roomid = $('#roomid3').val();
    var editroom = "editroom"
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        roomname: txtRoomname,
        roomcapa: txtRoomcapa,
        roomtype: txtRoomtype,
        roomid: roomid,
        editroom: editroom
      },
      success: function(response) {
        loadroomOption();
        // if (response == "ok") {
        //   $("#Edit_error").html("<span align='left' style='color:#cc0000'>Error:</span> 'แก้ไขห้องเรียน' + txtRoomname + 'เรียบร้อยแล้ว' ");
        // } else if (response == "fail") {
        //   $("#Edit_error").html("<span align='left' style='color:#cc0000'>Error:</span> 'ห้อง' + txtRoomname + 'มีอยู่ในระบบแล้ว' ");
        // } else {
        //   $("#Edit_error").html("<span align='left' style='color:#cc0000'>Error:</span> กรุณากรอกข้อมูลให้ครบถ้วน ");
        // }
      }
    });
    return false;
  }
});
