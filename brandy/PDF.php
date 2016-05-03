<?php
require "dbconfig.php";
define('FPDF_FONTPATH','/fpdf181/font/');
$thai_month_arr=array(
    "0"=>"",
    "1"=>"มกราคม",
    "2"=>"กุมภาพันธ์",
    "3"=>"มีนาคม",
    "4"=>"เมษายน",
    "5"=>"พฤษภาคม",
    "6"=>"มิถุนายน",
    "7"=>"กรกฎาคม",
    "8"=>"สิงหาคม",
    "9"=>"กันยายน",
    "10"=>"ตุลาคม",
    "11"=>"พฤศจิกายน",
    "12"=>"ธันวาคม"
);
function thai_date($time){
    global $thai_day_arr,$thai_month_arr;
    $thai_date_return = date("j",$time);
    $thai_date_return.=" ".$thai_month_arr[date("n",$time)];
    $thai_date_return.= " ".(date("Yํ",$time)+543);
    // $thai_date_return.= "  ".date("H:i",$time)." น.";
    return $thai_date_return;
}
require('fpdf181/fpdf.php');
$pdf=new FPDF( 'P' , 'mm' , 'A4' );
$pdf->AddFont('THSarabunNew','','THSarabunNew.php');
$pdf->AddFont('THSarabunNewb','B','THSarabunNewb.php');
$pdf->AddFont('THSarabunNewi','I','THSarabunNewi.php');
$pdf->AddFont('THSarabunNewbt','BI','THSarabunNewbt.php');
$reserid = $_GET['reser_id'];
$txt1 = $_GET['txt1'];
$txt2 = $_GET['txt2'];
$connect = new connect();
$db = $connect->connect();
$get_reserDetail = $db->query("SELECT * FROM reserve_data WHERE Reser_ID = '$reserid'");
if($detail =$get_reserDetail->fetch_assoc()){
  $Mem_ID = $detail['Mem_ID'];
  $Room_ID = $detail['Room_ID'];
  $Title = $detail['Title'];
  $Reser_Date = $detail['Reser_Date'];
  $Reser_Startdate = $detail['Reser_Startdate'];
  $Reser_Enddate = $detail['Reser_Enddate'];
  $Day_time = $detail['Day_time'];
  $forwhom = $detail['forwhom'];

  $get_memDetail = $db->query("SELECT * FROM member WHERE Mem_ID = '$Mem_ID'");
  if($memDetail =$get_memDetail->fetch_assoc()){
    $Mem_Design = $memDetail['Mem_Design'];
    $Mem_Fname = $memDetail['Mem_Fname'];
    $Mem_Lname = $memDetail['Mem_Lname'];
    $Mem_Faculty = $memDetail['Mem_Faculty'];
    $Mem_Branch = $memDetail['Mem_Branch'];
    $get_roomDetail = $db->query("SELECT * FROM room WHERE Room_ID = '$Room_ID'");
    if ($roomDetail =$get_roomDetail->fetch_assoc()) {
        $Room_Name = $roomDetail['Room_Name'];
    }else {
      echo "false";
      exit();
    }
  }else {
    echo "false";
    exit();
  }
}else {
  echo "false";
  exit();
}
switch ($Day_time) {
  case "Morning":
  $day_text = "8.30 - 12.00น";
      break;
  case "Afternoon":
  $day_text = "12.00 - 16.30น";
      break;
  case "Night":
  $day_text = "16.30 - 22.00น";
      break;
    }
$currentday = date('d/m/Y');
$thai_date=strtotime($currentday);
// $desing = 'อาจารย์';
// $fname = 'อาคม';
// $lname = 'ม่วงเขาแดง';
// $faculty = 'วิศวกรรมศาสตร์';
// $Branch = 'วิศวกรรมคอมพิวเตอร์';
// $dummy = 'DUMMY';
$pdf->SetMargins( 25,10,20 );
$pdf->AddPage();

