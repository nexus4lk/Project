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
            // $_SESSION['status_session'] = $get_username['Status'];
            return true;
          }return false;
      }return false;
    }

    //check login
    public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }
    // logged in
    public function get_status($user_session)
     {
       $connect = new connect();
       $db = $connect->connect();
       $checkstatus = $db->query("SELECT * FROM member WHERE Username = '$user_session'");
       while($get_status = $checkstatus->fetch_assoc()){
         $result = $get_status['Status'];

   		}
   		if(!empty($result)){

   			return $result;
   		}
   	}

    public function redirect($url)
   {
       header("Location: $url");
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
