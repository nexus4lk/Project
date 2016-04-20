<?php
require "dbmember.php";
$member = new member();
if(!$member->is_loggedin())
{
 $member->redirect('login.php');
}else {
  $username = $member->get_username($_SESSION['user_session']);
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
                      <li><a ><?php print($username); ?></a></li>
	                    <li><button type="button" onclick="window.location.href='logout.php?logout=true'" class="btn btn-default navbar-btn">LOGOUT</button></li>
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
                        <option value="">Please Select Room</option>
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
                          <br>
                          <font size="3" color="#ff4444" >*สามารถจองได้เฉพาะ 4 วันจากวันที่ปัจจุบันเพื่อเว้นระยะการดำเนินเรื่องจองห้อง</font>
                        <div class="wow fadeInLeft animated" id='calendar'></div>
                        <!-- <br>
                        <br>
                        <br>
                        <br> -->

                    </div>
                </div>
            </div>
        </div>
                <!-- <div class="col-md-4  wow fadeInLeft animated">
                    <div class="single_progress_bar">
                        <h2>DESIGN - 90%</h2>
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                            <span class="sr-only">60% Complete</span>
                          </div>
                        </div>
                    </div>
                    <div class="single_progress_bar">
                        <h2>DEVELOPMENT - 60%</h2>
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                            <span class="sr-only">60% Complete</span>
                          </div>
                        </div>
                    </div>
                    <div class="single_progress_bar">
                        <h2>MARKETING - 75%</h2>
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">
                            <span class="sr-only">60% Complete</span>
                          </div>
                        </div>
                    </div>
                    <div class="single_progress_bar">
                        <h2>SEO - 95%</h2>
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">
                            <span class="sr-only">60% Complete</span>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4  wow fadeInRight animated">
                    <p class="about_us_p">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Sed quia non numquam eius modi tempora.</p>
                </div>
                <div class="col-md-4  wow fadeInRight animated">
                    <p class="about_us_p">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                </div> -->
            </div>
        </div>
    </section>

    <!-- Modal -->
    <!-- <div class="modal fade" id="new_calendar_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Fullcalendar Modal With MySQL</h4>
        </div>
        <div class="modal-body">
          <form id="new_calendar">
            <div class="form-group">
            <label >เรื่อง</label>
            <input type="text" class="form-control" name="title" placeholder="">
            </div>
            <div class="form-group">
            <label >วันที่เริมต้น</label>
            <input type="text" class="form-control" name="start"  placeholder="">
            </div>
            <div class="form-group">
            <label >วันที่สิ้นสุด</label>
            <input type="text" class="form-control" name="end"  placeholder="">
            </div>
            <input type="hidden" name="new_calendar_form">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="return new_calendar();">บันทึกข้อมูล</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>

        </div>
      </div>
      </div>
    </div> -->

    <!-- The eventClick Modal  ดูรายละเอียดอีเว้นนนนนนนนนนนนนนนนนนนนนน-->
<div id="eventClick_Modal" class="modal ">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">

      <h2 id="ecmTitle"></h2>
    </div>
    <div class="modal-body">
      <h4 id="ecmroom" class="modal-room"></h4>
      <h4 id="ecmmem" class="modal-mem"></h4>
      <p>Some text in the Modal Body</p>
      <p>Some other text...</p>
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
          <label>ห้อง</label>
          <br>
          <select class="form-heading" name="roomtype" id="roomtype">
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
        <label>เรื่อง</label>
        <input type="text" class="form-control" name="dcmtitle" placeholder="" id="dcmtitle">
        </div>
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
    <!-- <div class="modal-footer">
      <h3>Modal Footer</h3>
    </div> -->
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


    <!-- <div class="fun_facts">
    	<section class="header parallax home-parallax page" id="fun_facts" style="background-position: 50% -150px;">
	        <div class="section_overlay">
	            <div class="container">
	                <div class="row">
	                    <div class="col-md-6 wow fadeInLeft animated">
	                        <div class="row">
	                            <div class="col-md-4">
	                                <div class="single_count">
	                                    <i class="icon-toolbox"></i>
	                                    <h3>300</h3>
	                                    <p>Project Done</p>
	                                </div>
	                            </div>
	                            <div class="col-md-4">
	                                <div class="single_count">
	                                    <i class="icon-clock"></i>
	                                    <h3>1700+</h3>
	                                    <p>Hours Worked</p>
	                                </div>
	                            </div>
	                            <div class="col-md-4">
	                                <div class="single_count">
	                                    <i class="icon-trophy"></i>
	                                    <h3>37</h3>
	                                    <p>Awards Won</p>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-5 col-md-offset-1 wow fadeInRight animated">
	                        <div class="imac">
	                            <img src="images/imac.png" alt="">
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>
    </div> -->
    <!-- <section class="work_area" id="WORK">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="work_title  wow fadeInUp animated">
                        <h1>Latest Works</h1>
                        <img src="images/shape.png" alt="">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna <br> aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 no_padding">
                    <div class="single_image">
                        <img src="images/w1.jpg" alt="">
                        <div class="image_overlay">
                            <a href="">View Full Project</a>
                            <h2>drawing</h2>
                            <h4>with pencil colors</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 no_padding">
                    <div class="single_image">
                        <img src="images/w2.jpg" alt="">
                        <div class="image_overlay">
                            <a href="">View Full Project</a>
                            <h2>drawing</h2>
                            <h4>with pencil colors</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 no_padding">
                    <div class="single_image">
                        <img src="images/w3.jpg" alt="">
                        <div class="image_overlay">
                            <a href="">View Full Project</a>
                            <h2>drawing</h2>
                            <h4>with pencil colors</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pad_top">
                <div class="col-md-4 no_padding">
                    <div class="single_image">
                        <img src="images/w4.jpg" alt="">
                        <div class="image_overlay">
                            <a href="">View Full Project</a>
                            <h2>drawing</h2>
                            <h4>with pencil colors</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 no_padding">
                    <div class="single_image">
                        <img src="images/w5.jpg" alt="">
                        <div class="image_overlay">
                            <a href="">View Full Project</a>
                            <h2>drawing</h2>
                            <h4>with pencil colors</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 no_padding">
                    <div class="single_image last_padding">
                        <img src="images/w6.jpg" alt="">
                        <div class="image_overlay">
                            <a href="">View Full Project</a>
                            <h2>drawing</h2>
                            <h4>with pencil colors</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- <section class="call_to_action">
        <div class="container">
            <div class="row">
                <div class="col-md-8 wow fadeInLeft animated">
                    <div class="left">
                        <h2>LOOKING FOR EXCLUSIVE DIGITAL SERVICES?</h2>
                        <p>Proin fringilla augue at maximus vestibulum. Nam pulvinar vitae neque et porttitor.
                        Integer non dapibus diam, ac eleifend lectus.</p>
                    </div>
                </div>
                <div class="col-md-3 col-md-offset-1 wow fadeInRight animated">
                    <div class="baton">
	                    <a href="#CONTACT">
	                        <button type="button" class="btn btn-primary cs-btn">Let's Talk</button>
	                    </a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- <section class="contact" id="CONTACT">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="contact_title  wow fadeInUp animated">
                        <h1>get in touch</h1>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna<br/> aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-3  wow fadeInLeft animated">
                    <div class="single_contact_info">
                        <h2>Call Me</h2>
                        <p>+88 00 123 456 01</p>
                    </div>
                    <div class="single_contact_info">
                        <h2>Email Me</h2>
                        <p>Hello@abdullahnoman.com</p>
                    </div>
                    <div class="single_contact_info">
                        <h2>Address</h2>
                        <p>216 Street Address, Barisal, BD</p>
                    </div>
                </div>
                <div class="col-md-9  wow fadeInRight animated">
                    <form class="contact-form" action="">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="name" placeholder="Name">
                                <input type="email" class="form-control" id="email" placeholder="Email">
                                <input type="text" class="form-control" id="subject" placeholder="Subject">
                            </div>
                            <div class="col-md-6">
                                <textarea class="form-control" id="message" rows="25" cols="10" placeholder="  Message Texts..."></textarea>
                                <button type="button" class="btn btn-default submit-btn form_submit">SEND MESSAGE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="work-with   wow fadeInUp animated">
                        <h3>looking forward to hearing from you!</h3>
                    </div>
                </div>
            </div>
        </div>
    </section> -->



<footer>
    <div class="container">
        <!-- <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="footer_logo   wow fadeInUp animated">
                        <img src="images/logo.png" alt="">
                    </div>
                </div>
            </div>
        </div> -->
        <!-- <div class="container">
            <div class="row">
                <div class="col-md-12 text-center   wow fadeInUp animated">
                    <div class="social">
                        <h2>Follow Me on Here</h2>
                        <ul class="icon_list">
                            <li><a href="http://www.facebook.com/abdullah.noman99"target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="http://www.twitter.com/absconderm"target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="http://www.dribbble.com/abdullahnoman"target="_blank"><i class="fa fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> -->
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
  <style>

  </style>

</body>

</html>
