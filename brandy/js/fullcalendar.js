


$(document).ready(function() {
	//show full calendar

	$('#calendar').fullCalendar({
		eventClick: function(calEvent, jsEvent, view) {
			var modal = document.getElementById('myModal');
		  // var btn = document.getElementById("myBtn");
			// btn.onclick = function() {
			//     modal.style.display = "none";
			// }
		  modal.style.display = "block";
			$('#modalTitle').html(calEvent.titleModal);
			$('#modalroom').html(calEvent.room);
			$('#modalmem').html(calEvent.mem);
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
		events:{
			url:'json-event.php?get_json=get_json',
		}
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
