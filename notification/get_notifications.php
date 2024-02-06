<?php
session_start();
include("../context/config.php");

// Query to fetch all notifications
$sql = "SELECT * FROM notifications";
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$notifications = array();

// Fetch notifications and store them in an array
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $notifications[] = $row;
}

// Close the database connection
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

// Return notifications as JSON
echo json_encode($notifications);
?>
