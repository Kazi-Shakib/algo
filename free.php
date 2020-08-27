<?php  session_start();  require 'fpdf.php';


	class PDF extends PDF_Code128
	{
		// Page header
		function Header()
		{
			// Logo
			$this->Image('images/cuetlogo.png',20,10,15);
			// Arial bold 15
			$this->SetFont('Arial','',15);
			// Move to the right
			$this->Cell(35);
			// Title
			$this->SetFontSize(17);
			$this->Cell(1,10,'Chittagong University of Engineering & Technology (CUET)');
			$this->Ln(25);
			$this->SetXY(65,20);
			$this->SetFontSize(12);
			
			//$this->Write(5,'Admission Test 2017-18 Tabulation Sheet for all Student (Merit Wise)');
			$this->Cell(5,12,'Admission Test 2018 (Session 2018-2019)  ', 0,0,'L');
			$this->Ln(5);
			$this->Cell(5,12,'                                                     List of Avilable Seat in Departments', 0,0,'L');
			$this->Ln(32);
			$this->SetXY(89,25);
			
			$this->SetFontSize(12);
			//$this->Write(5,'Admit Card');
		$this->Ln(15);
			$this->Line(10,35, 210-10, 35);
			
			$this->Cell(10,7,'SL',1);
			$this->Cell(70,7,'Department',1);
			$this->Cell(30,7,'Total Seat',1);
			
			$this->Cell(30,7,'Total Free',1);
			//$this->Cell(15,7,'Tribal',1);
		//	$this->Cell(15,7,'Math',1);
			//$this->Cell(15,7,'Phy',1);
			//$this->Cell(15,7,'Chem',1);
			//$this->Cell(29,7,'Total Marks',1);
			
			
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
		$this->Cell(0,7,'Page '.$this->PageNo().'/{nb}',0,0,'C');
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
	$pdf->AddPage("P","Legal");
	$pdf->SetFontSize(10);

$sl=1;
$sql="SELECT * FROM sublist ";
$result=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_array($result)){		
		$dep = $row['dep'];
		$total = $row['total'];
		$totalfree = $row['totalfree'];
	
		
		
		
	// $str_main=getinfo($roll);
// $ex=explode(",",$str_main);
 // $sname=$ex[0];
 // $qouta=$ex[1];
 // $group=$ex[2];
			
			$pdf->Cell(10,7,$sl++,1);
			$pdf->Cell(70,7,$dep,1);
			$pdf->Cell(30,7,$total,1);
			$pdf->Cell(30,7,$totalfree,1);
			//$pdf->Cell(15,7,$quota,1);
			//$pdf->Cell(15,7,$math,1);
			//$pdf->Cell(15,7,$phy,1);
			//$pdf->Cell(15,7,$chem,1);
			//$pdf->Cell(29,7,$marks3,1);
			//$pdf->Cell(30,7,$sel,1);

	$pdf->Ln(7);
	
	
	
		//$pdf->Cell(0,10,'Printing line number '.$i,0,1);
	  
	
 }
 $pdf->Ln(145);
$pdf->Output(); 

?>
