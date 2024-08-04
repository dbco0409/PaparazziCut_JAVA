<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?
$menuid=$_REQUEST['menuid'];
$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);
$sql="delete from menu where menuid='$menuid'";
$query=mysql_query($sql, $connect);

if ($query){
?>
<script type="text/javascript">
location.href="adm_ctg_list.php";
</script>
<?
} else {
?>
<script type="text/javascript">
alert('삭제에 실패하였습니다.');
history.back();
</script>
<?
}
?>
</body>
</html>