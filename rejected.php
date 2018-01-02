<?php
include "inc/header.inc";
include "inc/init.php"; 
?>
<div class="container">
			<div class="jumbotron">
				<img style="float:left; margin-right: 20px;"  src="images/logo.png" />
				<h1 >Business Card Order</h1>
				<p>Cards have been marked a delivered</p>
				<br>
				<br>
				</p>
			</div>
			<div class="messageSaved"></div>
<div class="well" style="padding:20px 100px 10px 100px;">
<?
$empName = $_GET['empName'];
$reqName = $_GET['reqName'];
$reqEmail = $_GET['reqEmail'];
$idOrders = $_GET['idOrders'];


$rejectComments = $_GET['rejectComments'];
$idOrders = $_GET['idOrders'];
$my_date = date("Y-m-d");


$businessCard = new BusinessCard();

$sql="UPDATE `Orders` SET `rejected`='1' ,`dateRejected` = '" . $my_date . "' , rejectComments = '" . $rejectComments . "'  WHERE `idOrders` ='$idOrders'" ;

$businessCard->rawQuery($sql);

reject_mail($idOrders, $empName, $rejectComments, $servername, $reqName, $reqEmail) 
?>

<h2>An email has been sent to Requestor</h2>

<h3><a href="requests.php">Return to pending list</a></h3>
<h3><a href="admin.php">Go to Admin Page</a></h3>
<h3><a href="http://highlands.edu">Exit</a></h3>
</div>
</div>
<body>
<html>
