<?

include "inc/header.inc";

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
				<form action="verify.php" method="post">
					<fieldset>
						<!-- Form Name -->
						<h2>
							Business Card Details
						</h2>

							<div class="form-group col-md-8">
								<!-- Text input-->
								<h3>Name</h3>
								<input name="empName" type="text"  maxlength="80" placeholder="full name" class="form-control" required="">

								<!-- Text input-->
								<h3>Title</h3>
								<input name="empTitle1" type="text" maxlength="80" placeholder="Title Line 1 (required)" class="form-control" required="">
								<br>
								<input name="empTitle2" type="text" maxlength="45" placeholder="Title Line 2 (optional)" class="form-control" >

								<!-- Text input-->
								<h3>Contact Information<h3> 
								<h4>Please do not include campus address or school web address</h4>
							<input name="empContact1" type="text" maxlength="45" placeholder="Contact Information  Line 1 (required)" class="form-control" required="">
								<br>
							<input name="empContact2" type="text" maxlength="45" placeholder="Contact Information  Line 2 (optional)" class="form-control" >
								<br>
							<input name="empContact3" type="text" maxlength="45" placeholder="Contact Information  Line 3 (optional)" class="form-control" >
								<br>
							<input name="empContact4" type="text" maxlength="45" placeholder="Contact Information  Line 4 (optional)" class="form-control">
								
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
