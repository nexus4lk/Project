
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
	                <!-- Brand and toggle get grouped for better mobile display -->
	                <div class="navbar-header">
	                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                  </button>
	                  <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt=""></a>
	                </div>

	                <!-- Collect the nav links, forms, and other content for toggling -->
	                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	                  <ul class="nav navbar-nav navbar-right">
	                    <li><a href="index.html">Home</a></li>
	                    <li><a href="#SERVICE">Services</a></li>
	                    <li><a href="#ABOUT">About</a></li>
	                    <li><a href="#TESTIMONIAL">Testimonial</a></li>
	                    <li><a href="Register.html">Register</a></li>
	                    <li><a href="signin.html">Sign In</a></li>
	                  </ul>
	                </div><!-- /.navbar-collapse -->
	              </div><!-- /.container -->
	            </nav>

	            <div class="container">
	                <div class="row">
	                    <div class="col-md-12 text-center">
	                        <div class="home_text">
	                            <h2>it’s Srinakharinwirot University's Room service</h2>
	                            <p>test</p>
	                            <img src="images/shape.png" alt="">
	                        </div>
	                    </div>
	                </div>
	            </div>



	        </div>
	    </section>
    </header>


    <section class="services" id="SERVICE">
        <div class="container">
            <div class="row">
                <div class="col-md-3 text-center">
                    <div class="single_service wow fadeInUp" data-wow-delay="1s">
                        <i class="icon-pencil"></i>
                        <h2>Design</h2>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa.</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="single_service wow fadeInUp" data-wow-delay="2s">
                        <i class="icon-gears"></i>
                        <h2>Development</h2>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa.</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="single_service wow fadeInUp" data-wow-delay="3s">
                        <i class="icon-camera"></i>
                        <h2>Photography</h2>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa.</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="single_service wow fadeInUp" data-wow-delay="4s">
                        <i class="icon-magnifying-glass"></i>
                        <h2>Seo</h2>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about_us_area" id="ABOUT">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="about_title">
                        <h2>Calendar</h2>
                        <div id='calendar'></div>


                        <!-- <form class="contact-form1" id="register-form" method="post">
                          <div class="row">
                            <div class="col-md-6">

                              <div class="single_contact_info">
                                <h4 class="form-heading" align="left">Enter your account info</h4>
                              </div>
                              <input type="text" class="form-control" name="username" id="username" placeholder="Username*" size="20">
                              <input type="password" class="form-control" name="password" id="password" placeholder="Password*" size="20">
                              <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm password*" size="20"> -->

                              <!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#new_calendar_modal">
					  เพิ่มข้อมูล
					</button>
          <div class="modal fade" id="new_calendar_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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

                            <!-- </div>
                            <div class="col-md-6">


                              <div class="single_contact_info">
                                <h4 class="form-heading" align="left">Enter your personal info</h4>
                              </div>
                              <input type="text" class="form-control" name="txtfname" id="txtfname" placeholder="First Name*" size="20">
                              <input type="text" class="form-control" name="txtlname" id="txtlname" placeholder="Last Name*" size="20">
                              <input type="email" class="form-control" name="txtemail" id="txtemail" placeholder="Email*" size="20">

                            </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                              <div class ="error"></div>
                              <button type="submit" id="submit" class="btn btn-default submit-btn form_confirm">Confirm</button>
                            </div>
                          </div>
                          <div class="col-md-3"></div>
                        </form> -->

                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4  wow fadeInLeft animated">
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
                </div>
            </div>
        </div>
    </section>





<footer>
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="footer_logo   wow fadeInUp animated">
                        <img src="images/logo.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
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
        </div>
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
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/script.js"></script>
    <script type='text/javascript' src='fullcalendar/lib/jquery.min.js'></script>
    <script type='text/javascript' src='fullcalendar/lib/moment.min.js'></script>
    <script type='text/javascript' src='fullcalendar/lib/jquery-ui.custom.min.js'></script>
    <script type="text/javascript" src="fullcalendar/fullcalendar.js"></script>
    <script type="text/javascript" src="fullcalendar/fullcalendar.min.js"></script>
    <script type="text/javascript" src="js/fullcalendar.js"></script>
    <!-- <script>

	$(document).ready(function() {

    $.ajax({
  		url: 'json-event.php',
          type: 'POST', // Send post data
          data: 'type=fetch',
          async: false,
          success: function(response){
          	json_events = response;
          }
  	});

		$('#calendar').fullCalendar({
      dayClick: function(date, jsEvent, view, resourceObj) {

        alert('Date: ' + date.format());
        alert('Resource ID: ' + resourceObj.id);

    },
      events: JSON.parse(json_events),
      url:'json-event.php?get_json=get_json',
			header: {
				right: 'prev,next today',
				// center: 'title',
				// right: 'month,basicWeek,basicDay'
			},
      // defaultDate: '<?php
      // echo date('Y-m-d');
      ?>',
    	editable: false,
			eventLimit: true, // allow "more" link when too many events

		});

	});
//show data
  // function getFreshEvents(){
	// 	$.ajax({
	// 		url: 'json-event.php',
	//         type: 'POST', // Send post data
	//         data: 'type=fetch',
	//         async: false,
	//         success: function(response){
	//         	freshevents = response;
	//         }
	// 	});
	// 	$('#calendar').fullCalendar('addEventSource', JSON.parse(freshevents));
	// }


</script> -->
  <style>
	body {
		margin: 40px 10px;
		padding: 0;
		/*font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;*/
		font-size: 14px;
	}

	#calendar {
		max-width: 1000px;
		margin: 0 auto;
	}

</style>
</body>

</html>
