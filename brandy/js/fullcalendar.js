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
        alert("You cannot book on this day!");
      } else {
        alert("Excellent choice! We can book today..");
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
      var modal = document.getElementById('dayClick_Modal');
      modal.style.display = "block";
      $('#ecmTitle').html(calEvent.titleModal);
      $('#ecmroom').html(calEvent.room);
      $('#ecmmem').html(calEvent.mem);
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
