<?php
session_start();
include("../context/config.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $dob = $_POST["dob"];
    $phone = $_POST["phone"];
    $department = $_POST["department"];
    $salary = 0;
    $leave = 0;
    $password = $_POST["password"];

    // Check if email already exists in the database
    $sql_check_email = "SELECT COUNT(*) AS email_count FROM teachers WHERE email = ?";
    $params_check_email = array($email);
    $stmt_check_email = sqlsrv_query($conn, $sql_check_email, $params_check_email);
    $row = sqlsrv_fetch_array($stmt_check_email, SQLSRV_FETCH_ASSOC);
    $email_count = $row['email_count'];

    if ($email_count > 0) {
        // Email already exists, redirect to registration page without refreshing form contents
        $_SESSION["reg_error"] = "email_exists";
        header("Location: ./");
        exit;
    } else {
        // SQL query to insert data into the teachers table
        $sql = "INSERT INTO teachers (firstname, lastname, email, dob, phone, department, salary, leave, password)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        // Prepare and execute the query
        $params = array($firstname, $lastname, $email, $dob, $phone, $department, $salary, $leave, $password);
        $stmt = sqlsrv_query($conn, $sql, $params);
        
        // Check if the query executed successfully
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        // Data inserted successfully, redirect to index page
        header("Location: index.php");
        exit;
    }

    // Close the statement and connection
    sqlsrv_free_stmt($stmt_check_email);
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
}
?>
