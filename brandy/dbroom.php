<?php
session_start();
require "dbconfig.php";
class roomManager {

  // login
  public function reserRoom($user_id,$roomid,$title,$date,$start,$end,$time){
      $connect = new connect();
      $db = $connect->connect();
      $wait = "Wait";
      $complete = "Cmpt";
      $check_room = $db->query("SELECT * FROM reserve_data WHERE Room_ID = '$roomid'
        AND Reser_Startdate = '$start'
        AND Day_time = '$time'
        AND Reser_Satatus = '$complete'");
      if($check_room->fetch_assoc()){
        echo "ห้องมีการจองอยู่ในระบบแล้ว";
        return false;
      }else{
        $add_user = $db->prepare("INSERT INTO reserve_data (Reser_ID, Mem_ID, Room_ID, Title, Reser_Date, Reser_Startdate, Reser_Enddate,	Day_time, Reser_Satatus) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)");
  		  $add_user->bind_param("iissssss",$user_id,$roomid,$title,$date,$start,$end,$time,$wait);
        if(!$add_user->execute()){
          return false;
        }else{
          return true;
        }
      }
    }
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

    public function get_memberTel($id){

      $connect = new connect();
  		$db = $connect->connect();
  		$get_membername = $db->query("SELECT * FROM member WHERE Mem_ID = '$id'");
  		while($membername = $get_membername->fetch_assoc()){
        $result = $membername['Mem_Tel'];
  		}
  		if(!empty($result)){

  			return $result;
  		}
  	}

    public function addRoom($roomname,$roomcapa,$roomtype,$building,$floor){
      $connect = new connect();
      $db = $connect->connect();
      $count = 0;
      $checkroom = $db->query("SELECT * FROM room WHERE Room_Name = '$roomname'");
      if ($get_room = $checkroom->fetch_assoc()){
        return false;
      }
      else {
        $add_room = $db->prepare("INSERT INTO room (Room_ID, Room_Name, Type_id, Building_id, Room_Capa , Floor , Count_chart) VALUES (NULL, ?, ?, ? ,? ,? ,?)");
        $add_room->bind_param("siiiii",$roomname, $roomtype, $building, $roomcapa, $floor, $count);
        if(!$add_room->execute()){
          return false;
        }else{
          return true;
        }
        }
      }

      public function addBuilding($buildingName,$buildingNum){
        $connect = new connect();
        $db = $connect->connect();
        $checkBuilding = $db->query("SELECT * FROM building WHERE Building_name = '$buildingName'");
        if ($get_room = $checkBuilding->fetch_assoc()){
          return false;
        }
        else {
          $add_Building = $db->prepare("INSERT INTO building (Building_id, Building_name, Max_Floor) VALUES (NULL, ?, ?)");
          $add_Building->bind_param("si",$buildingName, $buildingNum);
          if(!$add_Building->execute()){
            return false;
          }else{
            return true;
          }
          }
        }

      public function addroomType($roomtype){
        $connect = new connect();
        $db = $connect->connect();
        $checkroom = $db->query("SELECT * FROM roomtype WHERE Type_name = '$roomtype'");
        if ($get_room = $checkroom->fetch_assoc()){
          return false;
        }
        else {
          $add_roomType = $db->prepare("INSERT INTO roomtype (Type_id, Type_name) VALUES (NULL, ?)");
          $add_roomType->bind_param("s",$roomtype);
          if(!$add_roomType->execute()){
            return false;
          }else{
            return true;
          }
          }
        }

      public function allowRoom($reser_id){
        $connect = new connect();
        $db = $connect->connect();
        $status = "Cmpt";
        $day = date("Y-m-d");
        $checkroom = $db->query("SELECT * FROM reserve_data WHERE Reser_ID = '$reser_id'");
        if ($get_room = $checkroom->fetch_assoc()){
          $room = $get_room['Room_ID'];
          $get_count = $db->query("SELECT * FROM room WHERE Room_ID = '$room'");
          if ($get_count = $get_count->fetch_assoc()) {
            $count = $get_count['Count_chart']+1;
            $pulsCount = $db->prepare("UPDATE room SET Count_chart = ? WHERE Room_ID = ?");
            $pulsCount->bind_param("ii",$count, $room );
            if(!$pulsCount->execute()){
               return false;
             }else {
               $allow_room = $db->prepare("UPDATE reserve_data SET Reser_Satatus = ? WHERE Reser_ID = ?");
               $allow_room->bind_param("si",$status, $reser_id );
               if(!$allow_room->execute()){
                 return false;
               }else{
                 $add_cmpt = $db->prepare("INSERT INTO reserne_completed (ResCom_id, Reser_ID, Com_date) VALUES (NULL, ?, ?)");
                 $add_cmpt->bind_param("is",$reser_id,$day);
                 if(!$add_cmpt->execute()){
                   return false;
                 }else{
                   return true;
                 }
                 }
             }
          }else {
            return false;
          }
        }
        else {
        return false;
          }
        }

        public function denyRoom($reser_id){
          $connect = new connect();
          $db = $connect->connect();
          $status = "deny";
          $day = date("Y-m-d");
          $allow_room = $db->prepare("UPDATE reserve_data SET Reser_Satatus = ? WHERE Reser_ID = ?");
          $allow_room->bind_param("si",$status, $reser_id);
          if(!$allow_room->execute()){
            return false;
          }else{
            $add_cmpt = $db->prepare("INSERT INTO reserne_deny (ResDeny_id, Reser_ID, Deny_date) VALUES (NULL, ?, ?)");
            $add_cmpt->bind_param("is",$reser_id,$day);
            if(!$add_cmpt->execute()){
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

      public function editBuilding($buildingid,$buildingname,$Buildingfloor){
        $connect = new connect();
        $db = $connect->connect();
        $add_Building = $db->prepare("UPDATE building SET Building_name = ?, Max_Floor = ? WHERE Building_id = ?");
        $add_Building->bind_param("sii",$buildingname, $Buildingfloor,$buildingid);
        if(!$add_Building->execute()){
          return false;
        }else{
          return true;
          }
        }

        public function editRoom($roomid,$roomname,$roomcapa,$roomtype,$Building,$floor){
          $connect = new connect();
          $db = $connect->connect();
          $add_room = $db->prepare("UPDATE room SET Room_Name = ?, Type_id = ?, Building_id = ?, Room_Capa = ?, Floor = ? WHERE Room_ID = ?");
          $add_room->bind_param("siiiii",$roomname, $roomtype, $Building, $roomcapa, $floor, $roomid);
          if(!$add_room->execute()){
            return false;
          }else{
            return true;
            }
          }

        public function editroomTyperoom($roomTypeid,$roomtypeName){
          $connect = new connect();
          $db = $connect->connect();
          $add_roomType = $db->prepare("UPDATE roomtype SET Type_name = ? WHERE Type_id = ?");
          $add_roomType->bind_param("si",$roomtypeName, $roomTypeid);
          if(!$add_roomType->execute()){
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

      public function selectbuilding($buildingid){
        $connect = new connect();
      	$db = $connect->connect();
        $get_Building = $db->query("SELECT * FROM building WHERE Building_id = '$buildingid'");
        while($building= $get_Building->fetch_assoc()){
            $result[] = $building;
        }
    		if(!empty($result)){
    			return $result;
    		}else {
    			$result = "empty";
      		return $result;
    		}
    	}

      public function getFloor($buildingid){
        $connect = new connect();
        $db = $connect->connect();
        $get_floor = $db->query("SELECT * FROM building WHERE Building_id = '$buildingid'");
        while($floor = $get_floor->fetch_assoc()){
            $result = $floor['Max_Floor'];
        }
        if(!empty($result)){
          return $result;
        }else {
          $result = "empty";
          return $result;
        }
      }

      public function selectRoomType($roomtype_id){
        $connect = new connect();
        $db = $connect->connect();
        $get_roomType = $db->query("SELECT * FROM roomtype WHERE Type_id = '$roomtype_id'");
        while($roomType= $get_roomType->fetch_assoc()){
            $result = $roomType['Type_name'];
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

      public function getbuildingOption(){
        $connect = new connect();
        $db = $connect->connect();
        $get_buildingOption = $db->query("SELECT * FROM building ORDER BY Building_id ASC");
        while($building = $get_buildingOption->fetch_assoc()){
            $result[] = $building;
        }
        if(!empty($result)){
          return $result;
        }else {
          $result = "empty";
          return $result;
        }
      }

      public function getroomTypeOption(){
        $connect = new connect();
        $db = $connect->connect();
        $get_roomTypeOption = $db->query("SELECT * FROM roomtype ORDER BY Type_id ASC");
        while($room= $get_roomTypeOption->fetch_assoc()){
            $result[] = $room;
        }
        if(!empty($result)){
          return $result;
        }else {
          $result = "empty";
          return $result;
        }
      }

      public function getreserData(){
        $connect = new connect();
        $db = $connect->connect();
        $get_reserData = $db->query("SELECT * FROM reserve_data WHERE Reser_Satatus LIKE 'Wait' ORDER BY Reser_Date DESC");
        while($row = $get_reserData->fetch_assoc()) {
            $result[] = $row;
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
