  function allowProcess(reser_id) {
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
        var r = confirm("คุณแน่ใจที่จะอนุมัติ "+response+" เพื่อดำเนินการจองใช่หรือไม่");
        if (r == true) {
          var allowProcess = "allowProcess"
          $.ajax({
            type: 'POST',
            url: 'room_manager.php',
            data: {
              reser_id: reser_id,
              allowProcess: allowProcess
            },
            success: function(response) {
              alert(response);
              getReser();
              getReserProc();
            }
          });
        }
      }
      });
  }

  function allowComplete(reser_id) {
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
        var r = confirm("คุณแน่ใจที่จะอนุมัติ "+response+" ให้เสร็จสิ้นกระบวนการจองใช่หรือไม่");
        if (r == true) {
          var allowComplete = "allowComplete"
          $.ajax({
            type: 'POST',
            url: 'room_manager.php',
            data: {
              reser_id: reser_id,
              allowComplete: allowComplete
            },
            success: function(response) {
              alert(response);
              getReserProc();
              getReserCmpt();
            }
          });
        }
      }
      });
  }


  function denyProcess(reser_id) {
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
    var deny = "deny";
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        reser_id: reser_id,
        deny: deny
      },
      success: function(response) {
        alert(response);
        getReser();
        getReserdeny();
      }
    });
  }
}
});
}
function denyComplete(reser_id) {
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
  var denyComplete = "denyComplete";
  $.ajax({
    type: 'POST',
    url: 'room_manager.php',
    data: {
      reser_id: reser_id,
      denyComplete: denyComplete
    },
    success: function(response) {
      alert(response);
      getReserProc();
      getReserdeny();
    }
  });
}
}
});
}

  function getReser(){
    var getreser = "getreser";
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        getreser: getreser
      },
      success: function(response) {
        if (response != "empty") {
          $('#tbody').empty();
          var json_obj = jQuery.parseJSON(response);
          $.each(json_obj, function(key, value) {
            var Id = value.reserId;
            var reserDate = value.reserDate;
            var Name = value.Name;
            var Tel = value.tel;
            var roomName = value.roomName;
            var resertitle = value.resertitle;
            var Day_time = value.Day_time;
            var reserStart = value.reserStart;
            var reserEnd = value.reserEnd;
            var reserStatus = value.reserStatus;
            var texttable = "<tr>"
            +"<td>"+Id+"</td>"
            +"<td>"+reserDate+"</td>"
            +"<td>"+Name+"</td>"
            +"<td>"+Tel+"</td>"
            +"<td>"+roomName+"</td>"
            +"<td>"+resertitle+"</td>"
            +"<td>"+Day_time+"</td>"
            +"<td>"+reserStart+"</td>"
            +"<td>"+reserEnd+"</td>"
            +"<td>"+reserStatus+"</td>"
            +"<td><input name='btnAdd' type='button' id='btnAdd' value='Add' onclick='allowProcess("+Id+")'></td>"
            +"<td><input name='btnAdd' type='button' id='btnAdd' value='Remove' onclick='denyProcess("+Id+")'></td>"
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
          "<td>"+" "+"</td>"
          "<td>"+" "+"</td>"
          "</tr>";
          $("#tbody").append(texttable);
        }
      }
    });
  }

  function getReserProc(){
    var Proc = "Proc";
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        Proc: Proc
      },
      success: function(response) {
        if (response != "empty") {
          $('#tbodyP').empty();
          console.log("-----------------------------------------------------------");
          console.log(response);
          var json_obj = jQuery.parseJSON(response);
          $.each(json_obj, function(key, value) {
            var Id = value.reserId;
            var reserDate = value.reserDate;
            var Name = value.Name;
            var Tel = value.tel;
            var roomName = value.roomName;
            var resertitle = value.resertitle;
            var Day_time = value.Day_time;
            var reserStart = value.reserStart;
            var reserEnd = value.reserEnd;
            var reserStatus = value.reserStatus;
            var texttable = "<tr>"
            +"<td>"+Id+"</td>"
            +"<td>"+reserDate+"</td>"
            +"<td>"+Name+"</td>"
            +"<td>"+Tel+"</td>"
            +"<td>"+roomName+"</td>"
            +"<td>"+resertitle+"</td>"
            +"<td>"+Day_time+"</td>"
            +"<td>"+reserStart+"</td>"
            +"<td>"+reserEnd+"</td>"
            +"<td>"+reserStatus+"</td>"
            +"<td><input name='btnAdd' type='button' id='btnAdd' value='Add' onclick='allowComplete("+Id+")'></td>"
            +"<td><input name='btnAdd' type='button' id='btnAdd' value='Remove' onclick='denyComplete("+Id+")'></td>"
            +"<td><a onclick='reportePDF("+Id+")' >พิมพ์เอกสาร PDF</a></td>"
            +"</tr>";
            $("#tbodyP").append(texttable);
          });
        }else {
          $('#tbodyP').remove();
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
          "<td>"+" "+"</td>"
          "<td>"+" "+"</td>"
          "<td>"+" "+"</td>"
          "</tr>";
          $("#tbodyP").append(texttable);
        }
      }
    });
  }

  function getReserCmpt(){
    var Cmpt = "Cmpt";
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        Cmpt: Cmpt
      },
      success: function(response) {
        if (response != "empty") {
          $('#tbodyC').empty();
          console.log("-----------------------------------------------------------");
          console.log(response);
          var json_obj = jQuery.parseJSON(response);
          $.each(json_obj, function(key, value) {
            var Id = value.reserId;
            var reserDate = value.reserDate;
            var Name = value.Name;
            var Tel = value.tel;
            var roomName = value.roomName;
            var resertitle = value.resertitle;
            var Day_time = value.Day_time;
            var reserStart = value.reserStart;
            var reserEnd = value.reserEnd;
            var reserStatus = value.reserStatus;
            var texttable = "<tr>"
            +"<td>"+Id+"</td>"
            +"<td>"+reserDate+"</td>"
            +"<td>"+Name+"</td>"
            +"<td>"+Tel+"</td>"
            +"<td>"+roomName+"</td>"
            +"<td>"+resertitle+"</td>"
            +"<td>"+Day_time+"</td>"
            +"<td>"+reserStart+"</td>"
            +"<td>"+reserEnd+"</td>"
            +"<td>"+reserStatus+"</td>"
            +"</tr>";
            $("#tbodyC").append(texttable);
          });
        }else {
          $('#tbodyC').remove();
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
          $("#tbodyC").append(texttable);
        }
      }
    });
  }

  function getReserdeny(){
    var getReserdeny = "getReserdeny";
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        getReserdeny: getReserdeny
      },
      success: function(response) {
        if (response != "empty") {
          $('#tbodyD').empty();
          console.log("-----------------------------------------------------------");
          console.log(response);
          var json_obj = jQuery.parseJSON(response);
          $.each(json_obj, function(key, value) {
            var Id = value.reserId;
            var reserDate = value.reserDate;
            var Name = value.Name;
            var Tel = value.tel;
            var roomName = value.roomName;
            var resertitle = value.resertitle;
            var Day_time = value.Day_time;
            var reserStart = value.reserStart;
            var reserEnd = value.reserEnd;
            var reserStatus = value.reserStatus;
            var texttable = "<tr>"
            +"<td>"+Id+"</td>"
            +"<td>"+reserDate+"</td>"
            +"<td>"+Name+"</td>"
            +"<td>"+Tel+"</td>"
            +"<td>"+roomName+"</td>"
            +"<td>"+resertitle+"</td>"
            +"<td>"+Day_time+"</td>"
            +"<td>"+reserStart+"</td>"
            +"<td>"+reserEnd+"</td>"
            +"<td>"+reserStatus+"</td>"
            +"</tr>";
            $("#tbodyD").append(texttable);
          });
        }else {
          $('#tbodyD').remove();
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
          $("#tbodyD").append(texttable);
        }
      }
    });
  }
