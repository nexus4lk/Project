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

      <li><a class="active" href="#section1">Dash Board</a></li>
      <li><a href="#section2">Add Room</a></li>
      <li><a href="#section3">Edit Room</a></li>
      <li><a href="#section4">Remove Room</a></li>
    </ul>
  </div>

  <div style="margin-left:25%;" class="container">
    <li><a href="index.php">Home</a></li>
    <div id="section1">
      <h2>Reser Incomes</h2>
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
        <th>วันที่เริ่ม</th>
        <th>วันที่สิ้นสุด</th>
        <th>สถานะการจอง</th>
        <th>อนุมัติ</th>
        <th>ปฏิเสธ</th>
        </tr>
        </thead>";
           while($row = $get_reser->fetch_assoc()) {
             $mem = $row['Mem_ID'];
             $room = $row['Room_ID'];
             $get_member = $db->query("SELECT * FROM member WHERE Mem_ID = $mem  ");
             $get_room = $db->query("SELECT * FROM room WHERE Room_ID = $room  ");
             if ($memberName = $get_member->fetch_assoc() AND $roomName = $get_room->fetch_assoc()) {
                $reser_id = $row["Reser_ID"];
                 echo "
                 <tbody id='tbody'>
                 <tr>
                 <td>" . $row["Reser_ID"]. "</td>
                 <td>" . $row["Reser_Date"]. "</td>
                 <td>" . $memberName["Mem_Fname"] ." ".$memberName["Mem_Lname"]. "</td>
                 <td>" . $memberName["Mem_Tel"]. "</td>
                 <td>" . $roomName["Room_Name"]. "</td>
                 <td>" . $row["Title"]. "</td>
                 <td>" . $row["Reser_Startdate"]. "</td>
                 <td>" . $row["Reser_Enddate"]. "</td>
                 <td>" . $row["Reser_Satatus"]. "</td>
                 <td><input name='btnAdd' type='button' id='btnAdd' value='Add' onclick='allowFunction($reser_id)'></td>
                 <td><input name='btnAdd' type='button' id='btnAdd' value='Add' onclick='denyFunction($reser_id)'></td>
                </tr>
                </tbody>";
             }
           }
           echo "</table>";
      } else {
           echo "0 results";
      }
      $db->close();
      ?>
    </div>

    <div id="section2">

      <h2>Add Room</h2>
      <div class="col-md-10">
      <form class="contact-form" id="add-form" method="post">
        <div class="row">
          <div class="col-md-10">
            <div class="single_contact_info">
              <h3 class="form-heading" align="left">โปรดกรอกรายละเอียดของห้อง</h3>
            </div>
            <input type="text" class="form-control" name="roomname2" id="roomname2" placeholder="Roomname*" size="20">
            <input type="number" class="form-control" name="roomcapa2" id="roomcapa2" placeholder="Room Capacity* ตัวอย่าง 30 ที่นั่ง" size="20">
            <div class="single_contact_info">
            <h4 class="form-heading" align="left">Room Type</h4>
            <select class="btn btn-default dropdown-toggle" style="width: 150px;" name="roomtype2" id="roomtype2" >
            <option value="">       </option>
              <?php
              $connect = new connect();
              $db = $connect->connect();
              $get_type = $db->query("SELECT * FROM roomtype ORDER BY Type_id ASC");
              while($room = $get_type->fetch_assoc()){
              ?>
              <option value="<?php echo $room["Type_id"];?>"><?php echo $room["Type_id"]." - ".$room["Type_name"];?></option>
              <?php
            }
            ?>
            </select>
            </div>
          </div>
          <div class="col-md-12">
            <div id ="error2"></div>
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
              <h4 class="form-heading" align="left">Room</h4>
              <select class="btn btn-default dropdown-toggle" style="width: 150px;" name="roomid3" id="roomid3">
              <option value="">       </option>
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
            <input type="text" class="form-control" name="roomname3" id="roomname3" placeholder="Roomname*" size="20">
            <div class="single_contact_info">
              <input type="text" class="form-control" name="roomcapa3" id="roomcapa3" placeholder="Room Capacity* ตัวอย่าง 30 ที่นั่ง" size="20">
              <h4 class="form-heading" align="left">Room Type</h4>
              <select class="btn btn-default dropdown-toggle" style="width: 150px;" name="roomtype3" id="roomtype3" onchange="this.form.submit();">
              <option value="">       </option>
                <?php
                $connect = new connect();
                $db = $connect->connect();
                $get_type = $db->query("SELECT * FROM roomtype ORDER BY Type_id ASC");
                while($room = $get_type->fetch_assoc()){
                ?>
                <option value="<?php echo $room["Type_id"];?>"><?php echo $room["Type_id"]." - ".$room["Type_name"];?></option>
                <?php
              }
              ?>
              </select>
          </div>
          </div>
          <div class="col-md-12">
            <div class ="Edit_error"></div>
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
              <h4 class="form-heading" align="left">Room</h4>
              <select class="btn btn-default dropdown-toggle" style="width: 150px;" name="roomid4" id="roomid4">
              <option value="">       </option>
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
            <div class ="Edit_error"></div>
            <button type="submit" id="submit" class="btn btn-primary cs-btn">Remove</button>
          </div>
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
  <script type="text/javascript" src="js/addroom.js"></script>
  <script type="text/javascript" src="js/editroom.js"></script>
  <script type="text/javascript" src="js/removeRoom.js"></script>
  <script type="text/javascript" src="js/validation.min.js"></script>
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
<script>
  function allowFunction(reser_id) {
    var reser_id = reser_id;
    var allow = "allow"
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        reser_id: reser_id,
        allow: allow
      },
      success: function(response) {
        alert(response);
        getReser();
      }
    });
  }

  function denyFunction(reser_id) {
    var reser_id = reser_id;
    var deny = "deny";
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        reser_id: reser_id,
        deny: deny
      },
      success: function(response) {
        alert(response);
        getReser();
      }
    });
  }

  function getReser(){
    var getreser = "getreser";
    $.ajax({
      type: 'POST',
      url: 'room_manager.php',
      data: {
        getreser: getreser
      },
      success: function(response) {
        if (response != "empty") {
          console.log(response);
          $('#tbody').remove();
          var json_obj = jQuery.parseJSON(response);
          $.each(json_obj, function(key, value) {
            var Id = value.reserId;
            var reserDate = value.reserDate;
            var Name = value.Name;
            var Tel = value.tel;
            var roomName = value.roomName;
            var resertitle = value.resertitle;
            var reserStart = value.reserStart;
            var reserEnd = value.reserEnd;
            var reserStatus = value.reserStatus;
            var texttable = "<tr>"
            "<td>"+Id+"</td>"
            "<td>"+reserDate+"</td>"
            "<td>"+Name+"</td>"
            "<td>"+Tel+"</td>"
            "<td>"+roomName+"</td>"
            "<td>"+resertitle+"</td>"
            "<td>"+reserStart+"</td>"
            "<td>"+reserEnd+"</td>"
            "<td>"+reserStatus+"</td>"
            "<td><input name='btnAdd' type='button' id='btnAdd' value='Add' onclick='allowFunction("+Id+")'></td>"
            "<td><input name='btnAdd' type='button' id='btnAdd' value='Add' onclick='denyFunction("+Id+")'></td>"
            "</tr>";
            $("#tbody").append(texttable);
          });
        }else {
          $('#tbody').remove();
          var texttable = "<tr>"
          "<td>"+" "+"</td>"
          "<td>"+" "+"</td>"
          "<td>"+" "+"</td>"
          "<td>"+" "+"</td>"
          "<td>"+" "+"</td>"
          "<td>"+" "+"</td>"
          "<td>"+" "+"</td>"
          "<td>"+" "+"</td>"
          "<td>"+" "+"</td>"
          "<td><input name='btnAdd' type='button' id='btnAdd' value='Add' ></td>"
          "<td><input name='btnAdd' type='button' id='btnAdd' value='Add' ></td>"
          "</tr>";
          $("#tbody").append(texttable);
        }
      }
    });
  }
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
  </style>

</body>

</html>
