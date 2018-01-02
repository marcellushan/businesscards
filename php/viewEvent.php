<?php

/*
 * Get Event Request ready for ajax jQuery call
 */

// Save new asessment to database
function ViewEventRequest() {
    include 'dbConn.php';
    try {
        echo "<legend>Open House Schedules</legend>";

        // PHP PDO SQL Statement
        $sql = "SELECT campus, ohdate, name, (SELECT COUNT(DISTINCT ohdate) AS totalrows FROM submissions WHERE campus = 'Floyd/Rome, GA') as totalrows
                        FROM submissions
                        WHERE campus = 'Floyd/Rome, GA'
                        ORDER BY ohdate ASC;";
        $stm = $dbhopenhouse->prepare($sql);
        $stm->execute();

        // Fetch the results in a numbered array
        $getEvents = $stm->fetchALL(PDO::FETCH_NUM);
print_r($getEvents);

        // Close the dbh connection 
        $dbhopenhouse = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
}

ViewEventRequest();
