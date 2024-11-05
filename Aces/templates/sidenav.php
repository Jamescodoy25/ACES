<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar close">
  <img class="circle" src="../imgs/aceslogo.jpg"></img>  
        <div class="acestext">Guidance and Counseling</div>    
    <ul class="nav-links">
      <li>
        <a href="../pages/admindashboard.php"> 
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Dashboard</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="../pages/studentlist.php">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Posts</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="../pages/studentlist.php">PROFILING</a></li>
          <li><a href="../pages/studentlist.php">Students</a></li>
          <li><a href="../pages/studcounseling.php">Guidance & Counseling</a></li>
          <li><a href="../pages/interestlist.php">Interests</a></li>
        </ul>
      </li>

      <li>
        <div class="iocn-link">
          <a href="../pages/addstudent.php">
            <i class='bx bx-collection' ></i>
            <span class="link_name">SERVICES</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="../pages/addstudent.php">SERVICES</a></li>
          <li><a href="../pages/addstudent.php">Sign-up | CUMULATIVE FORM</a></li>
          <li><a href="../pages/addrefer.php">Sign-up | Guidance & Counseling form</a></li>
          <li><a href="../pages/addinterest.php">ADD | Interest test</a></li>
          <li><a href="#">SMS</a></li>
        </ul>
      </li> 
     
      <li>
        <a href="../pages/analytics.php">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="link_name">Analytics</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="../pages/analytics.php">Analytics</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-line-chart' ></i>
          <span class="link_name">Chart</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Chart</a></li>
        </ul>
      </li>
   
      <li>
        <a href="#">
          <i class='bx bx-compass' ></i>
          <span class="link_name">Explore</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Explore</a></li>
        </ul>
      </li>
      <li>
        <a href="../pages/history.php">
          <i class='bx bx-history'></i>
          <span class="link_name">History</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">History</a></li>
        </ul>
      </li>
     
    <div class="profile-details">
      <div class="profile-content">
        <img src="../imgs/aceslogo.jpg" alt="profileImg">
      </div>
      <div class="name-job">
        <div class="profile_name">James Codoy</div>
        <div class="job">ADMINISTRATOR</div>
      </div>
      <i class='bx bx-log-out' onclick="location.href='/ACES/'"></i>
    </div>
  </li>
</ul>
  </div>
 
</body>
</html>
