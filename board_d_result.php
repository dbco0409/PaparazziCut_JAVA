<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>삭제비밀번호확인</title>
</head>

<body>
<?
$no=$_REQUEST['no'];
$pwd=$_POST['pwd'];

$connect=mysql_connect('localhost','root','1234');
$select=mysql_select_db('ppl',$connect);
$sql="select pwd from php_board where no='$no'";
$query=mysql_query($sql, $connect);

$fetch=mysql_fetch_array($query);
$p=$fetch['pwd'];

if(crypt($pwd, $p)==$p){
?>
<script type="text/javascript">
var c=confirm('정말 삭제하시겠습니까?');
if (c){
location.href='board_delete.php?no=<?=$no?>';	
}
else history.back();
</script>
<?
} else {
?>
<script type="text/javascript">
alert('비밀번호가 일치하지 않습니다.');
history.back();
</script>
<?
}
?>
</body>
</html>