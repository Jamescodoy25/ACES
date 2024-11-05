<?php
include('../db/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $_POST['student_id'];

    // Corrected SQL query to delete the student by student_id
    $strsql = "DELETE FROM tbl_students WHERE student_id = ?";
    $params = array($student_id);
    $query = sqlsrv_query($conn, $strsql, $params);

    if ($query) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => sqlsrv_errors()]);
    }
    sqlsrv_close($conn);
}
?>
