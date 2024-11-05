<?php
// fetchcounsel.php
header('Content-Type: application/json');

include('../db/db_connection.php');

// Get the counseling_id from the GET request
$q_number = $_GET['q_number'] ?? '';

if (empty($q_number)) {
    echo json_encode(['success' => false, 'error' => 'No number ID provided.']);
    exit;
}

// Use parameterized query to prevent SQL injection
$strsql = "SELECT * FROM tbl_questionaire WHERE q_number = ?";
$params = array($q_number);
$query = sqlsrv_query($conn, $strsql, $params);

if ($query === false) {
    echo json_encode(['success' => false, 'error' => 'Query failed: ' . print_r(sqlsrv_errors(), true)]);
    exit;
}

$row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);

if ($row) {
    // Adjust the keys based on your database columns
    echo json_encode(['success' => true, 'data' => [
        'q_number' => $row['q_number'],
        'row_id' => $row['row_id'],
        'interest' => $row['interest']
        
    ]]);
} else {
    echo json_encode(['success' => false, 'error' => 'No record found.']);
}
?>
