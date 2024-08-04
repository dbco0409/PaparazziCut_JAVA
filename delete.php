<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delete</title>
</head>

<body>
<?
$no=$_REQUEST['no'];
$board=$_REQUEST['board'];

$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);

if ($board=="drama"){
$sql="delete from board_drama where no='$no'";
$sql2="delete from cmt_drama where no='$no'";
$query=mysql_query($sql, $connect);
$cmt=mysql_query($sql2, $connect);
if(($query)&&($cmt)){
?>
<script type="text/javascript">
location.href='dramaboard_list.php';
</script>
<? } else { ?>
<script type="text/javascript">
history.back();
</script>
<? } 
}
else if ($board=="free"){
$sql="delete from board_free where no='$no'";
$sql2="delete from cmt_free where no='$no'";
$query=mysql_query($sql, $connect);
$cmt=mysql_query($sql2, $connect);

if(($query)&&($cmt)){
?>
<script type="text/javascript">
location.href='freeboard_list.php';
</script>
<? } else { ?>
<script type="text/javascript">
history.back();
</script>
<? } 

}

else if ($board=="event"){
$sql="delete from event where no='$no'";
$query=mysql_query($sql, $connect);

if($query){
?>
<script type="text/javascript">
location.href='event_list.php';
</script>
<? } else { ?>
<script type="text/javascript">
history.back();
</script>
<? } } else if($board=="twenty"){
$sql="delete from board_twenty where no='$no'";
$sql2="delete from cmt_twenty where no='$no'";
$query=mysql_query($sql, $connect);
$cmt=mysql_query($sql2, $connect);

if(($query)&&($cmt)){
?>
<script type="text/javascript">
location.href='twentyboard_list.php';
</script>
<? } else { ?>
<script type="text/javascript">
history.back();
</script>
<? } 

}

else if($board=="woman"){
$sql="delete from board_woman where no='$no'";
$sql2="delete from cmt_woman where no='$no'";
$query=mysql_query($sql, $connect);
$cmt=mysql_query($sql2, $connect);

if(($query)&&($cmt)){
?>
<script type="text/javascript">
location.href='womanboard_list.php';
</script>
<? } else { ?>
<script type="text/javascript">
history.back();
</script>
<? } 

}

else if($board=="sailing_1"){
$sql="delete from sailing_1 where no='$no'";
$query=mysql_query($sql, $connect);

if($query){
?>
<script type="text/javascript">
location.href='sailing_1list.php';
</script>
<? } else { ?>
<script type="text/javascript">
history.back();
</script>
<? } 

}

else if($board=="sailing_2"){
$sql="delete from sailing_2 where no='$no'";
$query=mysql_query($sql, $connect);

if($query){
?>
<script type="text/javascript">
location.href='sailing_2list.php';
</script>
<? } else { ?>
<script type="text/javascript">
history.back();
</script>
<? } 

}

else if($board=="cut_1"){
$sql="delete from cut_1 where cutno='$no'";
$sql2="delete from cmt_cut1 where no='$no'";
$query=mysql_query($sql, $connect);
$cmt=mysql_query($sql2, $connect);

if(($query)&&($cmt)){
?>
<script type="text/javascript">
location.href='papacut_1list.php';
</script>
<? } else { ?>
<script type="text/javascript">
history.back();
</script>
<? } 
}
?>
</body>
</html>