<?php
require "dbfullcalendar.php";

//new object
$fullcalendar = new Fullcalendar();

if(isset($_POST['json'])){
	$get_calendar = $fullcalendar->get_fullcalendar($_POST['roomid']);
	if($get_calendar != "empty"){
		foreach($get_calendar as $calendar){
			$get_roomname = $fullcalendar->get_roomname($calendar['Room_ID']);
			$get_floor= $fullcalendar->get_floor($calendar['Room_ID']);
			$get_building= $fullcalendar->get_building($calendar['Room_ID']);
			$get_membername = $fullcalendar->get_membername($calendar['Mem_ID']);
			$get_end = $fullcalendar->get_endday($calendar['Reser_ID']);
			$json[] = array(
				'id'=>$calendar['Reser_ID'],
				'title'=>$calendar['Title']." - ".$get_roomname,
				'start'=>$calendar['Reser_Startdate'],
				'end'=>$calendar['Reser_Enddate']."T23:59:00",
				'Rdate'=>$calendar['Reser_Date'],
				'titleModal'=>$calendar['Title'],
				'className'=>$calendar['Day_time'],
				'room'=>$get_roomname,
				'mem'=>$get_membername,
				'endday' =>$get_end,
				'Day_time'=>$calendar['Day_time'],
				'building' => $get_building,
				'floor' => $get_floor
			);
		}
		echo json_encode($json);
	}
	else {
		echo "empty";
	}
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
