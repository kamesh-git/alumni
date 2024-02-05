<?php
include("./context/config.php");

$sql_check_email = "SELECT * FROM batch";
$stmt = sqlsrv_query($conn, $sql_check_email);
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    echo "<option value=\"" . $row["FROM"] . "-" . $row['TO'] . "\">" . $row["From"] . "-" . $row['To'] . "</option>";
}

// print_r($row);
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>