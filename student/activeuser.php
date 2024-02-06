<?php
session_start();
include("../context/config.php");



// Collect roll number and new details from request
$email = $_GET['email'];
$status = 1;
var_dump($email);


// Prepare and execute SQL query to update student details
$sql = "UPDATE users SET status = ? where email = ?";
$params = array($status, $email);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "Teacher details updated successfully.";
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
