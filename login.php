<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<script type="text/javascript">
window.onload=function(){
document.title='login';	
document.getElementById('chk').onclick=chked;
document.getElementById('cut').onclick=locaed;

function locaed(){
location.href='index.php';
}
function chked(){
if (form.id.value==""){
	alert('아이디를 입력하세요.');
	}
else if(form.pwd.value==""){
	alert('비밀번호를 입력하세요.');
	}
else { form.submit(); }
}

}
</script>
</head>

<body>
<form action="login_result.php" method="post" name="form">
<table>
<tr>
<td>ID</td>
<td><input type="text" name="id" /></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" name="pwd" /></td>
</tr>
<tr><td colspan="2" align="right"><input type="button" id="chk" value="확인" style="height:40px" />
<input type="button" id="cut" value="취소" style="height:40px" /> <input type="button" value="아이디/비번찾기" onclick="location.href='idChk.php'"  style="height:40px" /></td>
</tr>
</table>
</form>
</body>
</html>