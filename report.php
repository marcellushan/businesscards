<?php

include "inc/header.inc";
include "inc/init.php";

$businessCards= new BusinessCard();

$sql = "SELECT * FROM Business_card.Orders;";

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
						
				<table border="1">
	<tr>
		<td width='100'><h4>Name</h4></td><td width='100'><h4>Title</h4></td><td width='100'><h4>Campus</h4></td><td width='200'><h4>Contact Info</h4></td><td width='300'><h4>Accounting Information</h4></td>
</tr>

<?

              foreach($businessCards->rawSelect($sql)->fetchAll(PDO::FETCH_ASSOC) as $row) 
		 				{
		 					echo "<tr>";
		 							 					echo "<td>";
		 				echo $row['empName'];
		 						 					echo "</td>";
		 						 									echo "<td>";
		 				echo $row['empTitle'];
		 						 					echo "</td>";
		 						 					echo "<td>";
		 				echo $row['empCampus'];
		 						 					echo "</td>";
		 						 					echo "<td>";
		 				echo $row['empContact'];
		 						 					echo "</td>";
		 						 					echo "<td>";
		 						 					echo $row['empFund'] . " " . $row['empDept'] . " " . $row['empProgram'] . " " . $row['empClass'] . " " . $row['empProject'];
		 						 					echo "</td>";
		 						 					echo "</tr>";
		 				}
               			?> 

</table>
</div>