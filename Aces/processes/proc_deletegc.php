<?php
include('../db/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $counseling_id = $_POST['counseling_id'];

    // Example SQL query to delete the student
    $strsql = "DELETE FROM tbl_counseling WHERE counseling_id = ?";
    $params = array($counseling_id);
    $query = sqlsrv_query($conn, $strsql, $params);

    if ($query) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => sqlsrv_errors()]);
    }
    sqlsrv_close($conn);
}
?>