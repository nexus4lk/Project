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
        echo $db->error;
      }else{
        echo "บันทึกข้อมูลเรียบร้อย";
      }
    }
}//end class
?>
