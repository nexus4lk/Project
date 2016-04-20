<?php
require "dbroom.php";

//new object
$roomManager= new roomManager();


//check data for show fullcalendar

if(isset($_POST['getreser'])){
	$get_room = $roomManager->getreserData();
	if($get_room != "empty"){
		foreach($get_room as $room){
		$get_roomname = $roomManager->get_roomname($room['Room_ID']);
		$get_membername = $roomManager->get_membername($room['Mem_ID']);
		$get_memberTel = $roomManager->get_memberTel($room['Mem_ID']);
			$json[] = array(
				'reserId'=>$room['Reser_ID'],
				'reserDate'=>$room['Reser_Date'],
				'name'=>$get_membername,
				'tel'=>$get_memberTel,
				'roomName'=>$get_roomname,
				'resertitle'=>$room["Title"],
				'reserStart'=>$room["Reser_Startdate"],
				'reserEnd'=>$room["Reser_Enddate"],
				'reserStatus'=>$room["Reser_Satatus"]
				// 'url'=>'javascript:get_modal('.$calendar['Calendar_id'].');',
			);
	}
		//return JSON object
		echo json_encode($json);
	}
	else {
		echo "empty";
	}
}

if(isset($_POST['reser'])){
	$reserRoom = $roomManager->reserRoom($_SESSION['user_session'],$_POST['roomid'],$_POST['dcmtitle'],$_POST['date'],$_POST['dcmstart'],$_POST['dcmend']);
	if($reserRoom){
		echo " กรุณารอการดำเนินเรื่อง 3-4 วัน";
	}
	else {
		echo "ไม่สามารถจองห้องได้";
	}
}

if (isset($_POST['allow'])){
	$allowRoom = $roomManager->allowRoom($_POST['reser_id']);
	if($allowRoom){
		echo "allowed";
	}
	else {
		echo "error";
	}
}

if (isset($_POST['deny'])){
	$allowRoom = $roomManager->denyRoom($_POST['reser_id']);
	if($allowRoom){
		echo "denied";
	}
	else {
		echo "error";
	}
}

if (isset($_POST['addroom'])){
	$addRoom = $roomManager->addRoom($_POST['roomname'],$_POST['roomcapa'],$_POST['roomtype']);
	if($addRoom){
		echo "success";
	}
	else {
		echo "ไม่สามารถเพิ่มห้องได้";
	}
}

if (isset($_POST['editroom'])){
	$editRoom = $roomManager->editRoom($_POST['roomid'],$_POST['roomname'],$_POST['roomcapa'],$_POST['roomtype']);
	if($editRoom){
		echo "success";
	}
	else {
		echo "ไม่สามารถอัพเดทข้อมูลห้องได้";
	}
}

if(isset($_POST['selectroom'])){
	$get_room = $roomManager->selectRoom($_POST['roomid']);
	if($get_room != "empty"){
		foreach($get_room as $room){
			$json[] = array(
				'RName'=>$room['Room_Name'],
				'RType'=>$room['Type_id'],
				'RCapa'=>$room['Room_Capa']
			);
		}
		//return JSON object
		echo json_encode($json);
	}
	else {
		echo "empty";
	}
}

if (isset($_POST['removeroom'])){
	$removeRoom = $roomManager->removeRoom($_POST['roomid']);
	if($removeRoom){
		echo $removeRoom;
	}
	else {
		echo $removeRoom;
	}
}

if(isset($_POST['action'])){
	$get_roomOption = $roomManager->getroomOption();
	if($get_roomOption != "empty"){
		foreach($get_roomOption as $roomOption){
			$json[] = array(
				'Id'=>$roomOption['Room_ID'],
	      'Name'=>$roomOption['Room_Name'],
			);
		}
		//return JSON object
		echo json_encode($json);
	}
	else {
		echo "empty";
	}
}
?>
