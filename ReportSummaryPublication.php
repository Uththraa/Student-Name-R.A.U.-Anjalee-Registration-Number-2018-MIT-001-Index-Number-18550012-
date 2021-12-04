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

            date_default_timezone_set('US/Eastern');
            $currentdate = date("d-m-Y");

            $this->SetFont('Arial','B',12);
            $this->Cell(195,5,'Welcome to ESEB Information System!',0,0,"R");
            // Line break
            $this->Ln(5);
            $this->Cell(275,5,'Ministry of Education',0,0,"R");

            // Line break
            $this->Ln(5);

            $this->Cell(275,5,$currentdate,0,1,"R");
                        // Line break
            $this->Ln(15);

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


  

$display_heading = array('EmpNo'=>'EmpNo', 'Name'=> 'Name', 'Class'=> 'Class','Designation'=> 'Designation','Location'=> 'Location' );

$result = mysqli_query($connString, "SELECT * FROM `sleasofficer`WHERE PlaceOfWork  ='Publication' and Class='Class I'") or die("database error:". mysqli_error($connString));
$class1 = mysqli_num_rows($result); 

$result1 = mysqli_query($connString, "SELECT * FROM `sleasofficer`WHERE PlaceOfWork  ='Publication' and Class='Special'") or die("database error:". mysqli_error($connString));
$special = mysqli_num_rows($result1); 

$result2 = mysqli_query($connString, "SELECT * FROM `sleasofficer`WHERE PlaceOfWork  ='Publication' and Class='Class II' or PlaceOfWork  ='Publication' and Class='Class III'") or die("database error:". mysqli_error($connString));
$class2_3 = mysqli_num_rows($result2); 



$header = mysqli_query($connString, "SELECT EmpNo , Name , Class , Designation ,Location FROM `sleasofficer`");



$pdf = new PDF('L','mm','A4');
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);


$pdf->Cell(5,6,'',0,0,"L");
$pdf->Cell(5,8,'Summary of Department of Publication Cadre',0,0,"L");
$pdf->Cell(5,10,'',0,1,"L");
/* Column headings */


$width_cell=array(70,50,50,50,50);

$pdf->SetFillColor(51, 122, 255);// Background color of header 
// Header starts /// 
$pdf->Cell($width_cell[0],10,'',1,0,'C',true); // First header column 
$pdf->Cell($width_cell[1],10,'Approved Cadre',1,0,'C',true); // Second header column
$pdf->Cell($width_cell[2],10,'Current Cadre',1,0,'C',true); // Third header column 
$pdf->Cell($width_cell[3],10,'Status',1,0,'C',true); // Fourth header column
$pdf->Cell($width_cell[4],10,'Variance',1,1,'C',true); // Fourth header column


$specialt=2-$special;
$classOne=4-$class1;
$classTwoThree=38-$class2_3;

        if($specialt==0){
            $test1="";
        }elseif($specialt<0){
            $test1="Vacancy";
        }else{
            $test1="Excess";
        }

        if($classOne==0){
            $test2="";
        }elseif($classOne<0){
            $test2="Vacancy";
        }else{
            $test2="Excess";
        }

        if($classTwoThree==0){
            $test3="";
        }elseif($classTwoThree<0){
            $test3="Vacancy";
        }else{
            $test3="Excess";
        }

$pdf->SetFont('Arial','',13);
// First row of data 
$pdf->Cell($width_cell[0],10,'Special',1,0,'C',false); // First column of row 1 
$pdf->Cell($width_cell[1],10,'2',1,0,'C',false); // Second column of row 1 
$pdf->Cell($width_cell[2],10,$special,1,0,'C',false); // Third column of row 1 
$pdf->Cell($width_cell[3],10,$test1 ,1,0,'C',false); // Fourth column of row 1 
$pdf->Cell($width_cell[4],10,2-$special,1,1,'C',false); // Fifth column of row 1 
//  First row of data is over 

//  Second row of data 
$pdf->Cell($width_cell[0],10,'Class I',1,0,'C',false); // First column of row 2 
$pdf->Cell($width_cell[1],10,'4',1,0,'C',false); // Second column of row 2
$pdf->Cell($width_cell[2],10,$class1,1,0,'C',false); // Third column of row 2
$pdf->Cell($width_cell[3],10,$test2,1,0,'C',false); // Fourth column of row 1 
$pdf->Cell($width_cell[4],10,4-$class1,1,1,'C',false); // Fifth column of row 2 
//   Sedond row is over 

//  Third row of data
$pdf->Cell($width_cell[0],10,'Class II / III',1,0,'C',false); // First column of row 3
$pdf->Cell($width_cell[1],10,'38',1,0,'C',false); // Second column of row 3
$pdf->Cell($width_cell[2],10,$class2_3,1,0,'C',false); // Third column of row 3
$pdf->Cell($width_cell[3],10,$test3,1,0,'C',false); // Fourth column of row 3
$pdf->Cell($width_cell[4],10,38-$class2_3,1,1,'C',false); // Fifth column of row 3





$pdf->Output();
?>