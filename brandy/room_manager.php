<?php
require "dbroom.php";

//new object
$roomManager= new roomManager();


//check data for show fullcalendar

if(isset($_POST['getreser'])){//admin incomes
	$get_reser = $roomManager->getreserData();
	if($get_reser != "empty"){
		foreach($get_reser as $reser){
		$get_roomname = $roomManager->get_roomname($reser['Room_ID']);
		$get_membername = $roomManager->get_membername($reser['Mem_ID']);
		$get_memberTel = $roomManager->get_memberTel($reser['Mem_ID']);
		switch ($reser["Reser_Satatus"]) {
    case "Wait":
        $status = "รอตรวจสอบ";
        break;
    case "Proc":
        $status = "อยู่ระหว่างดำเนินการ";
        break;
				case "Cmpt":
				    $status = "เสร็จสิ้นการดำเนินการ";
				    break;
				case "deny":
				    $status = "ปฏิเสธ";
				    break;
				  }
		switch ($reser["Day_time"]) {
			case "Morning":
					$day_time = "ช่วงเช้า";
					break;
			case "Afternoon":
					$day_time = "ช่วงบ่าย";
					break;
			case "Night":
					$day_time = "ช่วงค่ำ";
					break;
				}
			$json[] = array(
				'member_id'=>$reser['Mem_ID'],
				'reserId'=>$reser['Reser_ID'],
				'room_id'=>$reser['Room_ID'],
				'reserDate'=>$reser['Reser_Date'],
				'Name'=>$get_membername,
				'tel'=>$get_memberTel,
				'roomName'=>$get_roomname,
				'resertitle'=>$reser["Title"],
				'Day_time'=>$day_time,
				'reserStart'=>$reser["Reser_Startdate"],
				'reserEnd'=>$reser["Reser_Enddate"],
				'reserStatus'=>$status
			);
	}
		//return JSON object
		echo json_encode($json);
	}
	else {
		echo "empty";
	}
}

if(isset($_POST['Proc'])){//Process
	$get_reser = $roomManager->getreserProcData();
	if($get_reser != "empty"){
		foreach($get_reser as $reser){
		$get_roomname = $roomManager->get_roomname($reser['Room_ID']);
		$get_membername = $roomManager->get_membername($reser['Mem_ID']);
		$get_memberTel = $roomManager->get_memberTel($reser['Mem_ID']);
		switch ($reser["Reser_Satatus"]) {
    case "Wait":
        $status = "รอตรวจสอบ";
        break;
    case "Proc":
        $status = "อยู่ระหว่างดำเนินการ";
        break;
				case "Cmpt":
				    $status = "เสร็จสิ้นการดำเนินการ";
				    break;
				case "deny":
				    $status = "ปฏิเสธ";
				    break;
				  }
			switch ($reser["Day_time"]) {
				case "Morning":
						$day_time = "ช่วงเช้า";
						break;
				case "Afternoon":
						$day_time = "ช่วงบ่าย";
						break;
				case "Night":
						$day_time = "ช่วงค่ำ";
						break;
					}
			$json[] = array(
				'member_id'=>$reser['Mem_ID'],
				'reserId'=>$reser['Reser_ID'],
				'room_id'=>$reser['Room_ID'],
				'reserDate'=>$reser['Reser_Date'],
				'Name'=>$get_membername,
				'tel'=>$get_memberTel,
				'roomName'=>$get_roomname,
				'resertitle'=>$reser["Title"],
				'Day_time'=>$day_time,
				'reserStart'=>$reser["Reser_Startdate"],
				'reserEnd'=>$reser["Reser_Enddate"],
				'reserStatus'=>$status
			);
	}
		//return JSON object
		echo json_encode($json);
	}
	else {
		echo "empty";
	}
}

