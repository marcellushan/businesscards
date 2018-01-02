<?php
date_default_timezone_set('UTC');

$name = "Testing";
$phone = "1234569874";
$email = "test@tester.net";
$attending = "25";
$major = "Math";
$dates = "Testing date  00/00/2314";

// PHP PDO globalize connection string
// Connection parameters
$user = "webguy";
$pass = "wantmemore";
$host = "127.0.0.1";
$dbname = "openhouse";
// Set Database Handle 
$dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
      $sql = "SELECT * FROM submissions";
        $stm = $dbh->prepare($sql);
      $stm->execute();
      $results = $stm->fetch(PDO::FETCH_ASSOC);
echo "stuff should be here";
print_r($results);

?>
