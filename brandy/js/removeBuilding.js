// JavaScript Document
$(function() {
  /* validation */
  $("#removeBuilding-form").validate({
    rules: {
      Building10: "required"
    },
    messages: {
      Building10: "กรุณาเลือกห้อง"
    },
    submitHandler: submitForm
  });
  /* validation */

  /* form submit */
  function submitForm() {
    var buildingid = $('#Building10').val();
    var getbuildingName = "getbuildingName"
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        buildingid: buildingid,
        getbuildingName: getbuildingName
      },
      success: function(response) {
        var r = confirm("คุณแน่ใจที่จะลบ "+response+"ใช่หรือไม่");
        if (r == true) {
          var removeBuilding = "removeBuilding"
              $.ajax({
                type: 'POST',
                url: 'room_manager.php',
                data: {
                  buildingid: buildingid,
                  removeBuilding: removeBuilding
                },
                success: function(response) {
                  if (response) {
                  loadBuildingOption();
                  loadroomOption();
                  loadroomtypeOption();
                  alert(response);
                  } else  {
                  alert('ไม่สามารถลบอาคารนี้ได้');
                  }
                }
              });
        }
      }
      });

    return false;
  }
});
