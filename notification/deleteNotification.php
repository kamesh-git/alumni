<?php
session_start();
include("../context/config.php");


// Retrieve form data
$ID = $_GET['id'];
var_dump($ID);

// Insert data into the database
$sql = "DELETE FROM notifications WHERE ID = ?";
$params = array($ID);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

return "Successfully deleted";

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
