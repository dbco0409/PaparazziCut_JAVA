<? session_start ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>파파라치컷 단일 글쓰기</title>
</head>

<body>
<?
$id=$_SESSION['idx'];
$menuid=$_REQUEST['menuid'];
$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);
$sql="select ctg from menu where menuid='cut_1'";
$query=mysql_query($sql, $connect);
$adm=mysql_num_rows($query);
while($row=mysql_fetch_array($query)){
	$category=$row['ctg'];
	$ctg=explode(",",$category);
?>
<form action="cut_1write_result.php" method="post" name="form" enctype="multipart/form-data" >
<div>
<ul>
<li>
<textarea cols="30" rows="8" readonly="readonly">파파라치컷의 사진들은 인기가 많아지거나 제조사가 원할 경우 사진을 구매 후 제품을 판매할 수도 있습니다. 이것에 동의하십니까? 동의하지 않으시면 판매금지로 등재가 됩니다.</textarea>
</li>
<li><input type="radio" name="ok" value="o" checked="checked"/>동의 <input type="radio" value="x" name="ok"/>동의하지 않음</li>
</ul>
<ul>
<li>제목</li>
<li><input type="text" name="subject" /></li>
<li><input type="radio" name="onoff" value="1" checked="checked" />공개 <input type="radio" name="onoff" value="2" />비공개</li>
</ul>
<ul>
<li>카테고리</li>
<li>
<select name="code">
<?
for ($c=0; $c<count($ctg);$c++){
?>
<option name="$ctg[$c]"><?=$ctg[$c]?></option>
<?
}
?>
</select>
</li>
</ul>
<ul>
<li>내용</li>
<li><textarea rows="20" cols="30" name="text"></textarea></li>
</ul>
<ul>
<li>태그</li>
<li><input type="text" name="tag" /></li>
</ul>
<ul>
<li>사진 첨부</li>
<li><input type="file" name="userfile" /></li>
</ul>
<ul>
<li>사진 단가</li>
<li><input type="text" name="price" />원</li>
</ul>
<ul>
<li><input type="button" value="글쓰기" onclick="writed()" /><input type="button" value="목록보기" onclick="location.href='cut_1list.php'" /></li>
</ul>
</div>
</form>
<? } ?>
<script type="text/javascript">
function writed(){
if (document.form.subject.value==""){
	alert('제목을 입력해주세요.');	
	form.subject.focus();
	}
	else if(document.form.text.value==""){
	alert('내용을 입력해주세요.');
	}
	else if(document.form.price.value==""){
	alert('가격을 입력해주세요.');
	}
	else form.submit();
		}
</script>
</body>
</html>