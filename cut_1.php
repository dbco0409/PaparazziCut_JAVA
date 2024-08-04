<? session_start ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
#img{float:left; width:180px;}
#content{width:600px; float:left; margin-top:30px;}
#add{ padding-top:40px;}
</style>
</head>

<body>
<?
$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);
$sql="select * from cut_1";
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
<?

while($row=mysql_fetch_array($query)){
	?>
<div id="img">
<ul><li><img src="./sailing/img/<?=$row['img']?>" width="130" height="130" border="1" /></li></ul>
</div>
<div  id="content">
<ul><li><a href="board_view.php?no=<?=$row['sailno']?>"><?=$row['sailname']?></a></li></ul>
<ul><li><?=$row['cutno']?> . <?=$row['name']?> . <?=$row['date']?> . <?=$row['hit']?></li></ul>
</div>
<div id="add">
<ul><li><?=$row['plus']?></li></ul>
</div>
<? } ?>
</div>
<div>
<ul>
<li><a href="papacut_1write.php">글쓰기</a></li>
</ul>
</div>
</body>
</html>