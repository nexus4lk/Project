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
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.\n";
        $uploadOk = 0;
        exit;
    }
}elseif(isset($_POST["uploadImg"]) && !isset($_FILES['fileToUpload'])) {
    print "Form was submitted but file wasn't send";
    exit;
}else {
    print "Form wasn't submitted!";
    exit;
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.\n";
    $uploadOk = 0;
    exit;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.\n";
    $uploadOk = 0;
    exit;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.\n";
    $uploadOk = 0;
    exit;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.\n";
    exit;
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $connect = new connect();
      $db = $connect->connect();
      $upload_img = $db->prepare("INSERT INTO images (img_Id, img_name, Room_ID) VALUES (NULL, ?, ?)");
      $upload_img->bind_param("si",$_FILES["fileToUpload"]["name"], $_POST['roomid11']);
      if(!$upload_img->execute()){
          echo "Sorry, there was an error uploading your file.\n";
          exit;
      }else{
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.\n";
      }

    } else {
        echo "Sorry, there was an error uploading your file.\n";
        exit;
    }
}
}

?>
