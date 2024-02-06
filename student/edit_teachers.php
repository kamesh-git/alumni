<?php
session_start();
include("../context/config.php");

$_POST = json_decode(file_get_contents('php://input'), true);
$_POST = json_decode($_POST, true);


// Collect roll number and new details from request
$NewEmail = $_POST['email'];
$NewDepartment = $_POST['department'];
$NewSalary = $_POST['salary'];
$NewLeave = $_POST['leave'];

// Prepare and execute SQL query to update student details
$sql = "UPDATE teachers SET department = ?, salary = ?, leave = ? WHERE email = ?";
$params = array($NewDepartment, $NewSalary, $NewLeave, $NewEmail);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "Student details updated successfully.";
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
