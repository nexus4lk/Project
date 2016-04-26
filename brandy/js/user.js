// JavaScript Document
function userEdit(reser_id,room_id) {
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
        var Day_time = value.Day_time;editsubmit
        $('#editheadTitle').html(Title);
        document.getElementById(Day_time).checked = true;
        document.getElementById("editroom").value = room_id;
        document.getElementById("edittitle").value = Title;
        document.getElementById("editstart").value = reserStart;
        document.getElementById("editend").value = reserEnd;
        document.getElementById("editsubmit").value = reser_id;
        
        });
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
