<? 
session_cache_limiter(''); 
session_start(); 
ini_set('register_globals','1'); 
ini_set('session.bug_compat_42','1'); 
ini_set('session.bug_compat_warn','0'); 
ini_set('session.auto_start','1');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
<title>Untitled Document</title>
</head>
<body>
<?
$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);
$id=$_SESSION['idx'];
$mem="select name, level from member where id='$id'";
$memset=mysql_query($mem, $connect);
$setmem=mysql_fetch_array($memset);
$level=$setmem['level'];
$name=$setmem['name'];


$mal;

if(!$id){
	$mal="로그인을 안했어요.";
}
else if ($level==1)
{
	$mal="관리자임";
}
else if($level==2){
$mal="업체임";	
}
else $mal="일반인임";

?>
</body>
</html>