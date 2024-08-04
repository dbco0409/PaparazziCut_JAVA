<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
$menuid=$_REQUEST['menuid'];
$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);
$sql="select * from menu where menuid='$menuid'";
$query=mysql_query($sql, $connect);
$adm=mysql_num_rows($query);
$row=mysql_fetch_array($query);
?>
<title>관리자 페이지 - <?=$row['menuname']?>수정 관리</title>
</head>

<body>
<form method="post" action="adm_ctg_update_result.php" name="form">
<div>
<ul>
<li>메뉴 아이디</li>
<li><?=$row['menuid']?><input type="hidden" name="menuid" value="<?=$row['menuid']?>"/></li>
</ul>
<ul>
<li>메뉴 이름</li>
<li><input type="text" name="menuname" value="<?=$row['menuname']?>"/></li>
</ul>
<ul>
<li>분류</li>
<li><input type="text" name="ctg" size="20" value="<?=$row['ctg']?>"></li>
<li>분류와 분류 사이는 ','으로 구분해주세요.</li>
</ul>
<ul>
<li>그룹</li>
<li>
<input type="text" value="<?=$row['grub']?>" readonly="readonly" />
</li>
</ul>
<ul>
<li><input type="button" value="메뉴수정" onclick="submit()" /> <input type="button" value="이전으로" onclick="location.href='adm_ctg_list.php'"/></li>
</ul>
</div>
</form>
</body>
</html>