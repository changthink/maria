<link rel="stylesheet" href="./style.css"> 

<?php
   $con=mysqli_connect("180.65.243.212:3307", "changthink", "Sunchang11**", "rp") or die("MariaDB 접속 실패 !!");
   $광역시도 = $_POST['광역시도'];
   $시자치구 = $_POST['시자치구'];
   $전용1 = $_POST['전용1'];
   $전용2 = $_POST['전용2'];
   $from = $_POST['조회월1'];
   $to = $_POST['조회월2'];
   $월세1 = $_POST['월세1'];
   $월세2 = $_POST['월세2'];

   $sql ="SELECT 광역시도, 시자치구, 법정동, 단지명, 전용, 보증금, 월세, 층, 기준월 FROM villa_rent 
          where 광역시도 = '".$광역시도."' AND 시자치구 like '%".$시자치구."%' and 전용 >= '".$전용1."' and 전용 <= '".$전용2."'
          and 기준월 >= '".$from."' and 기준월 <= '".$to."' and 월세 >= '".$월세1."' and 월세 <= '".$월세2."'
          order by 기준월 desc, 보증금 desc LIMIT 100";
   $rst = mysqli_query($con, $sql);   
   // if($rst) {
	//    echo mysqli_num_rows($rst), "건이 조회됨..<br><br>";
	//    $count = mysqli_num_rows($rst);
   // }
   // else {
	//    echo "userTBL 데이터 조회 실패!!!"."<br>";
	//    echo "실패 원인 :".mysqli_error($con);
	//    exit();
   // }    
   echo "<h3> 빌라 전세 실거래조회결과 </h3>";
   echo "<table border=1";
   echo "<TR>";
   echo "<TH>광역시도</TH><TH>시자치구</TH><TH>법정동</TH><TH>단지명</TH><TH>전용</TH><TH>보증금</TH><TH>월세</TH><TH>층</TH><TH>기준월</TH>";
   echo "</TR>";
   
   while($row = mysqli_fetch_array($rst)) {
	  echo "<TR>";
	  echo "<TD width=100><font size=2.5><p align='center'>", $row['광역시도'], "</p></TD>";
	  echo "<TD width=100><font size=2.5><p align='center'>", $row['시자치구'], "</p></TD>";
	  echo "<TD width=100><font size=2.5><p align='center'>", $row['법정동'], "</p></TD>";
	  echo "<TD width=300><font size=2.5><p align='left'>", $row['단지명'], "</p></TD>";
	  echo "<TD width=50><font size=2.5><p align='center'>", $row['전용'], "</p></TD>";
     echo "<TD width=100><font size=2.5><p align='center'>", $row['보증금'], "</p></TD>";
     echo "<TD width=100><font size=2.5><p align='center'>", $row['월세'], "</p></TD>";
     echo "<TD width=50><font size=2.5><p align='center'>", $row['층'], "</p></TD>";  
	  echo "<TD width=100><font size=2.5><p align='center'>", $row['기준월'], "</p></TD>";	  
	  echo "</TR>";	  
   }   
   mysqli_close($con);
   echo "</TABLE>"; 
   echo "<br> <font size=2.5><a href='rp_main.html'> <-홈으로</a></p>";
?>