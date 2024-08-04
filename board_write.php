<? session_start() ?>
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
<div>
<form action="dramaborad_result.php" method="post" name="form">
<input type="hidden" name="id" value="<?=$_SESSION['idx']?>" />
<table>
<tr >
<td  id="b"><li>제목</li></td>
<td><input type="text" name="subject" /></td>
</tr>
</table>
<table>
<tr>
<td  id="b"><li>내용</li></td>
<td><textarea cols="30" rows="10" name="t"></textarea></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="button" value="글쓰기" onclick="writeChk()"/><input type="button" value="목록보기" onclick="location.href='dramaboard_list.php'" /></td>
</tr>
</table> 
</form>
</div>
</body>
</html>