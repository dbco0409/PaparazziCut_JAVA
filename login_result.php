<? session_cache_limiter(''); 
session_start(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
<title>Untitled Document</title>
</head>

<body>
<?
$id=$_POST['id'];
$pwd=$_POST['pwd'];

$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);
$sql="select id, p from member where id='$id'";
$query=mysql_query($sql);
$array=mysql_fetch_array($query);

if (($id==$array['id'])&&($pwd==$array['p'])){
$_SESSION['idx']=$id;
$_SESSION['level']=$level;
$_SESSION['name']=$name;
?>
<script type="text/javascript">
location.href='../index.php';
</script>
<?
}
else { 
?>
<script type="text/javascript">
alert('로그인에 실패하였습니다.');
history.back();
</script>
<?
}
?>
</body>
</html>