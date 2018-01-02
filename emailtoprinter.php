<?php
include "inc/header.inc";
include "inc/init.php"; 
$mail_sql = $_SESSION['sql'];
?>
<div class="container">
			<div class="jumbotron">
				<img style="float:left; margin-right: 20px;"  src="images/logo.png" />
				<h1 >Business Card Order</h1>
				<p>Send to Printer</p>
				<br>
				<br>
				</p>
			</div>
			<div class="messageSaved"></div>
<div class="well" style="padding:20px 100px 10px 100px;">
<?
//Create today's date variable
$my_date = date("Y-m-d");

$businessCard = new BusinessCard();

$sql="UPDATE `Orders` SET `sentToPrinter`='1' ,`dateToPrinter` = '" . $my_date . "'  WHERE `idOrders` IN (";
// $sql = "SELECT * FROM Business_card.Orders where idOrders IN (";

 $count=count ($_SESSION['OrderID']);
$i = 1;


foreach($_SESSION['OrderID'] as $OrderID)
{
	 if($i < $count ) 
	 { 
		  $sql=$sql . "'" . $OrderID . "',";
		  $i++;
    }
    else 
    {
    	  $sql=$sql . "'" . $OrderID . "')";
     }
}

$businessCard->rawQuery($sql);



	//$to = "larry@wallisprinting.com";
   $to = "mhannah@highlands.edu";
$subject = "A Business Card order has been submitted by Georgia Highlands College";

$message = "
<html>
<head>
<title>A Business Card order has been submitted by Georgia Highlands College</title>
</head>
<body>
<h2>A Business Card order has been submitted by Georgia Highlands College</h2>
<table border='1'>
<tr>
<th width='200'>Employee Name</th>
<th width='200'>Title 1</th>
 <th width='200'>Title 2</th>
<th width='400'>Address</th>
<th width='400'>Contact Info</th>
</tr>
<tr>";


              foreach($businessCard->rawSelect($mail_sql)->fetchAll(PDO::FETCH_ASSOC) as $row) 
		 				{
		 				$message=$message ."<td>" . $row['empName'] . "</td>";
		 				$message=$message ."<td>" . $row['empTitle1'] . "</td>";
		 				$message=$message ."<td>" . $row['empTitle2'] . "</td>";
		 				$message=$message ."<td>" . $row['addressCampus'] . "<br>highlands.edu</td>";
		 				$message=$message ."<td>" . $row['empContact1'] . "<br>" . $row['empContact2'] . "<br>" . $row['empContact3'] . "<br>" . $row['empContact4'] . "</td>";
		 				$message=$message . "</tr>";	 				
		 				}

$message = $message . 
"</table>
</body>
</html>";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <businesscards@highlands.edu>' . "\r\n";
$headers .= 'Cc: mhannah@highlands.edu' . "\r\n";

mail($to,$subject,$message,$headers);

?>

<h2>Thank you!!</h2>

<h3><a href="admin.php">Go to Admin Page</a></h3>
<h3><a href="http://highlands.edu">Exit</a></h3>
</div>
</div>
<body>
<html>
