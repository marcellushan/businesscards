<?php

	$to = "mhannah@highlands.edu";
$subject = "A Business Card order has been submitted by Georgia Highlands College";

$message = "
<html>
<head>
<title>A Business Card order has been submitted by Georgia Highlands College</title>
</head>
<body>
<h2>A Business Card order has been submitted by Georgia Highlands College</h2>
<table border='1'>
<tr>
<th width='200'>Employee Name</th>
<th width='200'>Title</th>
<th width='400'>Campus</th>
<th width='400'>Contact Info</th>
</tr>
<tr>
<td>";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <businesscards@highlands.edu>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);

?>