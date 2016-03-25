<?php
class connect {
	// $serverName = "localhost";
	// $userName = "root";
	// $userPassword = "";
	// $dbName = "project";
	// $link = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	// mysqli_set_charset($link,'utf8');
	public $host = 'localhost'; //ชื่อ Host
  public $user = 'root'; //ชื่อผู้ใช้งาน ฐานข้อมูล
  public $password = ''; // password สำหรับเข้าจัดการฐานข้อมูล
  public $database = 'project'; //ชื่อ ฐานข้อมูล

	//function เชื่อมต่อฐานข้อมูล
	public function connect(){

		$mysqli = new mysqli($this->host,$this->user,$this->password,$this->database);

			$mysqli->set_charset("utf8");

			if ($mysqli->connect_error) {

			    die('Connect Error: ' . $mysqli->connect_error);
			}

		return $mysqli;
	}
}
?>
