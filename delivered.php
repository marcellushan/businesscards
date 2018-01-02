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

$delDate = $_GET['Returned'];
$delComments = $_GET['delComments'];
$idOrders = $_GET['idOrders'];




$businessCard = new BusinessCard();

$sql="UPDATE `Orders` SET `delivered`='1' ,`dateDelivered` = '" . $delDate . "' , delComments = '" . $delComments . "'  WHERE `idOrders` ='$idOrders'" ;

$businessCard->rawQuery($sql);
?>

<h2>Thank you!!</h2>

<h3><a href="printed.php">Deliver more Cards</a></h3>
<h3><a href="admin.php">Go to Admin Page</a></h3>
<h3><a href="http://highlands.edu">Exit</a></h3>
</div>
</div>
<body>
<html>
