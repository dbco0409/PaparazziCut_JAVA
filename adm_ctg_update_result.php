<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?
$menuid=$_POST['menuid'];
$menuname=$_POST['menuname'];
$ctg=$_POST['ctg'];
$grub=$_POST['grub'];

$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);
$sql="update menu set menuname='$menuname',ctg='$ctg', grub='$grub' where menuid='$menuid'";
$query=mysql_query($sql, $connect);


if(query){
?>
<script type="text/javascript">
location.href="adm_ctg_list.php";
alert('성공적으로 수정되었습니다.');
</script>
<?
}
else {
?>
<script type="text/javascript">
alert('수정을 하지 못했습니다.');
history.back();
</script>
<?
}

?>
</body>
</html>