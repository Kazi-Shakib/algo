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
			$this->Cell(5,12,'Admission Test 2019 (Session 2019-2020)  ', 0,0,'L');
			$this->Ln(5);
			$this->Cell(5,12,'                    List of Candidates and their Obtained Department according to Merit and Option', 0,0,'L');
			$this->Ln(32);
			$this->SetXY(89,25);
			
			$this->SetFontSize(12);
			//$this->Write(5,'Admit Card');
		$this->Ln(15);
			$this->Line(10,35, 210-10, 35);
			
			$this->Cell(10,7,'SL',1);
			$this->Cell(20,7,'Merit',1);
			$this->Cell(20,7,'Roll',1);
			
			$this->Cell(120,7,'Student Name',1);
			//$this->Cell(15,7,'Tribal',1);
		//	$this->Cell(15,7,'Math',1);
			//$this->Cell(15,7,'Phy',1);
			//$this->Cell(15,7,'Chem',1);
			//$this->Cell(29,7,'Total Marks',1);
			$this->Cell(30,7,'Dept.',1);
			
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
$sql="SELECT * FROM subselection where selected1>0 order by pos1 ASC";
$result=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_array($result)){		
		$merit = $row['pos1'];
		$roll = $row['adm_roll'];
		$name = $row['sname'];
	
		
		
		$sel=$row['selected1'];  
if($sel==1){ $sel="CE";}
if($sel==2){ $sel="EEE";}
if($sel==3){ $sel="ME";}
if($sel==4){ $sel="CSE";}
if($sel==5){ $sel="PME";}
if($sel==6){ $sel="ETE";}
if($sel==7){ $sel="MIE";}
if($sel==8){ $sel="WRE";}
if($sel==9){ $sel="URP";}
if($sel==11){ $sel="BME";}
if($sel==12){ $sel="MSE";}
		
		
	// $str_main=getinfo($roll);
// $ex=explode(",",$str_main);
 // $sname=$ex[0];
 // $qouta=$ex[1];
 // $group=$ex[2];
			
			$pdf->Cell(10,7,$sl++,1);
			$pdf->Cell(20,7,$merit,1);
			$pdf->Cell(20,7,$roll,1);
			$pdf->Cell(120,7,$name,1);
			//$pdf->Cell(15,7,$quota,1);
			//$pdf->Cell(15,7,$math,1);
			//$pdf->Cell(15,7,$phy,1);
			//$pdf->Cell(15,7,$chem,1);
			//$pdf->Cell(29,7,$marks3,1);
			$pdf->Cell(30,7,$sel,1);

	$pdf->Ln(7);
	
	
	
		//$pdf->Cell(0,10,'Printing line number '.$i,0,1);
	  
	
 }
 $pdf->Ln(145);
$pdf->Output(); 

?>
