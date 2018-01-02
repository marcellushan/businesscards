<?

include "inc/header.inc";
include "inc/init.php"; 

$businessCard = new BusinessCard();

$idOrders = $_GET['idOrders'];
$sql= "Select * from Orders, Campus where empCampus=idCampus AND idOrders = $idOrders";

 foreach($businessCard->rawSelect($sql)->fetchAll(PDO::FETCH_ASSOC) as $row) 
		 				{
		 				$empName = $row['empName'];
		 				$empTitle1 = $row['empTitle1'];
		 				$empTitle2 =  $row['empTitle2'];
		 				$nameCampus =  $row['nameCampus'];
		 				$empContact1 =  $row['empContact1'];
		 				$empContact2 = $row['empContact2'];
		 				$empContact3 = $row['empContact3'];
		 				$empContact4 =  $row['empContact4'];
		 				$reqName = $row['reqName'];
		 				$reqEmail = $row['reqEmail'];
		 				$delComments = $row['delComments'];
		 				$dateReceived = $row['dateReceived'];
		 				$dateToPrinter = $row['dateToPrinter'];
		 				$dateFmPrinter = $row['dateFmPrinter'];
		 				$rejectDate = $row['dateRejected'];
		 				$dateDelivered = $row['dateDelivered'];
		 				}
 

?>
		<div class="container">
			<div class="jumbotron">
				<img style="float:left; margin-right: 20px;"  src="images/logo.png" />
				<h1 >Online Business Cards</h1>
				<p>Order Details
				<br>
				<br>
				</p>
			</div>
			<div class="messageSaved"></div>
			<div class="well" style="padding:20px 100px 10px 100px;">
					<fieldset>
					<h2 align="center">Business Card Details</h2><br>
					<h3><a href="edit.php?idOrders=<? echo $idOrders ?>">Edit Request</a></h3>
<div class="table-responsive">
<table class="table table-bordered"><tr><td><h3>Request Date</h3></td><td><h3><? echo $dateReceived ?></h3></td>
<td><h3>Reject Date</h3></td><td><h3><? echo $rejectDate ?></h3></td></tr>
<tr><td><h3>Date to Printer</h3></td><td><h3><? echo $dateToPrinter ?></h3></td>
<td><h3>Completion Date</h3></td><td><h3><? echo $dateFmPrinter ?></h3></td></tr>
</table></div>
<table class="table table-bordered table-condensed table-striped">
<tr><td><h3>Name</h3></td><td><? echo $empName ?></td></tr>
<tr><td><h3>Title</h3></td><td><? echo $empTitle1 ?><br><? echo $empTitle2 ?></td></tr>
<tr><td><h3>Contact Information</h3></td><td><? echo $empContact1 ?><br><? echo $empContact2 ?><br><? echo $empContact3 ?><br><? echo $empContact4 ?></td></tr>
<tr><td><h3>Campus</h3></td><td><? echo $nameCampus ?></td></tr>
<tr><td><h3>Requestor's Name</h3></td><td><? echo $reqName ?></td></tr>
<tr><td><h3>Requestor's Email Address</h3></td><td><? echo $reqEmail ?></td></tr>
</table>   
<br>
<br>                         	 
      									<h3><a href="javascript:history.go(-1)">Return to list</a></h3>                         
									</div>
									</div>
									
							
										
	</body>
</html>
