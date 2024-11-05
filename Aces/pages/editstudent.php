<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../templates/addingstyle.css">

    <title>Document</title>
</head>
<body>
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

<div class="containered">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <input type="hidden" id="Student_id" name="student_id" value="<?php echo htmlspecialchars($row['student_id']); ?>">
        
        <div class="mb-3">
            <label for="studname" class="form-label">Fullname:</label>
            <input type="text" class="form-control" id="studname" name="StudName" value="<?php echo htmlspecialchars($row['StudName']); ?>">
        </div>
        <div class="mb-3" style="width: 1000px;">
    <label for="sex" class="form-label">Sex:</label>
    <select id="sex" name="Sex" class="form-control">
        <option value="Male" <?php echo ($row['Sex'] == 'Male') ? 'selected' : ''; ?>>Male</option>
        <option value="Female" <?php echo ($row['Sex'] == 'Female') ? 'selected' : ''; ?>>Female</option>
    </select>
</div>
<br>
        <div class="mb-3">
            <label for="civilstats" class="form-label">Civil Status:</label>
            <input type="text" class="form-control" id="civilstats" name="CivilStats" value="<?php echo htmlspecialchars($row['CivilStats']); ?>">
        </div>
        <div class="mb-3">
            <label for="DoB" class="form-label">Birthdate:</label>
            <input type="date" class="form-control" id="DoB" name="DoB" value="<?php echo htmlspecialchars($row['DoB']); ?>">
        </div>
        <div class="mb-3">
            <label for="birthplace" class="form-label">Birthplace:</label>
            <input type="text" class="form-control" id="birthplace" name="BirthPlace" value="<?php echo htmlspecialchars($row['BirthPlace']); ?>">
        </div>
        <div class="mb-3">
            <label for="homeaddress" class="form-label">Home Address:</label>
            <input type="text" class="form-control" id="homeaddress" name="HomeAdd" value="<?php echo htmlspecialchars($row['HomeAdd']); ?>">
        </div>
        <div class="mb-3">
            <label for="livingstats" class="form-label">Living Status:</label>
            <input type="text" class="form-control" id="livingstats" name="Livingstats" value="<?php echo htmlspecialchars($row['Livingstats']); ?>">
        </div>
        <div class="mb-3">
            <label for="presentcompaddress" class="form-label">Present Complete Address:</label>
            <input type="text" class="form-control" id="presentcompaddress" name="PresentCompAddress" value="<?php echo htmlspecialchars($row['PresentCompAddress']); ?>">
        </div>
       
        <div class="mb-3" style="width: 1000px;">
    <label for="Course" class="form-label">Current enrolled course</label>
    <select id="Course" name="Course" class="form-control">
        <option value="BSIT" <?php echo ($row['Course'] == 'BSIT') ? 'selected' : ''; ?>>BSIT</option>
        <option value="BS-Criminology" <?php echo ($row['Course'] == 'BS-Criminology') ? 'selected' : ''; ?>>BS-Criminology</option>
        <option value="BSHM" <?php echo ($row['Course'] == 'BSHM') ? 'selected' : ''; ?>>BSHM</option>
        <option value="BTVTED" <?php echo ($row['Course'] == 'BTVTED') ? 'selected' : ''; ?>>BTVTED</option>
        <option value="SHS-GAS" <?php echo ($row['Course'] == 'SHS-GAS') ? 'selected' : ''; ?>>SHS-GAS</option>
        <option value="SHS-HUMSS" <?php echo ($row['Course'] == 'SHS-HUMSS') ? 'selected' : ''; ?>>SHS-HUMSS</option>
        <option value="SHS-STEM" <?php echo ($row['Course'] == 'SHS-STEM') ? 'selected' : ''; ?>>SHS-STEM</option>
    </select>
    </div>
      

        <div class="mb-3">
            <label for="major" class="form-label">Major:</label>
            <input type="text" class="form-control" id="major" name="Major" value="<?php echo htmlspecialchars($row['Major']); ?>">
        </div>
      
        
        <div class="mb-3" style="width: 1000px;">
    <label for="yrlvl" class="form-label">Current enrolled course</label>
    <select id="yrlvl" name="YrLvl" class="form-control">
        <option value="Grade 11" <?php echo ($row['YrLvl'] == 'Grade 11') ? 'selected' : ''; ?>>Grade 11</option>
        <option value="Grade 12" <?php echo ($row['YrLvl'] == 'Grade 12') ? 'selected' : ''; ?>>Grade 12</option>
        <option value="1st Year" <?php echo ($row['YrLvl'] == '1st Year') ? 'selected' : ''; ?>>1st Year</option>
        <option value="2nd Year" <?php echo ($row['YrLvl'] == '2nd Year') ? 'selected' : ''; ?>>2nd Year</option>
        <option value="3rd Year" <?php echo ($row['YrLvl'] == '3rd Year') ? 'selected' : ''; ?>>3rd Year</option>
        <option value="4th Year" <?php echo ($row['YrLvl'] == '4th Year') ? 'selected' : ''; ?>>4th Year</option>
        
    </select>
        </div>
        <br>
        <div class="mb-3">
            <label for="religion" class="form-label">Religion:</label>
            <input type="text" class="form-control" id="religion" name="Religion" value="<?php echo htmlspecialchars($row['Religion']); ?>">
        </div>
        <div class="mb-3">
            <label for="areavailingscholar" class="form-label">Are Availing Scholar?:</label>
            <input type="text" class="form-control" id="areavailingscholar" name="AreAvailingScholar" value="<?php echo htmlspecialchars($row['AreAvailingScholar']); ?>">
        </div>
        <div class="mb-3">
            <label for="kindofscholar" class="form-label">Kind of Scholar?:</label>
            <input type="text" class="form-control" id="kindofscholar" name="KindofScholar" value="<?php echo htmlspecialchars($row['KindofScholar']); ?>">
        </div>
        <div class="mb-3">
            <label for="ContactPersn" class="form-label">Contact Person:</label>
            <input type="text" class="form-control" id="ContactPersn" name="ContactPersn" value="<?php echo htmlspecialchars($row['ContactPersn']); ?>">
        </div>
        <div class="mb-3">
            <label for="relation" class="form-label">Relation:</label>
            <input type="text" class="form-control" id="relation" name="Relation" value="<?php echo htmlspecialchars($row['Relation']); ?>">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address:</label>
            <input type="text" class="form-control" id="address" name="Address" value="<?php echo htmlspecialchars($row['Address']); ?>">
        </div>
        <div class="mb-3">
            <label for="telno" class="form-label">Tel No:</label>
            <input type="text" class="form-control" id="telno" name="TelNo" value="<?php echo htmlspecialchars($row['TelNo']); ?>">
        </div>
        <div class="mb-3">
            <label for="mobileno" class="form-label">Mobile No:</label>
            <input type="text" class="form-control" id="mobileno" name="MobileNo" value="<?php echo htmlspecialchars($row['MobileNo']); ?>">
        </div>
        <div class="mb-3">
            <label for="nameofwork" class="form-label">Name of Work:</label>
            <input type="text" class="form-control" id="nameofwork" name="nameofWork" value="<?php echo htmlspecialchars($row['nameofWork']); ?>">
        </div>
        <div class="mb-3">
            <label for="timeofwork" class="form-label">Time of Work:</label>
            <input type="text" class="form-control" id="timeofwork" name="TimeofWork" value="<?php echo htmlspecialchars($row['TimeofWork']); ?>">
        </div>
        <div class="mb-3">
            <label for="nameofworkplace" class="form-label">Name of Workplace:</label>
            <input type="text" class="form-control" id="nameofworkplace" name="NameofWorkplace" value="<?php echo htmlspecialchars($row['NameofWorkplace']); ?>">
        </div>
        <div class="mb-3">
            <label for="addressofworkplace" class="form-label">Address of Workplace:</label>
            <input type="text" class="form-control" id="addressofworkplace" name="AddressofWorkplace" value="<?php echo htmlspecialchars($row['AddressofWorkplace']); ?>">
        </div>
        <div class="mb-3">
            <label for="fthrnme" class="form-label">Father Name:</label>
            <input type="text" class="form-control" id="fthrnme" name="FthrNme" value="<?php echo htmlspecialchars($row['FthrNme']); ?>">
        </div>
        <div class="mb-3">
            <label for="fthrdob" class="form-label">Father Date of Birth:</label>
            <input type="text" class="form-control" id="fthrdob" name="FthrDoB" value="<?php echo htmlspecialchars($row['FthrDoB']); ?>">
        </div>
        <div class="mb-3">
            <label for="fthrage" class="form-label">Father Age:</label>
            <input type="text" class="form-control" id="fthrage" name="FthrAge" value="<?php echo htmlspecialchars($row['FthrAge']); ?>">
        </div>
        <div class="mb-3">
            <label for="fthreducattain" class="form-label">Father Education Attainment:</label>
            <input type="text" class="form-control" id="fthreducattain" name="FthrEducAttain" value="<?php echo htmlspecialchars($row['FthrEducAttain']); ?>">
        </div>
        <div class="mb-3">
            <label for="fthroccup" class="form-label">Father Occupation:</label>
            <input type="text" class="form-control" id="fthroccup" name="FthrOccup" value="<?php echo htmlspecialchars($row['FthrOccup']); ?>">
        </div>
        <div class="mb-3">
            <label for="fthrcontno" class="form-label">Father Contact Number:</label>
            <input type="text" class="form-control" id="fthrcontno" name="FthrContNo" value="<?php echo htmlspecialchars($row['FthrContNo']); ?>">
        </div>
        <div class="mb-3">
            <label for="mthrnme" class="form-label">Mother Name:</label>
            <input type="text" class="form-control" id="mthrnme" name="MthrNme" value="<?php echo htmlspecialchars($row['MthrNme']); ?>">
        </div>
        <div class="mb-3">
            <label for="mthrdob" class="form-label">Mother Date of Birth:</label>
            <input type="text" class="form-control" id="mthrdob" name="MthrDoB" value="<?php echo htmlspecialchars($row['MthrDoB']); ?>">
        </div>
        <div class="mb-3">
            <label for="fthrage" class="form-label">Mother Age:</label>
            <input type="text" class="form-control" id="fthrage" name="MthrAge" value="<?php echo htmlspecialchars($row['MthrAge']); ?>">
        </div>
        <div class="mb-3">
            <label for="mthreducattain" class="form-label">Mother Education Attainment:</label>
            <input type="text" class="form-control" id="mthreducattain" name="MthrEducAttain" value="<?php echo htmlspecialchars($row['MthrEducAttain']); ?>">
        </div>
        <div class="mb-3">
            <label for="mthroccup" class="form-label">Mother Occupation:</label>
            <input type="text" class="form-control" id="mthroccup" name="MthrOccup" value="<?php echo htmlspecialchars($row['MthrOccup']); ?>">
        </div>
        <div class="mb-3">
            <label for="mthrcontno" class="form-label">Mother Contact Number:</label>
            <input type="text" class="form-control" id="mthrcontno" name="MthrContNo" value="<?php echo htmlspecialchars($row['MthrContNo']); ?>">
        </div>



                            <!--DROP DOWN HERE-->

    <div class="mb-3" style="width: 1000px;">
    <label for="maritalstats" class="form-label">Marital Status</label>
    <select id="maritalstats" name="MaritalStats" class="form-control">
        <option value="Living Together" <?php echo ($row['MaritalStats'] == 'Living Together') ? 'selected' : ''; ?>>Living Together</option>
        <option value="Separated" <?php echo ($row['MaritalStats'] == 'Separated') ? 'selected' : ''; ?>>Separated</option>
        <option value="Remarried" <?php echo ($row['MaritalStats'] == 'Remarried') ? 'selected' : ''; ?>>Remarried</option>
    </select>
    </div>
        
        <div class="mb-3">
            <label for="maritalstats" class="form-label">Marital Status:</label>
            <input type="text" class="form-control" id="maritalstats" name="MaritalStats" value="<?php echo htmlspecialchars($row['MaritalStats']); ?>">
        </div>
        <div class="mb-3">
            <label for="ofw" class="form-label">OFW:</label>
            <input type="text" class="form-control" id="ofw" name="Ofw" value="<?php echo htmlspecialchars($row['Ofw']); ?>">
        </div>
        <div class="mb-3">
            <label for="fthrage" class="form-label">Mother Age:</label>
            <input type="text" class="form-control" id="fthrage" name="MthrAge" value="<?php echo htmlspecialchars($row['MthrAge']); ?>">
        </div>
        <div class="mb-3">
            <label for="mthreducattain" class="form-label">Mother Education Attainment:</label>
            <input type="text" class="form-control" id="mthreducattain" name="MthrEducAttain" value="<?php echo htmlspecialchars($row['MthrEducAttain']); ?>">
        </div>
        <div class="mb-3">
            <label for="mthroccup" class="form-label">Mother Occupation:</label>
            <input type="text" class="form-control" id="mthroccup" name="MthrOccup" value="<?php echo htmlspecialchars($row['MthrOccup']); ?>">
        </div>
        <div class="mb-3">
            <label for="mthrcontno" class="form-label">Mother Contact Number:</label>
            <input type="text" class="form-control" id="mthrcontno" name="MthrContNo" value="<?php echo htmlspecialchars($row['MthrContNo']); ?>">
        </div>

        <div class="mb-3" style="width: 1000px;">
    <label for="maritalstats" class="form-label">Marital Status</label>
    <select id="maritalstats" name="MaritalStats" class="form-control">
        <option value="Living Together" <?php echo ($row['MaritalStats'] == 'Living Together') ? 'selected' : ''; ?>>Living Together</option>
        <option value="Separated" <?php echo ($row['MaritalStats'] == 'Separated') ? 'selected' : ''; ?>>Separated</option>
        <option value="Remarried" <?php echo ($row['MaritalStats'] == 'Remarried') ? 'selected' : ''; ?>>Remarried</option>
    </select>
        </div>
        <br>


        <div class="mb-3" style="width: 1000px;">
    <label for="ofw" class="form-label">OFW</label>
    <select id="ofw" name="Ofw" class="form-control">
        <option value="Father" <?php echo ($row['Ofw'] == 'Father') ? 'selected' : ''; ?>>Father</option>
        <option value="Mother" <?php echo ($row['Ofw'] == 'Mother') ? 'selected' : ''; ?>>Mother</option>
    </select>
        </div>


        <div class="mb-3" style="width: 1000px;">
    <label for="financialstat" class="form-label">Financial Status</label>
    <select id="financialstat" name="FinancialStat" class="form-control">
        <option value="Below 60,000 PHP/year" <?php echo ($row['FinancialStat'] == 'Below 60,000 PHP/year') ? 'selected' : ''; ?>>Below 60,000 PHP/year</option>
        <option value="60,000 to 100,000 PHP/year" <?php echo ($row['FinancialStat'] == '60,000 to 100,000 PHP/year') ? 'selected' : ''; ?>>60,000 to 100,000 PHP/year</option>
        <option value="101,000 to 150,000 PHP/year" <?php echo ($row['FinancialStat'] == '101,000 to 150,000 PHP/year') ? 'selected' : ''; ?>>101,000 to 150,000 PHP/year</option>
        <option value="Above 150,000 PHP/year" <?php echo ($row['FinancialStat'] == 'Above 150,000 PHP/year') ? 'selected' : ''; ?>>Above 150,000 PHP/year</option>
    </select>
        </div>

        <div class="mb-3">
    <label for="nmeofsiblings" class="form-label">Name of Siblings:</label>
    <textarea class="form-control" id="nmeofsiblings" name="NmeofSiblings"><?php echo htmlspecialchars($row['NmeofSiblings']); ?></textarea>
