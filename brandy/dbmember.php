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
            // $db->close();
            return true;
          }return false;
      }return false;
      $db->close();
    }

    public function forgetPassword($usernameoremail){
        $usernameoremail = trim($usernameoremail);
        $connect = new connect();
        $db = $connect->connect();
        $checkuser = $db->query("SELECT * FROM `member` WHERE `Mem_Email` = '$usernameoremail' OR `Username` = '$usernameoremail'");
        if($result = $checkuser->fetch_assoc()){
          $strTo = $result["Mem_Email"];
          $strSubject = "Your Account information username and password.";
          $strHeader = "Content-type: text/html; charset=windows-874\n"; // or UTF-8 //
          $strHeader .= "From: webmaster@thaicreate.com\nReply-To: webmaster@thaicreate.com";
          $strMessage = "";
          $strMessage .= "Welcome : ".$result["Mem_Design"].$result["Mem_Fname"].$result["Mem_Lname"]."<br>";
          $strMessage .= "Username : ".$result["Username"]."<br>";
          $strMessage .= "Password : ".$result["Password"]."<br>";
          $strMessage .= "=================================<br>";
          $strMessage .= "ThaiCreate.Com<br>";
          $flgSend = mail($strTo,$strSubject,$strMessage,$strHeader);
          echo "Your password send successful.<br>Send to mail : ".$result["Mem_Email"];

        }else{
          return false;
        }
        $db->close();
      }

public function register($username,$password,$fname,$lname,$email,$tel,$design,$faculty,$branch){

    $connect = new connect();
    $db = $connect->connect();
    $status = "USER";
    $checkuser = $db->query("SELECT * FROM member WHERE Username = '$username'");
    if ($checkuser->fetch_assoc()){
      return false;

    }
    else {
      $add_user = $db->prepare("INSERT INTO member (Mem_ID, Mem_Design, Mem_Fname, Mem_Lname, Mem_Tel, Mem_Email, Mem_Faculty, Mem_Branch, Username , Password, Status) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $add_user->bind_param("ssssssssss", $design,$fname, $lname, $tel, $email, $faculty, $branch, $username, $password, $status);
      if(!$add_user->execute()){
        return false;
      }else{
        return true;
      }
    }
    $db->close();
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
      $db->close();
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
      $db->close();
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
