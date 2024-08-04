<? session_cache_limiter(''); 
session_start(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>board_view</title>
<style type="text/css">
#txt{ background-color:#ddd; color:#666; width:70px; font-size:11px; text-align:right; padding-right:10px;}
#bar{border:1px solid #ddd;}
#hit{font-size:10px; text-align:right}
body{font-size:12px;}
table,#h,#cn {width:600px}
#cnt{width:100px}
#he{padding-bottom:50px}
#cn{padding-bottom:10px}
#nick{width:60px; font-weight:bold; padding-left:10px; list-style:lower-greek}
#login, #h{text-align:right}
#sm{width:80px;}
a:link, a:visited{ text-decoration:none; color:#000 }
a:hover{color:#ddd}
</style>
</head>

<body>
<?
$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);

$no=$_REQUEST['no'];
$sql="select * from event where no='$no'";
$query=mysql_query($sql, $connect);
$num=mysql_num_rows($query);

while ($fetch=mysql_fetch_array($query)){
?>
<table id="h">
<tr>
<td id="login">
<?
if($_SESSION['idx']){
?>
<a href="logout.php">로그아웃</a>
<?
} else {
?>
<a href="login.php"><li>Login</li></a>
<?
}
?></td>
</tr>
</table>
<table id="h">
<tr>
<td id="login">
<? 
if ($_SESSION['idx']==$fetch['name']){
?>
<a href="board_modify.php?no=<?=$no?>">수정</a> <a href="delete.php?no=<?=$no?>&board=event">삭제</a>
<?
} 
?>
</td>
</tr>
</table>

<table id="bar">
<tr>
<td id="txt"><li>시작일</li></td>
<td><?=$fetch['start_month']?> <?=$fetch['start_day']?></td>
<td id="hit">(조회 <?=$fetch['hit']?>)</td>
</tr>
<tr>
<td id="txt"><li>마감일</li></td>
<td><?=$fetch['end_month']?> <?=$fetch['end_day']?></td>
<td  id="hit"></td>
</tr>
<tr>
<td id="txt"><li>제목</li></td>
<td><?=$fetch['subject']?></td>
</tr>
</table>
<p>
<table>
<tr>
<td colspan="4" id="he"><img src="./event/cntimg/<?=$fetch['cntimg']?>" border="0" /></td>
</tr>

<?
}
?>
<table>
<tr>
<td align="right"><a href="event_list.php">목록</a> <a onclick="prev()">이전</a> <a onclick="next()">다음</a></td>
</tr>
</table>



<script type="text/javascript">
function prev(){ //이전으로 연결 /// no-1이 0이라면 반환하지 않음.
	
	if (<?=$no-1?>==0){
	var contirm=window.confirm('가장 마지막 글입니다. 이전 글로 가시겠습니까?');	
	if (contirm){
	location.href='event_view.php?no=2';
	}
	}
	else {
	location.href="event_view.php?no=<?=$no-1?>";	
	}
}

function next(){
	
	if (<?=$no?><<?=$num?>){
		var contirm=window.confirm('가장 최근의 글입니다. 다음 글로 가시겠습니까?');	
	if (contirm){
	location.href="event_view.php?no=<?=$no-1?>";
	}
	}
	else {
		location.href="event_view.php?no=<?=$no+1?>";	
	}
}

</script>
</body>
</html>