</div>
<div class="mb-3">
    <label for="schl_wrk" class="form-label">School/Place of Work::</label>
    <textarea class="form-control" id="schl_wrk" name="Schl_Wrk"><?php echo htmlspecialchars($row['Schl_Wrk']); ?></textarea>
</div>

        <div class="mb-3">
            <label for="cpf" class="form-label">The person in the family you are close to and confident with:</label>
            <input type="text" class="form-control" id="cpf" name="CPF" value="<?php echo htmlspecialchars($row['CPF']); ?>">
        </div>

        <div class="mb-3">
            <label for="closesibs" class="form-label">Among your siblings, to whome are you close to?</label>
            <input type="text" class="form-control" id="closesibs" name="CloseSibs" value="<?php echo htmlspecialchars($row['CloseSibs']); ?>">
        </div>

        <div class="mb-3">
            <label>How would you describe your relationship with your:</label>
            
        <label for="fthrrel" class="form-label">Father</label>
        <select id="fthrrel" name="FthrRel" class="form-control">
        <option value="Close" <?php echo ($row['FthrRel'] == 'Close') ? 'selected' : ''; ?>>Close</option>
        <option value="Warm" <?php echo ($row['FthrRel'] == 'Warm') ? 'selected' : ''; ?>>Warm</option>
        <option value="Distant" <?php echo ($row['FthrRel'] == 'Distant') ? 'selected' : ''; ?>>Distant</option>
        <option value="Envy" <?php echo ($row['FthrRel'] == 'Envy') ? 'selected' : ''; ?>>Envy</option>
        <option value="Jealous" <?php echo ($row['FthrRel'] == 'Jealous') ? 'selected' : ''; ?>>Jealous</option>
        <option value="Angry" <?php echo ($row['FthrRel'] == 'Angry') ? 'selected' : ''; ?>>Angry</option>
        <option value="Hate" <?php echo ($row['FthrRel'] == 'Hate') ? 'selected' : ''; ?>>Hate</option>
        <option value="Etc." <?php echo ($row['FthrRel'] == 'Etc') ? 'selected' : ''; ?>>Etc.</option>
        </select>
        </div><br>

        <label for="mthrrel" class="form-label">Mother</label>
        <select id="mthrrel" name="MthrRel" class="form-control">
        <option value="Close" <?php echo ($row['MthrRel'] == 'Close') ? 'selected' : ''; ?>>Close</option>
        <option value="Warm" <?php echo ($row['MthrRel'] == 'Warm') ? 'selected' : ''; ?>>Warm</option>
        <option value="Distant" <?php echo ($row['MthrRel'] == 'Distant') ? 'selected' : ''; ?>>Distant</option>
        <option value="Envy" <?php echo ($row['MthrRel'] == 'Envy') ? 'selected' : ''; ?>>Envy</option>
        <option value="Jealous" <?php echo ($row['MthrRel'] == 'Jealous') ? 'selected' : ''; ?>>Jealous</option>
        <option value="Angry" <?php echo ($row['MthrRel'] == 'Angry') ? 'selected' : ''; ?>>Angry</option>
        <option value="Hate" <?php echo ($row['MthrRel'] == 'Hate') ? 'selected' : ''; ?>>Hate</option>
        <option value="Etc." <?php echo ($row['MthrRel'] == 'Etc') ? 'selected' : ''; ?>>Etc.</option>
        </select>
        
    <br><br>

        <div class="form-label">
        <label for="brorel" class="form-label">Brother</label>
        <select id="brorel" name="BroRel" class="form-control">
        <option value="Close" <?php echo ($row['BroRel'] == 'Close') ? 'selected' : ''; ?>>Close</option>
        <option value="Warm" <?php echo ($row['BroRel'] == 'Warm') ? 'selected' : ''; ?>>Warm</option>
        <option value="Distant" <?php echo ($row['BroRel'] == 'Distant') ? 'selected' : ''; ?>>Distant</option>
        <option value="Envy" <?php echo ($row['BroRel'] == 'Envy') ? 'selected' : ''; ?>>Envy</option>
        <option value="Jealous" <?php echo ($row['BroRel'] == 'Jealous') ? 'selected' : ''; ?>>Jealous</option>
        <option value="Angry" <?php echo ($row['BroRel'] == 'Angry') ? 'selected' : ''; ?>>Angry</option>
        <option value="Hate" <?php echo ($row['BroRel'] == 'Hate') ? 'selected' : ''; ?>>Hate</option>
        <option value="Etc." <?php echo ($row['BroRel'] == 'Etc') ? 'selected' : ''; ?>>Etc.</option>
        </select>
        </div><br><br>

