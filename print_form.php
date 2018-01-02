<?
include "inc/init.php"; 
$type = $_GET['type'];

if($type=='completed') 
{
	$sql= "select * from Orders, Campus where empCampus=idCampus AND recdFmPrinter = '1'";
}
elseif($type=='printer') 
{
	$sql= "select * from Orders, Campus where empCampus=idCampus AND sentToPrinter = '1' AND recdFmPrinter <> '1'";
	}
else 
{
	$sql= "select * from Orders, Campus where empCampus=idCampus ORDER BY empName";
}


$businessCard = new BusinessCard();

$stmt=$businessCard->rawSelect($sql);
$row_count = $stmt->rowCount();



?>
<script language="Javascript1.2">

  function printpage() {
  window.print();
  }

</script>


<body onload="printpage()">

<table width="1020" cellpadding="5" cellspacing="0" border="0"><td align="left" style="font-size: 20px; font-weight: bold;">Business Card Requests</td></tr></table>
<div style="padding: 20px; width: 990px; text-align: left;">
<table width="980" cellpadding="5" cellspacing="0" border="0">
<tr>
<td valign="top">
<table width="950" cellpadding="5" cellspacing="0" border="1">
<tr><td width="220"><b>Employee Name</b></td><td><b>Requestor</b></td><td><b>Date Requested</b></td><td><b>Date to Printer</b></td><td><b>Date Completed</b></td></tr>
<?
              foreach($businessCard->rawSelect($sql)->fetchAll(PDO::FETCH_ASSOC) as $row) 
		 				{ ?>
		 				
		<tr><td width="220"><? echo $row['empName']  ?></td><td><? echo $row['reqName']  ?></td><td><? echo $row['dateReceived']  ?></td><td><? echo $row['dateToPrinter']  ?></td><td><? echo $row['dateFmPrinter']  ?></td></tr> 				
		 				
		 			<?	}?>
</table>
</body>
</html>

