<?php
require "dbconfig.php";
if (isset($_FILES["fileToUpload"]["type"])) {

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["uploadImg"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "ไฟล์นี้เป็นรูปภาพ - " . $check["mime"] . ".";
        $uploadOk = 1;

    } else {
        echo "ไฟล์นี้ไม่ใช่รูปภาพ\n";
        $uploadOk = 0;
        exit();
    }
}elseif(isset($_POST["uploadImg"]) && !isset($_FILES['fileToUpload'])) {
    print "ฟร์อมถูกส่งแล้ว แต่ไฟล์ไม่ถูกส่งมา";
    exit();
}else {
    print "ฟร์อมไม่ได้ถูกส่ง";
    exit();
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "ไฟล์ชื่อนี้มีอยู่ในระบบแล้ว\n";
    $uploadOk = 0;
    exit();
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "ไฟล์มีขนาดใหญ่เกิน 5Mb\n";
    $uploadOk = 0;
    exit();
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "รับเฉพาะไฟล์ที่เป็นนามสกุล JPG, JPEG, PNG และ GIF เท่านั้น\n";
    $uploadOk = 0;
    exit();
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "ไฟล์ของคุณไม่ถูกอัพโหลด\n";
    exit();
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $connect = new connect();
      $db = $connect->connect();
      $upload_img = $db->prepare("INSERT INTO images (img_Id, img_name, Room_ID) VALUES (NULL, ?, ?)");
      $upload_img->bind_param("si",$_FILES["fileToUpload"]["name"], $_POST['roomid11']);
      if(!$upload_img->execute()){
          echo "เกิดข้อผิดพลาดขนะอัพโหลด\n";
          exit();
      }else{
        echo "ไฟล์ ". basename( $_FILES["fileToUpload"]["name"]). " ถูกอัพโหลดแล้ว\n";
      }

    } else {
        echo "เกิดข้อผิดพลาดขนะอัพโหลด\n";
        exit();
    }
}
}

?>
