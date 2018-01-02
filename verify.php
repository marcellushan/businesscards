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
$businessCard= new BusinessCard();
$campus = $_POST['empCampus'];

$sql = "SELECT * from Campus where idCampus = $campus";

              foreach($businessCard->rawSelect($sql)->fetchAll(PDO::FETCH_ASSOC) as $row) 
              {
								$address = $row['addressCampus'];              
              }
//exit(0);




$_SESSION['empName']=htmlspecialchars($_POST['empName']);
$_SESSION['empTitle1']= htmlspecialchars($_POST['empTitle1']);
$_SESSION['empTitle2']= htmlspecialchars($_POST['empTitle2']);
$_SESSION['empContact1'] = htmlspecialchars($_POST['empContact1']);
$_SESSION['empContact2'] = htmlspecialchars($_POST['empContact2']);
$_SESSION['empContact3'] = htmlspecialchars($_POST['empContact3']);
$_SESSION['empContact4'] = htmlspecialchars($_POST['empContact4']);
$_SESSION['empCampus'] = htmlspecialchars($_POST['empCampus']);
$_SESSION['empFund'] = htmlspecialchars($_POST['empFund']);
$_SESSION['empDept'] = htmlspecialchars($_POST['empDept']);
$_SESSION['empProgram'] = htmlspecialchars($_POST['empProgram']);
$_SESSION['empClass'] = htmlspecialchars($_POST['empClass']);
$_SESSION['empProject']  = htmlspecialchars($_POST['empProject']);
$_SESSION['reqName'] = htmlspecialchars($_POST['reqName']);
$_SESSION['reqEmail']  = htmlspecialchars($_POST['reqEmail']);

?>
								<h2 style="color: yellow; text-align:center">Please proof your information carefully before submitting.</h2>
								<h2 style="color: yellow; text-align:center">The information you provide will be copied directly to the business card template and no additional proof will be provided.</h2>
								<h2 style="color: yellow; text-align:center"> For questions, please contact Ken Davis at x6784.</h2>
			
			<div class="well" style="padding:20px 100px 10px 100px;">
			
								<h3>Name</h3>
								<h4><? echo $_SESSION['empName']; ?></h4>
								<p>
									<h3>Title</h3>
								<h4><? echo $_SESSION['empTitle1']; ?></h4>
									<h4><? echo $_SESSION['empTitle2']; ?></h4>
								<p>
									<h3>Contact</h3>
								<h4><? echo $_SESSION['empContact1']; ?></h4>
								<h4><? echo $_SESSION['empContact2']; ?></h4>
								<h4><? echo $_SESSION['empContact3']; ?></h4>
								<h4><? echo $_SESSION['empContact4']; ?></h4>
								<p>
									<h3>Campus Address</h3>
								<h4><? echo$address?></h4>
								<h4>highlands.edu</h4>
								<p>
								<h3>Requestor Name</h3>
								<h4><? echo $_SESSION['reqName']; ?></h4>
								<h3>Requestor Email</h3>
								<h4><? echo $_SESSION['reqEmail']; ?></h4>
								
									<h3>Accounting Information</h3>
								<h4><? echo $_SESSION['empDept'] . "  " . $_SESSION['empProgram'] . "  " . $_SESSION['empClass'] . "  " . $_SESSION['empProject']; ?></h4>
								
								<input type="button" onclick="location.href='submitted.php';" value="Submit Business Card Request" /><p><p>
								<input type="button" onclick="window.history.back();" value="Return to Submission Form" />
</div>