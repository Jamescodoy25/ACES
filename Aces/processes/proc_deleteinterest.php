<?php
include('../db/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $number = $_POST['number'];

    // Example SQL query to delete the student
    $strsql = "DELETE FROM tbl_questionaire WHERE number = ?";
    $params = array($number);
    $query = sqlsrv_query($conn, $strsql, $params);

    if ($query) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => sqlsrv_errors()]);
    }
    sqlsrv_close($conn);
}
?>