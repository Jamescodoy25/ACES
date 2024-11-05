<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.anychart.com/releases/8.11.1/js/anychart-core.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.11.1/js/anychart-pie.min.js"></script>
    <link rel="stylesheet" href="../templates/style.css">
    <link rel="stylesheet" href="../calendar/style.css">

    <title>Document</title>
    <style>
    

    
    


@media (max-width: 768px) {
        .card-container {
            flex-direction: column;
            align-items: center;
        }
}

.problemchart {
    position: relative;
    background-color: white;
    display: flex;
    justify-content: center; 
    align-items: center;    
    width: 80%; 
    height: 80%; 
    margin: 20px auto; 
    padding: 20px;
    box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
    border-radius: 20px; 
} 

#problempiechart {
    width: 100%;
    height: 100%; 
    /* Ensure the container fills the parent */
}


    
</style>

</head>
 <?php 
    include('../templates/sidenav.php');
    ?>
     <?php
include('../db/db_connection.php');
//0 total of 14 problems
$sql = "SELECT COUNT(counseling_id) AS Mental_Health_Concerns FROM tbl_counseling WHERE question1 = 'Mental Health Concerns' ";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$Mental_Health_Concerns = $row['Mental_Health_Concerns'];

//1
$sql = "SELECT COUNT(counseling_id) AS Parental_Separation FROM tbl_counseling WHERE question1 = 'Parental Separation' ";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$Parental_Separation = $row['Parental_Separation'];
//2
$sql = "SELECT COUNT(counseling_id) AS Emotional_wellbeing FROM tbl_counseling WHERE question1 = 'Emotional well-being' ";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$Emotional_wellbeing = $row['Emotional_wellbeing'];
//3
$sql = "SELECT COUNT(counseling_id) AS SuicideSelf_harm FROM tbl_counseling WHERE question1 = 'Suicide' ";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$SuicideSelf_harm = $row['SuicideSelf_harm'];
//4
$sql = "SELECT COUNT(counseling_id) AS FriendsPeer_Relationships FROM tbl_counseling WHERE question1 = 'Friends' ";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$FriendsPeer_Relationships = $row['FriendsPeer_Relationships'];
//5
$sql = "SELECT COUNT(counseling_id) AS Family_Violence FROM tbl_counseling WHERE question1 = 'Family Violence' ";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$Family_Violence = $row['Family_Violence'];
//6
$sql = "SELECT COUNT(counseling_id) AS Bullying FROM tbl_counseling WHERE question1 = 'Bullying' ";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$Bullying = $row['Bullying'];
//7
$sql = "SELECT COUNT(counseling_id) AS Learning_SupportEducational_Issues FROM tbl_counseling WHERE question1 = 'Learning Support' ";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$Learning_SupportEducational_Issues = $row['Learning_SupportEducational_Issues'];
//8
$sql = "SELECT COUNT(counseling_id) AS Grief_and_Loss FROM tbl_counseling WHERE question1 = 'Grief and Loss' ";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$Grief_and_Loss = $row['Grief_and_Loss'];
//9
$sql = "SELECT COUNT(counseling_id) AS Anger FROM tbl_counseling WHERE question1 = 'Anger' ";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$Anger = $row['Anger'];
//10
$sql = "SELECT COUNT(counseling_id) AS Adjustment_Issues FROM tbl_counseling WHERE question1 = 'Adjustment Issues' ";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$Adjustment_Issues = $row['Adjustment_Issues'];
//11
$sql = "SELECT COUNT(counseling_id) AS Behavioral_Issues FROM tbl_counseling WHERE question1 = 'Behavioral Issues' ";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$Behavioral_Issues = $row['Behavioral_Issues'];
//12
$sql = "SELECT COUNT(counseling_id) AS Accommodation_Issues FROM tbl_counseling WHERE question1 = 'Accommodation Issues' ";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$Accommodation_Issues = $row['Accommodation_Issues'];
//13
$sql = "SELECT COUNT(counseling_id) AS Parental FROM tbl_counseling WHERE question1 = 'Parental' ";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$Parental = $row['Parental'];





