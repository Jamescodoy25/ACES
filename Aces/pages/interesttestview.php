<?php 
include ('../db/db_connection.php');

// Set the number of records per page
$records_per_page = 12; // Change this number as needed
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page number
$offset = ($page - 1) * $records_per_page;

// Fetch the total number of records
$total_records_query = "SELECT COUNT(*) as total FROM tbl_questionaire";
$total_records_result = sqlsrv_query($conn, $total_records_query);
$total_records = sqlsrv_fetch_array($total_records_result, SQLSRV_FETCH_ASSOC)['total'];
$total_pages = ceil($total_records / $records_per_page);

// Fetch records for the current page
$strsql = "SELECT q_number, row_id, interest 
FROM tbl_questionaire ORDER BY q_number OFFSET $offset 
ROWS FETCH NEXT $records_per_page ROWS ONLY";
$query = sqlsrv_query($conn, $strsql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interest Test</title>
    <link rel="stylesheet" href="../templates/interesttestview.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <style>
         .interest-cell {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
         
            padding: 10px;
            height: 40px;
        }

        thead th {
            background-color: #333;
            color: white;
        }

        .btn {
            margin-top: 20px;
        }
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .pagination a {
            padding: 5px 10px;
            margin: 0 5px;
            text-decoration: none;
            border: 1px solid #333; /* Border color */
            border-radius: 5px; /* Rounded corners */
            color: #333; /* Text color */
            background-color: #f2f2f2; /* Background color */
            transition: background-color 0.3s, color 0.3s; /* Smooth transition */
        }

        .pagination a.active {
            background-color: #333; /* Active page background */
            color: white; /* Active page text color */
        }

        .pagination a:hover {
            background-color: #ddd; /* Hover background color */
            color: #000; /* Hover text color */
        }

        .pagination .prev, .pagination .next {
            font-weight: bold; /* Make Previous and Next bold */
        }
        .btn {
            padding: 10px 20px; /* Padding for the button */
            font-size: 16px; /* Font size for the button text */
            border: none; /* Remove default border */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor on hover */
            transition: background-color 0.3s, transform 0.2s; /* Smooth transitions */
        }

        .btn-submit {
            background-color: #4CAF50; /* Blue background color */
            color: white; /* White text color */
        }

        .btn-submit:hover {
            background-color: #3e8e41; /* Darker blue on hover */
            transform: scale(1.05); /* Slightly increase size on hover */
        }

        .btn-reset {
            background-color: #6c757d; /* Gray background color */
            color: white; /* White text color */
        }

        .btn-reset:hover {
            background-color: #5a6268; /* Darker gray on hover */
            transform: scale(1.05); /* Slightly increase size on hover */
        }

        /* Optional: Style for disabled buttons */
        .btn:disabled {
            background-color: #e0e0e0; /* Light gray background */
            color: #a0a0a0; /* Darker gray text */
            cursor: not-allowed; /* Not allowed cursor */
        }

        .button-close {
            background-color: #e0e0e0;
        }


        @media (max-width: 600px) {
            .pagination a {
                padding: 8px 10px; /* Smaller padding for mobile */
                font-size: 14px; /* Smaller font size for mobile */
            }

            table {
                font-size: 14px;
            }
        }
      

    </style>
</head>
<body>

<!-- Button trigger modal -->


    <div class="containered">
        <form action="" method="post" id="interestForm">
            <div class="form first">
                <div class="page1" id="page-1">
                    <div class="details personal">
                        <table class="table table-bordered table-striped table-hover align-middle" id="StudentTable">
                            <thead class="table-dark">
                                <tr>
                                    <th>Number</th>
                                    <th>Row</th>
                                    <th>Interest</th>
                                    <th>Choices</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if ($query === false) {
                                        die("Query failed: " . print_r(sqlsrv_errors(), true));
                                    }
                                    while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
                                        echo "<tr>";
                                        echo "<td>" . htmlspecialchars($row['q_number'], ENT_QUOTES, 'UTF-8') . "</td>";
                                        echo "<td>" . htmlspecialchars($row['row_id'], ENT_QUOTES, 'UTF-8') . "</td>";
                                        echo "<td class='interest-cell'>" . htmlspecialchars($row['interest'], ENT_QUOTES, 'UTF-8') . "</td>";
                                        echo "<td>";
                                        echo "<input type='radio' id='like_" . htmlspecialchars($row['q_number'], ENT_QUOTES, 'UTF-8') . "' name='interest_" . htmlspecialchars($row['q_number'], ENT_QUOTES, 'UTF-8') . "' value='Like' required>";
                                        echo "<label for='like_" . htmlspecialchars($row['q_number'], ENT_QUOTES, 'UTF-8') . "'>Like</label> ";
                                        echo "<input type='radio' id='neutral_" . htmlspecialchars($row['q_number'], ENT_QUOTES, 'UTF-8') . "' name='interest_" . htmlspecialchars($row['q_number'], ENT_QUOTES, 'UTF-8') . "' value='Neutral'>";
                                        echo "<label for='neutral_" . htmlspecialchars($row['q_number'], ENT_QUOTES, 'UTF-8') . "'>Neutral</label> ";
                                        echo "<input type='radio' id='dislike_" . htmlspecialchars($row['q_number'], ENT_QUOTES, 'UTF-8') . "' name='interest_" . htmlspecialchars($row['q_number'], ENT_QUOTES, 'UTF-8') . "' value='Dislike'>";
                                        echo "<label for='dislike_" . htmlspecialchars($row['q_number'], ENT_QUOTES, 'UTF-8') . "'>Dislike</label>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <button type="reset" class="btn btn-reset">Reset</button>

                <input type="submit" value="Submit" class="btn btn-submit">
            </div>
        </form>

        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="?page=<?php echo $page - 1; ?>">Previous</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="?page=<?php echo $i; ?>" <?php if ($i == $page) echo 'class="active"'; ?>><?php echo $i; ?></a>
            <?php endfor; ?>

            <?php if ($page < $total_pages): ?>
                <a href="?page=<?php echo $page + 1; ?>">Next</a>
            <?php endif; ?>
        </div>

    </div>



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Please login your ID before you take the interest test.</h5>
                        <button type="button-close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="save_result.php">
                            <label for="student_id">Enter Student ID:</label>
                            <input type="text" name="student_id" id="student_id" required class="form-control">
                            <input type="submit" value="Start Test" class="btn btn-primary mt-3">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button-close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
    </div>
</div>


   





</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Show the modal every time the page is loaded or refreshed
        var myModal = new bootstrap.Modal(document.getElementById('exampleModalCenter'));
        myModal.show();
    });
</script>


