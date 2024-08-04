<? session_cache_limiter(''); 
session_start(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>papa_write</title>
</head>

<body>
<?
$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);

$id=$_POST['id'];
$no=$_POST['no'];
$board=$_POST['board'];
$code=$_POST['code'];
$ok=$_POST['ok'];
$subject=$_POST['subject'];
$onoff=$_POST['onoff'];
$t=$_POST['text'];
$text=nl2br($t);
$price=$_POST['price'];
$tag=$_POST['tag'];

$userfile=$_FILES['userfile']['name'];
$userfile_tmp=$_FILES['userfile']['tmp_name'];

if (is_uploaded_file($userfile_tmp)) {
move_uploaded_file($userfile_tmp,'./cut/img/'.$userfile); 
 }
 

if ($board=='cut_1'){
$sql3 = "update cut_1 set subject='$subject', ok='$ok', onoff='$onoff', price='$price', tag='$tag', content='$text', image='$userfile', code='$code' where cutno='$no'";
}
else if ($board=='cut_2'){
$sql3 = "update cut_2 set subject='$subject', ok='$ok', onoff='$onoff', price='$price', tag='$tag', content='$text', image='$userfile' where cutno='$no'";
}

$query2=mysql_query($sql3, $connect); ///// 글쓰기


if($query2){
?>
<script type="text/javascript">
location.href='papa<?=$board?>view.php?no=<?=$no?>.php';
</script>	
<?
} 
else {
?>
<script type="text/javascript">
alert("수정을 실패하였습니다.");
history.back();
</script>	
<?
}

?>


</body>
</html>