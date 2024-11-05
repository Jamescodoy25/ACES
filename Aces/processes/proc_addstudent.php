<?php
include ('../db/db_connection.php');

$Student_id = $dateoffilling = $studname = $sex = $civilstats = $dob = $birthplace = $homeadd = $livingstats = $presentcompaddress = $course = $major = $yrlvl = $religion = $areavailingscholar = $kindofscholar = $ContactPersn = $relation = $address = $telno = $mobileno = 
$Nameofwork = $timeofwork = $nameofworkplace = $addressofworkplace = $fthrnme = $fthrdob = $fthrage = $fthreducattain = $fthroccup = $fthrcontno = $mthrnme = $mthrdob = $mthrage = $mthreducattain = $mthroccup = $mthrcontno = $maritalstats = $ofw = $financialstat = 
$nmeofsiblings = $schl_wrk = $cpf = $closesibs = $fthrrel = $mthrrel = $brorel = $sisrel = $favesub = $diffsub = $highgrade = $excurri = $sports = $leadex = $talskl =  "";

if (isset($_POST['button'])) { 
    
    
  
  /* Student Table */
    $Student_id =  $_POST['student_id'];
    $dateoffilling =  $_POST['DateofFilling'];
    $studname =  $_POST['StudName'];
    $sex =  $_POST['Sex'];
    $civilstats = $_POST['CivilStats'];
    $dob = $_POST['DoB'];
    $birthplace = $_POST['BirthPlace'];
    $homeadd = $_POST['HomeAdd'];
    $livingstats = $_POST['Livingstats'];
    $presentcompaddress = $_POST['PresentCompAddress'];
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

    /*Working Student*/
    $Nameofwork = $_POST['nameofwork'];
    $timeofwork = $_POST['TimeofWork'];
    $nameofworkplace = $_POST['NameofWorkplace'];
    $addressofworkplace = $_POST['AddressofWorkplace'];

    /*FAMILY BG*/
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
    $talskl =  $_POST['TalSkl'];
    $carchoice1 =  $_POST['CarChoice1'];
    $carchoice2 =  $_POST['CarChoice2'];
    $carchoice3 =  $_POST['CarChoice3'];
    $testcategory1 =  $_POST['TestCategory1'];
    $testcategory2 =  $_POST['TestCategory2'];
    $testcategory3 =  $_POST['TestCategory3'];
    $visitguidance =  $_POST['VisitGuidance'];
    $homevisitation =  $_POST['HomeVisitation'];
    $bthrlove =  $_POST['BthrLove'];
    $bthrstuds =  $_POST['BthrStuds'];
    $bthrfam =  $_POST['BthrFam'];
    $bthrothrs =  $_POST['BthrOthrs'];

    
   

    $strsql = "INSERT INTO dbo.tbl_students (student_id,DateofFilling,StudName,Sex,CivilStats,DoB,BirthPlace,HomeAdd,Livingstats,PresentCompAddress,Course,Major,YrLvl,Religion,AreAvailingScholar,
    KindofScholar,ContactPersn,Relation,Address,TelNo,MobileNo,nameofwork,TimeofWork,NameofWorkplace,AddressofWorkplace,FthrNme,FthrDoB,FthrAge,FthrEducAttain,FthrOccup,FthrContNo,MthrNme,MthrDoB,
    MthrAge,MthrEducAttain,MthrOccup,MthrContNo,MaritalStats,Ofw,FinancialStat,NmeofSiblings,Schl_Wrk,CPF,CloseSibs,
    FthrRel,MthrRel,BroRel,SisRel,FaveSub,DiffSub,HighGrade,ExCurri,Sports,LeadEx,
    TalSkl,CarChoice1,CarChoice2,CarChoice3,TestCategory1,TestCategory2,TestCategory3,VisitGuidance,HomeVisitation,
    BthrLove,BthrStuds,BthrFam,BthrOthrs) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
 
    $params = array($Student_id,$dateoffilling,$studname,$sex,$civilstats,$dob,$birthplace,$homeadd,
    $livingstats,$presentcompaddress,$course,$major,$yrlvl,$religion,$areavailingscholar,$kindofscholar,
    $ContactPersn,$relation,$address,$telno,$mobileno,$Nameofwork,$timeofwork,$nameofworkplace,
    $addressofworkplace,$fthrnme,$fthrdob,$fthrage,$fthreducattain,$fthroccup,$fthrcontno,$mthrnme,$mthrdob,
    $mthrage,$mthreducattain,$mthroccup,$mthrcontno,$maritalstats,$ofw,$financialstat,$nmeofsiblings,$schl_wrk,$cpf,
    $closesibs,$fthrrel,$mthrrel,$brorel,$sisrel,$favesub,$diffsub,$highgrade,$excurri,$sports,$leadex,$talskl,
    $carchoice1,$carchoice2,$carchoice3,$testcategory1,$testcategory2,$testcategory3,$visitguidance,$homevisitation,$bthrlove,
    $bthrstuds,$bthrfam,$bthrothrs);
    $query = sqlsrv_query($conn,$strsql,$params);


if (!$query) { 
  die("Query failed: " . print_r(sqlsrv_errors(), true));
} else {
  
      sqlsrv_close($conn);
      echo '<script type="text/javascript">';
      echo 'alert("Added Succesfully");';
      echo 'window.location.href = "../pages/studentlist.php";';
      echo '</script>';

      exit();
       
}
}