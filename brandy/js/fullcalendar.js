$(document).ready(function() {


  var $tooltip = $("<div>").text("I'm a tooltip").addClass("tooltip");
  $("#calendar").on("mouseenter", ".fc-event", function() {
    $('body').append($tooltip);
    $tooltip.position({
      my: "left top",
      at: "middle middle",
      of: $(this)
    });
    // console.log("in");
  }).on("mouseleave", ".fc-event", function() {
    $tooltip = $tooltip.detach();
    // console.log("out");
  });

  $("#roomid").change(function() {
    var roomid = $('#roomid').val();
    var json = "json"
    $.ajax({
      type: 'POST',
      url: 'json-event.php',
      data: {
        roomid: roomid,
        json: json
      },
      success: function(response) {
          console.log(response);
        if (response == "empty") {
          $("#calendar").fullCalendar('removeEvents');
        } else {
          $("#calendar").fullCalendar('removeEvents');
          var response = JSON.parse(response);

          $("#calendar").fullCalendar('addEventSource', response);
        }
      }
    }); //ajax
  });
  //show full calendar
  $('#calendar').fullCalendar({
    dayRender: function(date, element, view) {
      var myDate = new Date();
      var daysToAdd = -1;
      myDate.setDate(myDate.getDate() + daysToAdd);
      if (date < myDate) {
        $(element).css("background", "#c0c0c0");
      }
    },


    select: function(start, end, allDay) {
      var check = $.fullCalendar.formatDate(start, 'yyyy-MM-dd');
      var today = $.fullCalendar.formatDate(new Date(), 'yyyy-MM-dd');
      if (check < today) {
        // Previous Day. show message if you want otherwise do nothing.
        // So it will be unselectable
      } else {
        // Its a right date
        // Do something
      }
    },

    dayClick: function(date, jsEvent, view) {
      var myDate = new Date();
      var daysToAdd = 3;
      myDate.setDate(myDate.getDate() + daysToAdd);

      if (date < myDate) {
        alert("คุณควรเว้นการจองห้องหลังจากวันปัจุบัน 3 - 4 วัน");
      } else {
        var modal = document.getElementById('dayClick_Modal');
        modal.style.display = "block";
        $('#dcmTitle').html(date.format('dddd - DD MMMM YYYY'));
        document.getElementById("dcmstart").value = date.format('YYYY-MM-DD');
        document.getElementById("dcmend").value = date.format('YYYY-MM-DD');
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
      }

    },
    eventClick: function(calEvent, jsEvent, view) {
      var modal = document.getElementById('eventClick_Modal');
      $('#ecmTitle').empty();
      $('#ecm_roomname').empty();
      $('#ecm_member').empty();
      $('#ecm_start').empty();
      $('#ecm_end').empty();
      modal.style.display = "block";
      var ecmstart = calEvent.start;
      var ecmend = calEvent.endday;
      $('#ecmTitle').html('<h3>'+calEvent.titleModal+'</h3>');
      $('#ecm_roomname').append('<font size="5" color="#000000" >ห้อง :&nbsp;&nbsp;</font>');
      $('#ecm_roomname').append('<font size="5" color="#000000" >'+ calEvent.room +'</font>');
      $('#ecm_member').append('<font size="5" color="#000000" >ผู้จอง :&nbsp;&nbsp;</font>');
      $('#ecm_member').append('<font size="5" color="#000000" >'+ calEvent.mem +'</font>');
      $('#ecm_start').append('<font size="5" color="#000000" >วันที่เริ่ม :&nbsp;&nbsp;</font>');
      $('#ecm_start').append('<font size="5" color="#000000" >'+ ecmstart.format('YYYY-MM-DD')+'</font>');
      $('#ecm_end').append('<font size="5" color="#000000" >วันที่สิ้นสุด :&nbsp;&nbsp;</font>');
      $('#ecm_end').append('<font size="5" color="#000000" >'+ ecmend +'</font>');
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
    },
    header: {
      right: 'prev,next today',
      // center: 'title',
      // right: 'month,basicWeek,basicDay'
    },
    editable: false,
    eventLimit: true,

  });

});
