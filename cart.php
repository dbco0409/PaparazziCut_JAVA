<? session_start ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
<title>장바구니추가</title>
<style type="text/css">
#s, #t{font-size:11px; color:#999; height:14px; vertical-align:middle;}
#r{font-size:12px; text-align:center}
#h{ border-bottom:1px solid #ddd}
#gr{color:#999}
#one{height:1px}
#sail{width:150px; height:350px; float:left}
#all{width:800px}
a:link, a:visited{ text-decoration:none; color:#000; font-size:12px; }
a:hover{color:#ddd}
</style>
</head>

<body>
<?
$board=$_REQUEST['boardno'];
$boardno=$_REQUEST['no'];
$id=$_SESSION['id'];


$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);

$sql2="select cartno from cart";
$query=mysql_query($sql2, $connect);
$nom=mysql_num_rows($query);

if ($nom==0){
$no=1;
}
else $no=$nom+1;

$sql="insert into cart (cartno, board, no, id) values('$no','$board','$boardno','$id')";
$query2=mysql_query($sql, $connect);

if ($query2)
{
?>
<script type="text/javascript">
var c=window.confirm('장바구니에 등록되었습니다. 장바구니페이지로 이동하시겠습니까?');
if (c){
location.href='cart_list.php';
}
else { history.back();}
</script>	
<?
}
else {
?>
<script type="text/javascript">
alert('글쓰기에 실패하였습니다.');
history.back();
</script>	
<?
} 
?>

</body>
</html>