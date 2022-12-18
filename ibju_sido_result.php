
<link rel="stylesheet" href="./style.css"> 
<?php
   $con=mysqli_connect("180.65.243.212:3307", "changthink", "Sunchang11**", "data") or die("MariaDB 접속 실패 !!");
   $광역시도 = $_POST['광역시도'];   
   $from = $_POST['조회년1'];

   $sql ="SELECT 시도, 기준년도, 입주량 FROM ibju_year
          where 시도 = '".$광역시도."' and 기준년도 >= '".$from."'
          order by 기준년도";
   $rst = mysqli_query($con, $sql);   
   
   echo "<h1> 입주예정물량 조회 </h1>";
   echo "<table border=1";
   echo "<TR>";   
   echo "<TH>시도</TH><TH>기준년도</TH><TH>입주량</TH>";
   echo "</TR>";
   
   while($row = mysqli_fetch_array($rst)) {
	  echo "<TR>";
	  echo "<TD width=100><font size=2.5><p align='center'>", $row['시도'], "</p></TD>";
	  echo "<TD width=100><font size=2.5><p align='center'>", $row['기준년도'], "</p></TD>";
	  echo "<TD width=100><font size=2.5><p align='center'>", $row['입주량'], "</p></TD>";	  
	  echo "</TR>";	  
   }   
   mysqli_close($con);
   echo "</TABLE>"; 
   echo "<br> <font size=2.5><a href='ibju_main.html'> [조회화면으로] </a></p>";
?>