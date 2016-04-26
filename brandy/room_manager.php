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

if(isset($_POST['get_edit'])){
	$get_reser = $roomManager->getEdit($_POST['reser_id']);
	if($get_reser != "empty"){
		foreach($get_reser as $edit){
			$json[] = array(
				'Title'=>$edit['Title'],
				'reserStart'=>$edit["Reser_Startdate"],
				'reserEnd'=>$edit["Reser_Enddate"],
				'Day_time'=>$edit["Day_time"]
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

if(isset($_POST['editreser'])){
	$reserRoom = $roomManager->editReser($_POST['reserId'],$_POST['roomid'],$_POST['title'],$_POST['start'],$_POST['end'],$_POST['dayTime']);
	if($reserRoom){
		echo " แก้ไข้เรียบร้อย ";
	}
	else {
		echo "ไม่สามารถแก้ไขได้";
	}
}


if(isset($_POST['reser'])){
	$reserRoom = $roomManager->reserRoom($_SESSION['user_session'],$_POST['roomid'],$_POST['dcmtitle'],$_POST['date'],$_POST['dcmstart'],$_POST['dcmend'],$_POST['dayTime']);
	if($reserRoom){
		echo " กรุณารอการดำเนินเรื่อง 3-4 วัน ".$reserRoom;
	}
	else {
		echo "ไม่สามารถจองห้องได้".$reserRoom;
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
	$addRoom = $roomManager->addRoom($_POST['roomname'],$_POST['roomcapa'],$_POST['roomtype'],$_POST['building'],$_POST['floor']);
	if($addRoom){
		echo "success";
	}
	else {
		echo "ไม่สามารถเพิ่มห้องได้";
	}
}

if (isset($_POST['addroomtype'])){
	$addroomType = $roomManager->addroomType($_POST['roomtype']);
	if($addroomType){
		echo "success";
	}
	else {
		echo "ไม่สามารถเพิ่มประเภทของห้องได้";
	}
}

if (isset($_POST['addBuilding'])){
	$addBuilding= $roomManager->addBuilding($_POST['buildingName'],$_POST['buildingNum']);
	if($addBuilding){
		echo "success";
	}
	else {
		echo "ไม่สามารถเพิ่มอาคารได้";
	}
}

if (isset($_POST['editbuilding'])){
	$editBuilding = $roomManager->editBuilding($_POST['buildingid'],$_POST['buildingname'],$_POST['buildingfloor']);
	if($editBuilding){
		echo "success";
	}
	else {
		echo "ไม่สามารถอัพเดทข้อมูลอาคารได้";
	}
}

if (isset($_POST['editroom'])){
	$editRoom = $roomManager->editRoom($_POST['roomid'],$_POST['roomname'],$_POST['roomcapa'],$_POST['roomtype'],$_POST['Building'],$_POST['floor']);
	if($editRoom){
		echo "success";
	}
	else {
		echo "ไม่สามารถอัพเดทข้อมูลห้องได้";
	}
}

if (isset($_POST['editroomType'])){
	$editRoomType = $roomManager->editroomTyperoom($_POST['roomTypeid'],$_POST['roomtypeName']);
	if($editRoomType){
		echo "success";
	}
	else {
		echo "ไม่สามารถอัพเดทประเภทห้องได้";
	}
}

if(isset($_POST['selectroom'])){
	$get_room = $roomManager->selectRoom($_POST['roomid']);
	if($get_room != "empty"){
		foreach($get_room as $room){
			$json[] = array(
				'RName'=>$room['Room_Name'],
				'RType'=>$room['Type_id'],
				'RCapa'=>$room['Room_Capa'],
				'Building'=>$room['Building_id'],
				'Bfloor'=>$room['Floor']
			);
		}
		//return JSON object
		echo json_encode($json);
	}
	else {
		echo "empty";
	}
}

if(isset($_POST['selectbuilding'])){
	$get_building = $roomManager->selectBuilding($_POST['building_id']);
	if($get_building != "empty"){
		foreach($get_building as $building){
			$json[] = array(
				'BName'=>$building['Building_name'],
				'BMax'=>$building['Max_Floor']
			);
		}
		//return JSON object
		echo json_encode($json);
	}
	else {
		echo "empty";
	}
}

if(isset($_POST['getfloor'])){
	$get_floor = $roomManager->getFloor($_POST['building_id']);
	if($get_floor != "empty"){
			echo $get_floor;
	}
	else {
		echo "empty";
	}
}

if(isset($_POST['selecttype'])){
	$get_roomType = $roomManager->selectRoomType($_POST['roomtype_id']);
	if($get_roomType != "empty"){
		$result = $get_roomType;
		//return JSON object
		echo $result;
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

if(isset($_POST['loadroomOption'])){
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

if(isset($_POST['loadBuildingOption'])){
	$get_buildingOption = $roomManager->getbuildingOption();
	if($get_buildingOption != "empty"){
		foreach($get_buildingOption as $buildingOption){
			$json[] = array(
				'BId'=>$buildingOption['Building_id'],
	      'BName'=>$buildingOption['Building_name'],
			);
		}
		//return JSON object
		echo json_encode($json);
	}
	else {
		echo "empty";
	}
}

if(isset($_POST['loadroomTypeOption'])){
	$get_roomTypeOption = $roomManager->getroomTypeOption();
	if($get_roomTypeOption != "empty"){
		foreach($get_roomTypeOption as $roomTypeOption){
			$json[] = array(
				'RTId'=>$roomTypeOption['Type_id'],
	      'RTName'=>$roomTypeOption['Type_name'],
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
