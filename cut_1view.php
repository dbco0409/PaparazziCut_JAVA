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

$id=$_SESSION['idx'];
$mem="select name, level from member where id='$id'";
$memset=mysql_query($mem, $connect);
$setmem=mysql_fetch_array($memset);
$level=$setmem['level'];
$name=$setmem['name'];


$no=$_REQUEST['no'];
$sql="select * from cut_1 where cutno='$no'";
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
if (($_SESSION['idx']==$fetch['cutid'])||($level==1)){ /// 글쓴이나 관리자라면 수정삭제 가능하게한다.
?>
<a href="cut_modify.php?no=<?=$no?>&board=cut_1">수정</a> <a href="#" onclick="dele()">삭제</a>
<?
} 
?>
</td>
</tr>
</table>

<table id="bar">
<tr>
<td id="txt"><li>제목</li></td>
<td><?=$fetch['subject']?></td>
</tr>
<tr>
<td id="txt"><li>날짜</li></td>
<td><?=$fetch['date']?></td>
</tr>
<tr>
<td id="txt"><li>글쓴이</li></td>
<td><?=$fetch['cutid']?></td>
</tr>
<tr>
<td id="txt"><li>가격</li></td>
<td><?=$fetch['price']?></td>
</tr>
</table>
<p>
<table>
<tr>
<td colspan="4" id="he"><p><img src="./cut/img/<?=$fetch['image']?>" width="600" /></p>
<?=$row['text']?></td>
</tr>
<tr>
<td>
<? if ($_SESSION['level']){
 if ($_SESSION['idx']!=$fetch['cutid']){ //글쓴이는 자신의 글을 추천을 할 수 없도록. ?> 
<form action="cut_add.php?board=cut_1&id=<?=$id?>&no=<?=$fetch['cutno']?>" method="post"><input type="button" value="추천 <?=$fetch['plus']?>" onclick="submit()" /><? } if ($fetch['buy']==1) { //만약 구매가 되었다면 ?><input type="button" value="판매완료" /><? } else { ?><input type="button" value="구매하기" onclick="location.href='cutbuy.php?board=cut_1&id=<?=$id?>&no=<?=$fetch['cutno']?>'" /></form><? } } ?></td>
</tr>
<?
}
$cnt=$fetch['hit'];

$hit="update cut_1 set hit=hit+1 where cutno='$no'";
$hitupdate=mysql_query($hit,$connect);
?>
</table>

</table>
<table id="cn">
<?
$sqlc="select * from cmt_cut1 where no='$no'";
$queryc=mysql_query($sqlc,$connect);

while($fec=mysql_fetch_array($queryc)){
?>
<!--코멘트 리스트-->
<tr>
<td id="nick"><?=$fec['name']?></td>
<td width="500"><?=$fec['text']?> 
<?
if ($fec['name']==$_SESSION['idx']){
?>
<a href="cmt_delete.php?cmt_no=<?=$fec['cmt_no']?>&amp;no=<?=$fec['no']?>">*</a>
<?
} 
?></td>
<td>
<?=$fec['date']?>
</td>
</tr>
<? } ?>
</table>
<!--코멘트 리스트 끝-->

<!--코멘트 쓰기-->
<? if ($_SESSION['idx']){?>
<form action="cut_comment.php?no=<?=$no?>&board=cut_1" method="post" name="cmm">
<input type="hidden" name="n" value="<?=$_SESSION['idx']?>" />
<table>
<tr>
<td colspan="4"><textarea cols="70" rows="3" name="c"></textarea></td>
<td  colspan="4"><input type="submit" value="comment" style="height:50px"/></td></tr>
</table>
</form>
<!--코멘트 쓰기 끝-->
<?
}
?>
<table>
<tr>
<td align="right"><a href="cut_1list.php">목록</a> <a onclick="prev()">이전</a> <a onclick="next()">다음</a></td>
</tr>
</table>



<script type="text/javascript">
function prev(){ //이전으로 연결 /// no-1이 0이라면 반환하지 않음.
	
	if (<?=$no-1?>==0){
	var contirm=window.confirm('가장 마지막 글입니다. 이전 글로 가시겠습니까?');	
	if (contirm){
	location.href='cut_1view.php?no=2';
	}
	}
	else {
	location.href="cut_1view.php?no=<?=$no-1?>";	
	}
}

function next(){
	
	if (<?=$no?><<?=$num?>){
		var contirm=window.confirm('가장 최근의 글입니다. 다음 글로 가시겠습니까?');	
	if (contirm){
	location.href="cut_1view.php?no=<?=$no-1?>";
	}
	}
	else {
		location.href="cut_1view.php?no=<?=$no+1?>";	
	}
}

function dele(){
	var ok=window.confirm("삭제하시겠습니까?");
if(ok) location.href="delete.php?no=<?=$no?>&board=cut_1";
}
</script>
</body>
</html>