if(isset($_POST['Cmpt'])){//Complete
	$get_reser = $roomManager->getreserCmptData();
	if($get_reser != "empty"){
		foreach($get_reser as $reser){
		$get_roomname = $roomManager->get_roomname($reser['Room_ID']);
		$get_membername = $roomManager->get_membername($reser['Mem_ID']);
		$get_memberTel = $roomManager->get_memberTel($reser['Mem_ID']);
		switch ($reser["Reser_Satatus"]) {
    case "Wait":
        $status = "รอตรวจสอบ";
        break;
    case "Proc":
        $status = "อยู่ระหว่างดำเนินการ";
        break;
				case "Cmpt":
				    $status = "เสร็จสิ้นการดำเนินการ";
				    break;
				case "deny":
				    $status = "ปฏิเสธ";
				    break;
				  }
			switch ($reser["Day_time"]) {
				case "Morning":
						$day_time = "ช่วงเช้า";
						break;
				case "Afternoon":
						$day_time = "ช่วงบ่าย";
						break;
				case "Night":
						$day_time = "ช่วงค่ำ";
						break;
					}
			$json[] = array(
				'member_id'=>$reser['Mem_ID'],
				'reserId'=>$reser['Reser_ID'],
				'room_id'=>$reser['Room_ID'],
				'reserDate'=>$reser['Reser_Date'],
				'Name'=>$get_membername,
				'tel'=>$get_memberTel,
				'roomName'=>$get_roomname,
				'resertitle'=>$reser["Title"],
				'Day_time'=>$day_time,
				'reserStart'=>$reser["Reser_Startdate"],
				'reserEnd'=>$reser["Reser_Enddate"],
				'reserStatus'=>$status
			);
	}
		//return JSON object
		echo json_encode($json);
	}
	else {
		echo "empty";
	}
}

if(isset($_POST['getReserdeny'])){//Deny
	$get_reser = $roomManager->getreserDenyData();
	if($get_reser != "empty"){
		foreach($get_reser as $reser){
		$get_roomname = $roomManager->get_roomname($reser['Room_ID']);
		$get_membername = $roomManager->get_membername($reser['Mem_ID']);
		$get_memberTel = $roomManager->get_memberTel($reser['Mem_ID']);
		switch ($reser["Reser_Satatus"]) {
    case "Wait":
        $status = "รอตรวจสอบ";
        break;
    case "Proc":
        $status = "อยู่ระหว่างดำเนินการ";
        break;
				case "Cmpt":
				    $status = "เสร็จสิ้นการดำเนินการ";
				    break;
				case "deny":
				    $status = "ปฏิเสธ";
				    break;
				  }
			switch ($reser["Day_time"]) {
				case "Morning":
						$day_time = "ช่วงเช้า";
						break;
				case "Afternoon":
						$day_time = "ช่วงบ่าย";
						break;
				case "Night":
						$day_time = "ช่วงค่ำ";
						break;
					}
			$json[] = array(
				'member_id'=>$reser['Mem_ID'],
				'reserId'=>$reser['Reser_ID'],
				'room_id'=>$reser['Room_ID'],
				'reserDate'=>$reser['Reser_Date'],
				'Name'=>$get_membername,
				'tel'=>$get_memberTel,
				'roomName'=>$get_roomname,
				'resertitle'=>$reser["Title"],
				'Day_time'=>$day_time,
				'reserStart'=>$reser["Reser_Startdate"],
				'reserEnd'=>$reser["Reser_Enddate"],
				'reserStatus'=>$status
			);
	}
		//return JSON object
		echo json_encode($json);
	}
	else {
		echo "empty";
	}
}

if(isset($_POST['getUserreser'])){//index
	$get_reser = $roomManager->getUserreserData($_POST['memid']);
	if($get_reser != "empty"){
		foreach($get_reser as $reser){
		$get_roomname = $roomManager->get_roomname($reser['Room_ID']);
		$get_membername = $roomManager->get_membername($reser['Mem_ID']);
		$get_memberTel = $roomManager->get_memberTel($reser['Mem_ID']);
		switch ($reser["Reser_Satatus"]) {
    case "Wait":
        $status = "รอตรวจสอบ";
        break;
    case "Proc":
        $status = "อยู่ระหว่างดำเนินการ";
        break;
				case "Cmpt":
				    $status = "เสร็จสิ้นการดำเนินการ";
				    break;
				case "deny":
				    $status = "ปฏิเสธ";
				    break;
				  }
			switch ($reser["Day_time"]) {
				case "Morning":
						$day_time = "ช่วงเช้า";
						break;
				case "Afternoon":
						$day_time = "ช่วงบ่าย";
						break;
				case "Night":
						$day_time = "ช่วงค่ำ";
						break;
					}
			$json[] = array(
				'member_id'=>$reser['Mem_ID'],
				'reserId'=>$reser['Reser_ID'],
				'room_id'=>$reser['Room_ID'],
				'reserDate'=>$reser['Reser_Date'],
				'Name'=>$get_membername,
				'roomName'=>$get_roomname,
				'resertitle'=>$reser["Title"],
				'Day_time'=>$day_time,
				'reserStart'=>$reser["Reser_Startdate"],
				'reserEnd'=>$reser["Reser_Enddate"],
				'reserStatus'=>$status
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
			);
	}
		//return JSON object
		echo json_encode($json);
	}
	else {
		echo "empty";
	}
}

