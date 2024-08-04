<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>관리자 페이지 - 메뉴 관리</title>
</head>

<body>
<form method="post" action="adm_ctg_result.php" name="form">
<div>
<ul>
<li>메뉴 아이디</li>
<li><input type="text" name="menuid" /></li>
</ul>
<ul>
<li>메뉴 이름</li>
<li><input type="text" name="menuname" /></li>
</ul>
<ul>
<li>분류</li>
<li><input type="text" name="ctg" size="20" ></li>
<li>분류와 분류 사이는 ','으로 구분해주세요.</li>
</ul>
<ul>
<li>그룹</li>
<li><select name="grub">
<option name="cut">파파라치컷</option>
<option name="sail">판매중</option>
<option name="board">게시판</option>
<option name="event">이벤트</option>
</select></li>
</ul>
<ul>
<li><input type="button" value="메뉴추가" onclick="menu()" /> <input type="button" value="이전으로" onclick="location.href='adm_ctg_list.php'"/></li>
</ul>
</div>
</form>
<script type="text/javascript">
function menu(){
if (document.form.menuid.value==""){
	alert('메뉴 아이디를 입력해주세요.');	
	form.id.focus();
	}
	else if(document.form.menuname.value==""){
	alert('메뉴이름을 선택해주세요.');
	}
	else form.submit();
}
</script>
</body>
</html>