<?php
/*
 * Get Event Request ready for ajax jQuery call
 */

// Filter out post variables for security
$campus = htmlentities($_POST['campus'], ENT_QUOTES, 'UTF-8');
$ohdate = htmlentities($_POST['getdate'], ENT_QUOTES, 'UTF-8');

// Save new event to database
function AddOpenHouse($campus, $ohdate) {
    require_once 'dbConn.php';

    try {

        // PHP PDO SQL Statement
        $sql = "INSERT INTO opendates (campus,eventdate)"
               ."VALUES (:campus,:eventdate)";

        $stm = $dbhopenhouse->prepare($sql);

        $stm->bindParam(':campus', $campus);
        $stm->bindParam(':eventdate', $ohdate);
        $stm->execute();

        // Close the dbh connection 
        $dbhopenhouse = null;

    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}


AddOpenHouse($campus, $ohdate);
