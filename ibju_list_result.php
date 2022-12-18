
<link rel="stylesheet" href="./style.css"> 
<?php
   $con=mysqli_connect("180.65.243.212:3307", "changthink", "Sunchang11**", "data") or die("MariaDB 접속 실패 !!");
   $광역시도 = $_POST['광역시도'];
   $시자치구 = $_POST['시자치구'];   
      
   $sql ="SELECT 시도, 자치구, 단지명, y2020, y2021, y2022, y2023, y2024, y2025, y2026 FROM ibju_sgg_danji
          where 시도 = '".$광역시도."' AND 자치구 like '%".$시자치구."%'";
   $rst = mysqli_query($con, $sql);   
      
   echo "<h1> 입주단지 조회 </h1>";
   echo "<table border=1";   
   echo "<TR>";   
   echo "<TH>시도</TH><TH>자치구</TH><TH>단지명</TH><TH>y2020</TH><TH>y2021</TH><TH>y2022</TH><TH>y2023</TH><TH>y2024</TH><TH>y2025</TH><TH>y2026</TH>";
   echo "</TR>";
   
   while($row = mysqli_fetch_array($rst)) {
	  echo "<TR>";
	  echo "<TD width=100><font size=2.5><p align='center'>", $row['시도'], "</p></TD>";
      echo "<TD width=100><font size=2.5><p align='center'>", $row['자치구'], "</p></TD>";
	  echo "<TD width=300><font size=2.5><p align='center'>", $row['단지명'], "</p></TD>";
	  echo "<TD width=100><font size=2.5><p align='center'>", $row['y2020'], "</p></TD>";	  
      echo "<TD width=100><font size=2.5><p align='center'>", $row['y2021'], "</p></TD>";	  
      echo "<TD width=100><font size=2.5><p align='center'>", $row['y2022'], "</p></TD>";	  
      echo "<TD width=100><font size=2.5><p align='center'>", $row['y2023'], "</p></TD>";	  
      echo "<TD width=100><font size=2.5><p align='center'>", $row['y2024'], "</p></TD>";	  
      echo "<TD width=100><font size=2.5><p align='center'>", $row['y2025'], "</p></TD>";	  
      echo "<TD width=100><font size=2.5><p align='center'>", $row['y2026'], "</p></TD>";	  
	  echo "</TR>";	  
   }   
   mysqli_close($con);   
   echo "</TABLE>"; 
   echo "<br> <font size=2.5><a href='ibju_list.html'> [조회화면으로] </a></p>";
?>