<?php

/* 
 * Connect to DB using PHP PDO
 * TODO add in SSL and encryption methods
 */

date_default_timezone_set('UTC');

// PHP PDO globalize connection string
global $dbhopenhouse;
// Connection parameters
$user = "webguy";
$pass = "wantmemore";
$host = "127.0.0.1";
$dbname = "openhouse";
// Set Database Handle 
$dbhopenhouse = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
