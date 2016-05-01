<?php
define('FPDF_FONTPATH','/fpdf181/font/');
require('fpdf181/fpdf.php');
$pdf=new FPDF( 'P' , 'mm' , 'A4' );
$pdf->AddFont('THSarabunNew','','THSarabunNew.php');
$pdf->AddFont('THSarabunNewb','B','THSarabunNewb.php');
$pdf->AddFont('THSarabunNewi','I','THSarabunNewi.php');
$pdf->AddFont('THSarabunNewbt','BI','THSarabunNewbt.php');
$reserid = $_GET['reser_id'];
$currentday = date('d/m/Y');
$pdf->AddPage();

$pdf->Image('images/kk.jpg',25,20,20,0,'');
$pdf->SetFont('THSarabunNew','',30);
$pdf->Cell( 0  , 20 , iconv( 'UTF-8','cp874' , 'บันทึกข้อความ' ) , 0 , 1 , 'C' );
$pdf->SetFont('THSarabunNew','',18);
$pdf->setXY( 25, 45  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ส่วนราชการ   _____________________________________________________________')  );
$pdf->setXY( 65, 44  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $reserid)  );
$pdf->setXY( 25, 55  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ที่')  );
$pdf->setXY( 37, 55  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , '__________________________________')  );
$pdf->setXY( 40, 54  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $reserid)  );
$pdf->setXY( 118, 55  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'วันที่ __________________________')  );
$pdf->setXY( 140, 54  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $currentday)  );
$pdf->setXY( 25, 65  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'เรื่อง')  );
$pdf->setXY( 37, 65  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , '__________________________________________________________________')  );
$pdf->setXY( 45, 64  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $reserid)  );
$pdf->setXY( 25, 80  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'เรียน')  );
$pdf->setXY( 40, 80  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $reserid)  );

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