if(isset($_POST['get_roomDetail'])){
	$get_roomDetail = $roomManager->getroomDetail($_POST['roomid']);
	if($get_roomDetail != "empty"){
		foreach($get_roomDetail as $detail){
			$get_roomType = $roomManager->selectRoomType($detail['Type_id']);
			$get_buildingName = $roomManager->get_buildingName($detail['Building_id']);
			$json[] = array(
				'roomName'=> $detail['Room_Name'],
				'roomCapa'=> $detail["Room_Capa"],
				'floor'=> $detail["Floor"],
				'roomType' => $get_roomType,
				'buildingName' => $get_buildingName
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
		echo " กรุณารอการดำเนินเรื่อง 3-4 วัน ";
	}
	else {
		echo "ไม่สามารถจองห้องได้เนื่องจากห้องมีการจองอยู่ หรือ ห้งออยู่ระหว่างการดำเนินการ";
	}
}

if (isset($_POST['allowComplete'])){
	$allowRoom = $roomManager->allowRoom($_POST['reser_id']);
	if($allowRoom){
		echo "Complete Reservation";
	}
	else {
		echo $allowRoom;
	}
}


if (isset($_POST['allowProcess'])){
	$allowProcess = $roomManager->allowProcess($_POST['reser_id']);
	if($allowProcess){
		echo "Allow to process";
	}
	else {
		echo "ไม่สามารถจองได้เนื่องจาก".$allowProcess;
	}
}


if (isset($_POST['userdeny'])){
	$userDeny = $roomManager->userDeny($_POST['reser_id']);
	if($userDeny){
		echo "removed";
	}
	else {
		echo $userDeny;
	}
}

if (isset($_POST['deny'])){
	$allowRoom = $roomManager->denyRoom($_POST['reser_id']);
	if($allowRoom){
		echo "Denied";
	}
	else {
		echo "error";
	}
}

if (isset($_POST['denyComplete'])){
	$denyComplete = $roomManager->denyComplete($_POST['reser_id']);
	if($denyComplete){
		echo "Denied";
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

if(isset($_POST['geteditImg'])){
	$get_img = $roomManager->geteditImg($_POST['Img_id']);
	if($get_img != "empty"){
		foreach($get_img as $Img){
			$json[] = array(
				'Img'=>$Img['img_name'],
				'roomId'=>$Img['Room_ID']
			);
		}
		//return JSON object
		echo json_encode($json);
	}
	else {
		echo "empty";
	}
}

if(isset($_POST['get_Img'])){
	$get_img = $roomManager->getImg($_POST['roomid']);
	if($get_img != "empty"){
		foreach($get_img as $Img){
			$json[] = array(
				'Image'=>$Img['img_name'],
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

if(isset($_POST['getRemoveImg'])){
	$getRemoveImg = $roomManager->getRemoveImg($_POST['Img_id']);
	if($getRemoveImg != "empty"){
			echo $getRemoveImg;
	}
	else {
		echo "empty";
	}
}

if(isset($_POST['RemoveImg'])){
	$RemoveImg = $roomManager->RemoveImg($_POST['Img_id']);
	if($RemoveImg != "empty"){
			echo $RemoveImg;
	}
	else {
		echo $RemoveImg;
	}
}

if(isset($_POST['getroomName'])){
$getTitle = $roomManager->getTitle($_POST['reser_id']);
if($getTitle != "empty"){
			echo $getTitle;
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
