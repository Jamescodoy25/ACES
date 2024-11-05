<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="../templates/style.css">
    <link rel="stylesheet" href="../templates/addreferstyle.css">


</head>
<?php 
include ('../db/db_connection.php');
include ('../templates/sidenav.php');
include ('../processes/proc_addinterest.php');
?>
<body>


      


    <div class="containered">
        <h3 style="text-align: center">Add Interest</h3>
        <br>
        <br>

        <label>Student Details</label>
        <form action="" method="post">
                <div class="form first">
                    <div class="page1" id="page-1">
                        <div class="details personal">
                            <span class="title">Careers</span>

                            <div class="fields">
                                <div class="input-fields">
                                    <label>Number</label>
                                    <input type="text" name="number" placeholder="Enter Number" required="validation">
                                </div>
                                <div class="input-fields">
                                    <label>Row</label>
                                    <input type="text" name="row_id" placeholder="Enter row no." required="validation">
                                </div>
                                <div class="input-fields">
                                    <label>Interests / Career</label>
                                    <input type="text" name="interest" placeholder="Enter Career" required="validation">
                                </div>

                                <button class="submit" type="submit" onclick="location.href='../pages/interestlist.php'" style="margin: 5px;">  
                                    <span class="submit" >Cancel</span>
                                    <i class="ph ph-skip-forward"></i>
                                </button>

                                <button class="submit" type="submit" id="button" name="button" style="margin: 5px;">  
                                    <span class="submit" >Submit</span>
                                    <i class="ph ph-skip-forward"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>


</body>
</html>

