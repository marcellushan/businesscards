<?php

/*
 * Get Event Request ready for ajax jQuery call
 */
 
// Save new asessment to database
function ViewOpenHouses() {
    include 'dbConn.php';
    try {

        // PHP PDO SQL Statement
        $sql = "SELECT campus, eventdate, idopendates FROM opendates ORDER BY eventdate";
        $stm = $dbhopenhouse->prepare($sql);
        $stm->execute();

        // Fetch the results in a numbered array
        $getOpenHouse = $stm->fetchALL(PDO::FETCH_NUM);

        $tables = "";

        foreach ($getOpenHouse as $row) {
            if ($row[1] > date("Y-m-d H:i:s")) {
            $tables .= "<div class='col-md-12'>";
            $tables .= '<div class="radio"><label for="'.$row[2].'"><h4>'.$row[0].', <input type="radio" name="rsvp" id="'.$row[2].'" value="' . $row[1] .'">' . date("F j, Y, g:i a", strtotime($row[1])) . '</h4></label></div>';
            $tables .= '</div>';
        }
        }

        echo $tables;

        // Close the dbh connection 
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}

ViewOpenHouses();
