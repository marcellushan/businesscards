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
function ViewEventDetail($eventId) {
    include 'dbConn.php';
    try {
        // PHP PDO SQL Statement
        $sql = "SELECT * FROM studentlife.eventRequest WHERE id = :eventId";
        $stm = $dbh->prepare($sql);
        $stm->bindParam(':eventId', $eventId);
        $stm->execute();
        
        // Fetch the results in a numbered array
        $getEvents = $stm->fetchALL(PDO::FETCH_NUM);
        
        $modal = '';
        
        foreach($getEvents as $row) {
            
            $campus = json_decode($row[1], TRUE);
            $typeEvent = json_decode ($row[31], TRUE);
            $clubs = json_decode($row[4], TRUE);
            $setup = json_decode($row[8], TRUE);
            $files = json_decode($row[23], TRUE);
        
            $modal .=  '<button id="' . $row[0] . '" type="button" class="btn btn-info printView">Print</button>';  
            $modal .= "<h2>Requested Event</h2>";
            $modal .= "<p><span class='label label-primary'>Event Name:</span>  " . $row[2] . "</p>";
            $modal .= "<p><span class='label label-primary'>Event Type:</span>  " . formatArray($typeEvent) . "</p>";
            $modal .= "<p><span class='label label-primary'>Start Date:</span>  " . $row[5] . "</p>";
            $modal .= "<p><span class='label label-primary'>End Date:</span>  " . $row[6] . "</p>";
            $modal .= "<p><span class='label label-primary'>For Campus:</span>  " . formatArray($campus) . "</p>";
            $modal .= "<p><span class='label label-primary'>Description:</span>  " . $row[3] . "</p><hr/>";
            
            $modal .= "<h2>Contact</h2>";
            $modal .= "<p><span class='label label-info'>Requested By:</span>  $row[24]</p>";
            $modal .= "<p><span class='label label-info'>Club Advisor:</span>";
            
            // show only Yes or No
            if ($row[26] == 1) {$modal .= "&nbsp;Yes</p>";}
            if ($row[26] == 0) {$modal .= "&nbsp;No</p>";}
            
            $modal .= "<p><span class='label label-info'>For Clubs:</span>  " . formatArray($clubs) . "</p>";
            $modal .= "<p><span class='label label-info'>Contact Email:</span>  <a href='mailto:$row[25]?Subject=Contact%20from%20Student%20Life%20about%20your%20Requested%20Event'>" . $row[25] . "</a></p><hr/>";
            
            
            $modal .= "<h2>Set Up Request</h2>";
            $modal .= "<p><span class='label label-default'>Set Up:</span>  " . formatArray($setup) . "</p>";
            
            // only show if equal 1
            if ($row[9] == 1) {
            $modal .= "<p><span class='label label-default'>Chairs:</span>  " . $row[10] . "</p>";
            }
            
            if ($row[11] == 1) {
            $modal .= "<p><span class='label label-default'>Tables:</span>  " . $row[12] . "</p>";
            }
            
            if ($row[13] == 1) {
            $modal .= "<p><span class='label label-default'>Other:</span>  " . $row[14] . "</p>";
	    }
              
            $modal .= "<p><span class='label label-default'>Room:</span>  " . $row[7] . "</p>";
            $modal .= "<p><span class='label label-default'>Comments:</span>  " . $row[27] . "</p>";
            $modal .= "<p><span class='label label-default'>Estimated Total Cost:</span>  " . $row[33] . "</p><hr/>";
            
            $modal .= "<h2>Food</h2>";
            $modal .= "<p><span class='label label-warning'>Food Type:</span>  " . $row[15] . "</p>";
            $modal .= "<p><span class='label label-warning'>Food Source:</span>  " . $row[16] . "</p>";
            $modal .= "<p><span class='label label-warning'>Food Cost:</span>  " . $row[17] . "</p>";
            $modal .= "<p><span class='label label-warning'>Food Reason:</span>  " . $row[21] . "</p>";
            $modal .= "<p><span class='label label-warning'>Attendance:</span>  " . $row[18] . "</p>";
            $modal .= "<p><span class='label label-warning'>Per Diem:</span>  " . $row[19] . "</p>";
            $modal .= "<p><span class='label label-warning'>Payment:</span>  " . $row[20] . "</p>";
            $modal .= "<p><span class='label label-warning'>Future Food Events:</span>  " . $row[22] . "</p><hr/>";
            
            $modal .= "<h2>Event Files</h2>";
            // list uploaded file links for download
            $modal .= "<p>";
            foreach ($files as $value) {
            $modal .= "<a href='/studentlife/fileupload/server/php/files/$value'>$value</a><br/>";
            }
            $modal .= "</p><hr/>";
            $modal .= "<h2>Set Event Status</h2>";
            
  $modal .= '<div id="setStatus"><button id="' . $row[0] . '" type="button" value="1" class="btn btn-success approved">Approved</button> | <button id="' . $row[0] . '" type="button" value="0" class="btn btn-warning denied">Denied</button></div>';
        }
        
        echo $modal;
        
        // Close the dbh connection 
        $dbh = null;

    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}


ViewEventDetail($eventId);
