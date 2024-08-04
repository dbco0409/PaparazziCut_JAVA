<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
<title>Untitled Document</title>
</head>

<body>
<?
$id=$_POST['id'];
$board=$_POST['board'];
$boardno=$_POST['boardno'];
$mailyesno=$_POST['mailyesno'];
$mailing=$_POST['mailing'];
$price=$_POST['price'];
$salerid=$_POST['salerid'];

$buyname=$_POST['buyname'];
$buytell=$_POST['buytell'];
$buyemail=$_POST['buyemail'];
$type=$_POST['type'];
$bank=$_POST['bank'];
$cardnumber=$_POST['cardnumber'];
$carddate=$_POST['carddate'];
$cardpwd=$_POST['cardpwd'];

$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);
$sql="select no from buyimport where boardno='$boardno' and board='$board'";
$query=mysql_query($sql, $connect);
$nom=mysql_num_rows($query);


if ($nom==0){
$no=1;
}
else $no=$nom+1;

$sql2="insert into buyimport (no, buyname, buytell, buyemail, type, bank, cardnumber, carddate, cardpwd, id, salerid, board, boardno, price, mailyesno, mailing) values('$no','$buyname','$buytell','$buyemail','$type','$bank','$cardnumber','$carddate','$cardpwd','$id','$salerid','$board','$boardno','$price','$mailyesno','$mailing')";
$query2=mysql_query($sql2, $connect);

if ($board=='cut_1'){
$buy="update cut_1 set buy=buy+1 where cutno='$boardno'";
}
else if($board=='sailing){
$buy="update sailing_1 set buy=buy+1 where sailno='$boardno'";
}

$buyupdate=mysql_query($buy,$connect);


if ($query2||$buyupdate)

{
?>
<script type="text/javascript">
alert('구매가 완료되었습니다.');
location.href='<?=$board?>list.php';
</script>	
<?
}
else {
?>
<script type="text/javascript">
alert('글쓰기 에러');
history.back();
</script>	
<?
}
?>
</body>
</html>