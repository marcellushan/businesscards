<?
include "inc/init.php"; 


$sql= "select * from Orders, Campus where sentToPrinter <> '1' AND rejected <> '1' AND empCampus = idCampus ORDER BY dateReceived DESC" ;

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
<tr><td width="180"><b>Employee Name</b></td><td><b>Title</b></td><td><b>Campus</b></td><td><b>Requestor</b></td><td><b>Accting</b></td><td><b>Date Requested</b></td></tr>
<?
              foreach($businessCard->rawSelect($sql)->fetchAll(PDO::FETCH_ASSOC) as $row) 
		 				{ ?>
		 				
		<tr><td width="180"><? echo $row['empName']  ?></td><td><? echo $row['reqName']  ?></td><td><? echo $row['nameCampus']  ?></td><td><? echo $row['reqName']  ?></td>
		<td><? echo $row['empFund']  ?>&nbsp;<? echo $row['empDept']  ?><? echo $row['empProgram']  ?>&nbsp;<? echo $row['empClass']  ?>&nbsp;<? echo $row['empProject']  ?>&nbsp;</td><td><? echo $row['dateReceived']  ?>&nbsp;</td></tr> 				
		 				
		 			<?	}?>
</table>
</body>
</html>

