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

$cutid=$_SESSION['idx'];
$mem="select name, level from member where id='$id'";
$memset=mysql_query($mem, $connect);
$setmem=mysql_fetch_array($memset);
$level=$setmem['level'];
$name=$setmem['name'];

$ok=$_POST['ok'];
$subject=$_POST['subject'];
$onoff=$_POST['onoff'];
$t=$_POST['text'];
$text=nl2br($t);
$price=$_POST['price'];
$tag=$_POST['tag'];
$date=date("y.m.j");


$hit=0;


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
move_uploaded_file($userfile_tmp,'./cut/img/'.$userfile); 
 }
 


$sql3 = "insert into cut_1(cutno, subject, cutid, name, date, ok, onoff, price, tag, content, image, hit) values('$no','$subject','$cutid','$name','$date','$ok','$onoff','$price','$tag','$text','$userfile','$hit')";

$query2=mysql_query($sql3, $connect); ///// 글쓰기


if ($level<4){ // 레벨이 4미만(1-관리자, 2-제조자, 3-파파라치, 4-일반인 이라면
$sql5="update member set point=point+10 where id='$cutid'"; //포인트 업데이트 // 원래 포인트에서 10을 더해라.
}
else {$sql5="update member set point=point+5 where id='$cutid'";} //포인트 업데이트} //아니라면 5를 더해라.


$pointupdate=mysql_query($sql5, $connect);

if($pointupdate){
?>
<script type="text/javascript">
location.href='cut_1list.php';
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