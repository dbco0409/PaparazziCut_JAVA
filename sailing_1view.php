<? session_cache_limiter(''); 
session_start(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
<title>board_view</title>
<style type="text/css">
#txt{ color:#666; width:70px; font-size:11px; text-align:right; padding-right:10px;}
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
$boardno=$_REQUEST['boardno'];


$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);

$no=$_REQUEST['no'];
$sql="select * from sailing_1 where sailno='$no'";
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
if ($_SESSION['idx']==$row['sailname']){
?>
<a href="sailing1_modify.php?no=<?=$no?>">수정</a> <a href="delete.php?no=<?=$no?>&board=sailing_1">삭제</a>
<?
} 
?>
</td>
</tr>
</table>
<table>
<tr>
<form action="buy_write.php" method="post" name="form">
<table border="1" width="636">
    <tr>
        <td width="310" rowspan="9"><img src="./sailing/img/<?=$fetch['img']?>" width="310" height="400" border="1" /></td>
        <td width="310" colspan="2"> <?=$fetch['sailname']?></td>
    </tr>
    <tr>
        <td width="153">파파라치코드  </td>
        <td width="153"><?=$fetch['paparazzicode']?></td>
    </tr>
    <tr>
        <td width="154" colspan="2"><hr /></td>
    </tr>
    <tr>
        <td width="154">상품가격</td>
        <td width="154"><?=$fetch['price']?></td>
    </tr>
    <tr>   
        <td width="154">재고량</td>
        <td width="154"><?=$fetch['num']?></td>
    </tr>
    <tr>
      <td width="154">택배옵션</td>
        <td width="154"><select name="tackbae"><option name="before">선 입금 후 배송</option><option name="after">배송 후 결재</option></select></td>
    </tr>
      <tr>
      <td width="154">수량</td>
        <td width="154"><input type="text" name="gatsu" value="1" readonly="readonly" /><input type="button" value="+" onclick="plus()" /><input type="button" value="-" onclick="minus()" /></td>
    </tr>
    <tr>
        <td width="310" colspan="2">
		<? 
		$pri=$fetch['price'];
		$opt1=$fetch['opt'];
		$opt=explode(",",$opt1);
		if ($row['checktype']=="선택방식"){?><select name="opt">
        <?
for ($c=0; $c<count($ctg);$c++){
?>
<option name="$opt[$c]"><?=$opt[$c]?></option>
<?
}
?>
</select>
<? } else { ?>
<input type="text" value="" />(<?=$opt1?>)<? } ?>
</td>
    </tr>
    <tr>
        <td width="310" colspan="2">총상품가격 : <span id="price"><?=$pri?></span></td>
    </tr>
    <tr>
        <td width="310" colspan="2"><input type="button" value="장바구니" onclick="location.href='cart.php?boardno=<?=$boardno?>&no=<?=$row['sailno']?>'"><input type="button" value="구매하기" onclick="location.href='sailbuy.php?boardno=<?=$boardno?>&no='<?=$row['sailno']?>'" /></td>
    </tr>
</table>
</form>
<table border="1" width="636">
    <tr>
        <td width="626"><img src="./sailing/image1/<?=$fetch['image1']?>" width="600" border="1" /><br />
        <?=$fetch['text1']?></td>
    </tr>
    <tr>
        <td width="626" height="4"><img src="./sailing/mailimg/<?=$fetch['mailimg']?>" width="600" border="1" /><br /><?=$fetch['mailimg']?></td>
    </tr>
    <tr>
        <td width="626" height="4"><iframe src="twentyboard_list.php" width="600" height="450" scrolling="auto" frameborder="0"></iframe></td>
    </tr>
    <tr>
        <td width="626" height="4"><img src="./sailing/image3/<?=$fetch['image3']?>" width="600" border="1" /><br />
        <?=$fetch['text3']?></td>
    </tr>
</table>


<?
}
?>
<table>
<tr>
<td align="right"><a href="sailing1_list.php">목록</a> <a onclick="prev()">이전</a> <a onclick="next()">다음</a></td>
</tr>
</table>



<script type="text/javascript">
function prev(){ //이전으로 연결 /// no-1이 0이라면 반환하지 않음.
	
	if (<?=$no-1?>==0){
	var contirm=window.confirm('가장 마지막 글입니다. 이전 글로 가시겠습니까?');	
	if (contirm){
	location.href='sailing1_view.php?no=2&boardno=<?=$boardno?>';
	}
	}
	else {
	location.href="sailing1_view.php?no=<?=$no-1?>";	
	}
}

function next(){
	
	if (<?=$no?><<?=$num?>){
		var contirm=window.confirm('가장 최근의 글입니다. 다음 글로 가시겠습니까?');	
	if (contirm){
	location.href="sailing1_view.php?no=<?=$no-1?>&boardno=<?=$boardno?>";
	}
	}
	else {
		location.href="sailing1_view.php?no=<?=$no+1?>&boardno=<?=$boardno?>";	
	}
}
function plus(){
document.form.gatsu.value++;
var p=document.form.gatsu.value;
var pri=<?=$pri?>;
var inn=pri*p;
document.getElementById('price').innerHTML=inn;
}
function minus(){
document.form.gatsu.value--;
var p2=document.form.gatsu.value;
var pri2=<?=$pri?>;
var inn=pri2*p2;
document.getElementById('price').innerHTML=inn;
}
function pri(){
	var htm=inn+2500;
document.getElementById('price').innerHTML=htm;	
}
</script>
</body>
</html>