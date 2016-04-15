<?php
session_start();
require "dbconfig.php";
class roomManager {

  // login
  public function reserRoom($user_id,$roomid,$title,$date,$start,$end){
      $connect = new connect();
      $db = $connect->connect();
      $status = "Wait";
      $add_user = $db->prepare("INSERT INTO reserve_data (Reser_ID, Mem_ID, Room_ID, Title, Reser_Date, Reser_Startdate, Reser_Enddate, Reser_Satatus) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)");
		  $add_user->bind_param("iisssss",$user_id,$roomid,$title,$date,$start,$end,$status);
      if(!$add_user->execute()){
        return false;
      }else{
        return true;
      }
    }

    public function addRoom($roomname,$roomcapa,$roomtype){
      $connect = new connect();
      $db = $connect->connect();
      $checkroom = $db->query("SELECT * FROM room WHERE Room_Name = '$roomname'");
      if ($get_room = $checkroom->fetch_assoc()){
        return false;
      }
      else {
        $add_room = $db->prepare("INSERT INTO room (Room_ID, Room_Name, Type_id, Room_Capa) VALUES (NULL, ?, ?, ?)");
        $add_room->bind_param("sii",$roomname, $roomtype, $roomcapa);
        if(!$add_room->execute()){
          return false;
        }else{
          return true;
        }
        }
      }

      public function removeRoom($roomid){
          $connect = new connect();
          $db = $connect->connect();
          $status = array("Wait", "Wait" , "Wait");
          // for ($status as $value) {
            // if ($value != "Wait") {
              $checkroom = $db->query("SELECT * FROM reserve_data WHERE Room_ID = '$roomid' AND Reser_Satatus LIKE 'Wait'");
              while ($get_room = $checkroom->fetch_assoc()){
                  $room = $get_room['Reser_ID'];
                  $del_room = $db->prepare("DELETE FROM reserne_completed WHERE Reser_ID = ?");
                  $del_room->bind_param("i",$room);
                  if(!$del_room->execute()){
                     echo "ไม่สามารถลบห้องได้1";
                   }else{
                     $del_room = $db->prepare("DELETE FROM reserve_data WHERE Room_ID = ?");
                   	$del_room->bind_param("i",$roomid);
                     if(!$del_room->execute()){
                        echo "ไม่สามารถลบห้องได้2";
                      }else{
                        $del_room = $db->prepare("DELETE FROM room WHERE Room_ID = ?");
                      	 $del_room->bind_param("i",$roomid);
                        if(!$del_room->execute()){
                           echo "ไม่สามารถลบห้องได้3";
                         }else{
                           echo "ลบห้องเรียบร้อย";
                         }
                        }
                      }
                }
            // }
              // else {
              //   $checkroom = $db->query("SELECT * FROM reserve_data WHERE Room_ID = '$roomid' AND Reser_Satatus LIKE 'Wait'");
              //   while ($get_room = $checkroom->fetch_assoc()){
              //   $room = $get_room['Reser_ID'];
              //   $del_room = $db->prepare("DELETE FROM reserve_data WHERE Reser_ID = ?");
              // 	$del_room->bind_param("i",$room);
              //   if(!$del_room->execute()){
              //      echo "ไม่สามารถลบห้องได้111";
              //    }else{
              //      $del_room = $db->prepare("DELETE FROM room WHERE Room_ID = ?");
              //    	 $del_room->bind_param("i",$roomid);
              //      if(!$del_room->execute()){
              //         echo "ไม่สามารถลบห้องได้222";
              //       }else{
              //         echo "ลบห้องเรียบร้อย";
              //       }
              //    }
              //  }
              // }
            // }
          }

      public function editRoom($roomid,$roomname,$roomcapa,$roomtype){
        $connect = new connect();
        $db = $connect->connect();
        $add_room = $db->prepare("UPDATE room SET Room_Name = ?, Type_id = ?, Room_Capa = ? WHERE Room_ID = ?");
        $add_room->bind_param("siii",$roomname, $roomtype, $roomcapa,$roomid);
        if(!$add_room->execute()){
          return false;
        }else{
          return true;
          }
        }
      public function selectRoom($roomid){
        $connect = new connect();
      	$db = $connect->connect();
        $get_room = $db->query("SELECT * FROM room WHERE Room_ID = '$roomid'");
        while($room= $get_room->fetch_assoc()){
            $result[] = $room;
        }
    		if(!empty($result)){
    			return $result;
    		}else {
    			$result = "empty";
      		return $result;
    		}
    	}
      public function getroomOption(){
        $connect = new connect();
        $db = $connect->connect();
        $get_roomOption = $db->query("SELECT * FROM room ORDER BY Room_id ASC");
        while($room= $get_roomOption->fetch_assoc()){
            $result[] = $room;
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
