<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?
$menuid=$_POST['menuid'];
$ctg=$_POST['ctg'];
$grub=$_POST['grub'];
$menuname=$_POST['menuname'];

$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);
$sql="insert into menu (menuid, ctg,grub,menuname) values('$menuid','$ctg','$grub','$menuname')";
$query=mysql_query($sql, $connect);
if ($query){
echo"메뉴 추가가 완료되었습니다.";
}
///테이블 작업////
$tbm="create table '$menuid'_board (no int, id varchar(20), name varchar(20), homepage varchar(20), subject varchar(20), text text, date varchar(20), hit int)";
$query2=mysql_query($tbm, $connect);
if($query2){
echo"테이블 추가가 완료되었습니다.";	

//파일 쓰기작업////




}


else {
?>
메뉴추가가 실패하였습니다.
<input type="button" value="뒤로" onclick="window.back()" /> <input type="button" value="메뉴관리목록보기" onclick="location='adm_ctg_list.php'"/>
<?
}
?>
</body>
</html>