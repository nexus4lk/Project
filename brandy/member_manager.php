<?php
require "dbmember.php";
$member = new member();

if ($_POST['type']=="login") {
  if($login = $member->login($_POST['username'],md5($_POST['password']))){
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

if ($_POST['type'] == "register") {
  $register = $member->register($_POST['reusername'],md5($_POST['repassword']),$_POST['refname'],$_POST['relname'],$_POST['reemail'],$_POST['retel']);
  if ($register) {
    echo "สมัครสมาชิกเรียบร้อย";
  }else {
    echo "username: ".$_POST['reusername']." ซ้ำกับผู้อื่น";
  }
}
 ?>
