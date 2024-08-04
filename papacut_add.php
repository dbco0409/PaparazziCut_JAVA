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
$board=$_REQUEST['board']; //추천한 게시판 cut1
$id=$_REQUEST['id']; //추천한 사람의 아이디
$no=$_REQUEST['no']; //추천한 게시판 글의 no
$date=date('y.m.d');

$sql="select * from addlist where board='$board' and boardno='$no' and addid like '$id'";
$query=mysql_query($sql,$connect);
$nom=mysql_num_rows($query);

if (!$nom){ //만약 add 테이블에 board, no 조회 후  사람의 아이디가 없다면,

if ($board=="cut_1"){
$add="update cut_1 set plus=plus+1 where cutno='$no'";
}
else if($board=="cut_2"){
$add="update cut_2 set plus=plus+1 where cutno='$no'";
}
$addupdate=mysql_query($add, $connect);
//추천수 업데이트

$point="update member set point=point+5 where id='$id'";
$pointupdate=mysql_query($point,$connect);
//포인트추가

$import="insert into addlist (board, boardno, adddate, addid) values('$board','$no','$date','$id')";
$imset=mysql_query($import, $connect);

if($addupdate){
?>
<script type="text/javascript">
location.href='papa<?=$board?>view.php?no=<?=$no?>';
</script>	
<?
}
else { //포인트업데이트나 포인트테이블에 인서트가 안되었다면
?>
<script type="text/javascript">
history.back();
alert('추천이 되지 않았습니다.');
</script>
<?
} } else { //만약 아이디가 있다면
?>
<script type="text/javascript">
history.back();
alert('중복추천은 불가합니다.');
</script>
<?
}

?>
</body>
</html>