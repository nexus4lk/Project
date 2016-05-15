function loadroomtypeOption(){
  var option = '{list}<option value="{Id}">{Name}</option>{/list}';
  var loadroomTypeOption = "loadroomTypeOption";

    $.ajax({
        type: 'POST',
        url: 'room_manager.php',
        data: {
          loadroomTypeOption: loadroomTypeOption
        },
        success: function(response) {
          $('#roomtype2 option[value!="0"]').remove();
          $('#roomtype3 option[value!="0"]').remove();
          $('#roomtype6 option[value!="0"]').remove();
          $('#roomtype7 option[value!="0"]').remove();
          var json_obj = jQuery.parseJSON(response);
          $.each(json_obj, function(key, value) {
            var RTId = value.RTId;
            var RTName = value.RTName;
            $("#roomtype2").append("<option value="+RTId+">"+RTName+"</option>");
            $("#roomtype3").append("<option value="+RTId+">"+RTName+"</option>");
            $("#roomtype6").append("<option value="+RTId+">"+RTName+"</option>");
            $("#roomtype7").append("<option value="+RTId+">"+RTName+"</option>");

          });// each

        } //function
    });
}


$(document).ready(function() {
  $("#roomtype6").change(function() {
    var roomtype_id = $('#roomtype6').val();
    var selecttype = "selecttype"
    $("#editroomtype").val(""); //ล้างข้อมูล
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        roomtype_id: roomtype_id,
        selecttype: selecttype
      },
      success: function(response) {
        document.getElementById("editroomtype").value = response;
      } //function
    }); //ajax
  }) //function
});

$(function() {
  /* validation */
  $("#editroomtype-form").validate({
    rules: {
      editroomtype: "required"
    },
    messages: {
      editroomtype: "กรุณากรอกประเภทห้อง"
    },
    submitHandler: submitForm
  });
  /* validation */

  /* form submit */
  function submitForm() {
    $('#editroomtype').focus();
    var txtTypename = $('#editroomtype').val();
    var roomTypeid = $('#roomtype6').val();
    var editroomType = "editroomType"
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        roomtypeName: txtTypename,
        roomTypeid: roomTypeid,
        editroomType: editroomType
      },
      success: function(response) {
        loadroomtypeOption();
        if (response == "success") {
        alert('แก้ไขประเภท ' + txtTypename + ' เรียบร้อยแล้ว');
        } else  {
          alert('ชื่อประเภทห้อง ' + txtTypename + ' มีอยู่ในระบบแล้ว');
        }
      }
    });
    return false;
  }
});
