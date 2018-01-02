<?php
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=open-house.csv');
/*
 * Get Event Dates ready for ajax jQuery call
 */

// Filter out post variables for security
$selectCampus = htmlentities($_POST['selectCampus'], ENT_QUOTES, 'UTF-8');
$selectDate = htmlentities($_POST['selectDate'], ENT_QUOTES, 'UTF-8');

// Save new asessment to database
function ShowEventRequest($selectCampus, $selectDate) {
        // output headers so that the file is downloaded rather than displayed

    include 'dbConn.php';
    try {

        // PHP PDO SQL Statement
        $sql = "SELECT name,phone,email,attendingguest,major,campus,ohdate FROM submissions WHERE campus = :value1 AND ohdate = :value2;";
        $stm = $dbhopenhouse->prepare($sql);
        $stm->bindParam(':value1', $selectCampus);
        $stm->bindParam(':value2', $selectDate);
        $stm->execute();

        // Fetch the results in a numbered array
        $getEvents = $stm->fetchALL(PDO::FETCH_NUM);

        // Generate CSV File

        // create a file pointer connected to the output stream
        $output = fopen('php://output', 'w');

        $delimiter = ",";

        // output the column headings
        fputcsv($output, array('Name', 'Phone', 'Email', 'Guests', 'Major', 'Campus', 'Open House'), $delimiter);

        // loop over the rows, outputting them
        foreach ($getEvents as $line) {
            fputcsv($output, $line, $delimiter);
        }

        // Close the file
        fclose($output);

        // Close the dbh connection 
        $dbhopenhouse = null;

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
}

ShowEventRequest($selectCampus, $selectDate);
