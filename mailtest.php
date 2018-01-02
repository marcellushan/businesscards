<?php
include "inc/header.inc";
include "inc/init.php"; 
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

if(@!$_POST['OrderID']) 
	{
		echo "<h2>Please select at least one order</h2>";
		echo "<h3><a onclick='window.history.back();'>Return to List</a></h3>";
		exit(0);
	}
$businessCard = new BusinessCard();



 $sql = "SELECT * FROM Orders, Campus where empCampus=idCampus AND idOrders IN (";

 $count=count ($_POST['OrderID']);
$i = 1;

$_SESSION['OrderID'] = $_POST['OrderID'];
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

$_SESSION['sql'] = $sql;
?>
<h2>The following requests will be forwarded to the printer</h2>
<br>
<br>

<table border="1">
	<tr>
		<td width='200'><h4>Name</h4></td><td width='300'><h4>Title</h4></td><td width='100'><h4>Campus</h4></td><td width='400'><h4>Contact Info</h4></td>
</tr>

<?

              foreach($businessCard->rawSelect($sql)->fetchAll(PDO::FETCH_ASSOC) as $row) 
		 				{
		 					echo "<tr>";
		 							 					echo "<td>";
		 				echo $row['empName'];
		 						 					echo "</td>";
		 						 									echo "<td>";
		 				echo $row['empTitle1'] . "<br>";
		 				echo $row['empTitle2'];
		 						 					echo "</td>";
		 						 					echo "<td>";
		 				echo $row['nameCampus'];
		 						 					echo "</td>";
		 						 					echo "<td>";
		 				echo $row['empContact1'] . "<br>";
		 				echo $row['empContact2'] . "<br>";
		 				echo $row['empContact3'] . "<br>";
		 				echo $row['empContact4'] . "<br>";
		 						 					echo "</td>";
		 						 					echo "</tr>";
		 				}
               			?> 

</table>
<br>
<button onclick="window.location.href='sent.php'">Continue</button>

<h3><a href="admin.php">Go to Admin Page</a></h3>
<h3><a href="http://highlands.edu">Exit</a></h3>

<?
/*

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
<th width='200'>Title</th>
<th width='400'>Campus</th>
<th width='400'>Contact Info</th>
</tr>
<tr>";


              foreach($businessCard->rawSelect($sql)->fetchAll(PDO::FETCH_ASSOC) as $row) 
		 				{
		 				$message=$message ."<td>" . $row['empName'] . "</td>";
		 				$message=$message ."<td>" . $row['empTitle1'] . "<br>" . $row['empTitle2'] . "</td>";
		 				$message=$message ."<td>" . $row['nameCampus'] . "</td>";
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
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
*/
	?>

</div>
</div>
</body>
</html>