<div class="form-label">
        <label for="sisrel" class="form-label">Sister</label>
        <select id="sisrel" name="SisRel" class="form-control">
        <option value="Close" <?php echo ($row['SisRel'] == 'Close') ? 'selected' : ''; ?>>Close</option>
        <option value="Warm" <?php echo ($row['SisRel'] == 'Warm') ? 'selected' : ''; ?>>Warm</option>
        <option value="Distant" <?php echo ($row['SisRel'] == 'Distant') ? 'selected' : ''; ?>>Distant</option>
        <option value="Envy" <?php echo ($row['SisRel'] == 'Envy') ? 'selected' : ''; ?>>Envy</option>
        <option value="Jealous" <?php echo ($row['SisRel'] == 'Jealous') ? 'selected' : ''; ?>>Jealous</option>
        <option value="Angry" <?php echo ($row['SisRel'] == 'Angry') ? 'selected' : ''; ?>>Angry</option>
        <option value="Hate" <?php echo ($row['SisRel'] == 'Hate') ? 'selected' : ''; ?>>Hate</option>
        <option value="Etc." <?php echo ($row['SisRel'] == 'Etc') ? 'selected' : ''; ?>>Etc.</option>
        </select>
        </div><br><br>

        <h4>III. ACADEMIC DATA</h4>
        <h4>Aptitude</h4>

        <div class="mb-3">
            <label for="favesub" class="form-label">Favorite subject:</label>
            <input type="text" class="form-control" id="favesub" name="FaveSub" value="<?php echo htmlspecialchars($row['FaveSub']); ?>">
        </div>
        <div class="mb-3">
            <label for="diffsub" class="form-label">Most Difficult subject:</label>
            <input type="text" class="form-control" id="diffsub" name="DiffSub" value="<?php echo htmlspecialchars($row['DiffSub']); ?>">
        </div>
        <div class="mb-3">
            <label for="highgrade" class="form-label">Subject with consistent high grades:</label>
            <input type="text" class="form-control" id="highgrade" name="HighGrade" value="<?php echo htmlspecialchars($row['HighGrade']); ?>">
        </div>
        <div class="mb-3">
            <label for="excurri" class="form-label">Extra-curricular activities you like the most:</label>
            <input type="text" class="form-control" id="excurri" name="ExCurri" value="<?php echo htmlspecialchars($row['ExCurri']); ?>">
        </div>
        <div class="mb-3">
            <label for="sports" class="form-label">Sport/s you are into:</label>
            <input type="text" class="form-control" id="sports" name="Sports" value="<?php echo htmlspecialchars($row['Sports']); ?>">
        </div>
        <div class="mb-3">
            <label for="leadex" class="form-label">Leadership experience:</label>
            <input type="text" class="form-control" id="leadex" name="LeadEx" value="<?php echo htmlspecialchars($row['LeadEx']); ?>">
        </div>
        <div class="mb-3">
            <label for="talskl" class="form-label">Talents and skills:</label>
            <input type="text" class="form-control" id="talskl" name="TalSkl" value="<?php echo htmlspecialchars($row['TalSkl']); ?>">
        </div>

        <h5>Career Choice/Life occupation you like?</h5>
    
     <div>
        <div class="choices">
        <label for="carchoice1">1st choice:</label>
        <input id="carchoice1" name="CarChoice1" type="text" value="<?php echo htmlspecialchars($row['CarChoice1']); ?>">
    </div>
    <div class="choices">
        <label for="carchoice2">2nd Choice:</label>
        <input id="carchoice2" name="CarChoice2" type="text" value="<?php echo htmlspecialchars($row['CarChoice2']); ?>">
    </div>
    <div class="choices">
        <label for="carchoice3">3rd Choice:</label>
        <input id="carchoice3" name="CarChoice3" type="text" value="<?php echo htmlspecialchars($row['CarChoice3']); ?>">
    </div>
    </div>

    <div class="form-label">
    <h3>IV. TEST TAKEN</h3>
    <label>Select the tests you have taken:</label>
    <div class="checkbox-group">
        <input type="checkbox" id="textcategory1" name="TestCategory1" value="Entrance Test" <?php if($row['TestCategory1'] == 'Entrance Test') echo 'checked'; ?>>
        <label for="textcategory1">Entrance Test</label><br></div>
    <div class="checkbox-group">
        <input type="checkbox" id="textcategory2" name="TestCategory2" value="Aptitude" <?php if($row['TestCategory2'] == 'Aptitude') echo 'checked'; ?>>
        <label for="textcategory2">Aptitude</label><br></div>
    <div class="checkbox-group">
        <input type="checkbox" id="textcategory3" name="TestCategory3" value="NCAE/YP4" <?php if($row['TestCategory3'] == 'NCAE/YP4') echo 'checked'; ?>>
        <label for="textcategory3">NCAE/YP4</label>
    </div>
    </div>



    <h3>V. GUIDANCE AND COUNSELING</h3>
        
        <label>Do you want to visit the guidance office for counseling?</label>
        <div>
         <input type="radio" id="visit-yes" name="VisitGuidance" value="Yes" <?php if($row['VisitGuidance'] == 'Yes') echo 'checked'; ?>>
            <label for="visit-yes">Yes</label>
            <input type="radio" id="visit-no" name="VisitGuidance" value="No" <?php if($row['VisitGuidance'] == 'No') echo 'checked'; ?>>
            <label for="visit-no">No</label>
        </div>

        <label>Do you welcome home visitation?</label>
        <div>
         <input type="radio" id="home-yes" name="HomeVisitation" value="Yes" <?php if($row['HomeVisitation'] == 'Yes') echo 'checked'; ?>>
            <label for="home-yes">Yes</label>
            <input type="radio" id="home-no" name="HomeVisitation" value="No" <?php if($row['HomeVisitation'] == 'No') echo 'checked'; ?>>
            <label for="home-no">No</label>
        </div>

        <label>Do you have any concerns that bother you?</label>
            <ul>
                <li>Lovelife: <input type="text" id="bthrlove" name="BthrLove" value="<?php echo htmlspecialchars($row['BthrLove']); ?>"></li>
                <li>Studies: <input type="text" id="bthrstuds" name="BthrStuds" value="<?php echo htmlspecialchars($row['BthrStuds']); ?>"></li>
                <li>Family: <input type="text" id="bthrfam" name="BthrFam" value="<?php echo htmlspecialchars($row['BthrFam']); ?>"></li>
                <li>Others: <input type="text" id="bthrothrs" name="BthrOthrs" value="<?php echo htmlspecialchars($row['BthrOthrs']); ?>"></li>
            </ul>




          

            










    

       

        

        <button type="submit" name="btnedit" class="btn btn-primary">Save Changes</button>
    </form>

