<?php
// Include your database connection
include('../db/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the student_id from the form
    $student_id = $_POST['student_id'];

    // Prepare the SQL statement to insert into tbl_results
    $sql = "INSERT INTO tbl_results (student_id) VALUES (?)";
    $params = array($student_id);

    // Execute the query
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo "Student ID saved. Proceed to the test.";
        // Redirect after saving student ID
        header("Location: test_page.php");
        exit();
    } else {
        // Print error messages
        $errors = sqlsrv_errors();
        foreach($errors as $error) {
            echo "Error: " . $error['message'] . "<br>";
        }
    }
}

// Close the database connection
sqlsrv_close($conn);
?>
