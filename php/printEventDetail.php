<?php

/*
 * Get Event Request ready for ajax jQuery call
 */

$eventId = htmlentities($_POST['id'], ENT_QUOTES, 'UTF-8');

//Adds commas only if another item follows in the list
function formatArray($incomingArray) {

	$incomingArrayLength = count($incomingArray);
	$incomingArrayOutput = "";
	
	foreach ($incomingArray as $key=>$arrayItem) {
		$incomingArrayOutput .= $arrayItem;
		if (($incomingArrayLength - 1) > $key) {
			$incomingArrayOutput .= ", ";
		}
	}
	
	return $incomingArrayOutput;
}

// Save new asessment to database
function PrintEventDetail($eventId) {
    include 'dbConn.php';
    try {
        // PHP PDO SQL Statement
        $sql = "SELECT * FROM studentlife.eventRequest WHERE id = :eventId";
        $stm = $dbh->prepare($sql);
        $stm->bindParam(':eventId', $eventId);
        $stm->execute();
        
        // Fetch the results in a numbered array
        $getEvents = $stm->fetchALL(PDO::FETCH_NUM);
        
        $print = '';
        
        foreach($getEvents as $row) {
            
            $campus = json_decode($row[1], TRUE);
            $typeEvent = json_decode($row[31], TRUE);
            $clubs = json_decode($row[4], TRUE);
            $setup = json_decode($row[8], TRUE);
            $files = json_decode($row[23], TRUE);
            
            $print .= '<button type="button" class="btn btn-info printClose" style="margin:0px auto; position:relative; width:200px;">Close</button>';
	    $print .= "<div class='row' style='border:solid 1px #ccc;'>";
            $print .= "<div class='col-sm-6'>";
            $print .= "<h2>Requested Event</h2>";
            $print .= "<p>Event Name:  " . $row[2] . "</p>";
            $print .= "<p>Event Type:  " . formatArray($typeEvent) . "</p>";
            $print .= "<p>Start Date:  " . $row[5] . "</p>";
            $print .= "<p>End Date:  " . $row[6] . "</p>";
            $print .= "<p>For Campus:  " . formatArray($campus) . "</p>";
            $print .= "<p>Description:  " . $row[3] . "</p>";
	    $print .= "</div>";

	    $print .= "<div class='col-sm-6'>";
            $print .= "<h2>Contact</h2>";
            $print .= "<p>Requested By:  $row[24]</p>";
            $print .= "<p>Club Advisor:";
            
            // show only Yes or No
            if ($row[26] == 1) {$print .= "&nbsp;Yes</p>";}
            if ($row[26] == 0) {$print .= "&nbsp;No</p>";}
            
            $print .= "<p>For Clubs:  " . formatArray($clubs) . "</p>";
            $print .= "<p>Contact Email:  " . $row[25] . "</a></p>";
	    $print .= "</div></div>";
            
            $print .= "<div class='row' style='border:solid 1px #ccc;'>";
	    $print .= "<div class='col-sm-6'>";
            $print .= "<h2>Set Up Request</h2>";
            $print .= "<p>Set Up:  " . formatArray($setup) . "</p>";
            
            // only show if equal 1
            if ($row[9] == 1) {
            $print .= "<p>Chairs:  " . $row[10] . "</p>";
            }
            
            if ($row[11] == 1) {
            $print .= "<p>Tables:  " . $row[12] . "</p>";
            }
            
            if ($row[13] == 1) {
            $print .= "<p>Other:  " . $row[14] . "</p>";
	    }
              
            $print .= "<p>Room:  " . $row[7] . "</p>";
            $print .= "<p>Comments:  " . $row[27] . "</p>";
            $print .= "<p>Estimated Total Cost:  " . $row[33] . "</p>";
	    $print .= "</div>";
            
	    $print .= "<div class='col-sm-6'>";
            $print .= "<h2>Food</h2>";
            $print .= "<p>Food Type:  " . $row[15] . "</p>";
            $print .= "<p>Food Source:  " . $row[16] . "</p>";
            $print .= "<p>Food Cost:  " . $row[17] . "</p>";
            $print .= "<p>Food Reason:  " . $row[21] . "</p>";
            $print .= "<p>Attendance:  " . $row[18] . "</p>";
            $print .= "<p>Per Diem:  " . $row[19] . "</p>";
            $print .= "<p>Payment:  " . $row[20] . "</p>";
            $print .= "<p>Future Food Events:  " . $row[22] . "</p>";
	    $print .= "</div></div>";
            
        }
        
        echo $print;
        
        // Close the dbh connection 
        $dbh = null;

    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}


PrintEventDetail($eventId);
