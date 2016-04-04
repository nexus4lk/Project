$(document).ready(function() {
	var $tooltip = $("<div>").text("I'm a tooltip").addClass("tooltip");
	$("#calendar").on("mouseenter",".fc-event", function(){
	    $('body').append($tooltip);
	    $tooltip.position({
	        my:"left top",
	        at:"middle middle",
	        of:$(this)
	    });
	    // console.log("in");
	}).on("mouseleave",".fc-event", function(){
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
				roomid : roomid,
	 			json: json
	 		},
	 		success: function(response) {
				if (response == "empty") {
					$("#calendar").fullCalendar('removeEvents');
				}else {
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
				var daysToAdd = 4;
				 myDate.setDate(myDate.getDate() + daysToAdd);

            if (date < myDate) {
                //TRUE Clicked date smaller than today + daysToadd
                alert("You cannot book on this day!");
            }
            else
            {
                //FLASE Clicked date larger than today + daysToadd
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
			var modal = document.getElementById('eventClick_Modal');
		  // var btn = document.getElementById("myBtn");
			// btn.onclick = function() {
			//     modal.style.display = "none";
			// }
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
		eventLimit: true, // allow "more" link when too many events
		// events:{
		// url:'json-event.php?get_json',
		// }
	});

});
// //show data for edit
// function get_modal(id){
//
// 	//trigger modal
// 	$("#trigger_modal").trigger('click');
//
// 	//call data from File json-event.php
// 	$.ajax({
// 		type:"POST",
// 		url:"json-event.php",
// 		data:{id:id},
// 		success:function(data){
// 			$("#get_calendar").html(data);
// 		}
// 	});
//
// 	return false;
// }
//
// //save new form
// function new_calendar(){
//
// 	$.ajax({
// 		type:"POST",
// 		url:"json-event.php",
// 		data:$("#new_calendar").serialize(),
// 		success:function(data){
//
// 			$(".close").trigger('click');
// 			alert(data);
// 			location.reload();
// 		}
// 	});
// 	return false;
// }
//
// //save edit form
// function edit_calendar(){
//
// 	$.ajax({
// 		type:"POST",
// 		url:"json-event.php",
// 		data:$("#edit_fullcalendar").serialize(),
// 		success:function(data){
//
// 			$(".close").trigger('click');
// 			alert(data);
// 			location.reload();
// 		}
// 	});
// 	return false;
// }
//
// function del_calendar(del_id){
//
// 	if(confirm("คุณต้องการลบข้อมูลใช่หรือไม่")){
//
// 		$.ajax({
// 			type:"POST",
// 			url:"json-event.php",
// 			data:{del_id:del_id},
// 			success:function(data){
//
// 				$(".close").trigger('click');
// 				alert(data);
// 				location.reload();
// 			}
// 		});
//
// 	}
//
// 	return false;
// }