</div>
</div>   

    <script>
        $(document).ready(function() {
            $('.edit-button').on('click', function() {
                var student_id = $(this).data('id');
                $.ajax({
                    type: 'POST',
                    url: '<?php echo $_SERVER['PHP_SELF']; ?>',
                    data: {student_id: student_id},
                    success: function(data) {
                        var student = JSON.parse(data);
                        $('#student_id').val(student.Student_id);
                        $('#StudName').val(student.studentname);
                        $('#Sex').val(student.sex);
                        $('#CivilStats').val(student.civilstats);
                        $('#DoB').val(student.dob);
                        $('#BirthPlace').val(student.birthplace);
                        $('#HomeAdd').val(student.homeadd);  // Fixed the issue here
                        $('#Livingstats').val(student.livingstats);
                        $('#PresentCompAddress').val(student.presentcompaddress);
                        $('#Course').val(student.course);
                        $('#Major').val(student.major);
                        $('#YrLvl').val(student.yrlvl);
                        $('#Religion').val(student.religion);
                        $('#AreAvailingScholar').val(student.areavailingscholar);
                        $('#KindofScholar').val(student.kindofscholar);
                        $('#ContactPersn').val(student.ContactPersn);
                        $('#Relation').val(student.relation);
                        $('#Address').val(student.address);
                        $('#TelNo').val(student.telno);
                        $('#MobileNo').val(student.mobileno);
                        $('#nameofWork').val(student.nameofwork);
                        $('#TimeofWork').val(student.timeofwork);
                        $('#NameofWorkplace').val(student.nameofworkplace);
                        $('#AddressofWorkplace').val(student.addressofworkplace);
                        $('#FthrNme').val(student.fthrnme);
                        $('#FthrDoB').val(student.fthrdob);
                        $('#FthrAge').val(student.fthrage);
                        $('#FthrEducAttain').val(student.fthreducattain);
                        $('#FthrOccup').val(student.fthroccup);
                        $('#FthrContNo').val(student.fthrcontno);
                        $('#MthrNme').val(student.mthrnme);
                        $('#MthrDoB').val(student.mthrdob);
                        $('#MthrAge').val(student.mthrage);
                        $('#MthrEducAttain').val(student.mthreducattain);
                        $('#MthrOccup').val(student.mthroccup);
                        $('#MthrContNo').val(student.mthrcontno);
                        $('#MaritalStats').val(student.maritalstats);
                        $('#Ofw').val(student.ofw);
                        $('#FinancialStat').val(student.financialstat);
                        $('#NmeofSiblings').val(student.nmeofsiblings);
                        $('#Schl_Wrk').val(student.schl_wrk);
                        $('#CPF').val(student.cpf);
                        $('#CloseSibs').val(student.closesibs);
                        $('#FthrRel').val(student.fthrrel);
                        $('#MthrRel').val(student.mthrrel);
                        $('#BroRel').val(student.brorel);
                        $('#SisRel').val(student.sisrel);
                        $('#FaveSub').val(student.favesub);
                        $('#DiffSub').val(student.diffsub);
                        $('#HighGrade').val(student.highgrade);
                        $('#ExCurri').val(student.excurri);
                        $('#Sports').val(student.sports);
                        $('#LeadEx').val(student.leadex);
                        $('#TalSkl').val(student.talskl);
                        $('#CarChoice1').val(student.carchoice1);
                        $('#CarChoice2').val(student.carchoice2);
                        $('#CarChoice3').val(student.carchoice3);
                        $('#TestCategory1').val(student.testcategory1);
                        $('#TestCategory2').val(student.testcategory2);
                        $('#TestCategory3').val(student.testcategory3);
                        $('#VisitGuidance').val(student.visitguidance);
                        $('#HomeVisitation').val(student.homevisitation);
                        $('#BthrLove').val(student.bthrlove);
                        $('#BthrStuds').val(student.bthrstuds);
                        $('#BthrFam').val(student.bthrfam);
                        $('#BthrOthrs').val(student.bthrothrs);

                      
                     
                    }
                });
            });
        });
    </script>

    <?php
    if (isset($_POST['btnedit'])) {
        $Student_id = $_POST['student_id'];
        $studname = $_POST['StudName'];
        $sex = $_POST['Sex'];
        $civilstats = $_POST['CivilStats'];
        $dob = $_POST['DoB'];
        $birthplace = $_POST['BirthPlace'];
        $homeadd = $_POST['HomeAdd'];
        $livingstats = $_POST['Livingstats'];
        $PresentCompAddress = $_POST['PresentCompAddress'];
        $course = $_POST['Course'];
        $major = $_POST['Major'];
        $yrlvl = $_POST['YrLvl'];
        $religion = $_POST['Religion'];
        $areavailingscholar = $_POST['AreAvailingScholar'];
        $kindofscholar = $_POST['KindofScholar'];
        $ContactPersn = $_POST['ContactPersn'];
        $relation = $_POST['Relation'];
        $address = $_POST['Address'];
        $telno = $_POST['TelNo'];
        $mobileno = $_POST['MobileNo'];
        $nameofwork = $_POST['nameofWork'];
        $timeofwork = $_POST['TimeofWork'];
        $nameofworkplace = $_POST['NameofWorkplace'];
        $addressofworkplace = $_POST['AddressofWorkplace'];
        $fthrnme = $_POST['FthrNme'];
        $fthrdob = $_POST['FthrDoB'];
        $fthrage = $_POST['FthrAge'];
        $fthreducattain = $_POST['FthrEducAttain'];
        $fthroccup = $_POST['FthrOccup'];
        $fthrcontno = $_POST['FthrContNo'];
        $mthrnme = $_POST['MthrNme'];
        $mthrdob = $_POST['MthrDoB'];
        $mthrage = $_POST['MthrAge'];
        $mthreducattain = $_POST['MthrEducAttain'];
        $mthroccup = $_POST['MthrOccup'];
        $mthrcontno = $_POST['MthrContNo'];
        $maritalstats = $_POST['MaritalStats'];
        $ofw = $_POST['Ofw'];
        $financialstat = $_POST['FinancialStat'];
        $nmeofsiblings = $_POST['NmeofSiblings'];
        $schl_wrk = $_POST['Schl_Wrk'];
        $cpf = $_POST['CPF'];
        $closesibs = $_POST['CloseSibs'];
        $fthrrel = $_POST['FthrRel'];
        $mthrrel = $_POST['MthrRel'];
        $brorel = $_POST['BroRel'];
        $sisrel = $_POST['SisRel'];
        $favesub = $_POST['FaveSub'];
        $diffsub = $_POST['DiffSub'];
        $highgrade = $_POST['HighGrade'];
        $excurri = $_POST['ExCurri'];
        $sports = $_POST['Sports'];
        $leadex = $_POST['LeadEx'];
        $talskl = $_POST['TalSkl'];
        $carchoice1 = $_POST['CarChoice1'];
        $carchoice2 = $_POST['CarChoice2'];
        $carchoice3 = $_POST['CarChoice3'];
        $testcategory1 = $_POST['TestCategory1'];
        $testcategory2 = $_POST['TestCategory2'];
        $testcategory3 = $_POST['TestCategory3'];
        $visitguidance = $_POST['VisitGuidance'];
        $homevisitation = $_POST['HomeVisitation'];
        $bthrlove = $_POST['BthrLove'];
        $bthrstuds = $_POST['BthrStuds'];
        $bthrfam = $_POST['BthrFam'];
        $bthrothrs = $_POST['BthrOthrs'];
        



        // Update query with prepared statements
        $strsql = "UPDATE tbl_students SET 
                    StudName = ?, Sex = ?, CivilStats = ?, DoB = ?, 
                    BirthPlace = ?, HomeAdd = ?, Livingstats = ?, 
                    PresentCompAddress = ?, Course = ?, Major = ?, 
                    YrLvl = ?, Religion = ?, AreAvailingScholar = ?, kindofscholar = ?,
                    ContactPersn = ?, Relation = ?, Address = ?, TelNo = ?, MobileNo = ?,
                    nameofWork = ?, TimeofWork = ?, NameofWorkplace = ?, AddressofWorkplace = ?,
                    FthrNme = ?, FthrDoB = ?, FthrAge = ?, FthrEducAttain = ?, FthrOccup = ?, FthrContNo = ?,
                    MthrNme = ?, MthrDoB = ?, MthrAge = ?, MthrEducAttain = ?, MthrOccup = ?, MthrContNo = ?, 
                    MaritalStats = ?, Ofw = ?, FinancialStat = ?, NmeofSiblings = ?, Schl_Wrk = ?, CPF = ?,
                    FthrRel = ?, CloseSibs = ?, MthrRel = ?, BroRel = ?, SisRel = ?, FaveSub = ?, DiffSub = ?,
                    HighGrade = ?, ExCurri = ?, Sports = ?, LeadEx = ?, TalSkl = ?, CarChoice1 = ?, CarChoice2 = ?,
                    CarChoice3 = ?, TestCategory1 = ?, TestCategory2 = ?, TestCategory3 = ?, VisitGuidance = ?, 
                    HomeVisitation = ?, BthrLove = ?, BthrStuds = ?, BthrFam = ?, BthrOthrs = ? WHERE student_id = ?";
        $params = array($studname, $sex, $civilstats, $dob, $birthplace, 
                        $homeadd, $livingstats, $PresentCompAddress, 
                        $course, $major, $yrlvl, $religion, $areavailingscholar, $kindofscholar,
                        $ContactPersn, $relation, $address, $telno, $mobileno, $nameofwork, $timeofwork,
                        $nameofworkplace, $addressofworkplace, $fthrnme, $fthrdob, $fthrage, $fthreducattain, $fthroccup, $fthrcontno,
                        $mthrnme, $mthrdob, $mthrage, $mthreducattain, $mthroccup, $mthrcontno, $maritalstats, 
                        $ofw, $financialstat, $nmeofsiblings, $schl_wrk, $cpf, $closesibs, $fthrrel, $mthrrel, 
                        $brorel, $sisrel, $favesub, $diffsub, $highgrade, $excurri, $sports, $leadex, $talskl, 
                        $carchoice1, $carchoice2, $carchoice3, $testcategory1, $testcategory2, $testcategory3, $visitguidance, $homevisitation, $bthrlove, $bthrstuds, $bthrfam, $bthrothrs, $Student_id);

        $query = sqlsrv_query($conn, $strsql, $params);

        if ($query === false) {
            echo "Query failed: ";
            print_r(sqlsrv_errors());
            exit();
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Record updated successfully");';
            echo 'window.location.href = "../pages/studentlist.php";';
            echo '</script>';
            exit();
        }
    }
    ?>
</body>

</html>