<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap CSS (Latest Version) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css">

<!-- Boxicons CSS -->
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

    <link rel="stylesheet" href="../templates/style.css">
    <title>Document</title>
    <style>
        /* General Styles */
      

        a {
            text-decoration: none;
            color: #000000;
        }

        a:hover {
            color: #222222;
        }

        /* Dropdown Styles */
        .studentdetails {
            display: inline-block;
            position: relative;
            margin-bottom: 5px; /* Space between dropdowns */
            transition: margin-top 0.3s ease; /* Smooth transition */
            width: 100%;
            max-width: 1050px; /* Ensure dropdowns don't exceed this width */
        }

        .dd-button {
            display: block;
            border: 1px solid gray;
            border-radius: 4px;
            padding: 10px 30px 10px 20px;
            background-color: #ffffff;
            cursor: pointer;
            white-space: nowrap;
            width: 100%;
            box-sizing: border-box;
            position: relative; /* For positioning the arrow */
        }

        .dd-button:after {
            content: '';
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            width: 0; 
            height: 0; 
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 5px solid black;
        }

        .dd-button:hover {
            background-color: #eeeeee;
        }

        .dd-input {
            display: none;
        }

        .dd-menu {
            
            display: none;
            position: relative; /* Changed from absolute to relative to allow space in the flow */
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 0 6px 0 rgba(0,0,0,0.1);
            background-color: #ffffff;
            list-style-type: none;
            width: 100%;
            box-sizing: border-box;
        }

        /* Show menu when checkbox is checked */
        

        .column1, .column2 {
            display: inline-block;
            vertical-align: top;
            width: 45%; /* Adjust as needed */
            margin: 10px; /* Spacing between columns */
        }

        .input-fields {
            margin-bottom: 15px;
        }

        .input-fields label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .input-fields input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        #student-details {
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            width: 570px;
            justify-content: center;


        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .column1, .column2 {
                display: block;
                width: 100%;
                margin: 0 0 15px 0;
            }

            .studentdetails {
                max-width: 100%;
            }
        }
        .modal-dialog {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh; /* Make sure it takes up the full viewport height */
        }
        .modal-content {
            margin: auto;
            width: auto; /* Adjust the width of your modal content as needed */
            max-width: 1000px; /* Example width, adjust as needed */
        }
        .profile-viewer{
            display: flex;
            background-color: white;
            width: 900px;
            height: 100vh - 500px;
            justify-content: center;
            box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
            border-radius: 5px;
            border: none;
            margin-left: auto;
            margin-right: auto;
        }
        .studentinfopage1{
            background-color: white;
            width: 870px;
            margin-left: auto;
            margin-right: auto;
        }

        #student-details1 {
            background-color: skyblue;
            text-align: center;
            padding: 20px;              /* Adds space inside the box */
            border-radius: 10px;        /* Rounds the corners */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);  /* Adds a subtle shadow */
            color: white;               /* Changes text color for contrast */
            font-size: 18px;            /* Adjusts the font size */
            font-family: Arial, sans-serif;  /* Sets the font family */
            max-width: 200px;           /* Restricts the width for readability */
            margin: 0 auto;             /* Centers the box on the page */
        }
        #student-photo {
            display: block;
            padding: 5px;
            margin: auto;
            height: 200px;                     /* Your existing height */
            width: 200px;                      /* Your existing width */
            border-radius: 15px;               /* Optional: Rounded corners */
            object-fit: cover;                 /* Ensures image fits well */
            border: 5px solid #ffffff;         /* White border */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Subtle shadow */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }


        #student-photo:hover {
            transform: scale(1.05);           /* Slightly enlarges the image on hover */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* Enhances the shadow on hover */

        }
        .custom-btn {
            display: block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
        
        
        }

        .custom-btn:hover {
            background-color: #0056b3;
        }


        .custom-btn:active {
            background-color: #1c6f9b;         /* Even darker background when clicked */
            transform: translateY(0);          /* Reset lift on click */
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); /* Reset shadow on click */
        }

        


                
    </style>
</head>
<body>
    <?php 
    include('../db/db_connection.php');
    include('../processes/proc_deletestudent.php');
    include('../templates/sidenav.php');
    ?>
   


