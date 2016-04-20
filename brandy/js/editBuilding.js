function loadBuildingOption(){
  var option = '{list}<option value="{Id}">{Name}</option>{/list}';
  var loadBuildingOption = "loadBuildingOption";

    $.ajax({
        type: 'POST',
        url: 'room_manager.php',
        data: {
          loadBuildingOption: loadBuildingOption
        },
        success: function(response) {
          $('#Building9 option[value!="0"]').remove();
          // $('#Building10 option[value!="0"]').remove();
          var json_obj = jQuery.parseJSON(response);
          $.each(json_obj, function(key, value) {
            var BId = value.BId;
            var BName = value.BName;
            $("#Building9").append("<option value="+BId+">"+BName+"</option>");
            // $("#Building10").append("<option value="+BId+">"+BName+"</option>");
          });// each

        } //function
    });
}


$(document).ready(function() {
  $("#Building9").change(function() {
    var building_id = $('#Building9').val();
    var selectbuilding = "selectbuilding"
    $("#editroomtype").val(""); //ล้างข้อมูล
    $("#editMax_floor").val(""); //ล้างข้อมูล
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        building_id: building_id,
        selectbuilding: selectbuilding
      },
      success: function(response) {
        console.log(response);
        var json_obj = jQuery.parseJSON(response);
        $.each(json_obj, function(key, value) {
          var BName = value.BName;
          var BMax = value.BMax;
          document.getElementById("editbuilding").value = BName;
          document.getElementById("editMax_floor").value = BMax;
        }); //each
      } //function
    }); //ajax
  }) //function
});

$(function() {
  /* validation */
  $("#editBuilding-form").validate({
    rules: {
      editbuilding: "required",
      editMax_floor: "required"
    },
    messages: {
      editbuilding: "กรุณากรอกชื่ออาคาร",
      editMax_floor: "กรุณากรอกจำนวนชั้นของอาคาร"
    },
    submitHandler: submitForm
  });
  /* validation */

  /* form submit */
  function submitForm() {
    $('#editbuilding').focus();
    var txtbuildingname = $('#editbuilding').val();
    var txtfloor = $('#editMax_floor').val();
    var buildingid = $('#Building9').val();
    var editbuilding = "editbuilding"
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        buildingname: txtbuildingname,
        buildingfloor: txtfloor,
        buildingid: buildingid,
        editbuilding: editbuilding
      },
      success: function(response) {
        if (response == "success") {
        loadBuildingOption();
        alert('แก้ไข ' + txtbuildingname + ' เรียบร้อยแล้ว');
        } else  {
        alert('ไม่สามารถแก้ไข ' + txtbuildingname + ' ได้');
        }
      }
    });
    return false;
  }
});
