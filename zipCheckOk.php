<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>우편번호 검색</title>
</head>
 <body>
 <?
 $dongName=$_POST['dong'];
 
$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('ppl',$connect);

$jsql="select * from cl_zipcodet where dong like '%$dongName%'";
$query=mysql_query($jsql,$connect);

while($row=mysql_fetch_array($query)){

?>
  <center>
	<h3>우편번호 검색결과</h3>
    <div>
<?
$zipcode=$row['zipcode'];
$sido=$row['sido'];
$gugun=$row['gugun'];
$dong=$row['dong'];
$bunji=$row['bunji'];

if(!$bunji) $bunji="";
?>

    <ul>
    <li><font size=2><b>우편번호</font></td><td><font size=2><b>시/도</font><font size=2><b>구/군</font></li>
		<li><font size=2><b>동</font></td><td><font size=2><b>번지</font></li>
	  </ul>
	  <ul>
		 <li><a href="javascript:sendAddress('<?=$zipcode?>','<?=$sido?>','<?=$gugun?>','<?=$dong?>','<?=$bunji?>')"><font size=2><?=$zipcode?></font></a></li>
		  <li><font size=2><?=$sido?></font></li>
		  <li><font size=2><?=$gugun?></font></li>
		  <li><font size=2><?=$dong?></font></li>
        </ul>
       
		  <? 
				if($bunji=="")
				{                    // 빈값이면 테이블 칸이 그려지지 않으므로 스페이스로 채움
		  ?>
		 <ul><li>&nbsp;</li></ul>	
		  <?
				}
				else
				{
		   ?>
		  <ul><li><font size=2><?=$bunji?></font></li>	
		  <?
				}
		  ?>
	  </ul>
<?

	} 
?>
	</div> 
	<p><a href="zipCheck.php">다시작성</p>
   </center>
  </body>
</html>
<script language="javascript">
	function sendAddress(zip,s,g,d)
	{
		//시도 구군 동을 합한 주소
		var address =s + " " + g + " " + d;
		 // opener:   open()함수를 호출했던 상위(부모) 윈도우 객체를 의미함
		opener.document.newMem.zipcode.value=zip;
        opener.document.newMem.address1.value=address;
		opener.document.newMem.address2.focus();
		window.close();
	}
</script>