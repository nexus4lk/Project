$(document).ready(function() {
  $("#Editroomname").change(function() {
    var roomid = $('#Editroomname').val();
    var type = "selectroom"
    $("#Eroomname").val(""); //ล้างข้อมูล
    $("#Eroomcapa").val(""); //ล้างข้อมูล
    $.ajax({
      type: 'POST',
      url: 'checksql.php',
      data: {
        roomid: roomid,
        type: type
      },
      success: function(response) {
        var json_obj = jQuery.parseJSON(response);
        $.each(json_obj, function(key, value) {
          var RName = value.RName;
          var RType = value.RType;
          var RCapa = value.RCapa;
          document.getElementById("Eroomname").value = RName;
          document.getElementById("Eroomcapa").value = RCapa;
          // document.getElementById("roomtype").value = RType;
          document.getElementById("Eroomtype").selectedIndex = RType;
        }); //eac
      } //function
    }); //ajax
  }) //function
});

$(function() {
  /* validation */
  $("#edit-form").validate({
    rules: {
      Eroomname: "required",
      Eroomcapa: "required",
      roomtype: "required"
    },
    messages: {
      Eroomname: "กรุณากรอกชื่อห้อง",
      Eroomcapa: "กรุณากรอกความจุของห้อง",
      roomtype: "กรุณาเลือกประเภทห้อง"
    },
    submitHandler: submitForm
  });
  /* validation */

  /* form submit */
  function submitForm() {
    $('#roomname').focus();
    var txtRoomname = $('#Eroomname').val();
    var txtRoomcapa = $('#Eroomcapa').val();
    var txtRoomtype = $('#Eroomtype').val();
    var roomid = $('#Editroomname').val();
    var type = "editroom"
    $.ajax({
      type: 'POST',
      url: 'checksql.php',
      data: {
        Eroomname: txtRoomname,
        Eroomcapa: txtRoomcapa,
        Eroomtype: txtRoomtype,
        roomid: roomid,
        type: type
      },
      success: function(response) {
        alert(response);
        if (response == "ok") {
          $("#Edit_error").html("<span align='left' style='color:#cc0000'>Error:</span> 'แก้ไขห้องเรียน' + txtRoomname + 'เรียบร้อยแล้ว' ");
          // alert("เพิ่มห้องเรียน" + txtRoomname + "เรียบร้อยแล้ว");
        } else if (response == "fail") {
          $("#Edit_error").html("<span align='left' style='color:#cc0000'>Error:</span> 'ห้อง' + txtRoomname + 'มีอยู่ในระบบแล้ว' ");
        } else {
          $("#Edit_error").html("<span align='left' style='color:#cc0000'>Error:</span> กรุณากรอกข้อมูลให้ครบถ้วน ");
        }
      }
    });
    return false;
  }
});
