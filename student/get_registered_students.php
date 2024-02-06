<?php
session_start();
include("../context/config.php");

// Prepare and execute SQL query
$sql = "SELECT * FROM users WHERE desig = 'student' AND status = 1";
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Fetch data and convert to JSON
$data = array();
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $data[] = $row;
}

// Convert data to JSON
$json = json_encode($data);

// Output JSON
echo $json;

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
