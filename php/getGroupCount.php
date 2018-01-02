<?php

/*
 * Get Group Count by Campus
 */

// Save new asessment to database
function ViewGroupCount() {
    include 'dbConn.php';
    try {

        // PHP PDO SQL Statement
        $sql = "SELECT campus, COUNT(ohdate) AS Ct FROM submissions WHERE ohdate >= CURDATE() GROUP BY campus;";
        $stm = $dbhopenhouse->prepare($sql);
        $stm->execute();

        // Fetch the results in a numbered array
        $getEvents = $stm->fetchALL(PDO::FETCH_NUM);

        $badge = "";

        foreach ($getEvents as $row) {
            $badge .= '<button class="btn btn-info" type="button">  <span class="badge"> '.$row[1].' </span>   '.$row[0].'</button> | ';
        }

        echo $badge;

        // Close the dbh connection 
        $dbhopenhouse = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
}

ViewGroupCount();
