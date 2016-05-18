<?php
require "dbmember.php";
$member = new member();
if(!$member->is_loggedin())
{
 $member->redirect('login.php');
}else {
  $memid = $_SESSION['user_session'];
  $username = $member->get_username($memid);
  $status = $member->get_status($_SESSION['user_session']);
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
    <link href='fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
     <!-- Preloader -->
    <link rel="stylesheet" href="css/preloader.css" type="text/css" media="screen, print"/>
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
                <!-- Preloader -->
                <!-- <div id="preloader">
                    <div id="status">&nbsp;</div>
                </div> -->




    <header id="HOME" style="background-position: 50% -125px;">
	        <div class="section_overlay">
	            <nav class="navbar navbar-default navbar-fixed-top">
	              <div class="container">
	                <!-- <div class="navbar-header">
	                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                  </button>
	                  <a class="navbar-brand" href="#"><img src="images/logo.png" alt=""></a>
	                </div> -->

	                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	                  <ul class="nav navbar-nav navbar-right">
	                    <!-- <li><a href="#HOME">Home</a></li>
	                    <li><a href="#SERVICE">Services</a></li>
	                    <li><a href="#ABOUT">About</a></li> -->
                      <li>
                      <a
                      <?php
                      if($status == "ADMIN"){
                        print('href="admin.php"');
                      }
                      ?>
                      >
                      <?php print($username); ?></a></li>
	                    <li><button type="button" id="logout" value='<?php print($memid); ?>' onclick="window.location.href='logout.php?logout=true'" class="btn btn-default navbar-btn">LOGOUT</button></li>
	                  </ul>
	                </div>
	              </div>
	            </nav>

	            <div class="container">
	                <div class="row">
	                    <div class="col-md-12 text-center">
	                        <div class="home_text wow fadeInUp animated">
                              <h2>Welcome to Srinakharinwirot University's Room service</h2>
                              <p>"<?php print(" ".date("d-m-Y")." "); ?>"</p>
	                            <!-- <img src="images/shape.png" alt=""> -->
	                        </div>
	                    </div>
	                </div>
	            </div>

	            <!-- <div class="container">
	                <div class="row">
	                    <div class="col-md-12 text-center">
	                        <div class="scroll_down">
                            <a href="#SERVICE"><img src="images/scroll.png" alt=""></a>
	                            <h4>Scroll Down</h4>
	                        </div>
	                    </div>
	                </div>
	            </div> -->
	        </div>
	    </section>
    </header>


    <section class="services" id="SERVICE">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="single_service wow fadeInUp" data-wow-delay="1s">
                        <i class="icon-calendar"></i>
                        <h2>เลือกวัน</h2>
                        <h4>เลือกวัน และ คลิกที่วันที่ต้องการจอง เพื่อกรอกข้อมูล</h4>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="single_service wow fadeInUp" data-wow-delay="2s">
                        <i class="icon-document"></i>
                        <h2>กรอกข้อมูล</h2>
                        <h4>กรอกข้อมูลเพื่อทำการจองห้อง</h4>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="single_service wow fadeInUp" data-wow-delay="3s">
                        <i class="icon-ribbon"></i>
                        <h2>เสร็จสิ้น</h2>
                        <h4>เสร็จสิ้นกระบวนการจอง กรุณารอ 3 - 4 วันเพื่อรับผลการจอง</h4>
                    </div>
                </div>
                <!-- <div class="col-md-3 text-center">
                    <div class="single_service wow fadeInUp" data-wow-delay="4s">
                        <i class="icon-magnifying-glass"></i>
                        <h2>Seo</h2>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa.</p>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <section class="calendar_area" id="ABOUT">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="about_title">
                        <h2>Calendar</h2>
                        <br>
                        <p>"เลือกห้องเพื่อดูปฏิทิน"</p>
                        <select class="btn btn-default dropdown-toggle" name="roomid" id="roomid">
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
                          <a onclick='roomModal()'>กดเพื่อดูลายระเอียดห้อง</a>
                          <br>
                            <br>
                          <font size="5"  color="#ff4444" >*ห้องควรจองถัดจากวันปัจจุบัน 3 - 4 วันเพื่อเว้นระยะการดำเนินเรื่อง</font>
                        <div class="wow fadeInLeft animated" id='calendar'></div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <?php
                        // Check connection

                        $connect = new connect();
                        $db = $connect->connect();
                        $Current_date = date("Y-m-d");
                        $get_reser = $db->query("SELECT * FROM reserve_data WHERE Reser_Startdate >= '$Current_date' AND Mem_ID = '$memid' ORDER BY Reser_Date DESC");
                        if ($get_reser->num_rows > 0) {
                          echo "<table border='1' width='100%'   cellspacing=''  class='table-style-three' >
                          <thead id='thead'>
                          <tr>
                          <th>วันที่จอง</th>
                          <th>ชื่อ - นามสกุล</th>
                          <th>ห้อง</th>
                          <th>เรื่อง</th>
                          <th>ช่วงเวลา</th>
                          <th>วันที่เริ่ม</th>
                          <th>วันที่สิ้นสุด</th>
                          <th>สถานะการจอง</th>
                          <th>แก้ไขข้อมูล</th>
                          <th>ลบข้อมูล</th>
                          </tr>
                          </thead>
                          <tbody id='tbody'>"
                          ;
                             while($row = $get_reser->fetch_assoc()) {
                               $mem = $row['Mem_ID'];
                               $room = $row['Room_ID'];
                               $get_member = $db->query("SELECT * FROM member WHERE Mem_ID = $mem  ");
                               $get_room = $db->query("SELECT * FROM room WHERE Room_ID = $room  ");
                               if ($memberName = $get_member->fetch_assoc() AND $roomName = $get_room->fetch_assoc()) {
                                  $reser_id = $row["Reser_ID"];
                                  $Reser_Startdate = $row["Reser_Startdate"];
                                  $Reser_Enddate = $row["Reser_Enddate"];
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
                                   <td>" . $row["Reser_Date"]. "</td>
                                   <td>" . $memberName["Mem_Fname"] ." ".$memberName["Mem_Lname"]. "</td>
                                   <td>" . $roomName["Room_Name"]. "</td>
                                   <td>" . $row["Title"]. "</td>
                                   <td>" . $day_time. "</td>
                                   <td>" . $row["Reser_Startdate"]. "</td>
                                   <td>" . $row["Reser_Enddate"]. "</td>
                                   <td>" . $status. "</td>
                                   <td><input name='btnAdd' type='button' id='btnAdd' value='แก้ไข' onclick='userEdit($reser_id,$room,$mem)'></td>
                                   <td><input name='btnAdd' type='button' id='btnAdd' value='ลบ' onclick='userDeny($reser_id,$room,$mem)'></td>
                                  </tr>
                                  ";
                               }
                             }
                             echo "</tbody></table>";
                        } else {
                          echo "<table border='1' width='100%'   cellspacing=''  class='table-style-three' >
                          <thead id='thead'>
                          <tr>
                          <th>วันที่จอง</th>
                          <th>ชื่อ - นามสกุล</th>
                          <th>ห้อง</th>
                          <th>เรื่อง</th>
                          <th>ช่วงเวลา</th>
                          <th>วันที่เริ่ม</th>
                          <th>วันที่สิ้นสุด</th>
                          <th>สถานะการจอง</th>
                          <th>แก้ไขข้อมูล</th>
                          <th>ลบข้อมูล</th>
                          </tr>
                          </thead>
                          <tbody id='tbody'>
                          </tbody></table>"
                          ;
                        }
                        $db->close();
                        ?>

                    </div>
                    <br>
                      <font size="5"  color="#ff4444" >*การดำเนินเรื่องจองห้องจะใช้เวลาประมาณ 3 - 4 วัน</font>

                </div>
            </div>
        </div>

            </div>
        </div>
    </section>


<!-- The eventClick Modal  ดูรายละเอียดอีเว้นนนนนนนนนนนนนนนนนนนนนน-->
<div id="eventClick_Modal" class="modal ">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">

      <h2 id="ecmTitle"></h2>
    </div>
    <div class="modal-body">

      <div id="ecm_roomname">
      </div>
      <div id="ecm_member">
      </div>
      <div id="ecm_start">
      </div>
      <div id="ecm_end">
      </div>
      <div id="ecm_roomfloor">
      </div>
      <div id="ecm_time">
      </div>
      </div>
    </div>
    <!-- <div class="modal-footer">
      <h3>Modal Footer</h3>
    </div> -->
  </div>

</div>


    <!-- The dayClick Modal กดจองห้องงงงงงงงงงงงงงงงงง -->
<div id="dayClick_Modal" class="modal ">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <h3 id="dcmTitle"></h3>
    </div>
    <div class="modal-body">
      <form id="new_calendar">
        <div class="form-group">

          <label>ห้อง&nbsp;&nbsp;</label>  <select class="btn btn-default dropdown-toggle" name="roomtype" id="roomtype">
          <option value="">กรุณาเลือกห้อง</option>
            <?php
            $connect = new connect();
            $db = $connect->connect();
            $room = $db->query("SELECT * FROM room ORDER BY Room_id ASC");
            while($get_room= $room->fetch_assoc()){
            ?>
            <option value="<?php echo $get_room["Room_ID"];?>"><?php echo $get_room["Room_Name"];?></option>
            <?php
            }
            ?>
            </select>
            <br>
        </div>
        <label>กิจกรรม :</label>
        <input type="text" class="form-control" name="dcmtitle" placeholder="" id="dcmtitle">
        <br>
        <label for="gender">ช่วงเวลาที่ต้องการจอง: </label><br>
        <input type="radio" id="myRadio" name="myRadio" value="Morning" >ช่วงเช้า : 8.30 - 12.00น.</input><br>
        <input type="radio" id="myRadio" name="myRadio" value="Afternoon" >ช่วงบ่าย : 12.00 - 16.30น.</input><br>
        <input type="radio" id="myRadio" name="myRadio" value="Night" >ช่วงค่ำ : 16.30 - 22.00น.</input>
        <div class="form-group">
        <label >วันที่เริมต้น</label>
        <input type="text" class="form-control" name="dcmstart"  placeholder="" id="dcmstart">
        </div>
        <div class="form-group">
        <label >วันที่สิ้นสุด</label>
        <input type="text" class="form-control" name="dcmend"  placeholder="" id="dcmend">
        </div>
        <div class ="reser_error"></div>
        <div class="modal-footer">
          <br>
          <button type="submit" id="submit" class="btn btn-primary" >บันทึกข้อมูล</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="edit_Modal" class="modal ">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <h3 id="editheadTitle"></h3>
    </div>
    <div class="modal-body">
      <form id="edit_calendar">
        <div class="form-group">
          <label>ห้อง&nbsp;&nbsp;</label>  <select class="btn btn-default dropdown-toggle" name="editroom" id="editroom">
          <option value="">Please Select Item</option>
            <?php
            $connect = new connect();
            $db = $connect->connect();
            $room = $db->query("SELECT * FROM room ORDER BY Room_id ASC");
            while($get_room= $room->fetch_assoc()){
            ?>
            <option value="<?php echo $get_room["Room_ID"];?>"><?php echo $get_room["Room_Name"];?></option>
            <?php
            }
            ?>
            </select>
            <br>
        <label>กิจกรรม :</label>
        <input type="text" class="form-control" name="edittitle" placeholder="" id="edittitle">
        <br>
        <label for="gender">ช่วงเวลาที่ต้องการจอง: </label><br>
        <input type="radio" id="Morning" name="editmyRadio" value="Morning" >ช่วงเช้า</input><br>
        <input type="radio" id="Afternoon" name="editmyRadio" value="Afternoon" >ช่วงบ่าย</input><br>
        <input type="radio" id="Night" name="editmyRadio" value="Night" >ช่วงค่ำ</input>
        <div class="form-group">
        <label >วันที่เริมต้น</label>
        <input type="text" class="form-control" name="editstart"  placeholder="" id="editstart">
        </div>
        <div class="form-group">
        <label >วันที่สิ้นสุด</label>
        <input type="text" class="form-control" name="editend"  placeholder="" id="editend">
        </div>
        <div class ="reser_error"></div>
        <div class="modal-footer">
          <br>
          <button type="submit" id="editsubmit" value="" class="btn btn-primary" >แก้ไขข้อมูล</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<div id="room_Modal" class="modal ">
  <!-- Modal content -->
  <div class="roommodal-content">
    <div class="modal-header">
      <h3 id="roomModal_header"></h3>
    </div>
    <div class="modal-body">
        <div class="form-group">
        <div id="Modal_roomname">
        </div>
        <div id="Modal_roomcapa">
        </div>
        <div id="Modal_roomtype">
        </div>
        <div id="Modal_building">
        </div>
        <div id="Modal_roomfloor">
        </div>
        <br>
        <br>
        <font size="5" color="#000000" >แผนผังภายในห้อง :</font>
        <br>
        <br>
        <div id="Modal_roomImg">
        </div>
        </div>
    </div>
  </div>
</div>


    <section class="testimonial text-center wow fadeInUp animated" id="TESTIMONIAL">
        <div class="container">
            <div class="icon">
                <i class="icon-quote"></i>
            </div>
            <div class="owl-carousel">
                <div class="single_testimonial text-center wow fadeInUp animated">
                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores<br/> eos qui ratione voluptatem sequi nesciunt.</p>
                    <h4>-JOHN DOE</h4>
                </div>
                <div class="single_testimonial text-center">
                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius<br/> modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                    <h4>-JOHN SMITH</h4>
                </div>
            </div>
        </div>
    </section>

<footer>
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="copyright_text   wow fadeInUp animated">
                        <p>&copy; brandy 2015.All Right Reserved By <a href="http://www.themeforest.net/user/thecodecafe"target="_blank">Code Cafe Team</a></p>
                        <p>Made with love for creative people.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>



<!-- =========================
     SCRIPTS
============================== -->

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- <script src="js/jquery.nicescroll.js"></script> -->
  <script src="js/owl.carousel.js"></script>
  <script src="js/wow.js"></script>
  <script src="js/script.js"></script>
  <script type='text/javascript' src='fullcalendar/lib/jquery.min.js'></script>
  <script type='text/javascript' src='fullcalendar/lib/moment.min.js'></script>
  <script type='text/javascript' src='fullcalendar/lib/jquery-ui.custom.min.js'></script>
  <script type="text/javascript" src="fullcalendar/fullcalendar.js"></script>
  <script type="text/javascript" src="fullcalendar/fullcalendar.min.js"></script>
  <script type="text/javascript" src="js/fullcalendar.js"></script>
  <script type="text/javascript" src="js/reserRoom.js"></script>
  <script type="text/javascript" src="js/validation.min.js"></script>
  <script type="text/javascript" src="js/user.js"></script>
  <script type="text/javascript" src="js/sendEdit.js"></script>
  <script type="text/javascript" src="js/roomModal.js"></script>
  <style>
  #calendar {
      width: 1000;
    }.fc-time{
   display : none;
}
    .Morning,
    .Morning div,
    .Morning span {
      background-color: #FFE700; /* background color */
      border-color: #000000;     /* border color */
      color: black;
      font-size: 15px;          /* text color */
    }
    .Afternoon,
    .Afternoon div,
    .Afternoon span {
      background-color: #2CDAFF; /* background color */
      border-color: #000000;     /* border color */
      color: black;
      font-size: 15px;       /* text color */
    }
    .Night,
    .Night div,
    .Night span {
      background-color: #041519; /* background color */
      border-color: #000000;     /* border color */
      color: white;
      font-size: 15px;        /* text color */
    }
  </style>

</body>

</html>
