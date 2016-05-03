// JavaScript Document
function userEdit(reser_id,room_id,memid) {
  var modal = document.getElementById('edit_Modal');
  modal.style.display = "block";
  var get_edit = "get_edit"
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
      reser_id: reser_id,
      get_edit: get_edit
    },
    success: function(response) {
      console.log(response);
      var json_obj = jQuery.parseJSON(response);
      $.each(json_obj, function(key, value) {
        var Title = value.Title;
        var reserStart = value.reserStart;
        var reserEnd = value.reserStart;
        var Day_time = value.Day_time;
        var forwhom = value.forwhom;

        $('#editheadTitle').html(Title);
        document.getElementById(Day_time).checked = true;
        document.getElementById("editroom").value = room_id;
        document.getElementById("edittitle").value = Title;
        document.getElementById("editstart").value = reserStart;
        document.getElementById("editend").value = reserEnd;
        document.getElementById("editsubmit").value = reser_id;
        document.getElementById("logout").value = memid;
        document.getElementById("editforwhom").value = forwhom;
        });
    }
  });


  }
  function userDeny(reser_id) {
    var reser_id = reser_id;
    var getroomName = "getroomName"
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        reser_id: reser_id,
        getroomName: getroomName
      },
      success: function(response) {
        var r = confirm("คุณแน่ใจที่จะลบ "+response+" ใช่หรือไม่");
        if (r == true) {
    var userdeny = "userdeny";
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        reser_id: reser_id,
        userdeny: userdeny
      },
      success: function(response) {
        if (response != "removed") {
          alert("ไม่สามารถลบได้เนื่องจาก"+response);
        }else {
          alert("ลบการจองห้องเรียบร้อย");
        }
        getReser();
      }
    });
  }
}
});
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

$(function() {
  /* validation */
  $("#Building-form").validate({
    rules: {
      buildingName: "required",
      buildingNum: "required",
    },
    messages: {
      buildingName: "กรุณากรอกชื่ออาคาร",
      buildingNum: "กรุณากรอกจำนวนชั้นของอาคาร"
    },
    submitHandler: submitForm
  });
  /* validation */

  /* form submit */
  function submitForm() {
    $('#buildingName').focus();
    var txtbuildingName = $('#buildingName').val();
    var txtbuildingNum = $('#buildingNum').val();
    var addBuilding = "addBuilding"
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        buildingName: txtbuildingName,
        buildingNum: txtbuildingNum,
        addBuilding: addBuilding
      },
      success: function(response) {
        if (response == "success") {
        alert('เพิ่มอาคาร '+  txtbuildingName + ' เรียบร้อยแล้ว');
        } else  {
        alert('อาคาร ' + txtbuildingName + ' มีอยู่ในระบบแล้ว');
        }
      }
    });
    return false;
  }

});
