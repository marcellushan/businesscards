<?php
include "inc/header.inc";
include "inc/init.php"; 

?>
	<div class="container">
			<div class="jumbotron">
				<img style="float:left; margin-right: 20px;"  src="images/logo.png" />
				<h1 >Business Card Order Report</h1>
				<p>Request Status</p>
				<br>
				<br>
				</p>
			</div>
			<div class="messageSaved"></div>
<div class="well" style="padding:20px 100px 10px 100px;">
<?
$businessCard = new BusinessCard();
$sql= "select * from Orders, Campus where empCampus=idCampus AND recdFmPrinter = '1' AND delivered <> '1'";
$stmt=$businessCard->rawSelect($sql);
$row_count = $stmt->rowCount();
if($row_count < 1)

	{ echo "<h3>There are no orders received from the printer</h3>";
}
else
	 {
?>
<h2 align='center'>Ready for Delivery</h2>
<div class="table-responsive">
<table class="table table-bordered table-striped">
	<tr>
		<td width='300'><h4>Name</h4></td><td width='300'><h4>Title</h4></td><td width='100'><h4>Campus</h4></td><td width='200'><h4>Contact Info</h4></td><td width='150'><h4>Date Rec.</h4></td>
</tr>

<?

              foreach($businessCard->rawSelect($sql)->fetchAll(PDO::FETCH_ASSOC) as $row) 
		 				{
		 					echo "<tr>";
		 							 					echo "<td>"; ?>
		 				<a href="delivery.php?idOrders=<? echo $row['idOrders']  ?>" ><? echo $row['empName']  ?></a>  
		 				<?
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
		 						 					echo "<td>";
		 				echo $row['dateFmPrinter'];
		 						 					echo "</td>";
		 					echo "</tr>";
		 				}
               			?> 

</table>
</div>
<? } ?>

<h3><a href="admin.php">Go to Admin Page</a></h3>
<h3><a href="http://highlands.edu">Exit</a></h3>
</div>
</div>
</body>
</html>