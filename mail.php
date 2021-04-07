<?php
session_start();
$name=$_SESSION['form']['name'];
$email=$_SESSION['form']['email'];
$body=$_SESSION['form']['body'];

$name=htmlspecialchars($name,ENT_QUOTES);
$email=htmlspecialchars($email,ENT_QUOTES);
$body=htmlspecialchars($body,ENT_QUOTES);
try{
  $db=new PDO('mysql:dbname=portfolio;host=127.0.0.1;charset=utf8','root','root');
  $stmt=$db->prepare('INSERT INTO contacts SET name=?,email=?,body=?,created_at=NOW()');
  $stmt->execute(array($name,$email,$body));
  
  $sub='お問い合わせありがとうございます。';
  $body=$name.'様\nお問い合わせありがとうございます。\n追ってご連絡差し上げますのでしばらくお待ち下さい。';
  $head='From:yossi20190212@gmail.com';
  mb_language('Japanese');
  mb_internal_encoding(("UTTF-8"));
  mb_send_mail($email,$sub,$body,$head);

  $_SESSION['form'];
  header('Location:thanks.php');
  exit();
}catch(PDOException $e){
  echo 'データベースエラー'.$e->getMessage();
}


?>