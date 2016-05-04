<?php
require "dbconfig.php";
class Fullcalendar {

	//function show data in fullcalendar
	public function get_fullcalendar($roomid){
    $connect = new connect();
		$db = $connect->connect();
		$get_calendar = $db->query("SELECT * FROM reserne_completed");
		while($calendar = $get_calendar->fetch_assoc()){
      $reserdetail = $calendar["Reser_ID"];
      $get_reser = $db->query("SELECT * FROM reserve_data WHERE Reser_ID ='$reserdetail' AND Room_Id = '$roomid'");
      	while($reser = $get_reser->fetch_assoc()){
          	$result[] = $reser;
        }
		}
		if(!empty($result)){

			return $result;
		}else {
			$result = "empty";
			return $result;
		}
		$db->close();
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
		$db->close();
	}

	public function get_floor($id){

		$connect = new connect();
		$db = $connect->connect();
		$get_floor = $db->query("SELECT * FROM room WHERE Room_ID = '$id'");
		while($floor = $get_floor->fetch_assoc()){
			$result = $floor['Floor'];
		}
		if(!empty($result)){

			return $result;
		}
		$db->close();
	}


		public function get_building($id){

			$connect = new connect();
			$db = $connect->connect();
			$get_building = $db->query("SELECT * FROM room WHERE Room_ID = '$id'");
			if($building = $get_building->fetch_assoc()){
				$Bid= $building['Building_id'];
				$get_BName = $db->query("SELECT * FROM building WHERE Building_id = '$Bid'");
				if($BName = $get_BName->fetch_assoc()){
					$result = $BName['Building_name'];
			}
			if(!empty($result)){
						return $result;
					}
				}
				$db->close();
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
		$db->close();
	}

	public function get_endday($id){

    $connect = new connect();
		$db = $connect->connect();
		$get_endday= $db->query("SELECT * FROM reserve_data WHERE Reser_ID = '$id'");
		while($endday = $get_endday->fetch_assoc()){
      $result = $endday['Reser_Enddate'];
		}
		if(!empty($result)){

			return $result;
		}
		$db->close();
	}
}
?>
