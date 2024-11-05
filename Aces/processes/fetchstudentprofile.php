<?php
// fetchcounsel.php
header('Content-Type: application/json');

include('../db/db_connection.php');

// Get the counseling_id from the GET request
$Student_id = $_GET['student_id'] ?? '';

if (empty($Student_id)) {
    echo json_encode(['success' => false, 'error' => 'No Student ID provided.']);
    exit;
}

// Use parameterized query to prevent SQL injection



$strsql = "SELECT * FROM tbl_students WHERE student_id = ?";
$params = array($Student_id);
$query = sqlsrv_query($conn, $strsql, $params);

if ($query === false) {
    echo json_encode(['success' => false, 'error' => 'Query failed: ' . print_r(sqlsrv_errors(), true)]);
    exit;
}

$row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);

if ($row) {
    // Adjust the keys based on your database columns
    echo json_encode(['success' => true, 'data' => [
        
        'student_id' => $row['student_id'],
        'StudName' => $row['StudName'],
        'Sex' => $row['Sex'], 
        'DoB' => $row['DoB'],
        'CivilStats' => $row['CivilStats'],
        'DateofFilling' => $row['DateofFilling'],
        'HomeAdd' => $row['HomeAdd'],
        'YrLvl' => $row['YrLvl'],
        'Course' => $row['Course'],
        'MobileNo' => $row['MobileNo'],
        'Relation' => $row['Relation'], 
        'ContactPersn' => $row['ContactPersn'],
        'FthrNme' => $row['FthrNme'],
        'FthrDoB' => $row['FthrDoB'],
        'FthrEducAttain' => $row['FthrEducAttain'],
        'FthrOccup' => $row['FthrOccup'],
        'FthrContNo' => $row['FthrContNo'],
        'MaritalStats' => $row['MaritalStats'], 
        'MthrNme' => $row['MthrNme'],
        'MthrDoB' => $row['MthrDoB'],
        'MthrEducAttain' => $row['MthrEducAttain'],
        'MthrOccup' => $row['MthrOccup'],
        'MthrContNo' => $row['MthrContNo'],
        'FinancialStat' => $row['FinancialStat'],
        'FaveSub' => $row['FaveSub'], 
        'DiffSub' => $row['DiffSub'],
        'Sports' => $row['Sports'],
        'CarChoice1' => $row['CarChoice1'],
        'CarChoice2' => $row['CarChoice2'],
        'HighGrade' => $row['HighGrade'],
        'ExCurri' => $row['ExCurri'],
        'LeadEx' => $row['LeadEx'],
        'TalSkl' => $row['TalSkl'],
        'VisitGuidance' => $row['VisitGuidance'],
        'BthrLove' => $row['BthrLove'],
        'BthrStuds' => $row['BthrStuds'],
        'HomeVisitation' => $row['HomeVisitation'],
        'BthrOthrs' => $row['BthrOthrs'],
        'BthrFam' => $row['BthrFam']
    ]]);
} else {
    echo json_encode(['success' => false, 'error' => 'No record found.']);
}
?>
