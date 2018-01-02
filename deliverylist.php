<?php
include "inc/header.inc";
include "inc/init.php"; 

?>
	<div class="container">
			<div class="jumbotron">
				<img style="float:left; margin-right: 20px;"  src="images/logo.png" />
				<h1 >Business Card Order Report</h1>
				<p>Sent to Printer</p>
				<br>
				<br>
				</p>
			</div>
			<div class="messageSaved"></div>
<div class="well" style="padding:20px 100px 10px 100px;">
<?
$businessCards = new BusinessCard();
$sql= "select * from Orders, Campus where empCampus=idCampus AND sentToPrinter = '1' AND recdFmPrinter = '1'";
?>
<h2 align='center'>Returned from Printer</h2>
<table border="1">
	<tr>
		<td width='200'><h4>Name</h4></td><td width='200'><h4>Title</h4></td><td width='100'><h4>Campus</h4></td><td width='200'><h4>Contact Info</h4></td><td width='150'><h4>Date <br>Requested</h4></td><td width='150'><h4>Date Sent <br> to Printer</h4></td><td width='140'><h4>Returned <br> from Printer</h4></td>
</tr>
<form action="returned.php" method="post">
  <h3 align='center'>Date returned from Printer<input type="date" name="Returned" min="2015-10-20" required=""></h3>
<?

              foreach($businessCards->rawSelect($sql)->fetchAll(PDO::FETCH_ASSOC) as $row) 
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
		 				echo $row['empContact4'];
		 						 					echo "</td>";

		 						 							 						 					echo "<td>";
		 				echo $row['submitDate'];
		 						 					echo "</td>";
		 						 							echo "<td>";
		 				echo $row['dateToPrinter'];
		 						 					echo "</td>";
		 						 						echo "<td align='center'>";
		 						 						?>
		 						 					<input type="checkbox" name="OrderID[]" value="<? echo $row['idOrders'] ?>"  />
  <?
		 						 					echo "</td>";
		 					echo "</tr>";
		 				}
               			?> 

</table>
<br>
<input type="submit"  />
</form>
<h3><a href="admin.php">Go to Admin Page</a></h3>
<h3><a href="http://highlands.edu">Exit</a></h3>


</div>
