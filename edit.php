<?

include "inc/header.inc";
include "inc/init.php"; 
$businessCard = new BusinessCard();

$idOrders = $_GET['idOrders'];

$sql = "SELECT * FROM Orders WHERE idOrders = '" . $idOrders . "'";

 foreach($businessCard->rawSelect($sql)->fetchAll(PDO::FETCH_ASSOC) as $row) 
 {}
 
?>

		<div class="container">
			<div class="jumbotron">
				<img style="float:left; margin-right: 20px;"  src="images/logo.png" />
				<h1 >Business Card Order Form</h1>
				<p>Request Business Cards Online
				<br>
				<br>
				</p>
			</div>
			<div class="messageSaved"></div>
			<div class="well" style="padding:20px 100px 10px 100px;">
				<form action="edit_request.php" method="get">
					<fieldset>
						<!-- Form Name -->
						<h2>
							Business Card Details
						</h2>

							<div class="form-group col-md-8">
								<!-- Text input-->
								<h3>Name</h3>
								<input name="empName" value= "<? echo $row['empName'] ?>" type="text"  maxlength="45" placeholder="full name" class="form-control" required="">

								<!-- Text input-->
								<h3>Title</h3>
								<input name="empTitle1"  value= "<? echo $row['empTitle1'] ?>"  type="text" maxlength="45" placeholder="Title Line 1 (required)" class="form-control" required="">
								<br>
								<input name="empTitle2" value= "<? echo $row['empTitle2'] ?>"type="text" maxlength="45" placeholder="Title Line 2 (optional)" class="form-control" >

								<!-- Text input-->
								<h3>Contact Information</h3>
							<input name="empContact1" value= "<? echo $row['empContact1'] ?>" type="text" maxlength="45" placeholder="Contact Information  Line 1 (required)" class="form-control" required="">
								<br>
							<input name="empContact2" value= "<? echo $row['empContact2'] ?>" type="text" maxlength="45" placeholder="Contact Information  Line 2 (optional)" class="form-control" >
								<br>
							<input name="empContact3" value= "<? echo $row['empContact3'] ?>" type="text" maxlength="45" placeholder="Contact Information  Line 3 (optional)" class="form-control" >
								<br>
							<input name="empContact4" value= "<? echo $row['empContact4'] ?>" type="text" maxlength="45" placeholder="Contact Information  Line 4 (optional)" class="form-control">
								
										
											<h3>Requestor's Name</h3>
								<input name="reqName" value= "<? echo $row['reqName'] ?>" type="text"  maxlength="45" placeholder="Requestor Name" class="form-control" required="">

								<!-- Text input-->
								<h3>Requestor's Email Address</h3>
								<input name="reqEmail" value= "<? echo $row['reqEmail'] ?>" type="text" maxlength="45" placeholder="Requestor Email" class="form-control" required="">
								
                               <h3>Budget Information</h3>
                               <p>
                               	<input  name="empFund" value= "<? echo $row['empFund'] ?>" type="text" minlength="5" maxlength="5" size="10" placeholder="Fund" required="">
                               	<input  name="empDept" value= "<? echo $row['empDept'] ?>" type="text" minlength="7" maxlength="7" size="10" placeholder="Dept" required="">
                               	<input  name="empProgram" value= "<? echo $row['empProgram'] ?>" type="text" minlength="5" maxlength="5" size="10" placeholder="Program" required="">
                               	<input  name="empClass" value= "<? echo $row['empClass'] ?>" type="text" minlength="5"maxlength="5" size="10" placeholder="Class" required="">
                               	 <input name="empProject" value= "<? echo $row['empProject'] ?>" type="text" maxlength="20" size="10" placeholder="Project" required="">
                               	 <input type="hidden" name="idOrders" value="<? echo $idOrders ?>" />
                               	 <p>
                               	 
                               	 
                               
																			<input type="submit" value="submit" />
																			
																												<h3><a href="javascript:history.go(-1)">Return to list</a></h3>
									</div>
							</form>
							
										
	</body>
</html>
