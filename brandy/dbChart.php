<?php
session_start();
require "dbconfig.php";
class Charts {

  public function getChart(){
    $connect = new connect();
		$db = $connect->connect();
		$get_Charts = $db->query("SELECT * FROM room ");
		while($charts = $get_Charts->fetch_assoc()){
      $roomid = $charts["Room_Id"];
      $get_room = $db->query("SELECT * FROM room WHERE Room_Id = '$roomid'");
      	while($Chart = $get_room->fetch_assoc()){
          	$result[] = $Chart;
        }
		}
		if(!empty($result)){

			return $result;
		}else {
			$result = "empty";
			return $result;
		}
	}

}//end class
 ?>
