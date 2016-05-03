// JavaScript Document
$(function() {
  /* validation */
  $("#edit_calendar").validate({
    rules: {
      editroom: "required",
      editforwhom: "required",
      edittitle: "required",
      editstart: "required",
      editend: "required"
      // editmyRadio: "required"
    },
    messages: {
      editroom: "กรุณาเลือกห้องที่ต้องการจอง",
      editforwhom: "กรุณาเลือกผู้รับหมาย",
      edittitle: "กรุณากรอกจุดประสงค์การจองห้อง",
      editstart: "กรุณากรอกเวลาเริ่ม",
      editend: "กรุณากรอบเวลาสิ้นสุด",
      // editmyRadio: "กรุณาเลือกช่วงเวลาที่ต้องการจอง"
    },
    submitHandler: submitForm
  });
  /* validation */

  /* form submit */
  function submitForm(){
    var reserId = $('#editsubmit').val();
    var txtroomid = $('#editroom').val();
    var txttitle = $('#edittitle').val();
    var txtstart = $('#editstart').val();
    var txtend = $('#editend').val();
    var txteditforwhom = $('#editforwhom').val();
    var x = checkRadio();
    var editreser = "editreser"
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        reserId:reserId,
        roomid: txtroomid,
        title: txttitle,
        start: txtstart,
        end: txtend,
        dayTime:x,
        editforwhom:txteditforwhom,
        editreser: editreser
    },
      success: function(response) {
      if (response) {
          alert(response);
          var modal = document.getElementById('edit_Modal');
          modal.style.display = "none";
          getReser();
        }else if(!response){
          alert("เกิดข้อผิดพลาด");
          }else {
          alert(response);
        }
      }
    });
    return false;
  }

  function checkRadio() {
    var radios = document.getElementsByName('editmyRadio');
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
