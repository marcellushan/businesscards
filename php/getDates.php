<?php

/*
 * Get Event Dates ready for ajax jQuery call
 */
// Filter out post variables for security
$value = htmlentities($_POST['campVal'], ENT_QUOTES, 'UTF-8');

// Save new asessment to database
function ViewEventRequest($value) {
    include 'dbConn.php';
    try {
        echo "<legend>Open House Schedules</legend>";

        // PHP PDO SQL Statement
        $sql = "SELECT campus, ohdate FROM submissions WHERE campus = :value1 GROUP BY ohdate;";
        $stm = $dbhopenhouse->prepare($sql);
        $stm->bindParam(':value1', $value);
        $stm->execute();

        // Fetch the results in a numbered array
        $getEvents = $stm->fetchALL(PDO::FETCH_NUM);

        $opt = "<option disabled selected>select date to view</option>";

        foreach ($getEvents as $row) {
            $opt .= "<option value='" . $row[1] . "'>" . date("F j, Y, g:i a", strtotime($row[1])) .  "</option>";
        }

        echo $opt;

        // Close the dbh connection 
        $dbhopenhouse = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
}

ViewEventRequest($value);
