<? session_cache_limiter(''); 
session_start(); 
?>
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
#all{width:400; float:left}
a:link, a:visited{ text-decoration:none; color:#000; font-size:12px; }
a:hover{color:#ddd}
#img{width:400px;}
#content{width:200px; margin-top:30px;}
#add{ padding-top:40px;}
#ct{width:800px}
</style>
</head>

<body>
<?
$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);

$id=$_SESSION['idx'];
$mem="select name, level from member where id='$id'";
$memset=mysql_query($mem, $connect);
$setmem=mysql_fetch_array($memset);
$level=$setmem['level'];
$name=$setmem['name'];

$cn=$row['no'];
$cnt="select cmtno from cmt_cut1 where no='$cn'";
$querycnt=mysql_query($cnt, $connect);
$count=mysql_num_rows($querycnt);



$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);
$sqlon="select * from cut_1 where onoff='1'"; //// 일반회원일 경우 공개 게시물만 출력
$sqloff="select * from cut_1"; // 관리자, 제조자일 경우 비공개게시물까지 출력한다.
?>
<div>
<ul>
<?
if ($id){
?>
<li><a href="logout.php">Logout</a></li> <li><?=$id?>님 반갑습니다.</li>
<?
} else {
?>
<li><a href="login.php">Login</a></li> <li><a href="join_php.php">Sign in</a></li>
<?
}
?>
</ul>
</div>
<div>
<ul>
<?
if ($id){ //로그인이 되어있다면 글쓰기, 다중글쓰기가 보이도록 한다.
?>

<li><a href="cut_1write.php">글쓰기</a> <a href="papacut_1writes.php">다중글쓰기</a></li>
<? } if($_SESSION['idx']=="admin") {?>
<li><input type="button" value="전체선택" id="all" /> <input type="button" value="선택삭제" onclick="document.form.submit()"/>
</li>
<? }  ?>
</ul>
</div>
<div id="ct">
<?
if ($level==1){ //만약 관리자라면, 비공개를 볼 수 있게 하고, 글을 삭제할 수 있는 기능이 있다.
$query=mysql_query($sqloff, $connect); // 비공개까지 볼 수 있는 sql을 query에 입력한다.
$adm=mysql_num_rows($query);
while($row=mysql_fetch_array($query)){
?>
<form action="admin_delete.php" method="post" name="form">
<div id="all">
<table width="400">
    <tr>
    <td><input type="checkbox" name="chk[]" id="chk" value="<?=$row['no']?>"/></td>
        <td width="150" rowspan="2"><img src="./cut/img/<?=$row['image']?>" width="130" height="130" border="1" /></td>
          <td rowspan="2">
            <p><a href="cut_1view.php?no=<?=$row['cutno']?>"><?=$row['subject']?>[<?=$count?>]</a>
            <? if ($row['buy']=="0") { //아직 구매가 안되었을때 ?>판매중
			<? } else if ($row['buy']=="1"){//구매가 되었을 때 ?>판매완료<? } ?>
            </p>
 <? if ($row['onoff']==1) { //공개글 ?>공개
			<? } else if ($row['onoff']=="2"){//비공개 ?>비공개<? } ?> . <?=$row['cutid']?> . <?=$row['date']?> . <?=$row['hit']?>
        </td>
        <td rowspan="2">
<?=$row['plus']?>
        </td>
    </tr>
</table>
</div>
</form>

<? }} else if ($level==2) { // 만약 제조자라면, 비공개 글까지 볼 수 있게하고 공개인지 비공개인지 구분할 수 있게 한다.
$query=mysql_query($sqloff, $connect);
$adm=mysql_num_rows($query);
while($row=mysql_fetch_array($query)){
?>
<div id="all">
<table width="400">
    <tr>
        <td width="150" rowspan="2"><img src="./cut/img/<?=$row['image']?>" width="130" height="130" border="1" /></td>
        <td rowspan="2">
            <p><a href="cut_1view.php?no=<?=$row['cutno']?>"><?=$row['subject']?>[<?=$count?>]</a>
            <? if ($row['buy']=="0") { //아직 구매가 안되었을때 ?>판매중
			<? } else if ($row['buy']=="1"){//구매가 되었을 때 ?>판매완료<? } ?>
            </p>
            <? if ($row['onoff']=="1") { //공개글 ?>공개
			<? } else if ($row['onoff']=="2"){//비공개 ?>비공개<? } ?> . <?=$row['cutid']?> . <?=$row['date']?> . <?=$row['hit']?>
        </td>
        <td rowspan="2"><?=$row['plus']?>
        </td>
    </tr>
</table>
</div>
<?
} } else if ($level>2||$level=="") { // 만약 파파라치이하라면 공개 글만 볼 수 있게 한다.
$query=mysql_query($sqlon, $connect);
$adm=mysql_num_rows($query);

while($row=mysql_fetch_array($query)){
	?>
<div id="all">
<table width="400">
    <tr>
        <td width="150" rowspan="2"><img src="./cut/img/<?=$row['image']?>" width="130" height="130" border="1" /></td>
        <td rowspan="2">
            <p><a href="cut_1view.php?no=<?=$row['cutno']?>"><?=$row['subject']?>[<?=$count?>]</a>
            <? if ($row['buy']=="0") { //아직 구매가 안되었을때 ?>판매중
			<? } else if ($row['buy']=="1"){//구매가 되었을 때 ?>판매완료<? } ?>
            </p>
<?=$row['cutno']?> <?=$row['cutid']?> . <?=$row['date']?> . <?=$row['hit']?>
        </td>
        <td rowspan="2">
<?=$row['plus']?>
        </td>
    </tr>
</table>
</div>
</div>
<? } } ?>
</div>
<script type="text/javascript">
window.onload=function(){
document.getElementById('all').onclick=allch;	
}
function allch(){
	len=document.form.chk.length;
for (var i=0; i<len;i++){
	document.form.chk[i].checked=true;
	}
	document.getElementById('all').value="전체해제";
	document.getElementById('all').onclick=nonchk;
}
function nonchk(){

for (var i=0; i<len;i++){
	document.form.chk[i].checked=false;
	}
	document.getElementById('all').value="전체선택";
	document.getElementById('all').onclick=allch;
	
	}
</script>
</body>
</html>