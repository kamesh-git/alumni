<?php
session_start();
include("../context/config.php");



// Collect department and batch from request
$department = $_GET['department'];
$batch = $_GET['batch'];

// Prepare and execute SQL query
$sql = "SELECT * FROM Student WHERE Department = ? AND Batch = ?";
$params = array($department, $batch);
$stmt = sqlsrv_query($conn, $sql, $params);

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
