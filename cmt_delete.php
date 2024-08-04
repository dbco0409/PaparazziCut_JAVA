<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?
$cmt_no=$_REQUEST['cmt_no'];
$no=$_REQUEST['no'];
$connect=mysql_connect('localhost','root','1234');
$select=mysql_select_db('ppl',$connect);
$sql="delete from php_cmt where cmt_no='$cmt_no'";
$query=mysql_query($sql, $connect);

if ($query){
?>
<script type="text/javascript">
location.href="board_view.php?no=<?=$no?>";
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