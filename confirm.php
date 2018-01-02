<?
include "inc/header.inc";
include "inc/init.php";

?>
		<div class="container">
			<div class="jumbotron">
				<img style="float:left; margin-right: 20px;"  src="images/logo.png" />
				<h1 >Business Card Confirmation</h1>
				<p>Request Business Cards Online
				<br>
				<br>
				</p>
			</div>
<?php
$crud= new Crud();

$_SESSION['empName']=$_POST['empName'];
$_SESSION['empTitle']= $_POST['empTitle'];
$_SESSION['empContact'] = $_POST['empContact'];
$_SESSION['empCampus'] = $_POST['empCampus'];
$_SESSION['empFund'] = $_POST['empFund'];
$_SESSION['empDept'] = $_POST['empDept'];
$_SESSION['empProgram'] = $_POST['empProgram'];
$_SESSION['empClass'] = $_POST['empClass'];
$_SESSION['empProject']  = $_POST['empProject'];

?>
								<h2 style="color: yellow; text-align:center">Please proof your information carefully before submitting.</h2>
								<h2 style="color: yellow; text-align:center">The information you provide will be copied directly to the business card template and no additional proof will be provided.</h2>
								<h2 style="color: yellow; text-align:center"> For questions, please contact Ken Davis at x6784.</h2>
			
			<div class="well" style="padding:20px 100px 10px 100px;">
			
								<h3>Name</h3>
								<h4><? echo $_SESSION['empName']; ?></h4>
								<p>
									<h3>Title</h3>
								<h4><? echo $_SESSION['empTitle']; ?></h4>
								<p>
									<h3>Contact</h3>
								<h4><? echo $_SESSION['empContact']; ?></h4>
								<p>
									<h3>Campus</h3>
								<h4><? echo $_SESSION['empCampus']; ?></h4>
								<p>
									<h3>Budget Information</h3>
								<h4><? echo $_SESSION['empDept'] . "  " . $_SESSION['empProgram'] . "  " . $_SESSION['empClass'] . "  " . $_SESSION['empProject']; ?></h4>
								
								<input type="button" onclick="location.href='thankyou.php';" value="Submit Business Card Request" /><p><p>
								<input type="button" onclick="window.history.back();" value="Return to Submission Form" />
</div>