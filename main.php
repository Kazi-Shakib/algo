<?php include"dbfile.php";

function selected_dep($dep){
$num=0;
include"dbfile.php";
$sql="SELECT * FROM sublist where id='$dep'";
$query=mysqli_query($conn,$sql);
 while($row=mysqli_fetch_array($query)){
 return $row['dep'];
 }
}



function update_set($free,$subcode,$roll){
$num=0;
include"dbfile.php";
$sql_sublist="update sublist set totalfree=$free where id=$subcode";
$query_sublist=mysqli_query($conn,$sql_sublist);



$sql_sub_selection="update subselection set selected1=$subcode where adm_roll=$roll";
$query_sub_selection=mysqli_query($conn,$sql_sub_selection);

return 1 ;
}




function checkseatfree($dep){
$num=0;
include"dbfile.php";
$sql="SELECT * FROM sublist where id='$dep'";
$query=mysqli_query($conn,$sql);
 while($row=mysqli_fetch_array($query)){
 return $row['totalfree'];
 }
}







?>

<form action ="main.php" method="POST"><hr>
<center><u><h3> Department Selection System</u></h3></center><br>
<style>
body{background:#fff}

input
{
    background-color:#fff;
    display:block;
    margin:10px;
    padding:8px 6px;
    width:300px;
	border-radius: 5px;
}
input[readonly]
{
    background-color:#ccc;
    font-style:italic;
}
</style>
<center>


Step 01 : <input type="submit"  style='color:white;background: rebeccapurple;' name="formate" value="Formate (Click Formate in every selection)">
Merit Range(last calling position) 01 -  <input type="text"  style='color:red;background: white;' name="pos_last" value="800">
Step 2 : <input type="submit"  style='color:white;background: rebeccapurple;' name="sub1" value="Make Selection">

</form>
<a href="pdf.php"> <b> Selected PDF KA   </b> </a><br>
<a href="free.php"> <b> Avilable Seat KA    </b> </a><br>

<a href="pdf2.php"> <b> Selected PDF KHA   </b> </a><br>


</center>


<?php

if(isset($_POST['formate'])){

$sql99="update subselection set selected1=0 where 1";
$q_sql99=mysqli_query($conn,$sql99);


$s1="UPDATE sublist SET totalfree = total";

$q1=mysqli_query($conn,$s1);

$s11="update subselection set vorti1=0,vorti2=0";
$q11=mysqli_query($conn,$s11);

$s22="update subselection set vorti1=1 where adm_roll IN (SELECT adm_roll from vorti)";
$q22=mysqli_query($conn,$s22);


$s33="update subselection set vorti2=1 where adm_roll IN (SELECT adm_roll from vortikha)";
$q33=mysqli_query($conn,$s33);



}
if(isset($_POST['sub1'])){

$pos_last=$_POST['pos_last'];


$sql="SELECT * FROM subselection where (pos1<=$pos_last AND status=9 AND vorti1=1) order by pos1 ASC";
$i=1;
$arr=array();

$query=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($query)){
	$count1=0;
	
	$roll=$row['adm_roll'];
	
	
	$arr[1]=$row['sub1']; if($arr[1]<1){ $arr[1]=99;}
	$arr[2]=$row['sub2']; if($arr[2]<1){ $arr[2]=99;}
	$arr[3]=$row['sub3']; if($arr[3]<1){ $arr[3]=99;}
	$arr[4]=$row['sub4']; if($arr[4]<1){ $arr[4]=99;}
	$arr[5]=$row['sub5']; if($arr[5]<1){ $arr[5]=99;}
	$arr[6]=$row['sub6']; if($arr[6]<1){ $arr[6]=99;}
	$arr[7]=$row['sub7']; if($arr[7]<1){ $arr[7]=99;}
	$arr[8]=$row['sub8']; if($arr[8]<1){ $arr[8]=99;}
	$arr[9]=$row['sub9']; if($arr[9]<1){ $arr[9]=99;}

	asort($arr);
	foreach($arr as $key=>$val){
	
	
	
	
	 $count1=checkseatfree($key);
	if($count1>0){
	//echo "---<> $key ---> $val <br>";
	$free=$count1-1;
	update_set($free,$key,$roll);
	break;
	}
	else{
	//echo "Got Next choise of $key<br>";
	}
	
	
	
	
	}
	//echo"Finished ! ";
	
	/////////////////////////////
	
	/////////////////////////////
	

	
	
	
	
	
	
	}
echo"Finished ! ";
}
?>







<center>
<table class="table" border="1">
    <thead>
    
      <tr>
        <th>SL No.</th>
        <th>Merit </th>
        <th>Roll </th>
        <th>Name </th>
       
        <th>Selected </th>
        
      </tr>
    </thead>
	<?php 
	$sql1="SELECT * FROM subselection  where ( status=9) order by pos1 ASC limit 10";
$i=1;
$query1=mysqli_query($conn,$sql1);
	while($row1=mysqli_fetch_array($query1)){
	?>
    <tbody>
      <tr>
        <td><?php echo $i++;?></td>
        <td><?php echo $row1['pos1']; ?></td>
        <td><?php echo $row1['adm_roll']; ?></td>
        <td><?php echo $row1['sname']; ?></td>
        <td><?php  $sel=$row1['selected1'];  echo selected_dep($sel);?></td>
	</tr>
	<?php }?>
	  </tbody>
	</table>
	</center>
	