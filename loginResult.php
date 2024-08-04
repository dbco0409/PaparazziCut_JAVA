<? session_start()?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?
$id=$_POST['id'];
$pwd=$_POST['pwd'];

$connect=mysql_connect('localhost','root','1234');
$select=mysql_select_db('ppl',$connect);
$sql="select id, pwd, name, level from member where id='$id'";
$query=mysql_query($sql, $connect);
$array=mysql_fetch_array($query);

if (($array['id']==$id)&&($pwd==$array['pwd'])){
$_SESSION['idx']=$id;
?>
<script type="text/javascript">
location.href="index.php";
</script>
<?
}
else {
?>
<script type="text/javascript">
alert('로그인에 실패하였습니다.');
history.back();
</script>
<? } ?>
</body>
</html>