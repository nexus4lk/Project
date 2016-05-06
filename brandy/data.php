<?php
require "dbconfig.php";
$connect = new connect();
$db = $connect->connect();
$count = 0;
$firstday = date('Y-m-d',strtotime(date('Y-01-01')));
$lastday = date('Y-m-d',strtotime(date('Y-12-31')));
$date = date("Y-m-d");

function DateDiff($strDate1,$strDate2)
	 {
				return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );
	 }$get_data = $db->query("SELECT * FROM `room` ");

while($data= $get_data->fetch_assoc()){
  $room = $data['Room_ID'];
  $get_FQ = $db->query("SELECT * FROM `reserve_data` WHERE `Room_ID` = '$room' AND `Reser_Startdate` BETWEEN '$firstday' AND '$lastday' AND `Reser_Startdate` >= '$date' ORDER BY `Reser_Date` DESC");
  while($FQ = $get_FQ->fetch_assoc()){
    $difday = 0;
    $Reser_Startdate = $FQ['Reser_Startdate'];
    $Reser_Enddate = $FQ['Reser_Enddate'];
    $difday = DateDiff("$Reser_Startdate","$Reser_Enddate");
    $difday = $difday +1;
    $count = $count + $difday;
}
$result[] = array(
  'name'=>$data['Room_Name'],
  'y'=>$count
);
$count = 0;
 }
	echo $json = json_encode( $result, JSON_NUMERIC_CHECK);
  $db->close();
?>
