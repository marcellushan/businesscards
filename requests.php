<?php
include "inc/header.inc";
include "inc/init.php"; 

?>
	<div class="container">
			<div class="jumbotron">
				<img style="float:left; margin-right: 20px;"  src="images/logo.png" />
				<h1 >Business Card Order Report</h1>
				<p>Business Card Requests</p>
				<br>
				<br>
				</p>
			</div>
			<div class="messageSaved"></div>
<div class="well" style="padding:20px 100px 10px 100px;">
<?
$businessCard = new BusinessCard();

$sql= "select * from Orders, Campus where sentToPrinter <> '1' AND rejected <> '1' AND empCampus = idCampus ORDER BY dateReceived DESC" ;
$stmt=$businessCard->rawSelect($sql);
$row_count = $stmt->rowCount();
if($row_count < 1)

	{ echo "<h3>There are no pending requests<h3>";
}
else
	 {
?>
<h2 align='center'>Total Requests Pending :  <? echo $row_count ?></h2>
	<button onclick="window.location.href='pending_print_form.php'">Print</button><p>
<form action="verifytoprinter.php" method="post">
<div class="table-responsive">
<table class="table table-bordered table-striped">
	<tr>
		<td><h4>Name</h4></td><td><h4>Title</h4></td><td><h4>Campus</h4></td><td><h4>Contact Info</h4></td><td><h4>Requestor Name</h4></td><td><h4>Req. Email</h4></td><td><h4>Accting</h4></td><td><h4>Date Req.</h4></td><td><h4>Submit</h4></td><td></td>
</tr>

<?



              foreach($businessCard->rawSelect($sql)->fetchAll(PDO::FETCH_ASSOC) as $row) 
		 				{
		 					echo "<tr>";
		 							 					echo "<td>";
		 				echo $row['empName'];
		 						 					echo "</td>";
		 						 									echo "<td>";
		 				echo $row['empTitle1']. "<br>";
		 						 				echo $row['empTitle2'];
		 						 					echo "</td>";
		 						 					echo "<td>";
		 				echo $row['nameCampus'];
		 						 					echo "</td>";
		 						 					echo "<td>";
		 				echo $row['empContact1'] . "<br>";
		 				echo $row['empContact2']. "<br>";
		 				echo $row['empContact3']. "<br>";
		 				echo $row['empContact4']. "<br>";
		 						 					echo "</td>";
		 						 					echo "<td>";
		 				echo $row['reqName'];
		 						 					echo "</td>";
		 						 					echo "<td>";
		 				echo $row['reqEmail'];
		 						 					echo "</td>";
		 						 					echo "<td>";
		 						 					echo $row['empFund'] . "<br>";
		 						 					echo$row['empDept'] . "<br>";
		 						 					echo$row['empProgram']. "<br>";
		 						 					echo$row['empClass'] . "<br>";
		 						 					echo $row['empProject']. "<br>";
		 						 					echo "</td>";
		 						 							 						 					echo "<td>";
		 				echo $row['dateReceived'];
		 						 					echo "</td>";
		 						 					?>
		 						 					<td align='center'>
		 						 					<input type="checkbox" name="OrderID[]" value="<? echo $row['idOrders'] ?>"  />
		 						 					</td>
		 						 					<?
		 						 					echo "<td>";
		 						 					?>
		 						 					<a href="reject.php?idOrders=<? echo $row['idOrders'] ?>">Reject</a>
		 						 					<?
		 						 					echo "</td>";
		 					echo "</tr>";
		 				}
               			?> 

</table>
</div>
<p>
<p>
<input type="submit"  />
</form>
<? } ?>
<h3><a href="admin.php">Go to Admin Page</a></h3>
<h3><a href="http://highlands.edu">Exit</a></h3>
</div>
