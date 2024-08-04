<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>이벤트 글쓰기[관리자]</title>
</head>

<body>
<form action="event_write_result.php" method="post" name="form" enctype="multipart/form-data">
<div>
<h2>이벤트 글쓰기[관리자]</h2>
<ul>
<li>
참여기간
</li>
<li>
<select name="start_year">
<option value="16년">16</option>
<option value="15년">15</option>
<option selected="selected" value="14년">14</option>
</select>년
<select name="start_month">
<?
for ($i=1;$i<=12;$i++){
?>
<option value="<?=$i?>월"><?=$i?></option>
<? } ?>
</select>월 
<select name="start_day">
<?
for ($i=1;$i<=30;$i++){
?>
<option value="<?=$i?>일"><?=$i?></option>
<? } ?>
</select>일-
<select name="end_year">
<option value="16년">16</option>
<option value="15년">15</option>
<option selected="selected"  value="14년">14</option>
</select>년
<select name="end_month">
<?
for ($i=1;$i<=12;$i++){
?>
<option value="<?=$i?>월"><?=$i?></option>
<? } ?>
</select>월 
<select name="end_day">
<?
for ($i=1;$i<=30;$i++){
?>
<option value="<?=$i?>일"><?=$i?></option>
<? } ?>
</select>일
</li>
</ul>
<ul>
<li>이벤트 이름</li>
<li><input type="text" name="subject" /></li>
</ul>
<?
$id=$_SESSION['idx'];
$menuid=$_REQUEST['menuid'];
$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);
$sql="select ctg from menu where menuid='event'";
$query=mysql_query($sql, $connect);
$adm=mysql_num_rows($query);
while($row=mysql_fetch_array($query)){
	$category=$row['ctg'];
	$ctg=explode(",",$category);
?>
<ul>
<li>카테고리</li>
<li>
<select name="ctg">
<?
for ($c=0; $c<count($ctg);$c++){
?>
<option><?=$ctg[$c]?></option>
<?
} }
?>
</select></li>
</ul>
<ul>
<li>썸네일 이미지</li>
<li><input type="file" name="img"/></li>
</ul>
<ul>
<li>내용에 들어갈 이미지</li>
<li><input type="file" name="cntimg"/></li>
</ul>
<ul>
<li>내용에 들어갈 텍스트</li>
<li><textarea rows="10" cols="20" name="text"></textarea></li>
</ul>
<ul>
<li>당첨자 선정방식</li>
<li>
<select name="type">
<option>참여시 바로 당첨</option>
<option>선착순</option>
<option>조건부 당첨</option>
</select>
</li>
</ul>
<ul>
<li>당첨자 발표</li>
<li>
<select name="year">
<option value="16년">16</option>
<option value="15년">15</option>
<option selected="selected"  value="14년">14</option>
</select>년
<select name="month">
<?
for ($i=1;$i<=12;$i++){
?>
<option value="<?=$i?>월"><?=$i?></option>
<? } ?>
</select>월 
<select name="day">
<?
for ($i=1;$i<=30;$i++){
?>
<option value="<?=$i?>일"><?=$i?></option>
<? }  ?>
</select>일
</li>
</ul>
<ul>
<li><input type="button" value="글쓰기" onclick="submit()" /> <input type="button" value="돌아가기" onclick="location.href='event_list.php'"/></li>
</ul>
</div>
</form>

</body>
</html>