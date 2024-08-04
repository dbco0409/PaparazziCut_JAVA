<%@ page contentType="text/html; charset=utf-8" language="java" import="java.sql.*" errorPage="" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>파파라치컷 게시판 추가하는 페이지</title>
</head>

<body>
<form action="board_adm_write_result.php" method="post">
<div>
<ul>
<li>게시판 TABLE</li>
<li><input type="text" name="table_name" /></li>
<li>영문자, 숫자, _만 가능(공백없이 20자 이내)</li>
</ul>
<ul>
<li>게시판 제목</li>
<li><input type="text" name="name" /></li>
</ul>
<ul>
<li>포인트 설정</li>
</ul>
<ul>
<li>글쓰기 포인트</li>
<li><input type="text" name="write_point" /></li>
</ul>
<ul>
<li>글추천시 글쓴이 포인트</li>
<li><input type="text" name="writer_point" /></li>
</ul>
<ul>
<li>댓글쓰기 포인트</li>
<li><input type="text" name="cmt_point" /></li>
</ul>
<ul>
<li>분류</li>
<li><input type="text" name="ctg" /></li>
<li>분류와 분류 사이는 | 로 구분하세요.</li>
</ul>
<ul>
<li>비밀글 사용</li>
<li>
<select type="secret">
<option name="x">사용하지 않음</option>
<option name="o">항상 사용</option>
<option name="m">체크박스</option>
</select>
</li>
</ul>
<ul>
<li><input type="button" value="확인" /><input type="button" value="목록" /></li>
</ul>
</div>
</form>
</body>
</html>