?>
<body>
  <section class="home-section">
    <div class="home-content">
  <i class='bx bx-menu' ></i></div>
 

<div class="problemchart">
<div id="problempiechart"></div>

</div>



  </section>

<script>
    <?php 
    $data = array(
      array("name" => "Parental Separation / Divorce", "value" => $Parental_Separation),
      array("name" => "Mental Health Concerns", "value" => $Mental_Health_Concerns),
      array("name" => "Emotional well-being", "value" => $Emotional_wellbeing),
      array("name" => "Suicide/Self-harm", "value" => $SuicideSelf_harm),
      array("name" => "Friends/Peer Relationships", "value" => $FriendsPeer_Relationships),
      array("name" => "Family Violence", "value" => $Family_Violence),
      array("name" => "Bullying", "value" => $Bullying),
      array("name" => "Learning Support/Educational Issues", "value" => $Learning_SupportEducational_Issues),
      array("name" => "Grief and Loss", "value" => $Grief_and_Loss),
      array("name" => "Anger", "value" => $Anger),
      array("name" => "Adjustment Issues", "value" => $Adjustment_Issues),
      array("name" => "Behavioral Issues", "value" => $Behavioral_Issues),
      array("name" => "Accommodation Issues", "value" => $Accommodation_Issues),
      array("name" => "Parental/Career Concerns", "value" => $Parental)
   
    );  

    $json_data = json_encode($data);

    ?>
    "use strict";
(function() {
  let jsonData = <?php echo $json_data; ?>;

  console.log("Chart Data:", jsonData); // Verify the data

  anychart.onDocumentReady(function() {
    let chart = anychart.pie(jsonData);

    // Set specific colors for each slice (14 colors)
    chart.palette([
      "#FF6F61", // 1. Coral
      "#6B5B95", // 2. Deep Purple
      "#88B04B", // 3. Light Green
      "#F7CAC9", // 4. Soft Pink
      "#92A8D1", // 5. Light Blue
      "#955251", // 6. Deep Mauve
      "#B565A7", // 7. Lavender Purple
      "#009B77", // 8. Emerald Green
      "#DD4124", // 9. Scarlet Red
      "#D65076", // 10. Magenta
      "#45B8AC", // 11. Turquoise
      "#EFC050", // 12. Golden Yellow
      "#5B5EA6", // 13. Indigo
      "#9B2335"  // 14. Wine Red
    ]);

    // Configure the chart
    chart
      .labels()
      .format("{%name} — {%value}")
      .fontSize(14)
      .position("outside");

    // Disable the chart legend
    chart.legend(false);

    // Format the tooltip
    chart
      .tooltip()
      .format("Percent of total: {%PercentValue}{decimalsCount: 1}%");

    // Set chart title text settings
    chart
      .title()
      .enabled(true)
      .useHtml(true)
      .text(
        '<span style="color: #111; font-size:20px; margin-bottom:10px;">Chart of the Problems Faced by the Students</span>' +
        '<br/><span style="color:#173685; font-size: 15px;">Student problems survey presentation based on the guidance and counseling form</span>'
      );

    // Set container id for the chart
    chart.container("problempiechart");

    // Initiate chart drawing
    chart.draw();
  });
})();
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
  </script>
 
 <script>
    const isLeapYear = (year) => {
  return (
    (year % 4 === 0 && year % 100 !== 0 && year % 400 !== 0) ||
    (year % 100 === 0 && year % 400 === 0)
  );
};
const getFebDays = (year) => {
  return isLeapYear(year) ? 29 : 28;
};
let calendar = document.querySelector('.calendar');
const month_names = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December',
  ];
