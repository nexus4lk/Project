// JavaScript Document
$(function() {
  /* validation */
  $("#add-form").validate({
    rules: {
      roomname2: "required",
      roomcapa2: "required",
      roomtype2: "required",
      Building2: "required",
      floor2: "required"
    },
    messages: {
      roomname2: "กรุณากรอกชื่อห้อง",
      roomcapa2: "กรุณากรอกความจุของห้อง",
      roomtype2: "กรุณาเลือกประเภทห้อง",
      Building2: "กรุณาเลือกอาคาร",
      floor2: "กรุณาเลือกชั้นของห้อง"
    },
    submitHandler: submitForm
  });
  /* validation */

  /* form submit */
  function submitForm() {
    $('#roomname').focus();
    var txtRoomname = $('#roomname2').val();
    var txtRoomcapa = $('#roomcapa2').val();
    var txtRoomtype = $('#roomtype2').val();
    var txtBuilding = $('#Building2').val();
    var txtFloor = $('#floor2').val();
    var addroom = "addroom"
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        roomname: txtRoomname,
        roomcapa: txtRoomcapa,
        roomtype: txtRoomtype,
        building:txtBuilding,
        floor:txtFloor,
        addroom: addroom
      },
      success: function(response) {
        if (response == "success") {
        loadroomOption();
        alert('เพิ่มห้องเรียน ' + txtRoomname + ' เรียบร้อยแล้ว');
        } else  {
        alert('ห้อง ' + txtRoomname + ' มีอยู่ในระบบแล้ว');
        }
      }
    });
    return false;
  }


  $(document).ready(function() {
    $("#Building2").change(function() {
      var building_id = $('#Building2').val();
      var getfloor = "getfloor"
      document.getElementById('floor2').options.length = 0; //ล้างข้อมูล
      $.ajax({
        type: 'POST',
        url: 'room_manager.php',
        data: {
          building_id: building_id,
          getfloor: getfloor
        },
        success: function(response) {
          for (var i = 1; i <= response; i++) {
            $("#floor2").append("<option value="+i+">"+i+"</option>");
          }
        } //function
      }); //ajax
    }) //function
  });

});
