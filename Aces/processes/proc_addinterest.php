<?php
include ('../db/db_connection.php');

// Initialize variables
$number = $row_id = $interest = "";

// Check if the form is submitted
if (isset($_POST['button'])) { 
    
    // Sanitize and assign form data
    $number = htmlspecialchars($_POST['number']);
    $row_id = htmlspecialchars($_POST['row_id']);
    $interest = htmlspecialchars($_POST['interest']);
    
    


    // SQL statement with placeholders
    $strsql = "INSERT INTO dbo.tbl_questionaire (q_number, row_id, interest) 
               VALUES (?,?,?)";

    // Parameters array
    $params = array($q_number, $row_id, $interest);

    // Execute the query
    $query = sqlsrv_query($conn, $strsql, $params);

    // Check for query execution errors
    if (!$query) { 
        // Display error message with sqlsrv_errors() for debugging
        die("Query failed: " . print_r(sqlsrv_errors(), true));
    } else {
        // Close the connection and redirect to the student list
        sqlsrv_close($conn);
        echo '<script type="text/javascript">';
        echo 'alert("Added Successfully");';
        echo 'window.location.href = "../pages/addinterest.php";';
        echo '</script>';
        exit();
    }
}
?>
