<?php
session_start();
include("../context/config.php");

$_POST = json_decode(file_get_contents('php://input'), true);
$_POST = json_decode($_POST, true);

// Collect form data
$rollNumber = $_POST['rollNumber'];
$name = $_POST['name'];
$batch = $_POST['batch'];
$program = $_POST['program'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$result = 0;
$attendance = 0;
$placement = $_POST['placement'];

// Insert data into the database
$sql = "INSERT INTO Student (RollNumber, Name, Batch, Department, Phone, Address, Result, Attendance, Placement) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$params = array($rollNumber, $name, $batch, $program, $phone, $address, $result, $attendance, $placement);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "Student details updated successfully.";
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
