<?php
require "dbconfig.php";
$connect = new connect();
$db = $connect->connect();
$get_data = $db->query("SELECT Room_Name as name, Count_chart as y FROM `room` ");
while($data= $get_data->fetch_assoc()){
  $result[] = $data;
 }
	echo $json = json_encode( $result, JSON_NUMERIC_CHECK);
// $result = mysql_query("SELECT Room_Name, Count_chart FROM room");
// $rows = array();
// while($r = mysql_fetch_array($result)) {
// 	$row[0] = $r[0];
// 	$row[1] = $r[1];
// 	array_push($rows,$row);
// }
//
// print json_encode($rows, JSON_NUMERIC_CHECK);
//
// mysql_close($con);
?>
