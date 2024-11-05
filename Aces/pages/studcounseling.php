<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guidance & Counseling</title>
    
    <!-- Bootstrap CSS (Latest Version) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css">
    
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../templates/style.css">
</head>
<body>
    <?php 
        include('../db/db_connection.php');
        include('../processes/proc_deletegc.php');
        include('../templates/sidenav.php');
    ?>
    
    <section class="home-section" style="padding: 25px;">
        <div class="home-content">
            <i class='bx bx-menu'></i> <label>Guidance & Counseling</label>
        </div>

        <table class="table table-bordered table-striped table-hover align-middle" id="StudentTable">
            <thead class="table-dark">
                <tr>
                    <th>Counseling ID</th>
                    <th>Student No.</th>
                    <th>Fullname</th>
                    <th>Counseling Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Fetch all counseling records from the database
                    $strsql = "SELECT counseling_id, student_id, fullname, question1 FROM tbl_counseling";
                    $query = sqlsrv_query($conn, $strsql);
                
                    if ($query === false) {
                        die("Query failed: " . print_r(sqlsrv_errors(), true));
                    }
                
                    // Loop through each row in the query result
                    while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['counseling_id'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td>" . htmlspecialchars($row['student_id'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td>" . htmlspecialchars($row['fullname'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td>" . htmlspecialchars($row['question1'], ENT_QUOTES, 'UTF-8') . "</td>";
                    
                        // Add View and Delete buttons
                        echo "<td>";
                        echo "<button type='button' class='btn btn-primary view-button' data-bs-toggle='modal' data-bs-target='#exampleModal' data-id='" . htmlspecialchars($row['counseling_id'], ENT_QUOTES, 'UTF-8') . "'>View</button>";
                        echo "<button type='button' class='btn btn-danger ms-2' onclick='confirmDelete(" . json_encode($row['counseling_id']) . ")'>Delete</button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg"> <!-- Optional: Use modal-lg for larger modals -->
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Guidance & Counseling Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form>
                    <div class="container">
                        <div class="mb-3">
                            <label for="modal_counseling_id" class="form-label">Counseling ID</label>
                            <input type="text" class="form-control" id="modal_counseling_id" name="modal_counseling_id" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="modal_student_id" class="form-label">Student ID</label>
                            <input type="text" class="form-control" id="modal_student_id" name="student_id" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="modal_fullname" class="form-label">Fullname</label>
                            <input type="text" class="form-control" id="modal_fullname" name="fullname" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="modal_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="modal_email" name="email" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="modal_question1" class="form-label">Reasons for Referral</label>
                            <input type="text" class="form-control" id="modal_question1" name="question1" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="modal_question2" class="form-label">Other Reason for Referral</label>
                            <textarea class="form-control" id="modal_question2" name="question2" rows="3" readonly></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="modal_question3" class="form-label">Provide Further Information</label>
                            <textarea class="form-control" id="modal_question3" name="question3" rows="3" readonly></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="modal_question4" class="form-label">Desired Wellbeing Outcome</label>
                            <input type="text" class="form-control" id="modal_question4" name="question4" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="modal_question5" class="form-label">Is the Session Has Parent Consent?</label>
                            <input type="text" class="form-control" id="modal_question5" name="question5" readonly>
                        </div>
                    </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    </section>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
    
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
    
    <!-- Bootstrap JS (Latest Version) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    
    <script>
        $(document).ready(function() {
            // Initialize the DataTable
            $('#StudentTable').DataTable({
                "pageLength": 10,
                "lengthMenu": [ [10, 25, 50, 100], [10, 25, 50, 100] ],
                "order": [[ 0, 'asc' ]] // Default sorting (first column)
            });

            // Event listener para sa view button
            $('.view-button').on('click', function () {
                var counselID = $(this).data('id');
                
                // AJAX request to fetch counseling data
                $.ajax({
                    type: 'GET',
                    url: '../processes/fetchcounsel.php', // diri gi kuha ang data
                    data: { counseling_id: counselID },
                    dataType: 'json',
                    success: function (response) {
                        if(response.success) {
                            var user = response.data;
                            $('#modal_counseling_id').val(user.counseling_id);
                            $('#modal_student_id').val(user.student_id);
                            $('#modal_fullname').val(user.fullname);
                            $('#modal_email').val(user.email);
                            $('#modal_question1').val(user.question1);
                            $('#modal_question2').val(user.question2);
                            $('#modal_question3').val(user.question3);
                            $('#modal_question4').val(user.question4);
                            $('#modal_question5').val(user.question5);
                        } else {
                            Swal.fire({
                                title: "Error!",
                                text: "Unable to fetch data: " + response.error,
                                icon: "error",
                                showConfirmButton: true,
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        Swal.fire({
                            title: "Error!",
                            text: "An unexpected error occurred: " + error,
                            icon: "error",
                            showConfirmButton: true,
                        });
                    }
                });
            });
        });

        // Delete Confirmation Function
        function confirmDelete(counselingId) {
            Swal.fire({
                title: "Do you want to delete this entry?",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it",
                cancelButtonText: "No, cancel",
                icon: "warning"
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteConfirmed(counselingId);
                }
            });
        }

        function deleteConfirmed(counselingId) {
            $.ajax({
                type: "POST",
                url: "../processes/proc_deletegc.php",
                data: { counseling_id: counselingId },
                dataType: "json",
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            title: "Success!",
                            text: "Entry deleted successfully.",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: "Error deleting entry: " + response.error,
                            icon: "error",
                            showConfirmButton: true,
                        });
                    }
                },
                error: function (xhr, status, error) {
                    Swal.fire({
                        title: "Error!",
                        text: "An unexpected error occurred: " + error,
                        icon: "error",
                        showConfirmButton: true,
                    });
                }
            });
        }
    </script>

    <!-- Sidebar Toggle Script (Assuming you have sidebar functionality) -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let sidebar = document.querySelector(".sidebar");
            let sidebarBtn = document.querySelector(".bx-menu");

            if (sidebarBtn) {
                sidebarBtn.addEventListener("click", () => {
                    sidebar.classList.toggle("close");
                });
            }
        });
    </script>

<script>
       document.addEventListener('DOMContentLoaded', function() {
  const dropdowns = document.querySelectorAll('.studentdetails');
  const dropdownArray = Array.from(dropdowns);

  dropdownArray.forEach((dropdown, index) => {
    const checkbox = dropdown.querySelector('.dd-input');
    const ddMenu = dropdown.querySelector('.dd-menu');

    checkbox.addEventListener('change', function() {
      if (this.checked) {
        // Calculate the height of the current dropdown menu
        const menuHeight = ddMenu.offsetHeight;

        // Adjust the margin top of the subsequent dropdown menus
        for (let i = index + 1; i < dropdownArray.length; i++) {
          dropdownArray[i].style.marginTop = `${menuHeight}px`;
        }

        // Set the display property of the dropdown menu to block
        ddMenu.style.display = 'block';
      } else {
        // Reset the margin top of the subsequent dropdown menus
        for (let i = index + 1; i < dropdownArray.length; i++) {
          dropdownArray[i].style.marginTop = '';
        }

        // Set the display property of the dropdown menu to none
        ddMenu.style.display = 'none';
      }
    });
  });
});
    
</script>
</body>
</html>