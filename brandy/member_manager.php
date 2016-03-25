<?php
require "dbmember.php";

$member = new member();

if ($_POST['type']=="login") {
  if($login = $member->login($_POST['username'],md5($_POST['password']))){
    echo "ok";
  }else {
    echo "fail";
  }
}
 ?>