$pdf->Image('images/kk.jpg',25,20,20,20,'');
$pdf->SetFont('THSarabunNew','',30);
$pdf->Cell( 0  , 37 , iconv( 'UTF-8','cp874' , 'บันทึกข้อความ' ) , 0 , 1 , 'C' );
$pdf->SetFont('THSarabunNew','',16);
$pdf->setXY( 25, 45  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ส่วนราชการ   _______________________________________________________________')  );
$pdf->setXY( 65, 44  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $txt1)  );
$pdf->setXY( 25, 55  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ที่')  );
$pdf->setXY( 37, 55  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , '__________________________________')  );
$pdf->setXY( 40, 54  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $txt2)  );
$pdf->setXY( 110, 55  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'วันที่  ___________________________')  );
$pdf->setXY( 125, 54  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , thai_date($thai_date))  );
$pdf->setXY( 25, 65  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'เรื่อง')  );
$pdf->setXY( 37, 65  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , '____________________________________________________________________')  );
$pdf->setXY( 40, 64  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ขออนุญาติใช้ห้อง')  );
$pdf->setXY( 25, 80  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'เรียน')  );
$pdf->setXY( 40, 80  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $forwhom)  );
$pdf->setXY( 40, 90  );
if ($Reser_Startdate != $Reser_Enddate) {
  $pdf->Write( 7  , iconv( 'UTF-8','cp874' , 'ข้าพเจ้า   '.$Mem_Design.' '.$Mem_Fname.' '.$Mem_Lname.' สาขาวิชา/ภาควิชา   '.$Mem_Branch.' คณะ   '.$Mem_Faculty.' มีความประสงค์จะขอใช้ห้องเรียน/ห้องปฏิบัติการ '.$Room_Name.' สำหรับ '.$Title.' ในวันที่ '.thai_date(strtotime($Reser_Startdate)).' ถึงวันที่ '.thai_date(strtotime($Reser_Enddate)).' เวลา '.$day_text) );
}else {
  $pdf->Write( 7  , iconv( 'UTF-8','cp874' , 'ข้าพเจ้า '.$Mem_Design.' '.$Mem_Fname.' '.$Mem_Lname.' สาขาวิชา/ภาควิชา '.$Mem_Branch.' คณะ '.$Mem_Faculty.' มีความประสงค์จะขอใช้ห้องเรียน/ห้องปฏิบัติการ '.$Room_Name.' สำหรับ '.$Title.' ในวันที่ '.thai_date(strtotime($Reser_Startdate)).' เวลา '.$day_text) );
}
$pdf->setXY( 40, 115  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'จึงเรียนมาเพื่อโปรดพิจารณาอนุเคราะห์และขอบคุณล่วงหน้า')  );
$pdf->setXY( 40, 130  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ดังนั้นจึงขอความอนุเคราะห์การขอใช้ห้องตามวันเวลาดังกล่าวข้างต้น')  );
$pdf->setXY( 110, 190  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , '(  '.$Mem_Design.' '.$Mem_Fname.' '.$Mem_Lname.'  )')  );
$pdf->setXY( 90, 200  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'อาจารย์ประจำสาขาวิชา/ภาควิชา '.$Mem_Branch)  );


// $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ข้าพเจ้า')  );

// $pdf->Image('images/kk.jpg',10,20,z,0,'');
// $pdf->SetFont('THSarabunNew','',16);
// $pdf->Cell( 0  , 20 , iconv( 'UTF-8','cp874' , 'หัวข้อเรื่อง' ) , 0 , 1 , 'C' );
// $pdf->SetFont('THSarabunNew','',12);
// $pdf->setXY( 10, 60  );
// $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'THSarabunNew ตัวธรรมดา ขนาด 12' ) );
//
// $pdf->SetFont('THSarabunNewb','B',16);
// $pdf->setXY( 10, 70  );
// $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'THSarabunNewb ตัวหนา ขนาด 16' )  );
//
// $pdf->SetFont('THSarabunNewi','I',24);
// $pdf->setXY( 10, 80  );
// $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'THSarabunNewi ตัวเอียง ขนาด 24' )  );
//
// $pdf->SetFont('THSarabunNewbt','BI',32);
// $pdf->setXY( 10, 90  );
// $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'THSarabunNewbt ตัวหนาเอียง ขนาด 32' )  );
//
// $pdf->SetFont('THSarabunNewbt','BI',32);
// $pdf->setXY( 10, 120  );
// $pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'Desde: '.$reserid.' hasta: '.$reserid )  );

