<? session_cache_limiter(''); 
session_start(); 
?>
<?php include("conn.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
<title>회원가입결과</title>
</head>

<body>
<?
$id=$_POST['id'];
$p=$_POST['pwd'];
$pwd=crypt($p, pw);
$level=$_POST['level'];
$name=$_POST['name'];
$nickname=$_POST['nickname'];
$question=$_POST['question'];
$dab=$_POST['dab'];

$tell=$_POST['t1']+"-"+$_POST['t2']+"-"+$_POST['t3'];
$phone=$_POST['p1']+"-"+$_POST['p2']+"-"+$_POST['p3'];

$joo1=$_POST['joo1'];
$joo02=$_POST['joo2'];
$joo2=crypt($joo02, jo);
$joo=$joo1+"-"+$joo2;
$email=$_POST['email'];
$ok=$_POST['ok'];

$sql="insert into member (id, pwd, p, level, name, nickname, number, email, phone, tell, pwdq, pwda, mailing) values('$id','$pwd','$p','$level','$name','$nickname','$joo','$email','$phone','$tell','$question','$dab','$ok')";
$query=mysql_query($sql, $connect);
if ($query){
$_SESSION['idx']=$id;
$_SESSION['level']=$level;
$_SESSION['name']=$name;
?>
<script type="text/javascript">
alert('회원가입이 완료되었습니다.');
location.href='../index.php';
</script>
<?
}
else {
?>
<script type="text/javascript">
alert('회원가입이 실패하였습니다.');
history.back();
</script>
<?
}
?>
</body>
</html>