<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>수정완료</title>
</head>

<body>
<?
$no=$_POST['no'];
$homepage=$_POST['homepage'];
$subject=$_POST['subject'];
$t=$_POST['t'];
$text=nl2br($t);
$date=date("y.d.m");

$connect=mysql_connect('localhost','root','1234');
$select=mysql_select_db('ppl',$connect);
$sql="update php_board set homepage='$homepage',subject='$subject',text='$text', date='$date' where no='$no'";
$query=mysql_query($sql, $connect);

if(query){
?>
<script type="text/javascript">
location.href="board_list.php";
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