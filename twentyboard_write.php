<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP게시판 글쓰기</title>
<script type="text/javascript" language="javascript">
function writeChk()
{
	if (form.subject.value==""){
		alert('제목을 입력해주세요.');
	}
	else if(form.t.value==""){
		alert('내용을 입력해주세요.');
		}
	else 
	{
	var c=window.confirm('글을 등록하시겠습니까?');
	if (c){
		form.submit();
	}
		}
}
</script>
<style type="text/css">
#b{font-weight:bold; color:#666; font-size:12px; padding-left:10px}
#bar{border-top:1px solid #fff; height:1px;}
tr{border:1px solid #000}
table{background-color:#EAEAEA; width:400px;}
</style>
</head>
<body>
<?
$menuid=$_REQUEST['menuid'];
$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);
$sql="select ctg from menu where menuid='board_4'";
$query=mysql_query($sql, $connect);
$adm=mysql_num_rows($query);
?>
<div>
<form action="twentyborad_result.php" method="post" name="form">
<input type="hidden" name="id" value="<?=$_SESSION['idx']?>" />
<input type="hidden" name="name" value="<?=$_SESSION['name']?>" />
<div>
<ul>
<li id="b"><li>제목</li>
<li><input type="text" name="subject" /></li>
</ul>
<ul>
<li id="b"><li>카테고리</li>
<li>
<select name="ctg">
<?
if ($query){
while($row=mysql_fetch_array($query)){
	$category=$row['ctg'];
	$ctg=explode(",",$category);
for ($c=0; $c<count($ctg);$c++){
?>
<option name="$ctg[$c]"><?=$ctg[$c]?></option>
<?
} } }
?>
</select>
</li>
</ul>
<ul>
<li id="b"><li>내용</li>
<li><textarea cols="30" rows="10" name="t"></textarea>
</ul>
<tr>
<td colspan="2" align="center"><input type="button" value="글쓰기" onclick="writeChk()"/><input type="button" value="목록보기" onclick="location.href='dramaboard_list.php'" /></td>
</tr>
</table> 
</form>
</div>
</body>
</html>