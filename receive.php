<?php
//include "inc/header.inc";
include "inc/init.php"; 

$businessCards = new BusinessCard();

$sql="UPDATE `Orders` SET `sentToPrinter`='1' WHERE `idOrders` IN (";

$count=count ($_GET['OrderID']);
$i = 1;
foreach($_GET['OrderID'] as $OrderID)
{
	 if($i < $count ) 
	 { 
		  $sql=$sql . "'" . $OrderID . "',";
		  $i++;
    }
    else 
    {
    	  $sql=$sql . "'" . $OrderID . "')";
     }
}
echo $sql;
echo "<br>";
echo "UPDATE `Orders` SET `sentToPrinter`='1' WHERE `idOrders` IN ('29','30')";


$businessCards->rawQuery($sql);


?>