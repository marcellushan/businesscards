<?

function send_mail($user_name, $campus, $servername, $reqname) 
{
	
	$to = "mhannah@highlands.edu";
$subject = "A Business Card order has been submitted by " . $reqname;

$message = "
<html>
<head>
<title>A Business Card order has been submitted by " . $reqname . "</title>
</head>
<body>
<h2>A Business Card order has been submitted by " . $reqname . "</h2>
<table border='1'>
<tr>
<th width='200'>Employee Name</th>
<th width='200'>Campus</th>
<th width='400'>Link to Submissions</th>
</tr>
<tr>
<td>" . $user_name . "</td>
<td>" . $campus . "</td>
<td><a href='http://" . $servername . "/businesscards/requests.php'>Click to view</a></td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <businesscards@highlands.edu>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
	}
	
	
function reject_mail($order_id, $user_name, $comments, $servername, $reqname, $reqemail) 
{
	
	$to = $reqemail;
$subject = "Your Business Card order for " . $user_name . " has been rejected" ;

$message = "
<html>
<head>
<title>Your Business Card order for " . $user_name . " has been rejected</title>
</head>
<body>
<h2>Your Business Card order for " . $user_name . " has been rejected</h2>
<table border='1'>
<tr>
<th width='200'>Employee Name</th>
<th width='400'>Comments</th>
<th width='400'>Link to Order</th>
</tr>
<tr>
<td>" . $user_name . "</td>
<td>" . $comments . "</td>
<td><a href='http://" . $servername . "/businesscards/resubmit.php?idOrders=" . $order_id . "'>Click to view</a></td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <businesscards@highlands.edu>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
	}

?>