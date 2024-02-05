<?php 
// Database connection parameters
$serverName = "LAPTOP-E175BFS2\SQLEXPRESS";
$connectionOptions = array(
    "Database" => "alumni",
    "Uid" => "",
    "PWD" => ""
);

// Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Check if the connection is successful
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}


?>