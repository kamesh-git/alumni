<?php
session_start();
include("../context/config.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    $dept = $_POST["dept"];

        // SQL query to insert data into the teachers table
        $sql = "INSERT INTO depts (\"Name\")
                VALUES (?)";
        
        // Prepare and execute the query
        $params = array($dept);
        $stmt = sqlsrv_query($conn, $sql, $params);
        
        // Check if the query executed successfully
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        // Data inserted successfully, redirect to index page
        header("Location: ./");
        exit;

    // Close the statement and connection
    sqlsrv_free_stmt($stmt_check_email);
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
}
?>
