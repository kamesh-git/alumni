<?php
session_start();
include("../context/config.php");


// Retrieve form data
$title = $_POST['title'];
$description = $_POST['description'];
$email = $_SESSION['user_details']['email'];
$name = $_SESSION['user_details']['firstname'];
$photo = $_FILES['photo'];

if ($photo["name"] == "")
    $target_filesql = "";
else {
    $target_dir = "../notificationphoto/$email";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $target_filesql = basename($_FILES["photo"]["name"]);
    move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
}
// Insert data into the database
$sql = "INSERT INTO notifications (title, description, name, email, photo) VALUES (?, ?, ?, ?, ?)";
$params = array($title, $description, $name, $email, $target_filesql);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

header("Location: /alumni");

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>