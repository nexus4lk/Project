<?php
require "dbmember.php";
$member = new member();
$user_id = $_SESSION['user_session'];
if(!$member->is_loggedin())
{
 $member->redirect('login.php');
}else if($member->get_status($user_id) != "ADMIN"){
  $member->redirect('index.php');
}
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Project</title>
  <!-- Google Font -->
  <link href='http://fonts.googleapis.com/css?family=Dosis:300,400,500,600,700,800' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link rel='stylesheet' type='text/css' href='fullcalendar/fullcalendar.css' />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <!-- Preloader -->
  <link rel="stylesheet" href="css/preloader.css" type="text/css" media="screen, print" />
  <!-- Icon Font-->
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/owl.carousel.css">
  <link rel="stylesheet" href="css/owl.theme.default.css">
  <!-- Animate CSS-->
  <link rel="stylesheet" href="css/animate.css">
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Style -->
  <link href="css/style.css" rel="stylesheet">
  <!-- Responsive CSS -->
  <link href="css/responsive.css" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="js/lte-ie7.js"></script>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
  <div id="navbar">
    <ul class="nav" id="nav">
      <li><a onclick="window.location.href='index.php'">Home</a></li>
      <li><a class="active" href="#section1">Dash Board</a></li>
      <li><a href="#section2">Add Room</a></li>
      <li><a href="#section3">Edit Room</a></li>
      <li><a href="#section4">Remove Room</a></li>
      <li><a href="#section5">Add Room Type</a></li>
      <li><a href="#section6">Edit Room Type</a></li>
      <li><a href="#section7">Remove Room Type</a></li>
      <li><a href="#section8">Add Building</a></li>
      <li><a href="#section9">Edit Building</a></li>
      <li><a href="#section10">Remove Building</a></li>
      <li><a href="#section11">Room Image</a></li>
      <li><a href="#section12">Edit Image</a></li>
      <li><a href="#section13">Remove Image</a></li>
      <li><a href="#section14">The Chart</a></li>
    </ul>
  </div>

  <div style="margin-left:25%;" class="container">
    <div id="section1">
      <h2>รายการจองรอการอนุมัติ</h2>
      <?php
      // Check connection
      $connect = new connect();
      $db = $connect->connect();
      $get_reser = $db->query("SELECT * FROM reserve_data WHERE Reser_Satatus LIKE 'Wait' ORDER BY Reser_Date DESC");

      if ($get_reser->num_rows > 0) {
        echo "<table border='1' width='100%'   cellspacing=''  class='table-style-three' >
        <thead id='thead'>
        <tr>
        <th>ID</th>
        <th>วันที่จอง</th>
        <th>ชื่อ - นามสกุล</th>
        <th>เบอร์โทรศัพท์</th>
        <th>ห้อง</th>
        <th>เรื่อง</th>
        <th>ช่วงเวลา</th>
        <th>วันที่เริ่ม</th>
        <th>วันที่สิ้นสุด</th>
        <th>สถานะการจอง</th>
        <th>อนุมัติ</th>
        <th><b>ปฏิเสธ</b></th>
        </tr>
        </thead>
        <tbody id='tbody'>";
           while($row = $get_reser->fetch_assoc()) {
             $mem = $row['Mem_ID'];
             $room = $row['Room_ID'];
             $get_member = $db->query("SELECT * FROM member WHERE Mem_ID = $mem  ");
             $get_room = $db->query("SELECT * FROM room WHERE Room_ID = $room  ");
             if ($memberName = $get_member->fetch_assoc() AND $roomName = $get_room->fetch_assoc()) {
                $reser_id = $row["Reser_ID"];
                $reser_title = $row["Title"];
                switch ($row["Reser_Satatus"]) {
                  case "Wait":
                      $status = "<b>รอตรวจสอบ</b>";
                      break;
                  case "Proc":
                      $status = "<font    color='3754A3' ><b>อยู่ระหว่างดำเนินการ 3 - 4 วัน</b></font>";
                      break;
              		case "Cmpt":
              				$status = "<font    color='37A339' ><b>เสร็จสิ้นการดำเนินการ</b></font>";
              			  break;
              		case "deny":
              				$status = "<font    color='B20000' ><b>ปฏิเสธ</b></font>";
              				break;
                      }
                  switch ($row["Day_time"]) {
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
                 echo "
                 <tr>
                 <td>" . $row["Reser_ID"]. "</td>
                 <td>" . $row["Reser_Date"]. "</td>
                 <td>" . $memberName["Mem_Fname"] ." ".$memberName["Mem_Lname"]. "</td>
                 <td>" . $memberName["Mem_Tel"]. "</td>
                 <td>" . $roomName["Room_Name"]. "</td>
                 <td>" . $row["Title"]. "</td>
                 <td>" . $day_time. "</td>
                 <td>" . $row["Reser_Startdate"]. "</td>
                 <td>" . $row["Reser_Enddate"]. "</td>
                 <td>" . $status. "</td>
                 <td><input name='btnAdd' type='button' id='btnAdd' value='Allow' onclick='allowProcess($reser_id)'></td>
                 <td><input name='btnAdd' type='button' id='btnAdd' value='Remove' onclick='denyProcess($reser_id)'></td>
                </tr>
                ";
             }
           }
           echo "</tbody></table>";
      } else {
        echo "<table border='1' width='100%'   cellspacing=''  class='table-style-three' >
        <thead id='thead'>
        <tr>
        <th>ID</th>
        <th>วันที่จอง</th>
        <th>ชื่อ - นามสกุล</th>
        <th>เบอร์โทรศัพท์</th>
        <th>ห้อง</th>
        <th>เรื่อง</th>
        <th>ช่วงเวลา</th>
        <th>วันที่เริ่ม</th>
        <th>วันที่สิ้นสุด</th>
        <th>สถานะการจอง</th>
        <th>อนุมัติ</th>
        <th><b>ปฏิเสธ</b></th>
        </tr>
        </thead>
        <tbody id='tbody'>
        </tbody></table>";
      }
      $db->close();
      ?>
      <br>
      <br>
      <h2>รายการอยู่ในระหว่างดำเนินการ</h2>
      <?php
      // Check connection
      $connect = new connect();
      $db = $connect->connect();
      $get_reser = $db->query("SELECT * FROM reserve_data WHERE Reser_Satatus LIKE 'Proc' ORDER BY Reser_Date DESC");

      if ($get_reser->num_rows > 0) {
        echo "<table border='1' width='100%'   cellspacing=''  class='table-style-three' >
        <thead id='thead'>
        <tr>
        <th>ID</th>
        <th>วันที่จอง</th>
        <th>ชื่อ - นามสกุล</th>
        <th>เบอร์โทรศัพท์</th>
        <th>ห้อง</th>
        <th>เรื่อง</th>
        <th>ช่วงเวลา</th>
        <th>วันที่เริ่ม</th>
        <th>วันที่สิ้นสุด</th>
        <th>สถานะการจอง</th>
        <th>อนุมัติ</th>
        <th><b>ปฏิเสธ</b></th>
        <th>PDF</th>
        </tr>
        </thead>
        <tbody id='tbodyP'>";
           while($row = $get_reser->fetch_assoc()) {
             $mem = $row['Mem_ID'];
             $room = $row['Room_ID'];
             $get_member = $db->query("SELECT * FROM member WHERE Mem_ID = $mem  ");
             $get_room = $db->query("SELECT * FROM room WHERE Room_ID = $room  ");
             if ($memberName = $get_member->fetch_assoc() AND $roomName = $get_room->fetch_assoc()) {
                $reser_id = $row["Reser_ID"];
                switch ($row["Reser_Satatus"]) {
                  case "Wait":
                      $status = "<b>รอตรวจสอบ</b>";
                      break;
                  case "Proc":
                      $status = "<font     color='3754A3' ><b>อยู่ระหว่างดำเนินการ 3 - 4 วัน</b></font>";
                      break;
              		case "Cmpt":
              				$status = "<font     color='37A339' ><b>เสร็จสิ้นการดำเนินการ</b></font>";
              			  break;
              		case "deny":
              				$status = "<font     color='B20000' ><b>ปฏิเสธ</b></font>";
              				break;
                      }
                  switch ($row["Day_time"]) {
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
                 echo "
                 <tr>
                 <td>" . $row["Reser_ID"]. "</td>
                 <td>" . $row["Reser_Date"]. "</td>
                 <td>" . $memberName["Mem_Fname"] ." ".$memberName["Mem_Lname"]. "</td>
                 <td>" . $memberName["Mem_Tel"]. "</td>
                 <td>" . $roomName["Room_Name"]. "</td>
                 <td>" . $row["Title"]. "</td>
                 <td>" . $day_time. "</td>
                 <td>" . $row["Reser_Startdate"]. "</td>
                 <td>" . $row["Reser_Enddate"]. "</td>
                 <td>" . $status. "</td>
                 <td><input name='btnAdd' type='button' id='btnAdd' value='Complete' onclick='allowComplete($reser_id)'></td>
                 <td><input name='btnAdd' type='button' id='btnAdd' value='Remove' onclick='denyComplete($reser_id)'></td>
                 <td><a  onclick='reportePDF(".$reser_id.")' >พิมพ์เอกสาร PDF</a></td>
                </tr>
                ";
             }
           }
           echo "</tbody></table>";
      } else {
        echo "<table border='1' width='100%'   cellspacing=''  class='table-style-three' >
        <thead id='thead'>
        <tr>
        <th>ID</th>
        <th>วันที่จอง</th>
        <th>ชื่อ - นามสกุล</th>
        <th>เบอร์โทรศัพท์</th>
        <th>ห้อง</th>
        <th>เรื่อง</th>
        <th>ช่วงเวลา</th>
        <th>วันที่เริ่ม</th>
        <th>วันที่สิ้นสุด</th>
        <th>สถานะการจอง</th>
        <th>อนุมัติ</th>
        <th><b>ปฏิเสธ</b></th>
        <th>PDF</th>
        </tr>
        </thead>
        <tbody id='tbodyP'>
        </tbody></table>";
      }
      $db->close();
      ?>
      <br>
      <br>
      <h2>รายการจองเสร็จสิ้น</h2>
      <?php
      // Check connection
      $connect = new connect();
      $db = $connect->connect();
      $Current_date = date("Y-m-d");
      $get_reser = $db->query("SELECT * FROM reserve_data WHERE Reser_Startdate >= '$Current_date' AND Reser_Satatus LIKE 'Cmpt' ORDER BY Reser_Date DESC");

      if ($get_reser->num_rows > 0) {
        echo "<table border='1' width='100%'   cellspacing=''  class='table-style-three' >
        <thead id='thead'>
        <tr>
        <th>ID</th>
        <th>วันที่จอง</th>
        <th>ชื่อ - นามสกุล</th>
        <th>เบอร์โทรศัพท์</th>
        <th>ห้อง</th>
        <th>เรื่อง</th>
        <th>ช่วงเวลา</th>
        <th>วันที่เริ่ม</th>
        <th>วันที่สิ้นสุด</th>
        <th>สถานะการจอง</th>
        </tr>
        </thead>
        <tbody id='tbodyC'>";
           while($row = $get_reser->fetch_assoc()) {
             $mem = $row['Mem_ID'];
             $room = $row['Room_ID'];
             $get_member = $db->query("SELECT * FROM member WHERE Mem_ID = $mem  ");
             $get_room = $db->query("SELECT * FROM room WHERE Room_ID = $room  ");
             if ($memberName = $get_member->fetch_assoc() AND $roomName = $get_room->fetch_assoc()) {
                $reser_id = $row["Reser_ID"];
                switch ($row["Reser_Satatus"]) {
                  case "Wait":
                      $status = "<b>รอตรวจสอบ</b>";
                      break;
                  case "Proc":
                      $status = "<font    color='3754A3' ><b>อยู่ระหว่างดำเนินการ 3 - 4 วัน</b></font>";
                      break;
              		case "Cmpt":
              				$status = "<font    color='37A339' ><b>เสร็จสิ้นการดำเนินการ</b></font>";
              			  break;
              		case "deny":
              				$status = "<font    color='B20000' ><b>ปฏิเสธ</b></font>";
              				break;
                      }
                  switch ($row["Day_time"]) {
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
                 echo "
                 <tr>
                 <td>" . $row["Reser_ID"]. "</td>
                 <td>" . $row["Reser_Date"]. "</td>
                 <td>" . $memberName["Mem_Fname"] ." ".$memberName["Mem_Lname"]. "</td>
                 <td>" . $memberName["Mem_Tel"]. "</td>
                 <td>" . $roomName["Room_Name"]. "</td>
                 <td>" . $row["Title"]. "</td>
                 <td>" . $day_time. "</td>
                 <td>" . $row["Reser_Startdate"]. "</td>
                 <td>" . $row["Reser_Enddate"]. "</td>
                 <td>" . $status. "</td>
                </tr>
                ";
             }
           }
           echo "</tbody></table>";
      } else {
        echo "<table border='1' width='100%'   cellspacing=''  class='table-style-three' >
        <thead id='thead'>
        <tr>
        <th>ID</th>
        <th>วันที่จอง</th>
        <th>ชื่อ - นามสกุล</th>
        <th>เบอร์โทรศัพท์</th>
        <th>ห้อง</th>
        <th>เรื่อง</th>
        <th>ช่วงเวลา</th>
        <th>วันที่เริ่ม</th>
        <th>วันที่สิ้นสุด</th>
        <th>สถานะการจอง</th>
        </tr>
        </thead>
        <tbody id='tbodyC'>
        </tbody></table>";
      }
      $db->close();
      ?>
      <br>
      <br>
      <h2>รายการจองที่ถูกปฏิเสธ</h2>
      <?php
      // Check connection
      $connect = new connect();
      $db = $connect->connect();
      $Current_date = date("Y-m-d");
      $get_reser = $db->query("SELECT * FROM reserve_data WHERE Reser_Startdate >= '$Current_date' AND Reser_Satatus LIKE 'deny' ORDER BY Reser_Date DESC");
      if ($get_reser->num_rows > 0) {
        echo "<table border='1' width='100%'   cellspacing=''  class='table-style-three' >
        <thead id='thead'>
        <tr>
        <th>ID</th>
        <th>วันที่จอง</th>
        <th>ชื่อ - นามสกุล</th>
        <th>เบอร์โทรศัพท์</th>
        <th>ห้อง</th>
        <th>เรื่อง</th>
        <th>ช่วงเวลา</th>
        <th>วันที่เริ่ม</th>
        <th>วันที่สิ้นสุด</th>
        <th>สถานะการจอง</th>
        </tr>
        </thead>
        <tbody id='tbodyD'>";
           while($row = $get_reser->fetch_assoc()) {
             $mem = $row['Mem_ID'];
             $room = $row['Room_ID'];
             $get_member = $db->query("SELECT * FROM member WHERE Mem_ID = $mem  ");
             $get_room = $db->query("SELECT * FROM room WHERE Room_ID = $room  ");
             if ($memberName = $get_member->fetch_assoc() AND $roomName = $get_room->fetch_assoc()) {
                $reser_id = $row["Reser_ID"];
                switch ($row["Reser_Satatus"]) {
                  case "Wait":
                      $status = "<b>รอตรวจสอบ</b>";
                      break;
                  case "Proc":
                      $status = "<font    color='3754A3' ><b>อยู่ระหว่างดำเนินการ 3 - 4 วัน</b></font>";
                      break;
              		case "Cmpt":
              				$status = "<font    color='37A339' ><b>เสร็จสิ้นการดำเนินการ</b></font>";
              			  break;
              		case "deny":
              				$status = "<font    color='B20000' ><b>ปฏิเสธ</b></font>";
              				break;
                  }

                  switch ($row["Day_time"]) {
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
                 echo "
                 <tr>
                 <td>" . $row["Reser_ID"]. "</td>
                 <td>" . $row["Reser_Date"]. "</td>
                 <td>" . $memberName["Mem_Fname"] ." ".$memberName["Mem_Lname"]. "</td>
                 <td>" . $memberName["Mem_Tel"]. "</td>
                 <td>" . $roomName["Room_Name"]. "</td>
                 <td>" . $row["Title"]. "</td>
                 <td>" . $day_time. "</td>
                 <td>" . $row["Reser_Startdate"]. "</td>
                 <td>" . $row["Reser_Enddate"]. "</td>
                 <td>" . $status. "</td>
                </tr>
                ";
             }
           }
           echo "</tbody></table>";
      } else {
        echo "<table border='1' width='100%'   cellspacing=''  class='table-style-three' >
        <thead id='thead'>
        <tr>
        <th>ID</th>
        <th>วันที่จอง</th>
        <th>ชื่อ - นามสกุล</th>
        <th>เบอร์โทรศัพท์</th>
        <th>ห้อง</th>
        <th>เรื่อง</th>
        <th>ช่วงเวลา</th>
        <th>วันที่เริ่ม</th>
        <th>วันที่สิ้นสุด</th>
        <th>สถานะการจอง</th>
        </tr>
        </thead>
        <tbody id='tbodyD'>
        </tbody></table>";
      }
      $db->close();
      ?>

  <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
    </div>

    <div id="section2">

      <h2>Add Room</h2>
      <div class="col-md-10">
      <form class="contact-form" id="add-form" action="processupload.php" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-10">
            <div class="single_contact_info">
              <h3 class="form-heading" align="left">โปรดกรอกรายละเอียดของห้อง</h3>
            </div>
            <input type="text" class="form-control" name="roomname2" id="roomname2" placeholder="Roomname*" size="50">
            <input type="number" class="form-control" name="roomcapa2" id="roomcapa2" placeholder="Room Capacity* ตัวอย่าง 30 ที่นั่ง" size="3">
            <div class="single_contact_info">
              <h4 class="form-heading" align="left">ผู้รับผิดชอบห้อง</h4>
              <select class="btn btn-default dropdown-toggle" name="addforwhom" id="addforwhom">
                <option value="">กรุณาเลือกผู้รับ</option>
                <option value="หัวหน้าภาควิชาวิศวกรรมไฟฟ้า">หัวหน้าภาควิชาวิศวกรรมไฟฟ้า</option>
                <option value="หัวหน้าภาควิชาวิศวกรรมเครื่องกล">หัวหน้าภาควิชาวิศวกรรมเครื่องกล</option>
                <option value="หัวหน้าภาควิชาวิศวกรรมเคมี">หัวหน้าภาควิชาวิศวกรรมเคมี</option>
                <option value="หัวหน้าภาควิชาวิศวกรรมโยธา">หัวหน้าภาควิชาวิศวกรรมโยธา</option>
                <option value="หัวหน้าภาควิชาวิศวกรรมอุตสาหการ">หัวหน้าภาควิชาวิศวกรรมอุตสาหการ</option>
                <option value="หัวหน้าสาขาวิชาวิศวกรรมชีวการแพทย์">หัวหน้าสาขาวิชาวิศวกรรมชีวการแพทย์</option>
                <option value="หัวหน้าสาขาวิชาวิศวกรรมคอมพิวเตอร์">หัวหน้าสาขาวิชาวิศวกรรมคอมพิวเตอร์</option>
                <option value="หัวหน้าสาขาวิชาวิศวกรรมโลจิสติกส์">หัวหน้าสาขาวิชาวิศวกรรมโลจิสติกส์</option>
              </select>
              <br>
            <h4 class="form-heading" align="left">ประเภทห้อง</h4>
            <select class="btn btn-default dropdown-toggle" style="width: 150px;" name="roomtype2" id="roomtype2" >
            <option value="">กรุณาเลือกประเภทห้อง</option>
              <?php
              $connect = new connect();
              $db = $connect->connect();
              $get_type = $db->query("SELECT * FROM roomtype ORDER BY Type_id ASC");
              while($room = $get_type->fetch_assoc()){
              ?>
              <option value="<?php echo $room["Type_id"];?>"><?php echo $room["Type_name"];?></option>
              <?php
            }
            ?>
            </select>

            <h4 class="form-heading" align="left">อาคาร</h4>
            <select class="btn btn-default dropdown-toggle" style="width: 150px;" name="Building2" id="Building2">
            <option value="">กรุณาเลือกอาคาร</option>
              <?php
              $connect = new connect();
              $db = $connect->connect();
              $get_Building = $db->query("SELECT * FROM building ORDER BY Building_id ASC");
              while($Building = $get_Building->fetch_assoc()){
              ?>
                <option value="<?php echo $Building["Building_id"];?>"><?php echo $Building["Building_name"];?></option>
                <?php
              }
              ?>
              </select>
              <h4 class="form-heading" align="left">ชั้น</h4>
              <select class="btn btn-default dropdown-toggle" style="width: 150px;" name="floor2" id="floor2">
              <option value="">กรุณาเลือกชั้น</option>

                </select>
            </div>
            <div class="single_contact_info">

            </div>
            <!-- <input name="image_file" id="imageInput" type="file" />
            <div id="viewImage" align="center"></div> -->
            <br>
          </div>
          <div class="col-md-12">
            <button type="submit" id="submit" class="btn btn-primary cs-btn">Add</button>
          </div>
        </div>
      </form>
    </div>
    </div>


    <div id="section3">
      <h2>Edit Room</h2>
      <div class="col-md-10">
      <form class="contact-form" id="edit-form" method="post">
        <div class="row">
          <div class="col-md-10">
            <div class="single_contact_info">
              <h3 class="form-heading" align="left">โปรดกรอกรายละเอียดของห้อง</h3>
            </div>
            <div class="single_contact_info">
              <h4 class="form-heading" align="left">ห้อง</h4>
              <select class="btn btn-default dropdown-toggle" style="width: 150px;" name="roomid3" id="roomid3">
              <option value="">กรุณาเลือกห้อง</option>
                <?php
                $connect = new connect();
                $db = $connect->connect();
                $get_room = $db->query("SELECT * FROM room ORDER BY Room_id ASC");
                while($room = $get_room->fetch_assoc()){
                ?>
                  <option value="<?php echo $room["Room_ID"];?>"><?php echo $room["Room_Name"];?></option>
                  <?php
                }
                ?>
                </select>
            </div>
            <input type="text" class="form-control" name="roomname3" id="roomname3" placeholder="Roomname*" size="50">
            <div class="single_contact_info">
              <input type="text" class="form-control" name="roomcapa3" id="roomcapa3" placeholder="Room Capacity* ตัวอย่าง 30 ที่นั่ง" size="3">
              <h4 class="form-heading" align="left">ผู้รับผิดชอบห้อง</h4>
              <select class="btn btn-default dropdown-toggle" name="editforwhom" id="editforwhom">
                <option value="">กรุณาเลือกผู้รับ</option>
                <option value="หัวหน้าภาควิชาวิศวกรรมไฟฟ้า">หัวหน้าภาควิชาวิศวกรรมไฟฟ้า</option>
                <option value="หัวหน้าภาควิชาวิศวกรรมเครื่องกล">หัวหน้าภาควิชาวิศวกรรมเครื่องกล</option>
                <option value="หัวหน้าภาควิชาวิศวกรรมเคมี">หัวหน้าภาควิชาวิศวกรรมเคมี</option>
                <option value="หัวหน้าภาควิชาวิศวกรรมโยธา">หัวหน้าภาควิชาวิศวกรรมโยธา</option>
                <option value="หัวหน้าภาควิชาวิศวกรรมอุตสาหการ">หัวหน้าภาควิชาวิศวกรรมอุตสาหการ</option>
                <option value="หัวหน้าสาขาวิชาวิศวกรรมชีวการแพทย์">หัวหน้าสาขาวิชาวิศวกรรมชีวการแพทย์</option>
                <option value="หัวหน้าสาขาวิชาวิศวกรรมคอมพิวเตอร์">หัวหน้าสาขาวิชาวิศวกรรมคอมพิวเตอร์</option>
                <option value="หัวหน้าสาขาวิชาวิศวกรรมโลจิสติกส์">หัวหน้าสาขาวิชาวิศวกรรมโลจิสติกส์</option>
              </select>
              <h4 class="form-heading" align="left">ประเภทห้อง</h4>
              <select class="btn btn-default dropdown-toggle" style="width: 150px;" name="roomtype3" id="roomtype3">
                <option value="">กรุณาเลือกประเภทห้อง</option>
                <?php
                $connect = new connect();
                $db = $connect->connect();
                $get_type = $db->query("SELECT * FROM roomtype ORDER BY Type_id ASC");
                while($room = $get_type->fetch_assoc()){
                ?>
                <option value="<?php echo $room["Type_id"];?>"><?php echo $room["Type_name"];?></option>
                <?php
              }
              ?>
              </select>
              <h4 class="form-heading" align="left">อาคาร</h4>
              <select class="btn btn-default dropdown-toggle" style="width: 150px;" name="Building3" id="Building3">
                <option value="">กรุณาเลือกอาคาร</option>
                <?php
                $connect = new connect();
                $db = $connect->connect();
                $get_Building = $db->query("SELECT * FROM building ORDER BY Building_id ASC");
                while($Building = $get_Building->fetch_assoc()){
                ?>
                  <option value="<?php echo $Building["Building_id"];?>"><?php echo $Building["Building_name"];?></option>
                  <?php
                }
                ?>
                </select>
                <h4 class="form-heading" align="left">ชั้น</h4>
                <select class="btn btn-default dropdown-toggle" style="width: 150px;" name="floor3" id="floor3">
                  <option value="">กรุณาเลือกชั้น</option>

                  </select>

          </div>
          </div>
          <div class="col-md-12">
            <button type="submit" id="submitEdit" class="btn btn-primary cs-btn">Edit</button>
          </div>
        </div>
      </form>
    </div>
    </div>
    <div id="section4">
      <h2>Remove Room</h2>
      <div class="col-md-10">
      <form class="contact-form" id="remove-form" method="post" >
        <div class="row">
          <div class="col-md-10">
            <div class="single_contact_info">
              <h3 class="form-heading" align="left">โปรดเลือกห้องที่ต้องการ</h3>
            </div>
            <div class="single_contact_info">
              <h4 class="form-heading" align="left">ห้อง</h4>
              <select class="btn btn-default dropdown-toggle" style="width: 150px;" name="roomid4" id="roomid4">
              <option value="">กรุณาเลือกห้อง</option>
                <?php
                $connect = new connect();
                $db = $connect->connect();
                $get_room = $db->query("SELECT * FROM room ORDER BY Room_id ASC");
                while($room = $get_room->fetch_assoc()){
                ?>
                  <option value="<?php echo $room["Room_ID"];?>"><?php echo $room["Room_Name"];?></option>
                  <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" id="submit" class="btn btn-primary cs-btn">Remove</button>
          </div>
        </div>
      </form>
    </div>
    </div>

    <div id="section5">
      <h2>Add Room Type </h2>
      <div class="col-md-10">
      <form class="contact-form" id="roomType-form" method="post" >
        <div class="row">
          <div class="col-md-10">
            <div class="single_contact_info">
              <h3 class="form-heading" align="left">โปรดกรอกประเภทของห้องที่ต้องการ</h3>
            </div>
            <div class="single_contact_info">
              <h4 class="form-heading" align="left">ประเภทห้อง</h4>
              <input type="text" class="form-control" name="addroomtype" id="addroomtype" placeholder="ชนิดของห้อง* ตัวอย่าง ห้องปฏิบัติการ" size="50">

            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" id="submit" class="btn btn-primary cs-btn">Add Room Type</button>
          </div>
        </div>
      </form>
    </div>
    </div>

    <div id="section6">
      <h2>Edit Room Type </h2>
      <div class="col-md-10">
      <form class="contact-form" id="editroomtype-form" method="post">
        <div class="row">
          <div class="col-md-10">
            <div class="single_contact_info">
              <h3 class="form-heading" align="left">โปรดกรอกรายละเอียดประเภทของห้อง</h3>
            </div>
            <div class="single_contact_info">
              <h4 class="form-heading" align="left">ประเภทห้อง</h4>
              <select class="btn btn-default dropdown-toggle" style="width: 150px;" name="roomtype6" id="roomtype6">
              <option value="">กรูณาเลือกประเภทห้อง</option>
                <?php
                $connect = new connect();
                $db = $connect->connect();
                $get_type = $db->query("SELECT * FROM roomtype ORDER BY Type_id ASC");
                while($room = $get_type->fetch_assoc()){
                ?>
                  <option value="<?php echo $room["Type_id"];?>"><?php echo $room["Type_name"];?></option>
                  <?php
                }
                ?>
                </select>
            </div>
            <input type="text" class="form-control" name="editroomtype" id="editroomtype" placeholder="ประเภทของห้อง* ตัวอย่าง ห้องปฏิบัติการ" size="50">
          </div>
          <div class="col-md-12">
            <button type="submit" id="submitEdit" class="btn btn-primary cs-btn">Edit</button>
          </div>
        </div>
      </form>
    </div>
    </div>

    <div id="section7">
      <h2>Remove Room Type</h2>
      <div class="col-md-10">
      <form class="contact-form" id="removeRT-form" method="post" >
        <div class="row">
          <div class="col-md-10">
            <div class="single_contact_info">
              <h3 class="form-heading" align="left">โปรดเลือกประเภทห้องที่ต้องการ</h3>
            </div>
            <div class="single_contact_info">
              <h4 class="form-heading" align="left">ประเภทห้อง</h4>
              <select class="btn btn-default dropdown-toggle" style="width: 150px;" name="roomtype7" id="roomtype7">
              <option value="">กรูณาเลือกประเภทห้อง</option>
                <?php
                $connect = new connect();
                $db = $connect->connect();
                $get_type = $db->query("SELECT * FROM roomtype ORDER BY Type_id ASC");
                while($room = $get_type->fetch_assoc()){
                ?>
                  <option value="<?php echo $room["Type_id"];?>"><?php echo $room["Type_name"];?></option>
                  <?php
                }
                ?>
                </select>
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" id="submit" class="btn btn-primary cs-btn">Remove</button>
          </div>
        </div>
      </form>
    </div>
    </div>

    <div id="section8">
      <h2>Add Building</h2>
      <div class="col-md-10">
      <form class="contact-form" id="Building-form" method="post" >
        <div class="row">
          <div class="col-md-10">
            <div class="single_contact_info">
              <h3 class="form-heading" align="left">กรอกรายละเอียดอาคารที่ต้องการ</h3>
            </div>
            <div class="single_contact_info">
              <h4 class="form-heading" align="left">ชื่ออาคาร</h4>
              <input type="text" class="form-control" name="buildingName" id="buildingName" placeholder="ชื่ออาคาร* ตัวอย่าง อาคารวิศวกรรมศาสตร์" size="50">
              <input type="number" class="form-control" name="buildingNum" id="buildingNum" placeholder="จำนวนชั้น* ตัวอย่าง 8 ชั้น" size="2">

            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" id="submit" class="btn btn-primary cs-btn">Add Building</button>
          </div>
        </div>
      </form>
    </div>
    </div>

    <div id="section9">
      <h2>Edit Building </h2>
      <div class="col-md-10">
      <form class="contact-form" id="editBuilding-form" method="post">
        <div class="row">
          <div class="col-md-10">
            <div class="single_contact_info">
              <h3 class="form-heading" align="left">โปรดกรอกรายละเอียดอาคาร</h3>
            </div>
            <div class="single_contact_info">
              <h4 class="form-heading" align="left">อาคาร</h4>
              <select class="btn btn-default dropdown-toggle" style="width: 150px;" name="Building9" id="Building9">
                <option value="">กรูณาเลือกอาคาร</option>
                <?php
                $connect = new connect();
                $db = $connect->connect();
                $get_Building = $db->query("SELECT * FROM building ORDER BY Building_id ASC");
                while($Building = $get_Building->fetch_assoc()){
                ?>
                  <option value="<?php echo $Building["Building_id"];?>"><?php echo $Building["Building_name"];?></option>
                  <?php
                }
                ?>
                </select>
            </div>
            <input type="text" class="form-control" name="editbuilding" id="editbuilding" placeholder="ชื่ออาคาร* ตัวอย่าง อาคารวิศวกรรมศาสตร" size="50">
            <input type="number" class="form-control" name="editMax_floor" id="editMax_floor" placeholder="จำนวนชั้น* ตัวอย่าง 8 ชั้น" size="2">
          </div>
          <div class="col-md-12">
            <button type="submit" id="submitEdit" class="btn btn-primary cs-btn">Edit</button>
          </div>
        </div>
      </form>
    </div>
    </div>

    <div id="section10">
      <h2>Remove Building</h2>
      <div class="col-md-10">
      <form class="contact-form" id="removeBuilding-form" method="post" >
        <div class="row">
          <div class="col-md-10">
            <div class="single_contact_info">
              <h3 class="form-heading" align="left">โปรดเลือกอาคารที่ต้องการ</h3>
            </div>
            <div class="single_contact_info">
              <h4 class="form-heading" align="left">อาคาร</h4>
              <select class="btn btn-default dropdown-toggle" style="width: 150px;" name="Building10" id="Building10">
                <option value="">กรูณาเลือกอาคาร</option>
                <?php
                $connect = new connect();
                $db = $connect->connect();
                $get_Building = $db->query("SELECT * FROM building ORDER BY Building_id ASC");
                while($Building = $get_Building->fetch_assoc()){
                ?>
                  <option value="<?php echo $Building["Building_id"];?>"><?php echo $Building["Building_name"];?></option>
                  <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" id="submit" class="btn btn-primary cs-btn">Remove</button>
          </div>
        </div>
      </form>
    </div>
    </div>

    <div id="section11">
      <h2>Image Upload</h2>
      <div class="col-md-10">
      <form class="contact-form" id="upload-form" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-10">
            <div class="single_contact_info">
              <h3 class="form-heading" align="left">อัพโหลดรูปภาพ</h3>
            </div>
            <h4 class="form-heading" align="left">ห้อง</h4>
            <select class="btn btn-default dropdown-toggle" style="width: 150px;" name="roomid11" id="roomid11">
            <option value="">กรุณาเลือกห้อง</option>
              <?php
              $connect = new connect();
              $db = $connect->connect();
              $get_room = $db->query("SELECT * FROM room ORDER BY Room_id ASC");
              while($room = $get_room->fetch_assoc()){
              ?>
                <option value="<?php echo $room["Room_ID"];?>"><?php echo $room["Room_Name"];?></option>
                <?php
              }
              ?>
            </select>
            <br>
            <br>
            <h4 class="form-heading" align="left">อัพโหลด</h4>
            <div class="single_contact_info">
              <input type="file" name="fileToUpload" id="fileToUpload">
              <div id="preview"></div>
            </div>
          </div>
          <div class="col-md-12">
            <input type="submit" id="uploadImg" class="btn btn-primary cs-btn" value="Upload Image" name="uploadImg">
          </div>
        </div>
      </form>


    </div>
    </div>
    <div id="section12">
      <h2>Edit Image</h2>
      <div class="col-md-10">
      <form class="contact-form" id="editImg-form" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-10">
            <div class="single_contact_info">
              <h3 class="form-heading" align="left">แก้ไขรูปภาพ</h3>
            </div>
            <h4 class="form-heading" align="left">รูปภาพ</h4>
            <select class="btn btn-default dropdown-toggle" style="width: 150px;" name="Imgid12" id="Imgid12">
            <option value="">กรุณาเลือกรูปภาพ</option>
              <?php
              $connect = new connect();
              $db = $connect->connect();
              $get_room = $db->query("SELECT * FROM images ORDER BY img_Id ASC");
              while($room = $get_room->fetch_assoc()){
              ?>
                <option value="<?php echo $room["img_Id"];?>"><?php echo $room["img_name"];?></option>
                <?php
              }
              ?>
            </select>
            <br>
            <div class="single_contact_info">
              <div id="editPreview"></div>
            </div>
            <h4 class="form-heading" align="left">ห้อง</h4>
            <select class="btn btn-default dropdown-toggle" style="width: 150px;" name="roomid12" id="roomid12">
            <option value="">กรุณาเลือกห้อง</option>
              <?php
              $connect = new connect();
              $db = $connect->connect();
              $get_room = $db->query("SELECT * FROM room ORDER BY Room_id ASC");
              while($room = $get_room->fetch_assoc()){
              ?>
                <option value="<?php echo $room["Room_ID"];?>"><?php echo $room["Room_Name"];?></option>
                <?php
              }
              ?>
              </select>
              <br>
              <br>
          </div>
          <div class="col-md-12">
            <input type="submit" id="uploadImg" class="btn btn-primary cs-btn" value="Edit Image" name="uploadImg">
          </div>
        </div>
      </form>


    </div>
    </div>
    <div id="section13">
      <h2>Remove Image</h2>
      <div class="col-md-10">
      <form class="contact-form" id="RemoveImg-form" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-10">
            <div class="single_contact_info">
              <h3 class="form-heading" align="left">ลบรูปภาพ</h3>
            </div>
            <h4 class="form-heading" align="left">รูปภาพ</h4>
            <select class="btn btn-default dropdown-toggle" style="width: 150px;" name="Imgid13" id="Imgid13">
              <option value="">กรุณาเลือกรูปภาพ</option>
              <?php
              $connect = new connect();
              $db = $connect->connect();
              $get_room = $db->query("SELECT * FROM images ORDER BY img_Id ASC");
              while($room = $get_room->fetch_assoc()){
              ?>
                <option value="<?php echo $room["img_Id"];?>"><?php echo $room["img_name"];?></option>
                <?php
              }
              ?>
            </select>
            <br>
            <div id="removeImg"></div>
              <br>
          </div>
          <div class="col-md-12">
            <input type="submit" id="deleteImg" class="btn btn-primary cs-btn" value="Remove Image" name="deleteImg">
          </div>
        </div>
      </form>


    </div>
    </div>

    <div id="section14">
      <h2>สถิติการเข้าใช้ห้อง</h2>
      <div class="col-md-10">
        <div id="chartsContainer" style="min-width: 1200px; height: 550px; margin: 0 auto"></div>

    </div>
    </div>



  </div>
  <div id="PDF_Modal" class="modal ">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <h3 id="PDFTitle">เอกสาร</h3>
      </div>
      <div class="modal-body">
        <form id="PDF-form">
          <div class="form-group">
          </div>
          <label>ส่วนราชการ :</label>
          <input type="text" class="form-control" name="txt1" placeholder="" id="txt1">
          <br>
          <label>ที่ :</label>
          <input type="text" class="form-control" name="txt2" placeholder="" id="txt2">
          <br>
          <div class ="reser_error"></div>
          <div class="modal-footer">
            <br>
            <button type="submit" id= "PDF-submit" class="btn btn-primary" >พิมพ์ PDF</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- =========================
     SCRIPTS
============================== -->

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.nicescroll.js"></script>
  <script src="js/owl.carousel.js"></script>
  <script src="js/wow.js"></script>
  <script src="js/script.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script type="text/javascript" src="js/addroom.js"></script>
  <script type="text/javascript" src="js/addroomType.js"></script>
  <script type="text/javascript" src="js/addBuilding.js"></script>
  <script type="text/javascript" src="js/editroom.js"></script>
  <script type="text/javascript" src="js/editroomtype.js"></script>
  <script type="text/javascript" src="js/editBuilding.js"></script>
  <script type="text/javascript" src="js/editImage.js"></script>
  <script type="text/javascript" src="js/removeRoom.js"></script>
  <script type="text/javascript" src="js/AddImage.js"></script>
  <script type="text/javascript" src="js/validation.min.js"></script>
  <script type="text/javascript" src="js/admin.js"></script>
  <script type="text/javascript" src="js/removeImage.js"></script>
  <script type="text/javascript" src="js/removeRoomType.js"></script>
  <script type="text/javascript" src="js/removeBuilding.js"></script>
  <script type="text/javascript" src="js/reportePDF.js"></script>
  <script>

		$(function () {

			$.getJSON("data.php",function(data){

				seriesData = data;
        console.log(data);

					// $('#chartsContainer').highcharts({
					// 		chart: {
					// 			plotBackgroundColor: null,
					// 			plotBorderWidth: null,
					// 			plotShadow: false,
					// 			type: 'column'
					// 		},
					// 		title: {
					// 			text: 'จำนวนครั้งในการเข้าใช้ประจำปี'
					// 		},
					// 		tooltip: {
          //       headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
					// 			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
					// 		},
					// 		plotOptions: {
					// 			pie: {
					// 				allowPointSelect: true,
					// 				cursor: 'pointer',
					// 				dataLabels: {
					// 					enabled: true,
					// 					//format: '<b>{point.name}</b>: {point.percentage:.1f} %',
					// 					format: '<b>{point.name}</b>: {point.y} ครั้ง',
					// 					style: {
					// 						color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
					// 					}
					// 				}
					// 			}
					// 		},
					// 		series: [{
					// 			name: 'จำนวน',
					// 			colorByPoint: true,
					// 			data: seriesData
          //
					// 		}]
					// 	});
    $('#chartsContainer').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'จำนวนครั้งในการเข้าใช้ห้องแต่ละห้อง'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'จำนวนครั้งในการเข้าใช้ห้อง'
            }
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y} ครั้ง'
                }
            }
        },

        tooltip: {
            headerFormat: '',
            // pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
            pointFormat: '{point.name}: <b>{point.y} ครั้ง</b>'
        },

        series: [{
            name: 'ห้อง',
            colorByPoint: true,
            	data: seriesData
        }]

    });
			});

		});
	</script>
  <script>
    $('.container > div').hide();
    $(".container #section1").show();
    $('#nav li a').click(function(e) {
      $('.container > div').hide();
      $(this.hash).show();
      e.preventDefault(); //to prevent scrolling
    });
    $(".nav a").on("click", function() {
      $('#nav li').find(".active").removeClass("active");
      $(this).addClass("active");
    });