<section class="home-section" style="padding: 20px; ">
    <div class="home-content">
      <i class='bx bx-menu' ></i><label>Student Profile</label> 
    </div>
   
    
    <table class="table table-bordered table-striped table-hover align-middle"  id="StudentTable" >
    <thead class="table-dark">
        <tr>
            <th>Student no.</th>
            <th>Fullname</th>
            <th>Sex</th>
            <th>Civil Status</th>
            <th>Course</th>
            <th>Year</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
    // Fetch all students from the database
    $strsql = "SELECT student_id, StudName, Sex, CivilStats, Course, YrLvl FROM tbl_students" ;
    $query = sqlsrv_query($conn, $strsql);

    if ($query === false) {
        die("Query failed: " . print_r(sqlsrv_errors(), true));
    }

    while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['student_id'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['StudName'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['Sex'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['CivilStats'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['Course'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['YrLvl'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>";
        echo "<button type='button' class='btn btn-success view-button' style='margin: 5px;' data-bs-toggle='modal' data-bs-target='#exampleModal' data-id='"
         . htmlspecialchars($row['student_id'], ENT_QUOTES, 'UTF-8') . "'>View</button>";
        echo "<button type='button' class='btn btn-primary' onclick='location.href=\"editstudent.php?student_id=" . $row['student_id'] . "\"'>Edit</button>";               
        echo "<button type='button' class='btn btn-danger ms-2' onclick='confirmDelete(\"" . htmlspecialchars($row['student_id'], ENT_QUOTES, 'UTF-8') . "\")'>Delete</button>";
        echo "</td>";
        echo "</tr>";
    }

    if (isset($_GET['student_id'])) {
        $Student_id = $_GET['student_id'];
        $strsql = "SELECT * FROM tbl_students WHERE student_id = ?";
        $params = array($Student_id);
        $query = sqlsrv_query($conn, $strsql, $params);
    
        if ($query === false) {
            die("Query failed: " . print_r(sqlsrv_errors(), true));
        }
    
        $row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
    
        if ($row !== null) {
            // Output the data as JSON
            echo json_encode($row);
        } else {
            echo json_encode(array("error" => "No results found"));
        }
    }

    sqlsrv_close($conn);
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
              <div class="profile-viewer">
                <form>

                    <!-- page 1 -->
                    <div class="studentinfopage1">
                        </label>
                        <input type="checkbox" class="dd-input" id="test1">

                            <div class="column1">
                            
                            <div id="student-details1-1">
                                <img src="../imgs/noprofile.jpg" alt="Student Image" id="student-photo">
                                
                                </div>
                                <div class="input-fields">
                                    <label for="student_id1">Student ID</label>
                                    <input type="text" id="student_id1" name="student_id" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="StudName1">Name</label>
                                    <input type="text" id="StudName1" name="StudName" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="Sex1">Gender</label>
                                    <input type="text" id="Sex1" name="Sex" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="DoB1b">Birthdate</label>
                                    <input type="text" id="DoB1b" name="DoB" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="CivilStats1b">Civil Status</label>
                                    <input type="text" id="CivilStats1b" name="CivilStats" readonly>
                                </div>
                            
                                    
                            </div>
                            <div class="column2">
                                <div class="input-fields">
                                    <label for="DateofFilling1b">Date filed</label>
                                    <input type="text" id="DateofFilling1b" name="DateofFilling" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="HomeAdd1b">Address</label>
                                    <input type="text" id="HomeAdd1b" name="HomeAdd" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="Course1b">Course</label>
                                    <input type="text" id="Course1b" name="Course" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="YrLvl1b">Year level</label>
                                    <input type="text" id="YrLvl1b" name="YrLvl" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="MobileNo1b">Student contact</label>
                                    <input type="text" id="MobileNo1b" name="MobileNo" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="ContactPersn1b">Contact in case of emergency</label>
                                    <input type="text" id="ContactPersn1b" name="ContactPersn" readonly>
                                </div>

                                <div class="input-fields">
                                    <label for="Relation1b">Parent/Guardian</label>
                                    <input type="text" id="Relation1b" name="Relation" readonly>
                                </div>
                                
                                
                            
                            </div>
                    </div>

                    <!-- Dropdown 2 -->
                    <div class="studentdetails" id="menu2">
                        <label for="test2" class="dd-button" aria-haspopup="true" aria-expanded="false">
                            <div id="student-details">Family background</div>
                        </label>

                        <input type="checkbox" class="dd-input" id="test2">

                        <ul class="dd-menu">
                            <div class="column1">
                                <div class="input-fields">
                                    <label for="FthrNme2">Father</label>
                                    <input type="text" id="FthrNme2" name="FthrNme" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="student_id2">Birthdate</label>
                                    <input type="text" id="student_id2" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="student_id2">Educational Attainment</label>
                                    <input type="text" id="student_id2" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="student_id2">Occupation</label>
                                    <input type="text" id="student_id2" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="student_id2">Contact details</label>
                                    <input type="text" id="student_id2" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="student_id2">Marital Status</label>
                                    <input type="text" id="student_id2" readonly>
                                </div>
                                
                            </div>
                            <div class="column2">
                                <div class="input-fields">
                                    <label for="student_id2b">Mother</label>
                                    <input type="text" id="student_id2b" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="student_id2b">Birthdate</label>
                                    <input type="text" id="student_id2b" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="student_id2b">Educational Attainment</label>
                                    <input type="text" id="student_id2b" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="student_id2b">Occupation</label>
                                    <input type="text" id="student_id2b" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="student_id2b">Contact details</label>
                                    <input type="text" id="student_id2b" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="student_id2b">Financial Status</label>
                                    <input type="text" id="student_id2b" readonly>
                                </div>
                            
                            </div>
                        </ul>
                    </div>

                    <!-- Dropdown 3 -->
                    <div class="studentdetails" id="menu3">
                        <label for="test3" class="dd-button" aria-haspopup="true" aria-expanded="false">
                            <div id="student-details">Academic Data</div>
                        </label>

                        <input type="checkbox" class="dd-input" id="test3">

                        <ul class="dd-menu">
                            <div class="column1">
                                <div class="input-fields">
                                    <label for="student_id3">Favorite Subject</label>
                                    <input type="text" id="student_id3" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="student_id3">Most Difficult Subject</label>
                                    <input type="text" id="student_id3" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="student_id3">Sports</label>
                                    <input type="text" id="student_id3" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="student_id3">Career choice 1</label>
                                    <input type="text" id="student_id3" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="student_id3">Career choice 2</label>
                                    <input type="text" id="student_id3" readonly>
                                </div>
                                
                            
                            </div>
                            <div class="column2">
                                <div class="input-fields">
                                    <label for="student_id3b">Subject with consistent high grades</label>
                                    <input type="text" id="student_id3b" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="student_id3b">Extra-curricular activities student like the most</label>
                                    <input type="text" id="student_id3b" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="student_id3b">Leadership Experience</label>
                                    <input type="text" id="student_id3b" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="student_id3b">Talent</label>
                                    <input type="text" id="student_id3b" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="student_id3b">Career choice 3</label>
                                    <input type="text" id="student_id3b" readonly>
                                </div>
                                
                            
                            </div>
                        </ul>
                    </div>
                    
                <!-- Dropdown 4 -->
                    <div class="studentdetails" id="menu4">
                        <label for="test4" class="dd-button" aria-haspopup="true" aria-expanded="false">
                            <div id="student-details">Guidance And Counseling</div>
                        </label>

                        <input type="checkbox" class="dd-input" id="test4">

                        <ul class="dd-menu" style="padding: 10px;">
                            <div class="column1">
                                <div class="input-fields">
                                    <label for="student_id4">visit the guidance office for counseling</label>
                                    <input type="text" id="student_id4" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="student_id4">Concerns for lovelife</label>
                                    <input type="text" id="student_id4" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="student_id4">Concerns for Studies</label>
                                    <input type="text" id="student_id4" readonly>
                                </div>

                            </div>
                            <div class="column2">
                                <div class="input-fields">
                                    <label for="student_id4b">Welcome for home visit?</label>
                                    <input type="text" id="student_id4b" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="student_id4b">Concerns for Friends</label>
                                    <input type="text" id="student_id4b" readonly>
                                </div>
                                <div class="input-fields">
                                    <label for="student_id4b">Concerns for Family</label>
                                    <input type="text" id="student_id4b" readonly>
                                </div>

                            </div> 
                            
                        </ul>
                    
                    </div>
                </form>

</div>

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
    
</body>
</html>

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
                var StudentID = $(this).data('id');
                
                // AJAX request to fetch counseling data
                $.ajax({
                    type: 'GET',
                    url: '../processes/fetchstudentprofile.php', // diri gi kuha ang data
                    data: { student_id: StudentID },
                    dataType: 'json',
                    success: function (response) {
                        if(response.success) {
                            var user = response.data;
                            $('#student_id1').val(user.student_id);
                            $('#StudName1').val(user.StudName);
                            $('#Sex1').val(user.Sex);
                            $('#DoB1b').val(user.DoB);
                            $('#CivilStats1b').val(user.CivilStats);
                            $('#DateofFilling1b').val(user.DateofFilling);
                            $('#HomeAdd1b').val(user.HomeAdd);
                            $('#Course1b').val(user.Course);
                            $('#YrLvl1b').val(user.YrLvl)
                            $('#MobileNo1b').val(user.MobileNo);
                            $('#Relation1b').val(user.Relation);
                            $('#ContactPersn1b').val(user.ContactPersn);
                            $('#FthrNme2').val(user.FthrNme)
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
        function confirmDelete(StudentID) {
            Swal.fire({
                title: "Do you want to delete this entry?",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it",
                cancelButtonText: "No, cancel",
                icon: "warning"
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteConfirmed(StudentID);
                }
            });
        }

        function deleteConfirmed(StudentID) {
            $.ajax({
                type: "POST",
                url: "../processes/proc_deletestudent.php",
                data: { student_id: StudentID },
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


<script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });

  //Javascript paras drop down
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

<!----Script for Dropdown profile and MODAL options -->









