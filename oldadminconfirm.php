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

 $campus = $_SESSION['empCampus'];
//exit(0);

 $campus_sql = "SELECT nameCampus from Campus where idCampus = $campus";
              foreach($businessCard->rawSelect($campus_sql)->fetchAll(PDO::FETCH_ASSOC) as $row) 
              {
								$nameCampus = $row['nameCampus'];              
              }

//$sql="UPDATE `Orders` SET `sentToPrinter`='1' WHERE `idOrders` IN (";
 $sql = "SELECT * FROM Business_card.Orders where idOrders IN (";

 $count=count ($_POST['OrderID']);
$i = 1;

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
    	//  $sql=$sql . "'" . $OrderID . "')";$campus = $_POST['empCampus'];

$sql = "SELECT nameCampus from Campus where idCampus = $campus";

              foreach($businessCard->rawSelect($sql)->fetchAll(PDO::FETCH_ASSOC) as $row) 
              {
								$nameCampus = $row['nameCampus'];              
              }
     }
}
?>
<h2>The following requests will be forwarded to the printer</h2>
<br>
<br>

<table border="1">
	<tr>
		<td width='200'><h4>Name</h4></td><td width='300'><h4>Title</h4></td><td width='100'><h4>Campus</h4></td><td width='400'><h4>Contact Info</h4></td>
</tr>

<?
echo $sql;
exit(0);
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
		 				echo $nameCampus;
		 						 					echo "</td>";
		 						 					echo "<td>";
		 				echo $row['empContact1'] . "<br>";
		 				echo $row['empContact2'] . "<br>";
		 				echo $row['empContact3'] . "<br>";
		 				echo $row['empContact4'];
		 						 					echo "</td>";
		 						 				/*	echo "<td>";
		 						 					echo $row['empFund'] . " " . $row['empDept'] . " " . $row['empProgram'] . " " . $row['empClass'] . " " . $row['empProject'];
		 						 					echo "</td>"; */
		 						 					echo "</tr>";
		 				}
               			?> 

</table>
<br>
<button onclick="window.location.href='sent.php'">Continue</button>
