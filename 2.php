<?php  session_start();  require 'fpdf.php';


	class PDF extends PDF_Code128
	{
		// Page header
		function Header()
		{
			// Logo
			
			// Arial bold 15
			
			$this->Ln(7);
		
		}
		
		// Page footer
		function Footer()
		{
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Page number
		//$this->Cell(0,7,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		$this->Image('1.jpg',10,40,190);
		$this->Image('2.jpg',10,160,190);
	}
	}
	
$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "adm2018_published";
			
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			
			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
	
	


	// Instanciation of inherited class
	$pdf = new PDF();
	
	$pdf->AliasNbPages();
	//$pdf->AddPage("P","Legal");
	$pdf->SetFontSize(10);

$sl=1;
$sql="SELECT * FROM subselection where selected1>0 limit 10";
$result=mysqli_query($conn,$sql);
		while($row_ss=mysqli_fetch_array($result)){		
	
		$pdf->AddPage();
			$sub1 = $row_ss['sub1'];
		$adm_roll = $row_ss['adm_roll'];
		$sub2 = $row_ss['sub2'];
		$sub3 = $row_ss['sub3'];
		$sub4 = $row_ss['sub4'];
		$sub5 = $row_ss['sub5'];
		$sub6 = $row_ss['sub6'];
		$sub7 = $row_ss['sub7'];
		$sub8 = $row_ss['sub8'];
		$sub9 = $row_ss['sub9'];
		$sub10 = $row_ss['sub10'];
	

		
	// $str_main=getinfo($roll);
// $ex=explode(",",$str_main);
 // $sname=$ex[0];
 // $qouta=$ex[1];
 // $group=$ex[2];
			
			$pdf->Ln(7);
			
				$pdf->Cell(20,7,'CE',1,0,'C');
	$pdf->Cell(20,7,'EEE',1,0,'C');
	$pdf->Cell(20,7,'ME',1,0,'C');
	$pdf->Cell(20,7,'CSE',1,0,'C');
	$pdf->Cell(20,7,'PME',1,0,'C');
	$pdf->Cell(20,7,'ETE',1,0,'C');
	$pdf->Cell(20,7,'MIE',1,0,'C');
	$pdf->Cell(20,7,'WRE',1,0,'C');
	$pdf->Cell(20,7,'URP',1,0,'C');
	if($adm_roll>10000){
	$pdf->Cell(20,7,'ARCH',1,0,'C');
	}
	$pdf->Ln(7);
	$pdf->Cell(20,7,$sub1,1,0,'C');
	$pdf->Cell(20,7,$sub2,1,0,'C');
	$pdf->Cell(20,7,$sub3,1,0,'C');
	$pdf->Cell(20,7,$sub4,1,0,'C');
	$pdf->Cell(20,7,$sub5,1,0,'C');
	$pdf->Cell(20,7,$sub6,1,0,'C');
	$pdf->Cell(20,7,$sub7,1,0,'C');
	$pdf->Cell(20,7,$sub8,1,0,'C');
	$pdf->Cell(20,7,$sub9,1,0,'C');
	if($adm_roll>10000){
	$pdf->Cell(20,7,$sub10,1,0,'C');
	}

	$pdf->Ln(7);
	
	$pdf->SetAutoPageBreak('on','20');
	//
		//$pdf->Cell(0,10,'Printing line number '.$i,0,1);
	  
	
 }
 $pdf->Ln(145);
$pdf->Output(); 

?>
