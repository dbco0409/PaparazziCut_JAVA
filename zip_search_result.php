<? ini_set('default_charset','euc-kr'); ?>
 <script language="JavaScript">
  function address(post1, post2, c){ 
       
     var openform = opener.document;
     openform.form.zip1.value = post1; 
     openform.form.zip2.value = post2; 
     openform.form.address1.value = c; 
     openform.form.address2.focus(); 
     window.close(); 
   }
 </script>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset="euc-kr" />
<title>우편번호검색결과</title>
</head>

<body>
<? $dong=$_POST['dong'];?>
<div>

<?

  $connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);

  $sql = "select * from zipcode where DONG like  '%".$dong."%'"; 
  $result = mysql_query($sql, $connect);

if($result){
  while($row = mysql_fetch_array($result)){
   $zipcode = explode("-",$row['ZIPCODE']); 
   $post1 = $zipcode[0]; 
   $post2 = $zipcode[1];  
?>
    <ul> <li> <a href=# onClick="address('<?= $post1 ?>','<?= $post2 ?>','<?=$row['SIDO']?> <?=$row['GUBUN']?> <?=$row['DONG']?> <?=$row['RI']?>')"><?=$row['zipcode']?><?=$row['SIDO']?><?=$row['GUBUN']?> <?=$row['DONG']?> <?=$row['RI']?> <?=$row['BUNJI']?></a></li></ul>
<?
  } 
 }
 else { echo "존재하는 주소가 없습니다."; }
?>
</div>
</body>
</html>