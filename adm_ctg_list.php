<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>메뉴관리</title>
<style type="text/css">
a:link, a:visited{ text-decoration:none; color:#000; font-size:12px; }
a:hover{color:#ddd}
li{float:right; margin-left:10px; list-style:square; font-size:12px}
</style>
</head>

<body>
<?

$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);
$sql="select * from menu";
$query=mysql_query($sql, $connect);
$adm=mysql_num_rows($query);

?>
<table width="650">
<tr>
<td>메뉴아이디</td>
<td>메뉴이름</td>
<td>카테고리</td>
<td>메뉴그룹</td>
<td></td>
</tr>
<?
while($row=mysql_fetch_array($query)){
?>
<tr>
<td><?=$row['menuid']?></td>
<td><?=$row['menuname']?></td>
<td align="left"><?=$row['ctg']?></td>
<td><?=$row['grub']?></td>
<td><a href="adm_ctg_update.php?menuid=<?=$row['menuid']?>">수정</a> <a href="adm_ctg_delete.php?menuid=<?=$row['menuid']?>">삭제</a></td>
</tr>
<tr id="one">
<td colspan="6" id="h"> </td></tr>

<?
} ?>
<tr>
<td><a href="adm_ctg.php">메뉴추가</a></td>
</tr>
</table>
<script type="text/javascript">
window.onload=function(){
document.getElementById('all').onclick=allch;	
}
function allch(){
	len=form.chk.length;
for (var i=0; i<len;i++){
	form.chk[i].checked=true;
	}
	document.getElementById('all').value="전체해제";
	document.getElementById('all').onclick=nonchk;
}
function nonchk(){

for (var i=0; i<len;i++){
	form.chk[i].checked=false;
	}
	document.getElementById('all').value="전체선택";
	document.getElementById('all').onclick=allch;
	
	}
</script>
</body>
</html>