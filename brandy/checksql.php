<?php

session_start();
include("connect.php");

///////////////////////////////////////// LOGIN //////////////////////////////////////////////////////////////
if ($_POST['type']=="signin") {
///////////////////////////////////////// LOGIN  PARAMETERS //////////////////////////////////////////////////
	$str_LoginUsername=mysqli_real_escape_string($link,$_POST['username']);
	$str_LoginPassword=md5(mysqli_real_escape_string($link,$_POST['password']));
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql="SELECT count(*) FROM member WHERE Username = '$str_LoginUsername'";
	$result=mysqli_query($link,$sql);
	$row = mysqli_fetch_row($result);
	if ($row[0] == 1) // ถ้าจำนวนแถวเท่ากับ 1 แสดงว่ามีข้อมูลของผู้ใช้งานที่ตรงกับที่ login
	{
		$sql="SELECT count(*) FROM member WHERE Username = '$str_LoginUsername' AND Password = '$str_LoginPassword'";
		$result=mysqli_query($link,$sql);
		$row = mysqli_fetch_row($result);
		if ($row[0] == 1)	// ถ้าจำนวนแถวเท่ากับ 1 แสดงว่ามีข้อมูลของผู้ใช้งานที่ตรงกับที่ login
		{
			echo "ok";
			$_SESSION['username'] = $str_LoginUsername;
		}
		else	// กรณีที่จำนวนแถวไม่เท่ากับ 1 คือ ไม่มี password ที่ตรงกับที่ login
		{
			echo "failp";
		}
	}else	// กรณีที่จำนวนแถวไม่เท่ากับ 1 คือ ไม่มี username ที่ตรงกับที่ login
	{
		echo "failu";
	}
	mysqli_close($link);
}

///////////////////////////////////////// REGISTER //////////////////////////////////////////////////
if ($_POST['type'] == "signup")
{
	$str_Username=mysqli_real_escape_string($link,$_POST['reusername']);
	$str_Password=md5(mysqli_real_escape_string($link,$_POST['repassword']));
	$str_ConPassword=md5(mysqli_real_escape_string($link,$_POST['reconpassword']));
	$str_Fname=mysqli_real_escape_string($link,$_POST['refname']);
	$str_Lname=mysqli_real_escape_string($link,$_POST['relname']);
	$str_Email=mysqli_real_escape_string($link,$_POST['reemail']);
	$str_Tel=mysqli_real_escape_string($link,$_POST['retel']);
	$sql="SELECT count(*) FROM member WHERE Username = '$str_Username'";
	$result=mysqli_query($link,$sql);
	$row = mysqli_fetch_row($result);
	if ($row[0] == 1) {
		echo "failu";
	}
	else {
		$query = mysqli_query($link, "INSERT INTO member (Mem_Fname, Mem_Lname, Mem_Tel, Mem_Email , Username, Password, Acc_Permission)VALUES ('$str_Fname', '$str_Lname', '$str_Tel', '$str_Email', '$str_Username', '$str_Password', 'USER')");
		echo "ok";
	}
	mysqli_close($link);
}

if ($_POST['type'] == "addroom")
{
	$str_Roomname=mysqli_real_escape_string($link,$_POST['roomname']);
	$str_Roomcapa=mysqli_real_escape_string($link,$_POST['roomcapa']);
	$str_Roomtype=mysqli_real_escape_string($link,$_POST['roomtype']);
	$sql="SELECT count(*) FROM room WHERE Room_Name = '$str_Roomname'";
	$result=mysqli_query($link,$sql);
	$row = mysqli_fetch_row($result);
	if ($row[0] == 1) {
		echo "failname"; //ห้องซ้ำ
	}
	else {
		$query = mysqli_query($link, "INSERT INTO room (Room_Name, Type_id, Room_Capa)VALUES ('$str_Roomname', '$str_Roomtype', '$str_Roomcapa')");
		echo "ok";
	}
	mysqli_close($link);
}

if ($_POST['type'] == "selectroom")
{
	$str_roomid=mysqli_real_escape_string($link,$_POST['roomid']);
	$sql="SELECT * FROM room WHERE Room_ID = '$str_roomid'";
	$result=mysqli_query($link,$sql);
	$events = array();
	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$room = array();
		$room['RName'] = $row['Room_Name'];
		$room['RType'] = $row['Type_id'];
		$room['RCapa'] = $row['Room_Capa'];

		array_push($events, $room);
	}
	echo json_encode($events);
	mysqli_close($link);
}

if ($_POST['type'] == "editroom")
{
	$str_Roomname=mysqli_real_escape_string($link,$_POST['Eroomname']);
	$str_Roomcapa=mysqli_real_escape_string($link,$_POST['Eroomcapa']);
	$str_Roomtype=mysqli_real_escape_string($link,$_POST['Eroomtype']);
	$str_roomid=mysqli_real_escape_string($link,$_POST['roomid']);
	$sql = "update room set Room_Name = '$str_Roomname', Type_id = '$str_Roomtype', Room_Capa = '$str_Roomcapa' where Room_ID = '$str_roomid'";
	$query = mysqli_query($link,$sql);
	if($query) {
	 	echo "ok";
		mysqli_close($link);
	}
	else
	{
		echo "ไม่สามารถแก้ไขข้อมูลในฐานข้อมูลได";
	}

}
?>
