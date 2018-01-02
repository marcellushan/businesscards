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
$businessCards = new BusinessCard();

//$sql="UPDATE `Orders` SET `sentToPrinter`='1' WHERE `idOrders` IN (";
 $sql = "SELECT * FROM Orders, Campus where empCampus=idCampus AND idOrders IN (";

 $count=count ($_POST['OrderID']);
$i = 1;
$received_date = $_POST['Received'];
$newDate = date("F j, Y", strtotime($received_date));
$_SESSION['OrderID'] = $_POST['OrderID'];
foreach($_POST['OrderID'] as $OrderID)
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
?>
<h3>The following business cards were received from the printer on <? echo $newDate ?></h3>
<br>
<br>

<div class="table-responsive">
<table class="table" border="1">
	<tr>
		<td><h4>Name</h4></td><td><h4>Title</h4></td><td><h4>Campus</h4></td><td><h4>Contact Info</h4></td>
</tr>

<?

              foreach($businessCards->rawSelect($sql)->fetchAll(PDO::FETCH_ASSOC) as $row) 
		 				{
		 					echo "<tr>";
		 							 					echo "<td>";
		 				echo $row['empName'];
		 						 					echo "</td>";
		 						 									echo "<td>";
		 				echo $row['empTitle1'];
		 						 					echo "</td>";
		 						 					echo "<td>";
		 				echo $row['nameCampus'];
		 						 					echo "</td>";
		 						 					echo "<td>";
		 				echo $row['empContact1'] . "<br>";
		 				echo $row['empContact2'] . "<br>";
		 				echo $row['empContact3'] . "<br>";
		 				echo $row['empContact4'];
		 						 					echo "</td>";
		 						 					echo "</tr>";
		 				}
               			?> 

</table>
</div>
<br>
<?

$insert_sql="UPDATE `Orders` SET `recdFmPrinter`='1' ,`dateFmPrinter` = '" . $received_date . "'  WHERE `idOrders` IN (";
// $sql = "SELECT * FROM Business_card.Orders where idOrders IN (";

 $count=count ($_SESSION['OrderID']);
$i = 1;


foreach($_SESSION['OrderID'] as $OrderID)
{
	 if($i < $count ) 
	 { 
		  $insert_sql=$insert_sql . "'" . $OrderID . "',";
		  $i++;
    }
    else 
    {
    	  $insert_sql=$insert_sql . "'" . $OrderID . "')";
     }
}

$businessCards->rawQuery($insert_sql);
?>
<h3><a href="admin.php">Go to Admin Page</a></h3>
<h3><a href="http://highlands.edu">Exit</a></h3>
</div>
</div>
<body>
<html>