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

    <div class="container">
      <div class="row">
        <div class="text-center">
          <div class="about_title">
            <h2>SWU RESERVATION</h2>
            <div class="container">
              <div class="row">
                <form class="contact-form-logre" id="login-form" method="post">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="single_contact_info">
                        <h4 class="form-heading" align="left">เข้าสู่ระบบ</h4>
                      </div>
                      <input type="text" class="form-control" id="username" placeholder="Username*" size="20">
                      <input type="password" class="form-control" id="password" placeholder="Password*" size="20">
                      <div class="col-md-12">
                        <div id="error">
                        </div>
                        <div class="result"></div>
                        <div>
                        </div>
                        <button type="submit" id="submit" class="btn btn-default submit-btn form_submit">เข้าสู่ระบบ</button>
                        <hr>
                      </div>
                      <div class="col-md-12">
                      <div class="col-md-8">
                      <p align="right" class="form-heading">ยังไม่มีบัญชีผู้ใช้</p>
                      </div>
                      </div>
                      <div class="col-md-12">
                      <input type="button" id="submit" Onclick="window.location.href='register.php'" value="สมัครสมาชิก" class="btn btn-default submit-btn form_submit"></button>
                      </div>
                    </div>
                  </div>

                </form>

              </div>
            </div>
          </div>
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
  <script type="text/javascript" src="js/login.js"></script>
  <script type="text/javascript" src="js/validation.min.js"></script>
</body>

</html>
