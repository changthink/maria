<?php   
   $con = mysqli_connect("180.65.243.212:3307", "changthink", "Sunchang11**", "data") or die("MariaDB 접속 실패 !!");

   $id = $_POST["id"];
   $pw = $_POST["pw"];
   
   $sql ="INSERT INTO member VALUES('".$id."','".$pw."')";
   
   $ret = mysqli_query($con, $sql);
 
    echo "<h1> 신규 회원 입력 결과 </h1>";
   if($ret) {
	   echo "데이터가 성공적으로 입력됨.";
   }
   else {
	   echo "데이터 입력 실패!!!"."<br>";
	   echo "실패 원인 :".mysqli_error($con);
   } 
   mysqli_close($con);
   
   echo "<br> <a href='login.html'> 로그인화면</a> ";
?>
