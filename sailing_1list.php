﻿<? session_start ?>
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
#sail{width:150px; height:350px; float:left}
#all{width:800px}
a:link, a:visited{ text-decoration:none; color:#000; font-size:12px; }
a:hover{color:#ddd}
</style>
</head>

<body>
<?
$boardno=$_REQUEST['boardno'];

$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);

if ($boardno==1){
$sql="select * from sailing_1 where boardno=1";
} else { $sql="select * from sailing_1 where boardno=2"; } 

$query=mysql_query($sql, $connect);
$adm=mysql_num_rows($query);
?>
<div>
<ul>
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
</ul>
</div>

<div id="all">
<div><ul><li><input type="button" value="글쓰기" onclick="location.href='sailing_1write.php?boardno=<?=$boardno?>'"></li></ul></div>
<?

while($row=mysql_fetch_array($query)){
	?>
<div id="sail">  
<ul><li><?=$row['ctg']?></li></ul>
<ul><li><a href="sailing_1view.php?no=<?=$row['sailno']?>&boardno=<?=$boardno?>"><img src="./sailing/img/<?=$row['img']?>" width="130" height="130" border="1" /></a></li></ul>
<ul><li align="left"><a href="sailing_1view.php?no=<?=$row['sailno']?>&boardno=<?=$boardno?>"><?=$row['sailname']?></a></li></ul>
<ul><li><input type="button" value="장바구니" onclick="location.href='cart.php?boardno=<?=$boardno?>&no=<?=$row['sailno']?>'"><input type="button" value="구매하기" onclick="location.href='sailbuy.php?boardno=<?=$boardno?>&no='<?=$ro['sailno']?>'" /></li></ul>
</div>
<? } ?>
</div>


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