<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
<title>Untitled Document</title>
</head>

<body>
<?
$boardno=$_REQUEST['board'];
$id=$_REQUEST['id'];
$no=$_REQUEST['no'];

//사려고 하는 제품 정보
$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);
$sql="select * from sailing where sailno='$no'";
$query=mysql_query($sql, $connect);
$num=mysql_num_rows($query);
while ($fetch=mysql_fetch_array($query)){
?>
<table width="993" cellpadding="0" cellspacing="0">
    <tr>
        <td width="241" rowspan="2"><img src="./sailing/img/<?=$fetch['img']?>" width="110" border="1" /></td>
        <td width="241">제목 : <a href="sailing_1view.php?no=<?=$fetch['sailno']?>"><?=$fetch['sailname']?></a></td>
        <td width="241">가격 : <?=$fetch['price']?></td>
    </tr>
</table>
<form action="cutbuy_result.php" method="post" name="form"> <? } //// 결재정보 ?>
<input type="hidden" name="id" value="<?=$id?>">
<input type="hidden" name="board" value="<?=$board?>">
<input type="hidden" name="boardno" value="<?=$no?>">
<input type="hidden" name="mailyesno" value="x">
<input type="hidden" name="mailing" value="x">
<input type="hidden" name="price" value="<?=$fetch['price']?>">
<input type="hidden" name="salerid" value="<?=$fetch['cutid']?>">
<? 
$sql2="select * from member where id='$id'";
$query2=mysql_query($sql2,$connect);
while ($fetch2=mysql_fetch_array($query2)){
?>

<table>
<tr>
<td>구매자 이름</td>
<td><input type="text" name="buyname" value="<?=$fetch2['name']?>" /></td>
</tr>
<tr>
<td>구매자 연락처</td>
<td><input type="text" name="buytell" value="<?=$fetch2['tell']?>" /></td>
</tr>
<tr>
<td>구매자 이메일</td>
<td><input type="text" name="buyemail" value="<?=$fetch2['email']?>" /></td>
</tr>
<tr>
<td>이미지 사용용도</td>
<td><select name="type">
<option>제품판매</option>
<option>개인소장</option>
<option>기타</option>
</select></td>
</tr>
<tr>
<td>은행</td>
<td><select name="bank">
<option>농협</option>
<option>우리</option>
<option>하나</option>
<option>국민</option>
<option>기업</option>
</select></td>
</tr>
<tr>
<td>카드번호</td>
<td><input type="text" name="cardnumber" /></td>
</tr>
<tr>
<td>기간</td>
<td><input type="password" name="carddate" />**</td>
</tr>
<tr>
<td>비밀번호</td>
<td><input type="password" name="cardpwd" />**</td>
</tr>
<tr>
<td colspan="2"><input type="button" value="결재하기" onclick="sub()" /><input type="button" value="결재취소" onclick="window.back()" /></td>
</tr>
</table>
</form>
<? } ?>
<script type="text/javascript">
function sub(){
if (document.form.buyname.value=""){
alert('구매자 이름을 입력해주세요.');	
}	
else if (document.form.buyemail.value=""){
alert('구매자 이메일을 입력해주세요.');
} else if (document.form.cardnumber.value=""){
alert('카드번호를 입력해주세요.');	
}
else if (document.form.carddate.value=""){
alert('카드 유통기한을 입력해주세요.');
}
else if (document.form.cardpwd.value=""){
alert('카드 비밀번호를 입력해주세요.');	
}
else form.submit();

}
</script>
</body>
</html>