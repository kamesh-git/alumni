<?php
session_start();
include("../context/config.php");


// Retrieve form data
$photo = $_FILES['photo'];


$target_dir = "../galleryphoto/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$target_filesql = basename($_FILES["photo"]["name"]);
move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);

// Insert data into the database
$sql = "INSERT INTO gallery (photo) VALUES (?)";
$params = array($target_filesql);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

header("Location: /alumni");

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>