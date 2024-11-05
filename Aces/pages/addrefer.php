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
include ('../processes/proc_addrefer.php');
?>
<body>


      


    <div class="containered">
        <h3 style="text-align: center">Student's referral form for guidance and counseling</h3>
        <br>
        <br>

        <label>Student Details</label>
        <form action="" method="post">
            <div class="form first">
                <div class="page1" id="page-1">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-fields">
                            <label>Student ID</label>
                            <input type="text" name="student_id" placeholder="Enter your Student ID" required="validation">
                        </div>
                        <div class="input-fields">
                            <label>Mobile no.</label>
                            <input type="text" name="MobileNo" placeholder="09xxxxxxxx" required="validation">
                        </div>
                        <div class="input-fields">
                            <label>Fullname</label>
                            <input type="text" name="fullname" placeholder="First Name, M.i., Last Name, suffix" required="validation">
                        </div>
                        <div class="input-fields">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="(Enter email details if mobile number is not available.)" required="validation">
                        </div>
                    </div>
                </div>


                <div class="next">
                    <button type="button" id="next-btn">Next</button>
                </div>
            </div>


            <div class="page2" id="page-2">
                 <div>
            </div>





        <div class="form-container">

        
            <h3>Reasons for the referral*</h3>
            <div class="checkbox-group">
                    <input type="radio" id="mental-health" name="question1[]" value="Mental Health Concerns">
                    <label for="mental-health">Mental Health Concerns</label>

                    <input type="radio" id="parental-separation" name="question1[]" value="Parental Separation">
                    <label for="parental-separation">Parental Separation/Divorce</label>

                    <input type="radio" id="emotional-wellbeing" name="question1[]" value="Emotional well-being">
                    <label for="emotional-wellbeing">Emotional well-being</label>

                    <input type="radio" id="suicide-selfharm" name="question1[]" value="Suicide">
                    <label for="suicide-selfharm">Suicide/Self-harm</label>

                    <input type="radio" id="peer-relationships" name="question1[]" value="Friends">
                    <label for="peer-relationships">Friends/Peer Relationships</label>

                    <input type="radio" id="family-violence" name="question1[]" value="Family Violence">
                    <label for="family-violence">Family Violence</label>

                    <input type="radio" id="bullying" name="question1[]" value="Bullying">
                    <label for="bullying">Bullying</label>

                    <input type="radio" id="learning-support" name="question1[]" value="Learning Support">
                    <label for="learning-support">Learning Support/Educational Issues</label>

                    <input type="radio" id="grief-loss" name="question1[]" value="Grief and Loss">
                    <label for="grief-loss">Grief and Loss</label>

                    <input type="radio" id="anger" name="question1[]" value="Anger">
                    <label for="anger">Anger</label>

                    <input type="radio" id="adjustment-issues" name="question1[]" value="Adjustment Issues">
                    <label for="adjustment-issues">Adjustment Issues</label>

                    <input type="radio" id="behavioral-issues" name="question1[]" value="Behavioral Issues">
                    <label for="behavioral-issues">Behavioral Issues</label>

                    <input type="radio" id="accommodation-issues" name="question1[]" value="Accommodation Issues">
                    <label for="accommodation-issues">Accommodation Issues</label>

                    <input type="radio" id="parental-concerns" name="question1[]" value="Parental">
                    <label for="parental-concerns">Parental/Career Concerns</label>
            </div>


            <div class="input-fields">
                <label>other reason for referral</label>
                <textarea type="text" name="question2" placeholder="Other reason" required="validation"></textarea>
            </div>
            <div class="input-fields">
                <label>provide further information regarding this referral: *</label>
                <textarea type="text" name="question3" placeholder="more information" required="validation"></textarea>
            </div>
            <div class="input-fields">
                <label>Desired wellbeing outcome: *</label>
                <input type="text" name="question4" placeholder="What outcome expectations do you assume?" required="validation">
            </div>
            

            <div class="radio-group">
    <h3>Parent Consent?</h3>
    <label>Parents will be contacted regarding this referral.</label>
    <label>Individual Counselling can only take place with parental/guardian consent. *</label>
    
    <div>
        <input type="radio" id="consent-yes" name="question5" value="Yes">
        <label for="consent-yes">Yes</label>
    </div>
    
    <div>
        <input type="radio" id="consent-no" name="question5" value="No">
        <label for="consent-no">No</label>
    </div>
</div>




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