<?php
session_start();
require "dbconfig.php";
class member {

  // login
  public function login($username,$password){
      $connect = new connect();
      $db = $connect->connect();
      $checkuser = $db->query("SELECT * FROM member WHERE Username = '$username'");
      while($get_username = $checkuser->fetch_assoc()){
        $checkpass = $db->query("SELECT * FROM member WHERE Username = '$username' AND Password = '$password'");
          while($get_password = $checkpass->fetch_assoc()){
            $_SESSION['user_session'] = $get_username['Username'];
            return true;
          }
      }return false;
    }

  // logged in
  public function loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }
  // log out
  public function logout()
  {
       session_destroy();
       unset($_SESSION['user_session']);
       return true;
  }


}//end class
 ?>
