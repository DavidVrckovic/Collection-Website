<?php
// Start the session
session_start();



/* Localhost MySQL server 
$db_hostname = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "testing";
/* */

/* Remote MySQL server */
$db_config = parse_ini_file("../protected/config.ini");

$collection_db_hostname = $db_config['collection_db_hostname'];
$collection_db_username = $db_config['collection_db_username'];
$collection_db_password = $db_config['collection_db_password'];
$collection_db_name = $db_config['collection_db_name'];
/* */



// Open connection to the MySQL DB server
$db_connection = mysqli_connect($collection_db_hostname, $collection_db_username, $collection_db_password, $collection_db_name);

// Check connection to the MySQL DB server
if (mysqli_connect_errno()) {
    $_SESSION['error'] = "Failed to connect to the MySQL server: " . mysqli_connect_error();
    header("Location: ../login/?error=mysql_connection");
    exit();
}

?>