let month_picker = document.querySelector('#month-picker');
const dayTextFormate = document.querySelector('.day-text-formate');
const timeFormate = document.querySelector('.time-formate');
const dateFormate = document.querySelector('.date-formate');

month_picker.onclick = () => {
  month_list.classList.remove('hideonce');
  month_list.classList.remove('hide');
  month_list.classList.add('show');
  dayTextFormate.classList.remove('showtime');
  dayTextFormate.classList.add('hidetime');
  timeFormate.classList.remove('showtime');
  timeFormate.classList.add('hideTime');
  dateFormate.classList.remove('showtime');
  dateFormate.classList.add('hideTime');
};

const generateCalendar = (month, year) => {
  let calendar_days = document.querySelector('.calendar-days');
  calendar_days.innerHTML = '';
  let calendar_header_year = document.querySelector('#year');
  let days_of_month = [
      31,
      getFebDays(year),
      31,
      30,
      31,
      30,
      31,
      31,
      30,
      31,
      30,
      31,
    ];

  let currentDate = new Date();

  month_picker.innerHTML = month_names[month];

  calendar_header_year.innerHTML = year;

  let first_day = new Date(year, month);


  for (let i = 0; i <= days_of_month[month] + first_day.getDay() - 1; i++) {

    let day = document.createElement('div');

    if (i >= first_day.getDay()) {
      day.innerHTML = i - first_day.getDay() + 1;

      if (i - first_day.getDay() + 1 === currentDate.getDate() &&
        year === currentDate.getFullYear() &&
        month === currentDate.getMonth()
      ) {
        day.classList.add('current-date');
      }
    }
    calendar_days.appendChild(day);
  }
};

let month_list = calendar.querySelector('.month-list');
month_names.forEach((e, index) => {
  let month = document.createElement('div');
  month.innerHTML = `<div>${e}</div>`;

  month_list.append(month);
  month.onclick = () => {
    currentMonth.value = index;
    generateCalendar(currentMonth.value, currentYear.value);
    month_list.classList.replace('show', 'hide');
    dayTextFormate.classList.remove('hideTime');
    dayTextFormate.classList.add('showtime');
    timeFormate.classList.remove('hideTime');
    timeFormate.classList.add('showtime');
    dateFormate.classList.remove('hideTime');
    dateFormate.classList.add('showtime');
  };
});

(function() {
  month_list.classList.add('hideonce');
})();
document.querySelector('#pre-year').onclick = () => {
  --currentYear.value;
  generateCalendar(currentMonth.value, currentYear.value);
};
document.querySelector('#next-year').onclick = () => {
  ++currentYear.value;
  generateCalendar(currentMonth.value, currentYear.value);
};

let currentDate = new Date();
let currentMonth = { value: currentDate.getMonth() };
let currentYear = { value: currentDate.getFullYear() };
generateCalendar(currentMonth.value, currentYear.value);

const todayShowTime = document.querySelector('.time-formate');
const todayShowDate = document.querySelector('.date-formate');

const currshowDate = new Date();
const showCurrentDateOption = {
  year: 'numeric',
  month: 'long',
  day: 'numeric',
  weekday: 'long',
};
const currentDateFormate = new Intl.DateTimeFormat(
  'en-US',
  showCurrentDateOption
).format(currshowDate);
todayShowDate.textContent = currentDateFormate;
setInterval(() => {
  const timer = new Date();
  const option = {
    hour: 'numeric',
    minute: 'numeric',
    second: 'numeric',
  };
  const formateTimer = new Intl.DateTimeFormat('en-us', option).format(timer);
  let time = `${`${timer.getHours()}`.padStart(
      2,
      '0'
    )}:${`${timer.getMinutes()}`.padStart(
      2,
      '0'
    )}: ${`${timer.getSeconds()}`.padStart(2, '0')}`;
  todayShowTime.textContent = formateTimer;
}, 1000);
  </script>


</body>
</html>