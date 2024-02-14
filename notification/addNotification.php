<?php
session_start();
include("../context/config.php");


// Retrieve form data
$title = $_POST['title'];
$description = $_POST['description'];
$email = $_SESSION['user_details']['email'];
$name = $_SESSION['user_details']['firstname'];

// Insert data into the database
$sql = "INSERT INTO notifications (title, description, name, email) VALUES (?, ?, ?, ?)";
$params = array($title, $description, $name, $email);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

header("Location: /alumni");

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
