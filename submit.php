<?

include "inc/header.inc"

?>
		<div class="container">
			<div class="jumbotron">
				<img style="float:left; margin-right: 20px;"  src="images/logo.png" />
				<h1 >Business Card Order Form</h1>
				<p>Request Business Cards Online
				<br>
				<br>
				</p>
			</div>
<?php

include "inc/class.Crud.inc";

$crud= new Crud();

//echo $crud->conn();

//print_r($_POST);

$empName=$_POST['empName'];
$empTitle= $_POST['empTitle'];
$empContact = $_POST['empContact'];
$empCampus = $_POST['empCampus'];
$empFund = $_POST['fund'];
$empDept = $_POST['dept'];
$empProgram = $_POST['program'];
$empClass = $_POST['class'];
$empProject = $_POST['project'];

$sql="INSERT INTO Orders (empName, empTitle, empContact, empCampus, empFund, empDept, empProgram, empClass, empProject) VALUES ('$empName', '$empTitle', '$empContact', '$empCampus','$empFund','$empDept', '$empProgram','$empClass','$empProject')";
$crud->rawQuery($sql);


?>

			<div class="well" style="padding:20px 100px 10px 100px;">
			
			<h2>Thank you for your order!!</h2>
			
			</div>