</script>

  <style>
table, th, td {
     border: 1px solid black;
    text-align: center;
}
  <style>
    body {
      margin: 0;
    }

    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      width: 20%;
      background-color: #f1f1f1;
      height: 100%;
      /* Full height */
      position: fixed;
      /* Make it stick, even on scroll */
      overflow: auto;
      /* Enable scrolling if the sidenav has too much content */
    }

    li a {
      display: block;
      color: #000;
      padding: 8px 0 8px 16px;
      text-decoration: none;
    }

    li a.active {
      background-color: #4CAF50;
      color: white;
    }

    li a:hover:not(.active) {
      background-color: #555;
      color: white;
    }

    table.table-style-three {
  width: 100%;
  /*font-family: verdana, arial, sans-serif;
  font-size: 11px;*/
  color: #333333;
  border-width: 1px;
  border-color: #3A3A3A;
  border-collapse: collapse;
}
table.table-style-three th {
  border: 1px solid black;
  padding: 5px;
  border-style: solid;
  border-color: #000000;
  background-color: #4CAF50;
  color: #FFFFFF;
}
table.table-style-three tr:hover td {
  cursor: pointer;
}
table.table-style-three tr:nth-child(even) td{
  background-color: #f1f1f1;
}
table.table-style-three td {
  border-width: 1px;
  padding: 8px;
  border-style: solid;
  border-color: #000000;
  background-color: #ffffff;
}
#preview img {
    max-height: 300px;
    max-width: 300px;
}

  </style>

</body>

</html>
