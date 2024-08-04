<? session_start ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>papa_write</title>
</head>

<body>
<?

$cutid=$_SESSION['idx'];
$mem="select name, level from member where id='$id'";
$memset=mysql_query($mem, $connect);
$setmem=mysql_fetch_array($memset);
$level=$setmem['level'];
$name=$setmem['name'];

$ok=$_POST['ok'];
$code=$_POST['code'];
$subject=$_POST['subject'];
$onoff=$_POST['onoff'];
$t=$_POST['text'];
$text=nl2br($t);
$price=$_POST['price'];
$tag=$_POST['tag'];
$date=date("y.m.j");


$hit=0;
$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);


$sql2="select cutno from cut_1";
$query=mysql_query($sql2, $connect);
$nom=mysql_num_rows($query);

if (!$nom){
$no=1;
}
else $no=$nom+1;

$userfile=$_FILES['userfile']['name'];
$userfile_tmp=$_FILES['userfile']['tmp_name'];

if (is_uploaded_file($userfile_tmp)) {
move_uploaded_file($userfile_tmp,'./cut/'.$img); 
 }
 


$sql3 = "insert into cut_1(cutno, subject, cutid, code, name, date, ok, onoff, price, tag, content, image, hit) values('$no','$subject','$cutid','$code','$name','$date','$ok','$onoff','$price','$tag','$text','$userfile','$hit')";


$query2=mysql_query($sql3, $connect);

if ($query2)
{
?>
<script type="text/javascript">
location.href='papacut_list.php';
</script>	
<?
}
else {
?>
<script type="text/javascript">
alert("인서트실패");
history.back();
</script>	
<?
}

?>


</body>
</html>