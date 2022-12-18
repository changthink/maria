
<link rel="stylesheet" href="./style.css"> 
<?php
   $con=mysqli_connect("180.65.243.212:3307", "changthink", "Sunchang11**", "data") or die("MariaDB 접속 실패 !!");
   $광역시도 = $_POST['광역시도'];
   $시자치구 = $_POST['시자치구'];
   $from = $_POST['조회년1'];
      // if($rst) {
	//    echo mysqli_num_rows($rst), "건이 조회됨..<br><br>";
	//    $count = mysqli_num_rows($rst);
   // }
   // else {
	//    echo "userTBL 데이터 조회 실패!!!"."<br>";
	//    echo "실패 원인 :".mysqli_error($con);
	//    exit();
   // }    
   $sql ="SELECT 시도, 자치구, 기준년도, 입주량 FROM ibju_year_sgg
          where 시도 = '".$광역시도."' AND 자치구 like '%".$시자치구."%' and 기준년도 >= '".$from."'
          order by 기준년도";
   $rst = mysqli_query($con, $sql);   
   
   echo "<h1> 입주예정물량 조회 </h1>";
   echo "<table border=1";
   echo "<TR>";   
   echo "<TH>시도</TH><TH>자치구</TH><TH>기준년도</TH><TH>입주량</TH>";
   echo "</TR>";
   
   while($row = mysqli_fetch_array($rst)) {
	  echo "<TR>";
	  echo "<TD width=100><font size=2.5><p align='center'>", $row['시도'], "</p></TD>";
      echo "<TD width=100><font size=2.5><p align='center'>", $row['자치구'], "</p></TD>";
	  echo "<TD width=100><font size=2.5><p align='center'>", $row['기준년도'], "</p></TD>";
	  echo "<TD width=100><font size=2.5><p align='center'>", $row['입주량'], "</p></TD>";	  
	  echo "</TR>";	  
   }   
   mysqli_close($con);
   echo "</TABLE>"; 
   echo "<br> <font size=2.5><a href='ibju_sgg.html'> [조회화면으로] </a></p>";
?>