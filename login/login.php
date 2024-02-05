<?php
session_start();
include("../context/config.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    $useremail = $_POST["email"];
    $password = $_POST["password"];

    // SQL query to check username and password
    $sql = "SELECT * FROM teachers WHERE email = ? AND password = ?";
    
    // Prepare and execute the query
    $params = array($useremail, $password);
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
        

        // Redirect to index page
        header("Location: /alumni");
        exit;
    } else {
        // User does not exist, redirect to login page with error message
        $_SESSION['login_error'] = "Invalid username or password.";
        header("Location: ./");
        exit;
    }

    // Free the statement handle resources
    sqlsrv_free_stmt($stmt);
}

// Close the database connection
sqlsrv_close($conn);
?>
