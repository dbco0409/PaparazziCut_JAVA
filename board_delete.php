<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delete</title>
</head>

<body>
<?
$no=$_REQUEST['no'];
$connect=mysql_connect('localhost','root','1234');
$select=mysql_select_db('ppl',$connect);
$sql="delete from php_board where no='$no'";
$sql2="delete from php_cmt where no='$no'";
$query=mysql_query($sql, $connect);
$cmt=mysql_query($sql2, $connect);

if(($query)&&($sql2)){
?>
<script type="text/javascript">
alert('삭제가 완료되었습니다.');
location.href='board_list.php';
</script>
<? } else { ?>
<script type="text/javascript">
alert('삭제를 실패하였습니다.');
history.back();
</script>
<? } ?>
</body>
</html>