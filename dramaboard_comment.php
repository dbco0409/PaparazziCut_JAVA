<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>코멘트 등록</title>
</head>

<body>
<?
$no=$_REQUEST['no'];
$text=$_POST['c'];
$name=$_POST['n'];
$date=date("y.d.m");

$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);
$sql2="select cmtno from cmt_drama where no='$no'";
$query2=mysql_query($sql2, $connect);
$array=mysql_fetch_array($query2);
$cn=$array['cmt_no'];
$cno=0;

if (!$cn){
$cno=1;
}
else $cno=$cn+1;



$sql="insert into cmt_drama (no, name, text, date, cmtno) values('$no','$name','$text','$date', '$cno')";
$query=mysql_query($sql, $connect);

if($query){
?>
<script type="text/javascript">
location.href='dramaboard_view.php?no=<?=$no?>';
</script>
<?
} else {
?>
<script type="text/javascript">
alert('코멘트 등록이 실패했습니다.');
history.back();
</script>
<?
}
?>

</body>
</html>