<?php
require "dbconfig.php";
if (isset($_FILES["fileToUpload"]["name"])) {
$target_dir = "uploads/";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
// $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$type = substr( $_FILES["fileToUpload"]["name"] , strpos( $_FILES["fileToUpload"]["name"] , '.' )+1 ) ;
// Check if image file is a actual image or fake image
if(isset($_FILES["fileToUpload"]["tmp_name"])) {
    $check = @getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    }
    else if(isset($_POST["uploadImg"]) && !isset($_FILES["fileToUpload"]["name"])) {
        echo "ไม่สามารถใช้รูปนี้ได้ โปรดใช้รูปอื่น";
        $uploadOk = 0;
        exit();
    }else {
      $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "ไฟล์ชื่อนี้มีอยู่ในระบบแล้ว\n";
    $uploadOk = 0;
    exit();
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5120000) {
    echo "ไฟล์มีขนาดใหญ่เกิน 5MB\n";
    $uploadOk = 0;
    exit();
}
// Allow certain file formats
if($type != "JPG" && $type != "PNG" && $type != "JPEG" && $type != "GIF" && $type != "jpg" && $type != "png" && $type != "jpeg" && $type != "gif" ) {
    echo "รับเฉพาะไฟล์ที่เป็นนามสกุล JPG, JPEG, PNG และ GIF เท่านั้น\n";
    $uploadOk = 0;
    exit();
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "ไม่สามารถอัพโหลดไฟล์ได้";
    exit();
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $connect = new connect();
      $db = $connect->connect();
      $upload_img = $db->prepare("INSERT INTO images (img_Id, img_name, Room_ID) VALUES (NULL, ?, ?)");
      $upload_img->bind_param("si",$_FILES["fileToUpload"]["name"], $_POST['roomid11']);
      if(!$upload_img->execute()){
          echo "เกิดข้อผิดพลาดขณะอัพโหลด\n";
          exit();
      }else{
        echo "อัพโหลดไฟล์ ". basename( $_FILES["fileToUpload"]["name"]). " เสร็จสิ้น\n";
      }
    } else {
        echo "เกิดข้อผิดพลาดขณะอัพโหลด\n";
        exit();
    }
  }
}
?>
