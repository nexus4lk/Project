<?php
require "dbmember.php";
$member = new member();

if (isset($_POST['login'])) {
  if($login = $member->login($_POST['username'],md5($_POST['password'])))
  {
    $status = $member->get_status($_SESSION['user_session']);
    switch ($status) {
      case 'ADMIN':
            echo "ADMIN";
        break;
      case 'USER':
            echo "USER";
        break;
    }
  }else {
    echo "fail";
  }
}

if (isset($_POST['register'])) {
  $register = $member->register($_POST['reusername'],md5($_POST['repassword']),$_POST['refname'],$_POST['relname'],$_POST['reemail'],$_POST['retel'],$_POST['design'],$_POST['faculty'],$_POST['branch']);
  if ($register) {
    echo "success";
  }else {
    echo "username: ".$_POST['reusername']." ซ้ำกับผู้อื่น";
  }
}

if(isset($_POST['forget'])){
	$forget = $member->forgetPassword($_POST['Usernameoremail']);
	if($forget){
			echo $forget;
	}
	else {
		echo $forget;
	}
}
 ?>
