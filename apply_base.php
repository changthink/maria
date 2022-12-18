
<link rel="stylesheet" href="./style.css"> 
<?php
   $con=mysqli_connect("180.65.243.212:3307", "changthink", "Sunchang11**", "D_apply") or die("MariaDB 접속 실패 !!");
   $광역시도 = $_POST['광역시도'];
   $시자치구 = $_POST['시자치구'];   
   $from = $_POST['조회월1'];
   $to = $_POST['조회월2'];
   
   $sql ="SELECT * FROM base_join
          where 지역 = '".$광역시도."' AND 자치구 like '%".$시자치구."%'
          and 모집공고일 >= '".$from."' and 모집공고일 <= '".$to."'
          order by 모집공고일";
   $rst = mysqli_query($con, $sql);   
   
   echo "<h3>청약홈 공고조회결과 </h3>";   
   echo "<table border=1";
   echo "<TR>";
   echo "<TH>관리번호</TH><TH>지역</TH><TH>자치구</TH><TH>단지명</TH><TH>세대수</TH><TH>모집공고일</TH><TH>입주시기</TH><TH>평균평당가</TH><TH>시행사</TH>";
   echo "</TR>";
   
   while($row = mysqli_fetch_array($rst)) {
	  echo "<TR>";
	  echo "<TD width=100><font size=2.0><p align='center'>", $row['관리번호'], "</p></TD>";
	  echo "<TD width=70><font size=2.0><p align='center'>", $row['지역'], "</p></TD>";
	  echo "<TD width=70><font size=2.0><p align='center'>", $row['자치구'], "</p></TD>";
	  echo "<TD width=400><font size=2.0><p align='left'>", $row['단지명'], "</p></TD>";
	  echo "<TD width=50><font size=2.0><p align='center'>", $row['세대수'], "</p></TD>";
     echo "<TD width=100><font size=2.0><p align='center'>", $row['모집공고일'], "</p></TD>";
	  echo "<TD width=50><font size=2.0><p align='center'>", $row['입주시기'], "</p></TD>";
	  echo "<TD width=70><font size=2.0><p align='center'>", $row['평균평당가'], "</p></TD>";	  
     echo "<TD width=450><font size=2.0><p align='center'>", $row['시행사'], "</p></TD>";	  
	  echo "</TR>";	  
   }   
   mysqli_close($con);
   echo "</TABLE>"; 
   echo "<br> <font size=2.0><a href='apply_main.html'> <검색으로</a></p>";
?>
