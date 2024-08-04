<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delete</title>
</head>

<body>
<?
$no=$_REQUEST['no'];
$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);
$board=$_REQUEST['board'];

if ($board=='cut_1'){
$sql="delete from cut_1 where cutno='$no'";
$sqlc="delete from cmt_cut1 where no='$no'";
}
else if($board=='cut_2'){
$sql="delete from cut_2 where cutno='$no'";
$sqlc="delete from cmt_cut2 where no='$no'";
}


$query=mysql_query($sql, $connect);
$cmt=mysql_query($sqlc, $connect);

if(($query)&&($sql2)){
?>
<script type="text/javascript">
alert('삭제가 완료되었습니다.');
location.href='papa<?=$board?>list.php';
</script>
<? } else { ?>
<script type="text/javascript">
alert('삭제를 실패하였습니다.');
history.back();
</script>
<? } ?>
</body>
</html>