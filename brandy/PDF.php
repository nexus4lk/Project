<?php
define('FPDF_FONTPATH','/fpdf181/font/');
require('fpdf181/fpdf.php');
$pdf=new FPDF( 'P' , 'mm' , 'A4' );
$pdf->AddFont('THSarabunNew','','THSarabunNew.php');
$pdf->AddFont('THSarabunNewb','B','THSarabunNewb.php');
$pdf->AddFont('THSarabunNewi','I','THSarabunNewi.php');
$pdf->AddFont('THSarabunNewbt','BI','THSarabunNewbt.php');
$pdf->AddPage();
$pdf->Image('images/kk.jpg',10,20,30,0,'');
$pdf->SetFont('THSarabunNew','',16);
$pdf->Cell( 0  , 20 , iconv( 'UTF-8','cp874' , 'หัวข้อเรื่อง' ) , 0 , 1 , 'C' );
$pdf->SetFont('THSarabunNew','',12);
$pdf->setXY( 10, 60  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'THSarabunNew ตัวธรรมดา ขนาด 12' ) );

$pdf->SetFont('THSarabunNewb','B',16);
$pdf->setXY( 10, 70  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'THSarabunNewb ตัวหนา ขนาด 16' )  );

$pdf->SetFont('THSarabunNewi','I',24);
$pdf->setXY( 10, 80  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'THSarabunNewi ตัวเอียง ขนาด 24' )  );

$pdf->SetFont('THSarabunNewbt','BI',32);
$pdf->setXY( 10, 90  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'THSarabunNewbt ตัวหนาเอียง ขนาด 32' )  );

$pdf->Output();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    PDF Created Click <a href="MyPDF/MyPDF.pdf">here</a> to Download
    <title></title>
  </head>
  <body>

  </body>
</html>
