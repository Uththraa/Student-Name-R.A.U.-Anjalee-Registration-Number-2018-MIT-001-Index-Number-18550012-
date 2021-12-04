<?php
//include connection file 
include_once('include/database.php');
require('fpdf/fpdf.php');



Class dbObj{
    /* Database connection start */
    var $dbhost = "localhost";
    var $username = "root";
    var $password = "";
    var $dbname = "eseb_ims";
    var $conn;
    function getConnstring() {
            $con = mysqli_connect($this->dbhost, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());

            /* check connection */
            if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
            } else {
            $this->conn = $con;
            }
            return $this->conn;
    }
}

class PDF extends FPDF
{
        // Page header
        function Header()
        {
            // Logo
            $this->Image('logo.png',15,-1,40);
            $this->SetFont('Arial','B',13);
            // Move to the right
            $this->Cell(80);
            // Title

          $this->SetFont('Arial','B',12);
        $this->Cell(110,5,'Welcome to ESEB Information System!',0,0,"R");
            // Line break
            $this->Ln(5);
        $this->Cell(190,5,'SLEAS Officer"s List in Department Of Publication',0,0,"R");

            // Line break
            $this->Ln(20);
        }

        // Page footer
        function Footer()
        {
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Page number
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
}

$db = new dbObj();
$connString =  $db->getConnstring();
$display_heading = array('EmpNo'=>'EmpNo', 'Name'=> 'Name', 'Class'=> 'Class','Designation'=> 'Designation');

$result = mysqli_query($connString, "SELECT EmpNo , Name , Class , Designation  FROM `sleasofficer`WHERE PlaceOfWork  ='Publication'") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SELECT EmpNo , Name , Class , Designation FROM `sleasofficer`");



$pdf = new PDF('P','mm','A4');
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',8);

/* Column headings */


$width_cell=array(35,60,20,80);

$pdf->SetFillColor(51, 122, 255);// Background color of header 
// Header starts /// 
$pdf->Cell($width_cell[0],10,'ID',1,0,'C',true); // First header column 
$pdf->Cell($width_cell[1],10,'NAME',1,0,'C',true); // Second header column
$pdf->Cell($width_cell[2],10,'CLASS',1,0,'C',true); // Third header column 
$pdf->Cell($width_cell[3],10,'DESIGNATION',1,1,'C',true); // Fourth header column



while($row = $result->fetch_object()){

  $EmpNo = $row->EmpNo;
  $name = $row->Name;
  $Class = $row->Class;
  $Designation = $row->Designation;

  $pdf->Cell(35,10,$EmpNo,1);
  $pdf->Cell(60,10,$name,1);
  $pdf->Cell(20,10,$Class,1);
  $pdf->Cell(80,10,$Designation,1);
 

  $pdf->Ln();

}


$pdf->Output();
?>