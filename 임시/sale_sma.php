
<link rel="stylesheet" href="./style.css"> 
<?php
   $con=mysqli_connect("180.65.243.212:3307", "changthink", "Sunchang11**", "rp") or die("MariaDB 접속 실패 !!");
   $광역시도 = $_POST['광역시도'];
   $시자치구 = $_POST['시자치구'];
   $전용1 = $_POST['전용1'];
   $전용2 = $_POST['전용2'];
   $from = $_POST['조회월1'];
   $to = $_POST['조회월2'];
   // if($rst) {
	//    echo mysqli_num_rows($rst), "건이 조회됨..<br><br>";
	//    $count = mysqli_num_rows($rst);
   // }
   // else {
	//    echo "userTBL 데이터 조회 실패!!!"."<br>";
	//    echo "실패 원인 :".mysqli_error($con);
	//    exit();
   // }    
   $sql ="SELECT 광역시도, 시자치구, 법정동, 아파트, 전용, 층, 거래금액, 기준월 FROM sale_sma
          where 광역시도 = '".$광역시도."' AND 시자치구 like '%".$시자치구."%' and 전용 >= '".$전용1."' and 전용 <= '".$전용2."'         
          and 기준월 >= '".$from."' and 기준월 <= '".$to."'
          order by 기준월 desc, 거래금액 desc LIMIT 50";
   $rst = mysqli_query($con, $sql);   
   
   echo "<h1> 아파트매매 실거래조회결과 </h1>";
   echo "<table border=1";
   echo "<TR>";   
   echo "<TH>광역시도</TH><TH>시자치구</TH><TH>법정동</TH><TH>아파트</TH><TH>전용</TH><TH>층</TH><TH>거래금액</TH><TH>기준월</TH>";
   echo "</TR>";
   
   while($row = mysqli_fetch_array($rst)) {
	  echo "<TR>";
	  echo "<TD width=100><font size=2.5><p align='center'>", $row['광역시도'], "</p></TD>";
	  echo "<TD width=100><font size=2.5><p align='center'>", $row['시자치구'], "</p></TD>";
	  echo "<TD width=100><font size=2.5><p align='center'>", $row['법정동'], "</p></TD>";
	  echo "<TD width=300><font size=2.5><p align='left'>", $row['아파트'], "</p></TD>";
	  echo "<TD width=50><font size=2.5><p align='center'>", $row['전용'], "</p></TD>";
     echo "<TD width=50><font size=2.5><p align='center'>", $row['층'], "</p></TD>";
	  echo "<TD width=100><font size=2.5><p align='center'>", $row['거래금액'], "</p></TD>";
	  echo "<TD width=100><font size=2.5><p align='center'>", $row['기준월'], "</p></TD>";	  
	  echo "</TR>";	  
   }   
   mysqli_close($con);
   echo "</TABLE>"; 
   echo "<br> <font size=2.5><a href='rp_main4.html'> <-조회화면으로</a></p>";
?>