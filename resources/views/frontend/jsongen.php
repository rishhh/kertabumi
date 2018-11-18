<?php

error_reporting(E_ALL ^ E_DEPRECATED);

$server = "localhost";
$username = "root";
$password = "mysql";
$database = "db_kertabumi";

//Create database connection
$dblink = new mysqli($server, $username, $password, $database);

//Check connection was successful
  if ($dblink->connect_errno) {
     printf("Failed to connect to database");
     exit();
  }

$myFile = "kertabumi.json";
$fh = fopen($myFile, 'w') or die("can't open file"); 

$result = $dblink->query("SELECT * FROM kemejas");

//Initialize array variable
$dbdata = array();

//Fetch into associative array
  while ( $row = $result->fetch_assoc())  {
	$dbdata[]=$row;
  }

$datajson=json_encode($dbdata);
 
fwrite($fh, $datajson);
fclose($fh);

?>