<?php
session_start();
include("../context/config.php");

// Collect roll number and new details from request
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$dob = $_POST["dob"];
$placement = $_POST["placement"] ?? "";
$address = $_POST["address"] ?? "";
$phone = $_POST["phone"];
$password = $_POST["password"];

// Prepare and execute SQL query to update student details
$sql = "UPDATE users SET firstname = ?, lastname = ?, email = ?, dob = ?, placement = ?, address = ?, phone = ?, password = ? WHERE email = ?";
$params = array($firstname, $lastname, $email, $dob, $placement, $address, $phone, $password, $email);
$stmt = sqlsrv_query($conn, $sql, $params);


if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}
$sql = "SELECT * FROM users WHERE email = ?";

// Prepare and execute the query
$params = array($email);
$stmt = sqlsrv_query($conn, $sql, $params);

// Check if the query executed successfully
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Check if the user exists
if (sqlsrv_has_rows($stmt)) {
    // User exists, fetch user details
    $user_details = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    // Store user details in session
    $_SESSION['user_details'] = $user_details;

    // var_dump( $user_details);
    header("Location: ./");
    exit;
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>