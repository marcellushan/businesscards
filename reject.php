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
		 				$empFund = $row['empFund'];
		 				$empDept = $row['empDept'];
		 				$empProgram = $row['empProgram'];
		 				$empClass = $row['empClass'];
		 				$empProject = $row['empProject'];
		 				}
 

?>
		<div class="container">
			<div class="jumbotron">
				<img style="float:left; margin-right: 20px;"  src="images/logo.png" />
				<h1 >Rejected  Business Card Order</h1>

				<br>
				<br>
				</p>
			</div>
			<div class="messageSaved"></div>
			<div class="well" style="padding:20px 100px 10px 100px;">
					<fieldset>
						<!-- Form Name -->
						<h2>
							Business Card Details
						</h2>

							<div class="form-group col-md-8">
								<!-- Text input-->
								<h3>Name</h3>
								<input class="form-control" value="<? echo $empName ?>">

								<!-- Text input-->
								<h3>Title</h3>
								<input class="form-control" value="<? echo $empTitle1 ?>">
								<br>
								<input class="form-control" value="<? echo $empTitle2 ?>">

								<!-- Text input-->
								<h3>Contact Information</h3>
							<input class="form-control" value="<? echo $empContact1 ?>">
								<br>
							<input class="form-control" value="<? echo $empContact2 ?>">
								<br>
							<input class="form-control" value="<? echo $empContact3 ?>">
								<br>
							<input class="form-control" value="<? echo $empContact4 ?>">
								
										<h3>Campus</h3>
										<input class="form-control" value="<? echo $nameCampus ?>">
										
										<br>
										
											<h3>Requestor's Name</h3>
								<input class="form-control" value="<? echo $reqName ?>">

								<!-- Text input-->
								<h3>Requestor's Email Address</h3>
								<input class="form-control" value="<? echo $reqEmail ?>">
								
								  <h3>Budget Information</h3>
                               <p>
                               	<input class="form-control" value="<? echo $empFund ?>">
                               	<input class="form-control" value="<? echo $empDept ?>">
                               	<input class="form-control" value="<? echo $empProgram ?>">
                               	<input class="form-control" value="<? echo $empClass ?>">
                               	<input class="form-control" value="<? echo $empProject ?>">
                               	 <p>
								
								<form action="rejected.php" method="get">
								
                               <h3>Comments</h3>
                               	<textarea  class="form-control" rows="4" cols="50" name="rejectComments" placeholder="Enter details about the delivery" class="form-control" ></textarea>
                               	 <input type="hidden" name="idOrders" value="<? echo $idOrders ?>" />
                               	 <input type="hidden" name="empName" value="<? echo $empName ?>" />
                               	 <input type="hidden" name="reqName" value="<? echo $reqName ?>" />
                               	 <input type="hidden" name="reqEmail" value="<? echo $reqEmail ?>" />
                               	 
                               
																			<input type="submit" value="Submit" />
																			
									</form>
									</div>
							
										
	</body>
</html>
