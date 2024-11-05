<?php
include ('../db/db_connection.php');

// Initialize variables
$student_id = $MobileNo = $fullname = $email = $question1 = $question2 = $question3 = $question4 = $question5 = "";

// Check if the form is submitted
if (isset($_POST['button'])) { 
    
    // Sanitize and assign form data
    $student_id = htmlspecialchars($_POST['student_id']);
    $MobileNo = htmlspecialchars($_POST['MobileNo']);
    $fullname = htmlspecialchars($_POST['fullname']);
    $email = htmlspecialchars($_POST['email']);
    $question2 = htmlspecialchars($_POST['question2']);
    $question3 = htmlspecialchars($_POST['question3']);
    $question4 = htmlspecialchars($_POST['question4']);
    $question5 = htmlspecialchars($_POST['question5']);
    
    // Handle checkbox values
    $question1 = isset($_POST['question1']) ? implode('&', $_POST['question1']) : '';

    // SQL statement with placeholders
    $strsql = "INSERT INTO dbo.tbl_counseling (student_id, MobileNo, fullname, email, question1, question2, question3, question4, question5) 
               VALUES (?,?,?,?,?,?,?,?,?)";

    // Parameters array
    $params = array($student_id, $MobileNo, $fullname, $email, $question1, $question2, $question3, $question4, $question5);

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
        echo 'window.location.href = "../pages/studcounseling.php";';
        echo '</script>';
        exit();
    }
}
?>
