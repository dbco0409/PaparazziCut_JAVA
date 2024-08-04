<? session_cache_limiter(''); 
session_start(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Board_list.php</title>
<style type="text/css">
#s, #t{font-size:11px; color:#999; height:14px; vertical-align:middle;}
#r{font-size:12px; text-align:center}
#h{ border-bottom:1px solid #ddd}
#gr{color:#999}
#one{height:1px}
a:link, a:visited{ text-decoration:none; color:#000; font-size:12px; }
a:hover{color:#ddd}
li{float:right; margin-left:10px; list-style:square; font-size:12px}
</style>
</head>

<body>
<?

$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);
$sql="select no, subject, name, date, hit from board_woman";
$query=mysql_query($sql, $connect);
$adm=mysql_num_rows($query);

?>
<table width="650">
<tr>
<td colspan="6">
<?
if ($_SESSION['idx']){
?>
<li><a href="logout.php">Logout</a></li> <li><?=$_SESSION['idx']?>님 반갑습니다.</li>
<?
} else {
?>
<li><a href="login.php">Login</a></li> <li><a href="join_php.php">Sign in</a></li>
<?
}
?>
</td>
</tr>
<tr align="center">
<? if($_SESSION['idx']=="admin") {?>
<td id="s">adm</td>
<? } ?>
<td id="s">no</td>
<td id="t">subject</td>
<td id="s">name</td>
<td id="s">date</td>
<td id="s">hit</td>
</tr>
<?
while($row=mysql_fetch_array($query)){
$cn=$row['no'];
$cnt="select cmtno from cmt_woman where no='$cn'";
$querycnt=mysql_query($cnt, $connect);
$count=mysql_num_rows($querycnt);
?>
<tr id="r" >
<? if($_SESSION['idx']=="admin") {
?>

<form action="admin_delete.php" method="post" name="form">
<td><input type="checkbox" name="chk[]" id="chk" value="<?=$row['no']?>"/></td>
<?   } ?>
<td id="gr"><?=$row['no']?></td>
<td align="left"><a href="board_view.php?no=<?=$row['no']?>"><?=$row['subject']?></a> <span id="gr">[<?=$count?>]</span></td>
<td><?=$row['name']?></td>
<td id="gr"><?=$row['date']?></td>
<td id="gr"><?=$row['hit']?></td>
</tr>
<tr id="one">
<td colspan="6" id="h"> </td></tr>

<?
} ?>
<tr>
<? if($_SESSION['idx']=="admin") {?>
<td colspan="3"><input type="button" value="전체선택" id="all" /> <input type="submit" value="선택삭제"/></form></td>
<td colspan="3" align="right"><? 
if ($_SESSION['idx']){
?><a href="womanboard_write.php?id=<?=$_SESSION['idx']?>">글쓰기</a>
<?
	} } else {
?>
<td colspan="6" align="right"><? 
if ($_SESSION['idx']){
?><a href="womanboard_write.php?id=<?=$_SESSION['idx']?>">글쓰기</a>
<?
	} }
?>
</td>
</tr>
</table>
<script type="text/javascript">
window.onload=function(){
document.getElementById('all').onclick=allch;	
}
function allch(){
	len=form.chk.length;
for (var i=0; i<len;i++){
	form.chk[i].checked=true;
	}
	document.getElementById('all').value="전체해제";
	document.getElementById('all').onclick=nonchk;
}
function nonchk(){

for (var i=0; i<len;i++){
	form.chk[i].checked=false;
	}
	document.getElementById('all').value="전체선택";
	document.getElementById('all').onclick=allch;
	
	}
</script>
</body>
</html>