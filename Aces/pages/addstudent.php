<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="../templates/style.css">
    <link rel="stylesheet" href="../templates/addingstyle.css">


</head>
<?php 
include ('../db/db_connection.php');
include ('../templates/sidenav.php');
include ('../processes/proc_addstudent.php');
?>
<body>




    <div class="containered">
        <header>Cummulative Form</header>
        
        <form action="" method="post">
            <div class="form first">
                <div class="page1" id="page-1">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-fields">
                            <label>Student ID</label>
                            <input type="number" name="student_id" placeholder="Enter your Student ID" required="validation">
                        </div>

                        <div class="input-fields">
                            <label>Date of Filling</label>
                            <input type="date" name="DateofFilling" placeholder="DateofFilling">
                        </div>
                    
                        <div class="input-fields">
                            <label>Student Name</label>
                            <input type="text" name="StudName" placeholder="Student Name" >
                        </div>

                       
                        <div class="Sex" id="Sex" style="width: 1000px; ">
                             <label style="width: 100%; height: 30px; font-size: 16px;">Gender</label>
                             <select name="Sex">
                               <option value="" selected disabled hidden>Select Your Gender</option>
                               <option value="Male">Male</option>
                               <option value="Female">Female</option>
                            </select>
                        </div>
                        
                        <div class="CivilStats" id="CivilStats" style="width: 1000px; ">
                             <label style="width: 100%; height: 30px; font-size: 16px;">Civil Status</label>
                             <select name="CivilStats">
                               <option value="" selected disabled hidden>Select Your Gender</option>
                               <option value="Single">Single</option>
                               <option value="Married">Married</option>
                               <option value="Divorced">Divorced</option>
                               <option value="Widowed">Widowed</option>
                              
                            </select>
                        </div>
                    <br>
                        <div class="input-fields">
                            <label>Date of Birth</label>
                            <input type="date" name="DoB" placeholder="birthdate">
                        </div>
                        <div class="input-fields">
                            <label>Birthplace</label>
                            <input type="text" name="BirthPlace" placeholder="Birthplace" >
                        </div>

                        <div class="input-fields">
                            <label>Home Address</label>
                            <input type="text" name="HomeAdd" placeholder="Home Address">
                        </div>

                        <div class="input-fields">
                            <label>Living status (options)</label>
                            <input type="text" name="Livingstats" placeholder="Living Status">
                        </div>
                        <div class="input-fields">
                            <label>Present Complete Address</label>
                            <input type="text" name="PresentCompAddress" placeholder="Present Complete Address">
                        </div>
                      
                        <div class="Course" id="course">
                             <label style="font-weight: bold;">Course</label>
                             <select name="Course" style="width: 100%; height: 30px; font-size: 16px;" required>
                               <option value="" selected disabled hidden>Please select Your current enrolled program</option>
                               <option value="BSIT">BS Information Technology</option>
                               <option value="BS-Criminology">BS Criminology</option>
                               <option value="BSHM">BS Hospitality Management</option>
                               <option value="BTVTED">Bachelor of Technical-Vocational Teacher Education</option>
                               <option value="SHS-GAS">General Academic Strand(SHS)</option>
                               <option value="SHS-HUMSS">Humanities and social sciences(SHS)</option>
                               <option value="SHS-STEM">Science, Technology, Engineering, and Mathematics(SHS)</option>
                            </select>
                        </div>

                        <div class="input-fields">
                            <label>Major</label>
                            <input type="text" name="Major" placeholder="Major">
                        </div>

                      
                        <div class="YrLvl" id="YrLvl" style="width: 1000px; ">
                             <label style="width: 100%; height: 30px; font-size: 16px;">Civil Status</label>
                             <select name="YrLvl">
                               <option value="" selected disabled hidden>Year level</option>
                               <option value="Grade 11">Grade 11</option>
                               <option value="Grade 12">Grade 12</option>
                               <option value="1st Year">1st Year</option>
                               <option value="2nd Year">2nd Year</option>
                               <option value="3rd Year">3rd Year</option>
                               <option value="4th Year">4th Year</option>                            
                            </select>
                        </div>
                        <br>

                        <div class="input-fields">
                            <label>Religion</label>
                            <input type="text" name="Religion" placeholder="Religion">
                        </div>
                        <div class="input-fields">
                            <label>Are Availing Scolar? Option yes/no</label>
                            <input type="text" name="AreAvailingScholar" placeholder="Are you availing schoolar?">
                        </div>

                        <div class="input-fields">
                            <label>Kind of scholar (DAPAT ISA RAS TAAS)</label>
                            <input type="text" name="KindofScholar" placeholder="unsay iskolar nimo?">
                        </div>
                        <div class="input-fields">
                            <label>Contact Person</label>
                            <input type="text" name="ContactPersn" placeholder="Contact person in case of emergency">
                        </div>
                        <div class="input-fields">
                            <label>Relation</label>
                            <input type="text" name="Relation" placeholder="Relation">
                        </div>
                        <div class="input-fields">
                            <label>Address</label>
                            <input type="text" name="Address" placeholder="Address">
                        </div>
                        <div class="input-fields">
                            <label>Tel #</label>
                            <input type="text" name="TelNo" placeholder="your Tel No">
                        </div>

                        <div class="input-fields">
                            <label>Mobile #</label>
                            <input type="text" name="MobileNo" placeholder="Your Mobile No">
                        </div>
                    </div>
                </div>




            <!--Working Student-->
            <div class="working students">
                    <span class="title">Family Background</span>

                    <div class="fields">
                        <div class="input-fields">
                            <label>Name of Work</label>
                            <input type="text" name="nameofwork" placeholder="Name of workplace">
                        </div>

                        <div class="input-fields">
                            <label>TimeofWork</label>
                            <input type="time" name="TimeofWork" placeholder="Time of Work">
                        </div>

                        <div class="input-fields">
                            <label>Name of Workplace</label>
                            <input type="text" name="NameofWorkplace" placeholder="Name of your workplace">
                        </div>
                        <div class="input-fields">
                            <label>Address of Workplace</label>
                            <input type="text" name="AddressofWorkplace" placeholder="Address  of your workplace">
                        </div>
                    </div>
                </div>


                <!--FAMILY BG-->
                <h3>II. Family Background</h3>
                
                <div class="parent-info">
                    <h4>Father</h4>
                    <label>Name:</label>
                    <input type="text" name="FthrNme">

                    <label>Date of Birth:</label>
                    <input type="date" name="FthrDoB">

                    <label>Age:</label>
                    <input type="number" name="FthrAge">

                    <label>Educational Attainment:</label>
                    <input type="text" name="FthrEducAttain">

                    <label>Occupation:</label>
                    <input type="text" name="FthrOccup">

                    <label>Contact #:</label>
                    <input type="text" name="FthrContNo">
                </div>

                <div class="parent-info">
                    <h4>Mother</h4>
                    <label>Name:</label>
                    <input type="text"  name="MthrNme">

                    <label>Date of Birth:</label>
                    <input type="date" name="MthrDoB">

                    <label>Age:</label>
                    <input type="number" name="MthrAge">

                    <label>Educational Attainment:</label>
                    <input type="text" name="MthrEducAttain">

                    <label>Occupation:</label>
                    <input type="text" name="MthrOccup">

                    <label>Contact #:</label>
                    <input type="text" name="MthrContNo">
                </div>

                                <!--MARITAL STATUS-->

                <div class="family-status">
                    <h3>II.a.)Marital Status</h3><br>
                    <input type="checkbox" name="MaritalStats" value="living-together">
                    <label for="living-together">Living Together</label><br>
                    
                    <input type="checkbox" name="MaritalStats" value="separated">
                    <label for="separated">Separated</label><br>
                    
                    <input type="checkbox"name="MaritalStats" value="remarried">
                    <label for="remarried">Remarried</label><br>
                </div>

                        <!--FAMILY STATUS-->
                <div class="family-status">

                    <h4>OFW/Working Abroad:</h4><br>
                    <input type="checkbox" name="Ofw" value="father">
                    <label for="father-abroad">Father</label><br>
                    
                    <input type="checkbox" name="Ofw" value="mother">
                    <label for="mother-abroad">Mother</label>
                </div>


                <!--FINANCIAL STATUS-->
                <div class="financial-status">
                    <h4>Financial Status</h4>
                    <input type="radio" name="FinancialStat" value="below-60000">
                    <label for="below-60000">Below 60,000 PHP/year</label><br>

                    <input type="radio" id="60000-100000" name="FinancialStat" value="60000-100000">
                    <label for="60000-100000">60,000 to 100,000 PHP/year</label><br>
                </div>
                <div class="financial-status">


                    <input type="radio" id="100000-150000" name="FinancialStat" value="100000-150000">
                    <label for="100000-150000">100,000 to 150,000 PHP/year</label><br>

                    <input type="radio" id="above-150000" name="FinancialStat" value="above-150000">
                    <label for="above-150000">Above 150,000 PHP/year</label>
                </div>
                <div class="next">

                    <button type="button" id="next-btn">Next</button>
                </div>
            </div>


            <div class="page2" id="page-2">


                            <h3>II.d.) Family Dynamics</h3>
    
                        <div class="col2page">
                            <label for="siblings">Name of Siblings:</label>
                            <textarea id="siblings" name="NmeofSiblings" rows="6" type="text"></textarea>
                        </div>
                        <div class="col2page">
                            <label for="siblings_work">School / Place of Work:</label>
                            <textarea id="siblings_work" name="Schl_Wrk" rows="6" type="text"></textarea>
                        </div>


                        <label>The person in the family you are very close to and confident with:</label>
                        <input type="text" name="CPF">

                        <label>Among your siblings, to whom are you close to?</label>
                        <input type="text" name="CloseSibs">
                        


                        <label>How would you describe your relationship with your:</label>
                        <div class="ParentRel">
                        <label>Father</label>
                        <select name="FthrRel">
                        <option value="close">Close</option>
                        <option value="warm">Warm</option>
                        <option value="distant">Distant</option>
                        <option value="envy">Envy</option>
                        <option value="jealous">Jealous</option>
                        <option value="angry">Angry</option>
                        <option value="hate">Hate</option>
                        <option value="others">Others</option>
                        </select>
                        </div>

                        <div class="ParentRel">
                        <label>Mother</label>
                        <select name="MthrRel">
                        <option value="close">Close</option>
                        <option value="warm">Warm</option>
                        <option value="distant">Distant</option>
                        <option value="envy">Envy</option>
                        <option value="jealous">Jealous</option>
                        <option value="angry">Angry</option>
                        <option value="hate">Hate</option>
                        <option value="others">Others</option>
                        </select>
                        </div>



                        <div class="SiblingsRel">
                            <label>Brother</label>
                            <select name="BroRel">
                            <option value="close">Close</option>
                            <option value="warm">Warm</option>
                            <option value="distant">Distant</option>
                            <option value="envy">Envy</option>
                            <option value="jealous">Jealous</option>
                            <option value="angry">Angry</option>
                            <option value="hate">Hate</option>
                            <option value="others">Others</option>
                            </select>
                            </div>
    
                            <div class="SiblingsRel">
                            <label>Sister</label>
                            <select name="SisRel">
                            <option value="close">Close</option>
                            <option value="warm">Warm</option>
                            <option value="distant">Distant</option>
                            <option value="envy">Envy</option>
                            <option value="jealous">Jealous</option>
                            <option value="angry">Angry</option>
                            <option value="hate">Hate</option>
                            <option value="others">Others</option>
                            </select>
                            </div>


                            <!--Academic Data ADD PHP-->
                            <h3>III. Academic Data</h3>
    
                            <label>Favorite Subject:</label>
                        <input type="text" name="FaveSub">

                        <label>Most Difficult Subject:</label>
                        <input type="text" name="DiffSub">

                        <label>Subject with consistent high grades:</label>
                        <input type="text" name="HighGrade">

                        <label>Extra-curricular activities you like the most:</label>
                        <input type="text" name="ExCurri">

                        <label>Sport/s you are into:</label>
                        <input type="text" name="Sports">

                        <label>Leadership experience:</label>
                        <input type="text" name="LeadEx">

                        <label>Talents and Skills:</label>
                        <input type="text" name="TalSkl">


    
                 <h4>Career Choice/Life occupation you like?</h4>
    
            <div>
                
                <div class="choices">
                    <label for="choice1">1st choice:</label>
                    <input id="choice1" name="CarChoice1" type="text">
                </div>
                <div class="choices">
                    <label for="choice2">2nd Choice:</label>
                    <input id="choice2" name="CarChoice2" type="text">
                </div>
                <div class="choices">
                    <label for="choice3">3rd Choice:</label>
                    <input id="choice3" name="CarChoice3" type="text">
                </div>
                
            </div>





        <div class="form-container">
        
            <label>Select the tests you have taken:</label>
            <div class="checkbox-group">
                <input type="checkbox" id="entrance-test" name="TestCategory1" value="Entrance Test">
                <label for="entrance-test">Entrance Test</label><br>

                <input type="checkbox" id="aptitude-test" name="TestCategory2" value="Aptitude">
                <label for="aptitude-test">Aptitude</label><br>

                <input type="checkbox" id="ncae-test" name="TestCategory3" value="NCAE/YP4">
                <label for="ncae-test">NCAE/YP4</label>
            </div>



            <h3>V. GUIDANCE AND COUNSELING</h3>
        <form>
            <label>Do you want to visit the guidance office for counseling?</label>
            <div>
                <input type="radio" id="visit-yes" name="VisitGuidance" value="Yes">
                <label for="visit-yes">Yes</label>
                <input type="radio" id="visit-no" name="VisitGuidance" value="No">
                <label for="visit-no">No</label>
            </div>

            <label>Do you welcome home visitation?</label>
            <div>
                <input type="radio" id="home-yes" name="HomeVisitation" value="Yes">
                <label for="home-yes">Yes</label>
                <input type="radio" id="home-no" name="HomeVisitation" value="No">
                <label for="home-no">No</label>
            </div>

            <label>Do you have any concerns that bother you?</label>
            <ul>
                <li>Lovelife: <input type="text" name="BthrLove"></li>
                <li>Studies: <input type="text" name="BthrStuds"></li>
                <li>Family: <input type="text" name="BthrFam"></li>
                <li>Family: <input type="text" name="BthrOthrs"></li>

            </ul>








                <div class="input-fields">

                        <button type="button" id="prev-btn" style="margin: 5px;">Previous</button>

                        <button class="submit" type="submit" id="button" name="button" style="margin: 5px;">  
                            <span class="submit" >Submit</span>
                            <i class="ph ph-skip-forward"></i>
                        </button>
                        </div>

            </div>
            </div>
        </form>


    </div>


</body>
</html>

<script>
  // JavaScript
  // Get the form elements
const form = document.querySelector('form');
const page1 = document.querySelector('#page-1');
const page2 = document.querySelector('#page-2');
const nextBtn = document.querySelector('#next-btn');
const prevBtn = document.querySelector('#prev-btn');

// Hide the second page by default
page2.style.display = 'none';

// Add event listener to the next button
nextBtn.addEventListener('click', () => {
  // Hide the first page and show the second page
  page1.style.display = 'none';
  page2.style.display = 'block';
});

// Add event listener to the previous button
prevBtn.addEventListener('click', () => {
  // Hide the second page and show the first page
  page2.style.display = 'none';
  page1.style.display = 'block';
});
</script>