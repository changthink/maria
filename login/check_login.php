<?php
header('Content-Type: text/html; charset=UTF-8');
$id = $_POST["id"];
$pw = $_POST["pw"];

$con = mysqli_connect("180.65.243.212:3307", "changthink", "Sunchang11**", "data") or die("MariaDB 접속 실패 !!");
$sql = "select * from member where id='$id'";
$result = mysqli_query($con, $sql);

$num_match = mysqli_num_rows($result);

if(!$num_match){
  echo("
  <script>
  window.alert('등록되지 않은 아이디입니다!')
  history.go(-1)
  </script>
  ");
}else{
  $row = mysqli_fetch_array($result);
  $db_pw = $row["pw"];

  mysqli_close($con);

  if($pw != $db_pw){
    echo("
    <script>
    window.alert('비밀번호가 다릅니다!')
    history.go(-1)
    </script>
    ");
    exit;
  }else{
    session_start();
    $_SESSION["id"] = $row["id"];
    $_SESSION["uname"] = $row["name"];

    echo("
    <script>
    location.href = '../index.html';
    </script>
    ");
  }
}
?>