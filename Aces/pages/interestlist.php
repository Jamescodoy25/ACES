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

    <style>
        #addinterest {
            position: relative;
            left: 1070px;
            bottom: 30px;
            height: 50px;
            width: 150px;
        }

    </style>
</head>
<body>
    <?php 
        include('../db/db_connection.php');
        include('../processes/proc_deleteinterest.php');
        include('../templates/sidenav.php');
    ?>
    
    <section class="home-section" style="padding: 25px;">
        <div class="home-content">
            <i class='bx bx-menu'></i> <label>Interest Test</label>
        </div>
        <button class="btn btn-success ms-2" id="addinterest" type="button" onclick="location.href='../pages/addinterest.php'">
                <i class="fa-solid fa-user-plus fa-xs"></i>
                Add Interest
        </button>
       
        <table class="table table-bordered table-striped table-hover align-middle" id="StudentTable">
            <thead class="table-dark">
                <tr>
                    <th>Number</th>
                    <th>Row</th>
                    <th>Interest</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Fetch all counseling records from the database
                    $strsql = "SELECT q_number, row_id, interest FROM tbl_questionaire ORDER BY q_number";
                    $query = sqlsrv_query($conn, $strsql);
                
                    if ($query === false) {
                        die("Query failed: " . print_r(sqlsrv_errors(), true));
                    }
                
                    // Loop through each row in the query result
                    while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['q_number'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td>" . htmlspecialchars($row['row_id'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td> " . htmlspecialchars($row['interest'], ENT_QUOTES, 'UTF-8') . "</td>";               
                        echo "<td>";
                        echo "<button type='button' class='btn btn-primary view-button' data-bs-toggle='modal' data-bs-target='#exampleModal' data-id='" . htmlspecialchars($row['q_number'], ENT_QUOTES, 'UTF-8') . "'>Edit</button>";
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
                <h5 class="modal-title" id="exampleModalLabel">Interest details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form>
                    <div class="container">
                        <div class="mb-3">
                            <label for="modal_number" class="form-label">Number</label>
                            <input type="text" class="form-control" id="modal_number" name="q_number" >
                        </div>
                        <div class="mb-3">
                            <label for="modal_row" class="form-label">Row</label>
                            <input type="text" class="form-control" id="modal_row_id" name="row_id" >
                        </div>
                        <div class="mb-3">
                            <label for="modal_interest" class="form-label">Interest | Career</label>
                            <input type="text" class="form-control" id="modal_interest" name="interest" >
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
                var numberID = $(this).data('id');
                
                // AJAX request to fetch counseling data
                $.ajax({
                    type: 'GET',
                    url: '../processes/fetchinterest.php', // diri gi kuha ang data
                    data: { q_number: numberID },
                    dataType: 'json',
                    success: function (response) {
                        if(response.success) {
                            var user = response.data;
                            $('#modal_number').val(user.q_number);
                            $('#modal_row_id').val(user.row_id);
                            $('#modal_interest').val(user.interest)   
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
        function confirmDelete(numberID) {
            Swal.fire({
                title: "Do you want to delete this entry?",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it",
                cancelButtonText: "No, cancel",
                icon: "warning"
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteConfirmed(numberID);
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
