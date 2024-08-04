<? session_start ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?
$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);

$id=$_SESSION['idx'];
$subject=$_POST['subject'];

$start_year=$_POST['start_year'];
$start_month=$_POST['start_month'];
$start_day=$_POST['start_day'];


$end_year=$_POST['end_year'];
$end_month=$_POST['end_month'];
$end_day=$_POST['end_day'];

$ctg=$_POST['ctg'];

$img=$_FILES['img']['name'];
$img_tmp=$_FILES['img']['tmp_name'];
$cntimg=$_FILES['cntimg']['name'];
$cntimg_tmp=$_FILES['cntimg']['tmp_name'];
$t=$_POST['text'];
$text=nl2br($t);
$type=$_POST['type'];
$day_year=$_POST['day_year'];
$day_month=$_POST['day_month'];
$day_day=$_POST['day_day'];
$day=$day_year+$day_month+$day_day;



 if (is_uploaded_file($img_tmp)) {
move_uploaded_file($img_tmp,'./event/img/'.$img); 
 }
 
 
  if (is_uploaded_file($cntimg_tmp)) {
move_uploaded_file($cntimg_tmp,'./event/cntimg/'.$cntimg); 
 }
 
$sql2="select no from event";
$query=mysql_query($sql2, $connect);
$nom=mysql_num_rows($query);

if ($nom==0){
$no=1;
}
else $no=$nom+1;

$sql="insert into event (id, start_day, start_month, end_month, end_day, img, cntimg, text, type, day, day_month, no, ctg, subject) values('$id','$start_day','$start_month','$end_month','$end_day','$img','$cntimg', '$text', '$type','$day','$day_month','$no','$ctg','$subject')";
$query2=mysql_query($sql, $connect);

if ($query2)
{
?>
<script type="text/javascript">
location.href='event_list.php';
</script>	
<?
}
else {
?>
<script type="text/javascript">
alert('글쓰기에 실패하였습니다.');
history.back();
</script>	
<?
} 
?>
</body>
</html>