$pdf->Output();




// if(strlen($_GET['desde'])>0 and strlen($_GET['hasta'])>0){
// 	$desde = $_GET['desde'];
// 	$hasta = $_GET['hasta'];
//
// 	$verDesde = date('d/m/Y', strtotime($desde));
// 	$verHasta = date('d/m/Y', strtotime($hasta));
// }else{
// 	$desde = '1111-01-01';
// 	$hasta = '9999-12-30';
//
// 	$verDesde = '__/__/____';
// 	$verHasta = '__/__/____';
// }
// require('../fpdf/fpdf.php');
// require('conexion.php');
//
// $pdf = new FPDF();
// $pdf->AddPage();
// $pdf->SetFont('Arial', '', 10);
// $pdf->Image('../recursos/tienda.gif' , 10 ,8, 10 , 13,'GIF');
// $pdf->Cell(18, 10, '', 0);
// $pdf->Cell(150, 10, 'Abarrotes "PHP & JQuery"', 0);
// $pdf->SetFont('Arial', '', 9);
// $pdf->Cell(50, 10, 'Hoy: '.date('d-m-Y').'', 0);
// $pdf->Ln(15);
// $pdf->SetFont('Arial', 'B', 11);
// $pdf->Cell(70, 8, '', 0);
// $pdf->Cell(100, 8, 'LISTADO DE PRODUCTOS', 0);
// $pdf->Ln(10);
// $pdf->Cell(60, 8, '', 0);
// $pdf->Cell(100, 8, 'Desde: '.$verDesde.' hasta: '.$verHasta, 0);
// $pdf->Ln(23);
// $pdf->SetFont('Arial', 'B', 8);
// $pdf->Cell(15, 8, 'Item', 0);
// $pdf->Cell(70, 8, 'Nombre', 0);
// $pdf->Cell(40, 8, 'Tipo', 0);
// $pdf->Cell(25, 8, 'P. Unitario', 0);
// $pdf->Cell(25, 8, 'P. Distribuidor', 0);
// $pdf->Cell(25, 8, 'Fech. Registro', 0);
// $pdf->Ln(8);
// $pdf->SetFont('Arial', '', 8);
// //CONSULTA
// $productos = mysql_query("SELECT * FROM productos WHERE fecha_reg BETWEEN '$desde' AND '$hasta' ");
// $item = 0;
// $totaluni = 0;
// $totaldis = 0;
// while($productos2 = mysql_fetch_array($productos)){
// 	$item = $item+1;
// 	$totaluni = $totaluni + $productos2['precio_unit'];
// 	$totaldis = $totaldis + $productos2['precio_dist'];
// 	$pdf->Cell(15, 8, $item, 0);
// 	$pdf->Cell(70, 8,$productos2['nomb_prod'], 0);
// 	$pdf->Cell(40, 8, $productos2['tipo_prod'], 0);
// 	$pdf->Cell(25, 8, 'S/. '.$productos2['precio_unit'], 0);
// 	$pdf->Cell(25, 8, 'S/. '.$productos2['precio_dist'], 0);
// 	$pdf->Cell(25, 8, date('d/m/Y', strtotime($productos2['fecha_reg'])), 0);
// 	$pdf->Ln(8);
// }
// $pdf->SetFont('Arial', 'B', 8);
// $pdf->Cell(104,8,'',0);
// $pdf->Cell(31,8,'Total Unitario: S/. '.$totaluni,0);
// $pdf->Cell(32,8,'Total Dist: S/. '.$totaldis,0);
//
// $pdf->Output('reporte.pdf','D');

 ?>
<!-- <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    PDF Created Click <a href="MyPDF/MyPDF.pdf">here</a> to Download
    <title></title>
  </head>
  <body>

  </body>
</html> -->
