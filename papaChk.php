<? session_start ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>구매한 파파라치컷 조회</title>
</head>

<body>
<script language="JavaScript">
  function address(sail){ 
       
     var openform = opener.document.form;
     openform.form.paparazicode.value = sail; 
     window.close(); 
   }
 </script>
<div>
<?
$id=$_SESSION['idx'];
$connect=mysql_connect('localhost','root','1234');
$select=mysql_select_db('member',$connect);
$sql="select saillist from member where '$id'";
$query=mysql_query($sql,$connect);
$adm=mysql_num_rows($query);

if(!$adm){
	
?>
<script type="text/javascript">
alert('구매한 파파라치컷이 없습니다. 일반상품으로 등록하시겠습니까? 아니라면 파파라치컷을 구매해주세요.');
close();
</script>
<?
}
else {
	while($row=mysql_fetch_array($query)){
?>
<ul>
<li><a href="#" onclick="address('<?=$row['saillist']?>')"><?=$row['saillist']?></a></li>
</ul>
<?
} }
?>
</div>
</body>
</html>