<?php
session_start();
include("../context/config.php");


// Retrieve form data
$ID = $_GET['id'];

// Fetch the filename from the database using the ID
$sql = "SELECT photo FROM gallery WHERE id = ?";
$params = array($ID);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt !== false) {
    if (sqlsrv_has_rows($stmt)) {
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        $filename = $row['photo'];

        // Delete the image file from the gallery folder
        $file_path = "../galleryphoto/" . $filename;
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        var_dump(file_exists($file_path),$file_path);
    }
}
else {
    echo "Error fetching image from the database: " . sqlsrv_errors();
}

// Insert data into the database
$sql = "DELETE FROM gallery WHERE ID = ?";
$params = array($ID);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

echo "Successfully deleted";

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>