// JavaScript Document
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
