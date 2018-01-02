<?php
//include "inc/header.inc";
include "inc/init.php"; 
?>
<div class="container">
			<div class="jumbotron">
				<img style="float:left; margin-right: 20px;"  src="images/logo.png" />
				<h1 >Business Card Edit</h1>
				<p>The business card request has been edited</p>
				<br>
				<br>
				</p>
			</div>
			<div class="messageSaved"></div>
<div class="well" style="padding:20px 100px 10px 100px;">
<?

$idOrders = $_GET['idOrders'];
$empName = $_GET['empName'];
$empTitle1 = $_GET['empTitle1'];
$empTitle2 = $_GET['empTitle2'];
$empContact1 = $_GET['empContact1'];
$empContact2 = $_GET['empContact2'];
$empContact3 = $_GET['empContact3'];
$empContact4 = $_GET['empContact4'];
$reqName = $_GET['reqName'];
$reqEmail = $_GET['reqEmail'];
$empFund = $_GET['empFund'];
$empDept = $_GET['empDept'];
$empProgram = $_GET['empProgram'];
$empClass = $_GET['empClass'];
$empProject = $_GET['empProject'];


$businessCard = new BusinessCard();

$sql="UPDATE `Orders` SET `rejected`='0' ,`empName` = '" . $empName . "' , `empTitle1` = '" . $empTitle1 . "' , `empTitle2` = '" . $empTitle2 . "' ,`empContact1` = '" . $empContact1 . "' ,`empContact2` = '" . $empContact2 . "' , `empContact3` = '" . $empContact3 . "' , `empContact4` = '" . $empContact4 . "' ,  `reqEmail` = '" . $reqEmail . "' ,  `reqName` = '" . $reqName . "' ,  `empFund` = '" . $empFund . "' ,`empDept` = '" . $empDept . "' ,`empProgram` = '" . $empProgram . "' ,`empClass` = '" . $empClass . "' ,empProject = '" . $empProject . "'  WHERE `idOrders` ='$idOrders'" ;

$businessCard->rawQuery($sql);
?>

<h2>Thank you!!</h2>
<h3><a href="admin.php">Go to Admin Page</a></h3>
<h3><a href="http://highlands.edu">Exit</a></h3>
</div>
</div>
<body>
<html>
