<?php
// fetchcounsel.php
header('Content-Type: application/json');

include('../db/db_connection.php');

// Get the counseling_id from the GET request
$counseling_id = $_GET['counseling_id'] ?? '';

if (empty($counseling_id)) {
    echo json_encode(['success' => false, 'error' => 'No counseling ID provided.']);
    exit;
}

// Use parameterized query to prevent SQL injection
$strsql = "SELECT * FROM tbl_counseling WHERE counseling_id = ?";
$params = array($counseling_id);
$query = sqlsrv_query($conn, $strsql, $params);

if ($query === false) {
    echo json_encode(['success' => false, 'error' => 'Query failed: ' . print_r(sqlsrv_errors(), true)]);
    exit;
}

$row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);

if ($row) {
    // Adjust the keys based on your database columns
    echo json_encode(['success' => true, 'data' => [
        'counseling_id' => $row['counseling_id'],
        'student_id' => $row['student_id'],
        'fullname' => $row['fullname'],
        'email' => $row['email'], // Ensure this column exists
        'question1' => $row['question1'],
        'question2' => $row['question2'],
        'question3' => $row['question3'],
        'question4' => $row['question4'],
        'question5' => $row['question5']
    ]]);
} else {
    echo json_encode(['success' => false, 'error' => 'No record found.']);
}
?>
