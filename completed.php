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
$sql= "select * from Orders, Campus where empCampus=idCampus AND recdFmPrinter = '1'";
$stmt=$businessCard->rawSelect($sql);
$row_count = $stmt->rowCount();
if($row_count < 1)

	{ echo "<h3>There are no completed orders</h3>";
}
else
	 {
?>
<h2 align='center'>Completed Orders</h2>
	<button onclick="window.location.href='print_form.php?type=completed'">Print</button><p>
<div class="table-responsive">
<table class="table table-striped table-bordered">
	<tr>
		<td><h4>Name</h4></td><td><h4>Date Requested</h4></td><td><h4>Date Completed</h4></td>
</tr>

<?

              foreach($businessCard->rawSelect($sql)->fetchAll(PDO::FETCH_ASSOC) as $row) 
		 				{
		 					echo "<tr>";
		 							 					echo "<td>"; ?>
		 				<a href="orderdetails.php?idOrders=<? echo $row['idOrders']  ?>" ><? echo $row['empName']  ?></a>  
		 				<?
		 						 					echo "</td>";
		 						 									echo "<td>";
		 				echo $row['dateReceived'];
		 						 					echo "</td>";
		 						 					echo "<td>";
		 				echo $row['dateFmPrinter'];
		 						 					echo "</td>";
		 					echo "</tr>";
		 				}
               			?> 

</table>
</div>
<?  }  ?>

<h3><a href="admin.php">Go to Admin Page</a></h3>
<h3><a href="http://highlands.edu">Exit</a></h3>


</div>
</div>
</body>
</html>