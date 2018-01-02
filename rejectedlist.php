<?php
include "inc/header.inc";
include "inc/init.php"; 

?>
	<div class="container">
			<div class="jumbotron">
				<img style="float:left; margin-right: 20px;"  src="images/logo.png" />
				<h1 >Business Card Order Report</h1>
				<p>Rejected Orders</p>
				<br>
				<br>
				</p>
			</div>
			<div class="messageSaved"></div>
<div class="well" style="padding:20px 100px 10px 100px;">
<?
$businessCard = new BusinessCard();
$sql= "select * from Orders, Campus where empCampus=idCampus AND rejected = '1'";
//$sql= "select * from Orders, Campus where empCampus=idCampus AND sentToPrinter = '1'";
$stmt=$businessCard->rawSelect($sql);
$row_count = $stmt->rowCount();
if($row_count < 1)

	{ echo "<h3>There are no rejected orders<h3>";
}
else
	 {
?>
<h2 align='center'>Rejected Orders</h2>
<div class="table-responsive">
<table class="table table-condensed table-bordered">
	<tr>

				<td><h4>Name</h4></td><td><h4>Title</h4></td><td><h4>Campus</h4></td><td><h4>Contact Info</h4></td><td><h4>Date <br>Requested</h4></td><td><h4>Rejected <br>Comments</h4></td><td><h4>Date <br>Rejected</h4></td>
</tr>
<?

              foreach($businessCard->rawSelect($sql)->fetchAll(PDO::FETCH_ASSOC) as $row) 
		 				{
		 					echo "<tr>";
		 							 					echo "<td>";
		 							 					?><a href="edit.php?idOrders=<? echo $row['idOrders'] ?>"><?
		 				echo $row['empName'];?></a><?
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
		 				echo $row['empContact4'];
		 						 					echo "</td>";

		 						 							 						 					echo "<td>";
		 				echo $row['dateReceived'];
		 						 					echo "</td>";
		 						 							echo "<td>";

		 						 				echo $row['rejectComments'];
		 						 					echo "</td>";
		 						 							 						 							echo "<td>";
		 				echo $row['dateRejected'];
		 						 					echo "</td>";
		 				}
               			?> 

</table>
</div>
<br>
<? } ?>
<h3><a href="admin.php">Go to Admin Page</a></h3>
<h3><a href="http://highlands.edu">Exit</a></h3>


</div>
