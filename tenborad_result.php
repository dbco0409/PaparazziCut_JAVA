<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP글쓰기 결과</title>
</head>

<body>
<?
$id=$_POST['idx'];
$name=$_POST['name'];
$subject=$_POST['subject'];
$ctg=$_POST['ctg'];
$t=$_POST['t'];
$text=nl2br($t);
$date=date('y.m.d');
$hit=0;


$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);

$sql2="select no from board_ten";
$query=mysql_query($sql2, $connect);
$nom=mysql_num_rows($query);

if ($nom==0){
$no=1;
}
else $no=$nom+1;

$sql="insert into board_ten (no, id, name, ctg, subject, text, date, hit) values('$no','$id','$name','$ctg','$subject','$text','$date', '$hit')";
$query2=mysql_query($sql, $connect);

if ($query2)
{
?>
<script type="text/javascript">
location.href='tenboard_list.php';
</script>	
<?
}
else {
?>
<script type="text/javascript">
history.back();
</script>	
<?
}
?>
</body>
</html>