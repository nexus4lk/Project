<?php
require "dbroom.php";

//new object
$roomManager= new roomManager();

//check data for show fullcalendar
if(isset($_POST['reser'])){
	//call method reserRoom
	$roomManager->reserRoom($_SESSION['user_session'],$_POST['roomid'],$_POST['dcmtitle'],$_POST['date'],$_POST['dcmstart'],$_POST['dcmend']);
	echo " กรุณารอการดำเนินเรื่อง 3-4 วัน";
	}

// //show edit data modal
// if(isset($_POST['id'])){
//
// 	$get_data = $fullcalendar->get_fullcalendar_id($_POST['id']);
//
// 	echo'<div class="modal-body">
// 			<form id="edit_fullcalendar">
// 				  <div class="form-group">
// 					<label >เรื่อง</label>
// 					<input type="text" class="form-control" name="title" value="'.$get_data['title'].'">
// 				  </div>
// 				  <div class="form-group">
// 					<label >วันที่เริ่มต้น</label>
// 					<input type="text" class="form-control" name="start"  value="'.$get_data['start'].'">
// 				  </div>
// 				  <div class="form-group">
// 					<label >วันที่สิ้นสุด</label>
// 					<input type="text" class="form-control" name="end" value="'.$get_data['end'].'">
// 				  </div>
// 					<input type="hidden" name="edit_calendar_id" value="'.$get_data['id'].'">
// 				</form>
// 			</div>
// 		  <div class="modal-footer">
// 				<button type="button" class="btn btn-danger pull-left" onclick="return del_calendar('.$get_data['id'].');">Delete</button>
// 				<button type="button" class="btn btn-primary" onclick="return edit_calendar();">Save changes</button>
// 				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
// 		  </div>';
// }
//
// //save new data
// if(isset($_POST['new_calendar_form'])){
//
// 	$fullcalendar->new_calendar($_POST);
// }
//
// //edit new data
// if(isset($_POST['edit_calendar_id'])){
//
// 	$fullcalendar->edit_calendar($_POST);
// }
//
// //delete data
// if(isset($_POST['del_id'])){
//
// 	$fullcalendar->del_calendar($_POST['del_id']);
// }
?>
