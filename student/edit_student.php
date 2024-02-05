<?php
session_start();
include("../context/config.php");

$_POST = json_decode(file_get_contents('php://input'), true);
$_POST = json_decode($_POST, true);


// Collect roll number and new details from request
$rollNumber = $_POST['rollNumber'];
$newName = $_POST['name'];
$newBatch = $_POST['batch'];
$newDepartment = $_POST['program'];
$newPhone = $_POST['phone'];
$newAddress = $_POST['address'];
$newPlacement = $_POST['placement'];
$newResult = $_POST['result'];
$newAttendance = $_POST['attendance'];
var_dump($newDepartment);

// Prepare and execute SQL query to update student details
$sql = "UPDATE Student SET Name = ?, Batch = ?, Department = ?, Phone = ?, \"Address\" = ?, Result = ?, Attendance = ?, Placement = ? WHERE RollNumber = ?";
$params = array($newName, $newBatch, $newDepartment, $newPhone, $newAddress, $newResult, $newAttendance, $newPlacement, $rollNumber);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "Student details updated successfully.";
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
