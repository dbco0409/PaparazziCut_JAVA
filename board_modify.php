<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Medify</title>
<script type="text/javascript">
function chk()
{
if (form.subject.value==""){
alert('제목을 입력해주세요.');	
form.subject.focus();
}
else 
{
var c=window.confirm('글을 수정하시겠습니까?');
	if (c){
		form.submit();
	}	
}
}
</script>
<?
$no=$_REQUEST['no'];

$connect=mysql_connect('localhost','root','1234');
$select=mysql_select_db('ppl',$connect);
$sql="select * from php_board where no='$no'";
$query=mysql_query($sql, $connect);
$array=mysql_fetch_array($query);
?>
</head>

<body>
<form action="board_modify_result.php" method="post" name="form">
<input type="hidden" name="no" value="<?=$array['no']?>" />
<table>
<tr>
<td><li>홈페이지</li></td>
<td><input type="text" name="homepage" value="<?=$array['homepage']?>" /></td>
</tr>
<tr>
<td><li>제목</li></td>
<td><input type="text" name="subject" value="<?=$array['subject']?>" /></td>
</tr>
</table>
<table>
<tr>
<td><li>내용</li></td>
<td><textarea cols="30" rows="10" name="t"><?=$array['text']?></textarea></td>
</tr>
<tr>
<td colspan="2"><input type="button" value="수정하기" onclick="chk()" /> <input type="button" value="목록보기" onclick="location.href='board_list.php'" /></td>
</tr>
</table>
</form>
</body>
</html>