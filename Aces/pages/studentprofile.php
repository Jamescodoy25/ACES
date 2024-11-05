<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
     integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

    <title>Student Details</title>
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

        .modal-content{
            display: flex;
            position:relative;
            right: 190px;
            background-color: white;
            width: 1000px;
            height: 100vh - 500px;
            justify-content: center;
            box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
            border-radius: 5px;
            border: none;
            margin-left: auto;
            margin-right: auto;
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
<body style="background-color: #E4E9F7; ">
<?php
    include('../db/db_connection.php');
    ?>
<?php
    $Student_id = $_GET['student_id'] ?? '';
    // Use parameterized query to avoid SQL injection
    $strsql = "SELECT * FROM tbl_students WHERE student_id = ?";
    $params = array($Student_id);
    $query = sqlsrv_query($conn, $strsql, $params);

    if ($query === false) {
        die("Query failed: " . print_r(sqlsrv_errors(), true));
    }

    $row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
    ?>



<!-- Button trigger modal -->
<div class="profile-viewer">
<form>
<button type="button" onclick="location.href='/aces/pages/studentlist.php'">back</button>

    <!-- Dropdown 1 -->
     <div class="studentinfopage1">
        </label>
        <input type="checkbox" class="dd-input" id="test1">

            <div class="column1">
               
            <div id="student-details1-1">
                <img src="../imgs/noprofile.jpg" alt="Student Image" id="student-photo">
                    <div class="input-fields">
                            <label for="student_id1">Student ID</label>
                            <input type="text" id="student_id1" value="<?php echo htmlspecialchars($row['student_id']); ?>" readonly>
                    </div>
                </div>
                <div class="input-fields">
                    <label for="student_id1">Name</label>
                    <input type="text" id="student_id1" value="<?php echo htmlspecialchars($row['StudName']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id1">Gender</label>
                    <input type="text" id="student_id1" value="<?php echo htmlspecialchars($row['Sex']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id1b">Birthdate</label>
                    <input type="text" id="student_id1b" value="<?php echo htmlspecialchars($row['DoB']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id1b">Civil Status</label>
                    <input type="text" id="student_id1b" value="<?php echo htmlspecialchars($row['CivilStats']); ?>" readonly>
                </div>
               
                      
            </div>
            <div class="column2">
                <div class="input-fields">
                    <label for="student_id1b">Date filed</label>
                    <input type="text" id="student_id1b" value="<?php echo htmlspecialchars($row['DateofFilling']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id1b">Address</label>
                    <input type="text" id="student_id1b" value="<?php echo htmlspecialchars($row['HomeAdd']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id1b">Course</label>
                    <input type="text" id="student_id1b" value="<?php echo htmlspecialchars($row['Course']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id1b">Year level</label>
                    <input type="text" id="student_id1b" value="<?php echo htmlspecialchars($row['YrLvl']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id1b">Student contact</label>
                    <input type="text" id="student_id1b" value="<?php echo htmlspecialchars($row['MobileNo']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id1b">Parent/Guardian</label>
                    <input type="text" id="student_id1b" value="<?php echo htmlspecialchars($row['Relation']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id1b">Contact in case of emergency</label>
                    <input type="text" id="student_id1b" value="<?php echo htmlspecialchars($row['ContactPersn']); ?>" readonly>
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
                    <label for="student_id2">Father</label>
                    <input type="text" id="student_id2" value="<?php echo htmlspecialchars($row['']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id2">Birthdate</label>
                    <input type="text" id="student_id2" value="<?php echo htmlspecialchars($row['']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id2">Educational Attainment</label>
                    <input type="text" id="student_id2" value="<?php echo htmlspecialchars($row['']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id2">Occupation</label>
                    <input type="text" id="student_id2" value="<?php echo htmlspecialchars($row['']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id2">Contact details</label>
                    <input type="text" id="student_id2" value="<?php echo htmlspecialchars($row['']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id2">Marital Status</label>
                    <input type="text" id="student_id2" value="<?php echo htmlspecialchars($row['']); ?>" readonly>
                </div>
                
            </div>
            <div class="column2">
                <div class="input-fields">
                    <label for="student_id2b">Mother</label>
                    <input type="text" id="student_id2b" value="<?php echo htmlspecialchars($row['']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id2b">Birthdate</label>
                    <input type="text" id="student_id2b" value="<?php echo htmlspecialchars($row['']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id2b">Educational Attainment</label>
                    <input type="text" id="student_id2b" value="<?php echo htmlspecialchars($row['']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id2b">Occupation</label>
                    <input type="text" id="student_id2b" value="<?php echo htmlspecialchars($row['']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id2b">Contact details</label>
                    <input type="text" id="student_id2b" value="<?php echo htmlspecialchars($row['']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id2b">Financial Status</label>
                    <input type="text" id="student_id2b" value="<?php echo htmlspecialchars($row['']); ?>" readonly>
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
                    <input type="text" id="student_id3" value="<?php echo htmlspecialchars($row['']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id3">Most Difficult Subject</label>
                    <input type="text" id="student_id3" value="<?php echo htmlspecialchars($row['']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id3">Sports</label>
                    <input type="text" id="student_id3" value="<?php echo htmlspecialchars($row['']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id3">Career choice 1</label>
                    <input type="text" id="student_id3" value="<?php echo htmlspecialchars($row['']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id3">Career choice 2</label>
                    <input type="text" id="student_id3" value="<?php echo htmlspecialchars($row['']); ?>" readonly>
                </div>
                
               
            </div>
            <div class="column2">
                <div class="input-fields">
                    <label for="student_id3b">Subject with consistent high grades</label>
                    <input type="text" id="student_id3b" value="<?php echo htmlspecialchars($row['']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id3b">Extra-curricular activities student like the most</label>
                    <input type="text" id="student_id3b" value="<?php echo htmlspecialchars($row['']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id3b">Leadership Experience</label>
                    <input type="text" id="student_id3b" value="<?php echo htmlspecialchars($row['']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id3b">Talent</label>
                    <input type="text" id="student_id3b" value="<?php echo htmlspecialchars($row['']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id3b">Career choice 3</label>
                    <input type="text" id="student_id3b" value="<?php echo htmlspecialchars($row['']); ?>" readonly>
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
                    <input type="text" id="student_id4" value="<?php echo htmlspecialchars($row['']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id4">Concerns for lovelife</label>
                    <input type="text" id="student_id4" value="<?php echo htmlspecialchars($row['']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id4">Concerns for Studies</label>
                    <input type="text" id="student_id4" value="<?php echo htmlspecialchars($row['']); ?>" readonly>
                </div>

            </div>
            <div class="column2">
                <div class="input-fields">
                    <label for="student_id4b">Welcome for home visit?</label>
                    <input type="text" id="student_id4b" value="<?php echo htmlspecialchars($row['']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id4b">Concerns for Friends</label>
                    <input type="text" id="student_id4b" value="<?php echo htmlspecialchars($row['']); ?>" readonly>
                </div>
                <div class="input-fields">
                    <label for="student_id4b">Concerns for Family</label>
                    <input type="text" id="student_id4b" value="<?php echo htmlspecialchars($row['']); ?>" readonly>
                </div>

            </div> 
            
        </ul>
    
    </div>
</form>

</div>


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
    
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
