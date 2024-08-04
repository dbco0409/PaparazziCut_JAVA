<? session_start ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?
$id=$_SESSION['idx'];
if (!$id){
?>
<div>
<ul>
<li><a href="join_public.php">일반회원가입</a></li>
<li><a href="join_company.php">업체회원가입</a></li>
</ul></div>
<? } else { ?>
<script type="text/javascript">
alert('이미 로그인이 되어있습니다. ');
window.back();
}
</script>
<? } ?>
 </body>
</html>
