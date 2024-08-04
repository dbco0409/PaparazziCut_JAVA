<? ini_set('default_charset','euc-kr'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
<title>우편번호 찾기</title>
</head>
 <body>
 <form name="post_form" method="post" action="zip_search_result.php">
  <table align=center border=0 >
   <tr>
    <td><b><center><font size="2" color="#606060">찾고자하시는  우편번호의 읍/면/동을 입력해주세요.<br>   <font color="#FF6600">예) 마포, 대화</font></center></b></td>
   </tr>
   <tr>
    <td colspan=2><b><center><font size=2 color=#666666> * 동을 입력하세요!! </font></center></b></td>
   </tr>
   <tr>
    <td align=center><input type="text" name="dong"><b>동</b>
    <input type="submit" value="검색"></td>
   </tr>
</table>
</form>
</body>
</html>
