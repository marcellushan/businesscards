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
		 				$rejectComments = $row['rejectComments'];
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
							Please correct information and click submit
						</h2>
								<form action="user_resubmit.php" method="get">
							<div class="form-group col-md-8">
								<!-- Text input-->
								<h3>Name</h3>
								<input class="form-control" name="empName" type="text"  value="<? echo $empName ?>">

								<!-- Text input-->
								<h3>Title</h3>
								<input class="form-control" name="empTitle1" type="text" value="<? echo $empTitle1 ?>">
								<br>
								<input class="form-control" name="empTitle2" type="text" value="<? echo $empTitle2 ?>">

								<!-- Text input-->
								<h3>Contact Information</h3>
							<input  class="form-control" name="empContact1" type="text" value="<? echo $empContact1 ?>">
								<br>
							<input class="form-control" name="empContact2" type="text" value="<? echo $empContact2 ?>">
								<br>
							<input class="form-control" name="empContact3" type="text" value="<? echo $empContact3 ?>">
								<br>
							<input class="form-control" name="empContact4" type="text" value="<? echo $empContact4 ?>">
								
										<h3>Campus</h3>
										<inputclass="form-control"  value="<? echo $nameCampus ?>">
										
										<br>
										
											<h3>Requestor's Name</h3>
								<input class="form-control" value="<? echo $reqName ?>">

								<!-- Text input-->
								<h3>Requestor's Email Address</h3>
								<input class="form-control" type="email" value="<? echo $reqEmail ?>">
								
																<h3>Rejector's comments</h3>
								<input size="100" value="<? echo $rejectComments ?>">
								
								  <h3>Budget Information</h3>
                               <p>
                               	<input class="form-control" maxlength="5" name="empFund" type="text" value="<? echo $empFund ?>">
                               	<input class="form-control" maxlength="7" name="empDept" type="text" value="<? echo $empDept ?>">
                               	<input class="form-control" maxlength="5" name="empProgram" type="text" value="<? echo $empProgram ?>">
                               	<input class="form-control" maxlength="5" name="empClass" type="text" value="<? echo $empClass ?>">
                               	<input class="form-control" maxlength="20" name="empProject" type="text" value="<? echo $empProject ?>">
                               	<input type="hidden" name="idOrders" value="<? echo $idOrders ?>" />
                               	 <p>
								            
																			<input type="submit" value="Submit" />
																			
									</form>
									</div>
							
										
	</body>
</html>
