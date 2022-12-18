<link rel="stylesheet" href="./style.css"> 

<?php
   $con=mysqli_connect("180.65.243.212:3307", "changthink", "Sunchang11**", "data") or die("MariaDB 접속 실패 !!");
//    $광역시도 = $_POST['광역시도'];
//    $시자치구 = $_POST['시자치구'];   
//    $from = $_POST['조회월1'];   
  
   $sql ="SELECT 시도, 자치구, 미분양, 준공후미분양, 기준월 FROM onsale_join";          
          
   $rst = mysqli_query($con, $sql);   
   
   echo "<h3> 미분양현황 조회(준공후 미분양 포함)</h3>";
   echo "<table border=1";
   echo "<TR>";
   echo "<TH>시도</TH><TH>자치구</TH><TH>미분양</TH><TH>준공후미분양</TH><TH>기준월</TH>";
   echo "</TR>";
   
   while($row = mysqli_fetch_array($rst)) {
	  echo "<TR>";
	  echo "<TD width=100><font size=2.5><p align='center'>", $row['시도'], "</p></TD>";
      echo "<TD width=100><font size=2.5><p align='center'>", $row['자치구'], "</p></TD>";
	  echo "<TD width=100><font size=2.5><p align='center'>", $row['미분양'], "</p></TD>";	  
     echo "<TD width=100><font size=2.5><p align='center'>", $row['준공후미분양'], "</p></TD>";	  
	  echo "<TD width=100><font size=2.5><p align='center'>", $row['기준월'], "</p></TD>";	  
	  echo "</TR>";	  
   }   
   mysqli_close($con);
   echo "</TABLE>"; 
   echo "<br> <font size=2.5><a href='./index.html'> [홈으로]</a></p>";
?>   