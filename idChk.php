<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>아이디 중복체크</title>
</head>

<body>
<?
$id=$_REQUEST['id'];
$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);
$sql="select id from member where id='$id'";
 $result=mysql_query($sql);
    $num_record=mysql_num_rows($result);

 echo"아이디:";
 echo $id;
 echo"<p>";
 if($num_record) {
echo"이미 동일한 아이디가 존재합니다.";
}
else {
echo"아직 존재하지 않는 아이디 입니다.";
echo"<input type=button value=등록하기 onclick='self.close()'>";

} 
?>
</body>
</html>