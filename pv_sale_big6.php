<link rel="stylesheet" href="./pv_style.css"> 
<?php
   $con=mysqli_connect("180.65.243.212:3307", "changthink", "Sunchang11**", "rp") or die("MariaDB 접속 실패 !!");
   $광역시도 = $_POST['광역시도'];
   $시자치구 = $_POST['시자치구'];
   $전용1 = $_POST['전용1'];
   $전용2 = $_POST['전용2'];
   // $from = $_POST['조회월1'];
   // $to = $_POST['조회월2'];
   
   $sql ="SELECT 광역시도, 시자치구, 법정동, 아파트, 전용, 건축년도,
          max( IF( 기준월 = LAST_DAY(NOW() - INTERVAL 12 MONTH), 거래금액, 0 ) ) AS m12, 
          max( IF( 기준월 = LAST_DAY(NOW() - INTERVAL 11 MONTH), 거래금액, 0 ) ) AS m11, 
          max( IF( 기준월 = LAST_DAY(NOW() - INTERVAL 10 MONTH), 거래금액, 0 ) ) AS m10, 
          max( IF( 기준월 = LAST_DAY(NOW() - INTERVAL 9 MONTH), 거래금액, 0 ) ) AS m9, 
          max( IF( 기준월 = LAST_DAY(NOW() - INTERVAL 8 MONTH), 거래금액, 0 ) ) AS m8, 
          max( IF( 기준월 = LAST_DAY(NOW() - INTERVAL 7 MONTH), 거래금액, 0 ) ) AS m7, 
          max( IF( 기준월 = LAST_DAY(NOW() - INTERVAL 6 MONTH), 거래금액, 0 ) ) AS m6, 
          max( IF( 기준월 = LAST_DAY(NOW() - INTERVAL 5 MONTH), 거래금액, 0 ) ) AS m5, 
          max( IF( 기준월 = LAST_DAY(NOW() - INTERVAL 4 MONTH), 거래금액, 0 ) ) AS m4,
          max( IF( 기준월 = LAST_DAY(NOW() - INTERVAL 3 MONTH), 거래금액, 0 ) ) AS m3, 
          max( IF( 기준월 = LAST_DAY(NOW() - INTERVAL 2 MONTH), 거래금액, 0 ) ) AS m2, 
          max( IF( 기준월 = LAST_DAY(NOW() - INTERVAL 1 MONTH), 거래금액, 0 ) ) AS m1, 
          max( IF( 기준월 = LAST_DAY(NOW()), 거래금액, 0 ) ) AS m0
        FROM sale_big6
        WHERE 기준월 > LAST_DAY(NOW() - INTERVAL 12 MONTH) AND 광역시도 = '".$광역시도."' and 시자치구 LIKE '%".$시자치구."%' 
        and 전용 >= '".$전용1."' and 전용 <= '".$전용2."'            
        GROUP BY 광역시도, 시자치구, 법정동, 아파트, 전용, 건축년도 LIMIT 100";

   $rst = mysqli_query($con, $sql);   
   
   echo "<h1> 아파트매매 실거래조회결과 </h1>";  
   echo "<table border=1";
   echo "<TR>";   
   echo "<TH>광역시도</TH><TH>시자치구</TH><TH>법정동</TH><TH>아파트</TH><TH>전용</TH><TH>건축년도</TH>
         <TH>-12M</TH><TH>-11M</TH><TH>-10M</TH><TH>-9M</TH><TH>-8M</TH><TH>-7M</TH><TH>-6M</TH><TH>-5M</TH><TH>-4M</TH><TH>-3M</TH><TH>-2M</TH><TH>-1M</TH><TH>0M</TH>";
   echo "</TR>";
   
   while($row = mysqli_fetch_array($rst)) {
	  echo "<TR>";
	  echo "<TD width=100><font size=2.5><p align='center'>", $row['광역시도'], "</p></TD>";
	  echo "<TD width=150><font size=2.5><p align='center'>", $row['시자치구'], "</p></TD>";
	  echo "<TD width=100><font size=2.5><p align='center'>", $row['법정동'], "</p></TD>";
	  echo "<TD width=300><font size=2.5><p align='left'>", $row['아파트'], "</p></TD>";
	  echo "<TD width=50><font size=2.5><p align='center'>", $row['전용'], "</p></TD>";
     echo "<TD width=50><font size=2.5><p align='center'>", $row['건축년도'], "</p></TD>";
	  echo "<TD width=80><font size=2.5><p align='center'>", $row['m12'], "</p></TD>";
     echo "<TD width=80><font size=2.5><p align='center'>", $row['m11'], "</p></TD>";
     echo "<TD width=80><font size=2.5><p align='center'>", $row['m10'], "</p></TD>";
     echo "<TD width=80><font size=2.5><p align='center'>", $row['m9'], "</p></TD>";
     echo "<TD width=80><font size=2.5><p align='center'>", $row['m8'], "</p></TD>";
     echo "<TD width=80><font size=2.5><p align='center'>", $row['m7'], "</p></TD>";
     echo "<TD width=80><font size=2.5><p align='center'>", $row['m6'], "</p></TD>";
     echo "<TD width=80><font size=2.5><p align='center'>", $row['m5'], "</p></TD>";
     echo "<TD width=80><font size=2.5><p align='center'>", $row['m4'], "</p></TD>";
     echo "<TD width=80><font size=2.5><p align='center'>", $row['m3'], "</p></TD>";
     echo "<TD width=80><font size=2.5><p align='center'>", $row['m2'], "</p></TD>";
     echo "<TD width=80><font size=2.5><p align='center'>", $row['m1'], "</p></TD>";
     echo "<TD width=80><font size=2.5><p align='center'>", $row['m0'], "</p></TD>";
	  
	  echo "</TR>";	  
   }   
   mysqli_close($con);
   echo "</TABLE>"; 
   echo "<br> <font size=2.5><a href='rppv_sale-big6.html'> <-조회화면으로</a></p>";
?>