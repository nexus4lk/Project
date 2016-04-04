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
 ?>
