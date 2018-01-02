<?

include "inc/header.inc";

?>
		<div class="container">
			<div class="jumbotron">
				<img style="float:left; margin-right: 20px;"  src="images/logo.png" />
				<h1 >Georgia Highlands College</h1>
				<p>Application for Admission
				<br>
				<br>
				</p>
			</div>
			<div class="messageSaved"></div>
			<div class="well" style="padding:20px 100px 10px 100px;">
				<form action="verify.php" method="post">
					<fieldset>
						<!-- Form Name -->

							<div class="form-group col-md-12">
								<!-- Text input-->
								<h3>Full Name</h3>
								<div class="row">
								<div class="col-md-4">
								<input name="empName" type="text"  maxlength="45" placeholder="Last Name - Required" class="form-control" required="">
								</div>
								<div class="col-md-4">
								<input name="empName" type="text"  maxlength="45" placeholder="First Name - Required" class="form-control" required="">
								</div>
								<div class="col-md-4">
								<input name="empName" type="text"  maxlength="45" placeholder="Middle Name" class="form-control">
								</div>
								</div>
								<h3>Address</h3>
								<div class="row">
								<div class="col-md-8">
								<input name="empTitle2" type="text" maxlength="45" placeholder="Mailling Address" class="form-control" >
								</div>
								<div class="col-md-4">
								<input name="empTitle2" type="text" maxlength="45" placeholder="Apt #" class="form-control" >
								</div>
								</div>
								<div class="row">
								<div class="col-md-5">
								<input name="empTitle2" type="text" maxlength="45" placeholder="City" class="form-control" >
								</div>
								<div class="col-md-1">
								<input name="empTitle2" type="text" maxlength="45" placeholder="ST" class="form-control" >
								</div>
								<div class="col-md-2">
								<input name="empTitle2" type="text" maxlength="45" placeholder="Zip Code" class="form-control" >
								</div>
								<div class="col-md-4">
								<input name="empTitle2" type="text" maxlength="45" placeholder="County" class="form-control" >
								</div>
								</div>
								<div class="row">
								<div class="col-md-12">
								<input name="empTitle2" type="email" maxlength="45" placeholder="Email Address" class="form-control" >
								</div>
								</div>
								<h3>Phone Numbers</h3>
								<div class="row">
								<div class="col-md-4">
								<input name="empTitle2" type="text" maxlength="45" placeholder="Home" class="form-control" >
								</div>
								<div class="col-md-4">
								<input name="empTitle2" type="text" maxlength="45" placeholder="Cell" class="form-control" >
								</div>
								<div class="col-md-4">
								<input name="empTitle2" type="text" maxlength="45" placeholder="Work" class="form-control" >
								</div>
								</div>
								<h3>Permanent Address</h3>
								<div class="row">
								<div class="col-md-8">
								<input name="empTitle2" type="text" maxlength="45" placeholder="Mailling Address" class="form-control" >
								</div>
								<div class="col-md-4">
								<input name="empTitle2" type="text" maxlength="45" placeholder="Apt #" class="form-control" >
								</div>
								</div>
								<div class="row">
								<div class="col-md-5">
								<input name="empTitle2" type="text" maxlength="45" placeholder="City" class="form-control" >
								</div>
								<div class="col-md-1">
								<input name="empTitle2" type="text" maxlength="45" placeholder="ST" class="form-control" >
								</div>
								<div class="col-md-2">
								<input name="empTitle2" type="text" maxlength="45" placeholder="Zip Code" class="form-control" >
								</div>
								<div class="col-md-4">
								<input name="empTitle2" type="text" maxlength="45" placeholder="County" class="form-control" >
								</div>
								</div>
								
										<h3>Campus</h3>
										<h4>Campus address and school web address will be included on the card</h4>
										<input type="radio" name="empCampus" value="1" required="" />Floyd<br>
										<input type="radio" name="empCampus" value="2" required="" />Cartersville<br>
										<input type="radio" name="empCampus" value="3" required="" />Paulding<br>
										<input type="radio" name="empCampus" value="4" required="" />Marietta<br>
										<input type="radio" name="empCampus" value="5" required="" />Douglasville<br>
										<input type="radio" name="empCampus" value="6" required="" />Heritage Hall<br>
										
										<br>
										
											<h3>Requestor's Name</h3>
								<input name="reqName" type="text"  maxlength="45" placeholder="Requestor Name" class="form-control" required="">

								<!-- Text input-->
								<h3>Requestor's Email Address</h3>
								<input name="reqEmail" type="email" maxlength="45" placeholder="Requestor Email" class="form-control" required="">
								
                               <h3>Budget Information</h3>
                               <p>
                               	<input  name="empFund" type="text" minlength="5" maxlength="5" size="10" placeholder="Fund" required="">
                               	<input  name="empDept" type="text" minlength="7" maxlength="7" size="10" placeholder="Dept" required="">
                               	<input  name="empProgram" type="text" minlength="5" maxlength="5" size="10" placeholder="Program" required="">
                               	<input  name="empClass" type="text" minlength="5"maxlength="5" size="10" placeholder="Class" required="">
                               	 <input name="empProject" type="text" maxlength="20" size="10" placeholder="Project" required="">
                               	 <p>
                               	 
                               	 
                               
																			<input type="submit" value="Continue" />
									</div>
							</form>
							
										
	</body>
</html>
