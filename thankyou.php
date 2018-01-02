<?

include "inc/header.inc";
include "inc/init.php";
?>
		<div class="container">
			<div class="jumbotron">
				<img style="float:left; margin-right: 20px;"  src="images/logo.png" />
				<h1 >Business Card Confirmation</h1>
				<p>Request Business Cards Online
				<br>
				<br>
				</p>
			</div>
<?php
$businessCard= new BusinessCard();




$empName=$_SESSION['empName'];
$empTitle1= $_SESSION['empTitle1'];
$empTitle2= $_SESSION['empTitle2'];
$empContact1 = $_SESSION['empContact1'];
$empContact2 = $_SESSION['empContact2'];
$empContact3 = $_SESSION['empContact3'];
$empContact4 = $_SESSION['empContact4'];
$empCampus = $_SESSION['empCampus'];
$empFund = $_SESSION['empFund'];
$empDept = $_SESSION['empDept'];
$empProgram = $_SESSION['empProgram'];
$empClass = $_SESSION['empClass'];
$empProject  = $_SESSION['empProject'];
$reqName = $_SESSION['reqName'];
$reqEmail  = $_SESSION['reqEmail'];
$myDate = date("Y-m-d");

 $campus_sql="SELECT nameCampus FROM Campus where idCampus = $empCampus";

   foreach($businessCard->rawSelect($campus_sql)->fetchAll(PDO::FETCH_ASSOC) as $row) 
   {
		echo $nameCampus = $row['nameCampus'];   
   }

$sql="INSERT INTO Orders (empName, empTitle1, empTitle2, empContact1, empContact2, empContact3, empContact4,empCampus, empFund, empDept, empProgram, empClass, empProject, reqName, reqEmail, submitDate) VALUES ('$empName', '$empTitle1', '$empTitle2', '$empContact1', '$empContact2', '$empContact3', '$empContact4', '$empCampus','$empFund','$empDept', '$empProgram','$empClass','$empProject','$reqName','$reqEmail','$myDate')";
$businessCard->rawQuery($sql);

send_mail($empName, $nameCampus , $servername, $reqName);
?>



<div class="well" style="padding:20px 100px 10px 100px;">
			
								<h1>Thank you</h1>
								<h2>Your request has been forwarded for processing</h2>
			
			</div>
			
			<div class="well" style="padding:20px 100px 10px 100px;">
			
								<h2><a href="index.php">Request more business cards</a></h2>
								<h2><a href="http://highlands.edu">Exit</a></h2>
			
			</div>


		
