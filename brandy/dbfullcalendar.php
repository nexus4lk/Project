<?php
require "dbconfig.php";
class Fullcalendar {

	//function show data in fullcalendar
	public function get_fullcalendar(){
    $connect = new connect();
		$db = $connect->connect();
		$get_calendar = $db->query("SELECT * FROM reserne_completed");
		while($calendar = $get_calendar->fetch_assoc()){
      $reserdetail = $calendar["Reser_ID"];
      $get_reser = $db->query("SELECT * FROM reserve_data WHERE Reser_ID ='$reserdetail'");
      	while($reser = $get_reser->fetch_assoc()){
          	$result[] = $reser;
        }
		}
		if(!empty($result)){

			return $result;
		}
	}
  //get room name
  public function get_roomname($id){

    $connect = new connect();
		$db = $connect->connect();
		$get_roomname = $db->query("SELECT * FROM room WHERE Room_ID = '$id'");
		while($roomname = $get_roomname->fetch_assoc()){
      $result = $roomname['Room_Name'];
		}
		if(!empty($result)){

			return $result;
		}
	}

  //get room name
  public function get_membername($id){

    $connect = new connect();
		$db = $connect->connect();
		$get_membername = $db->query("SELECT * FROM member WHERE Mem_ID = '$id'");
		while($membername = $get_membername->fetch_assoc()){
      $result = $membername['Mem_Fname']."  ".$membername['Mem_Lname'];
		}
		if(!empty($result)){

			return $result;
		}
	}

	//show data in modal
	// public function get_fullcalendar_id($get_id){
  //
	// 	$db = $this->connect();
	// 	$get_user = $db->prepare("SELECT id,title,start,end FROM calendar WHERE id = ?");
	// 	$get_user->bind_param('i',$get_id);
	// 	$get_user->execute();
	// 	$get_user->bind_result($id,$title,$start,$end);
	// 	$get_user->fetch();
  //
	// 	$result = array(
	// 		'id'=>$id,
	// 		'title'=>$title,
	// 		'start'=>$start,
	// 		'end'=>$end
	// 	);
  //
	// 	return $result;
	// }
  //
	// //save new data
	// public function new_calendar($data){
  //
	// 	$db = $this->connect();
  //
	// 	$add_user = $db->prepare("INSERT INTO calendar (id,title,start,end) VALUES(NULL,?,?,?) ");
  //
	// 	$add_user->bind_param("sss",$data['title'],$data['start'],$data['end']);
  //
	// 	if(!$add_user->execute()){
  //
	// 		echo $db->error;
  //
	// 	}else{
  //
	// 		echo "บันทึกข้อมูลเรียบร้อย";
	// 	}
	// }
  //
	// //edit data
	// public function edit_calendar($data){
  //
	// 	$db = $this->connect();
  //
	// 	$add_user = $db->prepare("UPDATE calendar SET title = ? , start = ? ,end = ? WHERE id = ?");
  //
	// 	$add_user->bind_param("sssi",$data['title'],$data['start'],$data['end'],$data['edit_calendar_id']);
  //
	// 	if(!$add_user->execute()){
  //
	// 		echo $db->error;
  //
	// 	}else{
  //
	// 		echo "บันทึกข้อมูลเรียบร้อย";
	// 	}
	// }
  //
	// //delete data
	// public function del_calendar($id){
  //
	// 	$db = $this->connect();
  //
	// 	$del_user = $db->prepare("DELETE FROM calendar WHERE id = ?");
  //
	// 	$del_user->bind_param("i",$id);
  //
	// 	if(!$del_user->execute()){
  //
	// 		echo $db->error;
  //
	// 	}else{
  //
	// 		echo "ลบข้อมูลเรียบร้อย";
	// 	}
	// }
}
?>
