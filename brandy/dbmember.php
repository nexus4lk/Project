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
            $_SESSION['user_session'] = $get_username['Mem_ID'];
            // $_SESSION['status_session'] = $get_username['Status'];
            return true;
          }return false;
      }return false;
    }
public function register($username,$password,$fname,$lname,$email,$tel){

    $connect = new connect();
    $db = $connect->connect();
    $status = "USER";
    $checkuser = $db->query("SELECT * FROM member WHERE Username = '$username'");
    if ($get_username = $checkuser->fetch_assoc()){
      return false;
    }
    else {
      $add_user = $db->prepare("INSERT INTO member (Mem_ID, Mem_Fname, Mem_Lname, Mem_Tel, Mem_Email, Username , Password, Status) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)");
      $add_user->bind_param("sssssss",$fname, $lname, $tel, $email, $username , $password, $status);
      if(!$add_user->execute()){
        return false;
      }else{
        return true;
      }
    }
}

    //check login
public function is_loggedin(){
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }

    public function get_status($user_session)
     {
       $connect = new connect();
       $db = $connect->connect();
       $checkstatus = $db->query("SELECT * FROM member WHERE Mem_ID = '$user_session'");
       while($get_status = $checkstatus->fetch_assoc()){
         $result = $get_status['Status'];

   		}
   		if(!empty($result)){

   			return $result;
   		}
   	}
    public function get_username($user_session)
     {
       $connect = new connect();
       $db = $connect->connect();
       $checkstatus = $db->query("SELECT * FROM member WHERE Mem_ID = '$user_session'");
       while($get_status = $checkstatus->fetch_assoc()){
         $result = $get_status['Username'];

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
