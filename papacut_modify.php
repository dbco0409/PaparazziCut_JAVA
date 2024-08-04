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
$no=$_REQUEST['no'];
$menuid=$_REQUEST['menuid'];
$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);

$board=$_REQUEST['board'];
if ($board=='cut_1'){
$cut="select * from cut_1 where cutno='$no'";
}
else if($board=='cut_2'){
$cut="select * from cut_2 where cutno='$no'";	
}
$query1=mysql_query($cut, $connect);
$array=mysql_fetch_array($query1);


$sql="select ctg from menu where menuid='cut_1'";
$query=mysql_query($sql, $connect);
$adm=mysql_num_rows($query);
?>
<form action="papacut_modify_result.php" method="post" name="form" enctype="multipart/form-data" >
<input type="hidden" name="id" value="<?=$id?>">
<input type="hidden" name="no" value="<?=$no?>">
<input type="hidden" name="board" value="<?=$board?>" />
<div>
<ul>
<li>
<? if($array['ok']=='x'){ ?>
<select name="ok">
<option>판매중</option>
<option selected="selected">판매금지</option>
</select>
<? } else { ?>
<select name="ok">
<option selected="selected">판매중</option>
<option>판매금지</option>
</select>
<? } ?>
</li>
</ul>
<ul>
<li>제목</li>
<li><input type="text" name="subject" value="<?=$array['subject']?>"/></li>
<li>
<? if($array['onoff']=='2'){ ?>
<input type="radio" name="onoff" value="1" />공개 <input type="radio" name="onoff" value="2"  checked="checked" />비공개
<? } else { ?>
<input type="radio" name="onoff" value="1" checked="checked" />공개 <input type="radio" name="onoff" value="2" />비공개<? } ?></li>
</ul>
<ul>
<li>카테고리</li>
<li>
<select name="code">
<?
while($row=mysql_fetch_array($query)){
	$category=$row['ctg'];
	$ctg=explode(",",$category);
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
<li><textarea rows="20" cols="30" name="text"><?=$array['content']?></textarea></li>
</ul>
<ul>
<li>태그</li>
<li><input type="text" name="tag" value="<?=$array['tag']?>"/></li>
</ul>
<ul>
<li>사진 첨부</li>
<li><input type="file" name="userfile" /></li>
</ul>
<ul>
<li>사진 단가</li>
<li><input type="text" name="price" value="<?=$array['price']?>" />원</li>
</ul>
<ul>
<li><input type="button" value="수정하기" onclick="writed()" /><input type="button" value="목록보기" onclick="location.href='papa<?=$board?>list.php'" /></li>
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
	else
	var ok=window.confirm('수정을 하시겠습니까?')
	if (ok) {form.submit()};
		}
</script>
</body>
</html>