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
    <div id="section1">
      <h2>Dash Board</h2>
      <h3>Try to scroll this area, and see how the sidenav sticks to the page</h3>
      <p>Notice that this div element has a left margin of 25%. This is because the side navigation is set to 25% width. If you remove the margin, the sidenav will overlay/sit on top of this div.</p>
      <p>Also notice that we have set overflow:auto to sidenav. This will add a scrollbar when the sidenav is too long (for example if it has over 50 links inside of it).</p>
      <p>Some text..</p>
      <p>Some text..</p>
      <p>Some text..</p>
      <p>Some text..</p>
      <p>Some text..</p>
      <p>Some text..</p>
      <p>Some text..</p>
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
            <input type="text" class="form-control" name="roomname" id="roomname" placeholder="Roomname*" size="20">
            <input type="text" class="form-control" name="roomcapa" id="roomcapa" placeholder="Room Capacity* ตัวอย่าง 30 ที่นั่ง" size="20">
            <div class="single_contact_info">
            <h4 class="form-heading" align="left">Room Type</h4>
            <select class="form-heading" name="roomtype" id="roomtype">
            <option value="">Please Select Item</option>
              <?php
              include("connect.php");
              $sql = "SELECT * FROM roomtype ORDER BY Type_id ASC";
              $result=mysqli_query($link,$sql);
              while($row = mysqli_fetch_array($result)) {
              ?>
              <option value="<?php echo $row["Type_id"];?>"><?php echo $row["Type_id"]." - ".$row["Type_name"];?></option>
              <?php
              }
              ?>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <div class ="add_error"></div>
            <button type="submit" id="submit" class="btn btn-primary cs-btn">Add </button>
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
              <h4 class="form-heading" align="left">Room Type</h4>
                <select class="form-heading" name="Editroomname" id="Editroomname">
                <option value="">Please Select Item</option>
              <?php
              include("connect.php");
              $sql = "SELECT * FROM room ORDER BY Room_id ASC";
            	$result=mysqli_query($link,$sql);
             while($row = mysqli_fetch_array($result)) {
              ?>
          <option value="<?php echo $row["Room_ID"];?>"><?php echo $row["Room_Name"];?></option>
              <?php
              }
            ?>
            </select>
            </div>
            <input type="text" class="form-control" name="Eroomname" id="Eroomname" placeholder="Roomname*" size="20">
            <div class="single_contact_info">
              <input type="text" class="form-control" name="Eroomcapa" id="Eroomcapa" placeholder="Room Capacity* ตัวอย่าง 30 ที่นั่ง" size="20">
              <select class="form-heading" name="Eroomtype" id="Eroomtype">
              <option value="">Please Select Item</option>
                <?php
                include("connect.php");
                $sql = "SELECT * FROM roomtype ORDER BY Type_id ASC";
                $result=mysqli_query($link,$sql);
                while($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["Type_id"];?>"><?php echo $row["Type_id"]." - ".$row["Type_name"];?></option>
                <?php
                }
                ?>
                </select>
          </div>


          </div>
          <div class="col-md-12">
            <div class ="Edit_error"></div>
            <button type="submit" id="submit" class="btn btn-primary cs-btn">Edit</button>
          </div>
        </div>
      </form>
    </div>
    </div>
    <div id="section4">
      <h2>Remove Room</h2>
      <h3>Try to scroll this area, and see how the sidenav sticks to the page</h3>
      <p>Notice that this div element has a left margin of 25%. This is because the side navigation is set to 25% width. If you remove the margin, the sidenav will overlay/sit on top of this div.</p>
      <p>Also notice that we have set overflow:auto to sidenav. This will add a scrollbar when the sidenav is too long (for example if it has over 50 links inside of it).</p>
      <p>Some text..</p>
      <p>Some text..</p>
      <p>Some text..</p>
      <p>Some text..</p>
      <p>Some text..</p>
      <p>Some text..</p>
      <p>Some text..</p>
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
  </style>
</body>

</html>
