// JavaScript Document
$(function() {
  /* validation */
  $("#new_calendar").validate({
    rules: {
      roomtype: "required",
      dcmtitle: "required",
      dcmstart: "required",
      dcmend: "required",
      myRadio: "required",
      dcmforwhom: "required"

    },
    messages: {
      roomtype: "กรุณาเลือกห้องที่ต้องการจอง",
      dcmtitle: "กรุณากรอกจุดประสงค์การจองห้อง",
      dcmstart: "กรุณากรอกเวลาเริ่ม",
      dcmend: "กรุณากรอบเวลาสิ้นสุด",
      myRadio: "กรุณาเลือกช่วงเวลาที่ต้องการจอง",
      dcmforwhom: "กรุณาเลือกผู้รับหมาย"

    },
    submitHandler: submitForm
  });
  /* validation */

  /* form submit */
  function submitForm() {
    $('#dcmtitle').focus();
    var modal = document.getElementById('dayClick_Modal');
    var txtroomid = $('#roomtype').val();
    var txtdcmtitle = $('#dcmtitle').val();
    var txtdcmstart = $('#dcmstart').val();
    var txtdcmend = $('#dcmend').val();
    var txtdcmfw = $('#dcmforwhom').val();
    var x = checkRadio();
    var reser = "reser"
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        roomid: txtroomid,
        dcmtitle: txtdcmtitle,
        dcmstart: txtdcmstart,
        dcmend: txtdcmend,
        dcmfw: txtdcmfw,
        // date:date,
        dayTime:x,
        reser: reser
      },
      success: function(response) {
        modal.style.display = "none";
        alert(response);
        getReser();
      }
    });
    return false;
  }

  function checkRadio() {
    var radios = document.getElementsByName('myRadio');
    for (var i = 0, length = radios.length; i < length; i++) {
      if (radios[i].checked) {
          return(radios[i].value);
          break;
      }
  }
}
function getReser(){

  var memid = $('#logout').val();
  var getUserreser = "getUserreser";
  $.ajax({
    type: 'POST',
    url: 'room_manager.php',
    data: {
      memid:memid,
      getUserreser: getUserreser
    },
    success: function(response) {
      if (response != "empty") {
        console.log("-------------------");
        console.log(response);
        $('#tbody').empty();
        var json_obj = jQuery.parseJSON(response);
        $.each(json_obj, function(key, value) {
          var member_id=value.member_id;
          var reserId=value.reserId;
          var room_id=value.room_id;
          var reserDate = value.reserDate;
          var Name = value.Name;
          var roomName = value.roomName;
          var resertitle = value.resertitle;
          var Day_time = value.Day_time;
          var reserStart = value.reserStart;
          var reserEnd = value.reserEnd;
          var reserStatus = value.reserStatus;
          var texttable = "<tr>"
          +"<td>"+reserDate+"</td>"
          +"<td>"+Name+"</td>"
          +"<td>"+roomName+"</td>"
          +"<td>"+resertitle+"</td>"
          +"<td>"+Day_time+"</td>"
          +"<td>"+reserStart+"</td>"
          +"<td>"+reserEnd+"</td>"
          +"<td>"+reserStatus+"</td>"
          +"<td><input name='btnAdd' type='button' id='btnAdd' value='แก้ไข' onclick='userEdit("+reserId+","+room_id+","+member_id+")'></td>"
          +"<td><input name='btnAdd' type='button' id='btnAdd' value='ลบ' onclick='userDeny("+reserId+","+room_id+","+member_id+")'></td>"
          +"</tr>";
          $("#tbody").append(texttable);
        });
      }else {
        $('#tbody').remove();
        var texttable = "<tr>"
        "<td>"+" "+"</td>"
        "<td>"+" "+"</td>"
        "<td>"+" "+"</td>"
        "<td>"+" "+"</td>"
        "<td>"+" "+"</td>"
        "<td>"+" "+"</td>"
        "<td>"+" "+"</td>"
        "<td>"+" "+"</td>"
        "<td>"+" "+"</td>"
        "<td>"+" "+"</td>"
        "</tr>";
        $("#tbody").append(texttable);
      }
    }
  });
}
});
