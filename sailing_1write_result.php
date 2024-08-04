<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sailing 글쓰기</title>
</head>

<body>
<?
$connect=mysql_connect('localhost','paparazzippl','finkl0512');
$select=mysql_select_db('paparazzippl',$connect);

$paparazzicode=$_POST['paparazicode'];
$sailname=$_POST['sailname'];
$code=$_POST['code'];
$mak=$_POST['make'];
$brend=$_POST['brend'];
$price=$_POST['price'];
$sailing=$_POST['sailing'];
$opt=$_POST['opt'];
$checktype=$_POST['checktype'];
$img=$_FILES['image']['name'];
$img_tmp=$_FILES['image']['tmp_name'];
$num=$_POST['num'];
$image1=$_FILES['image1']['name'];
$image1_tmp=$_FILES['image1']['tmp_name'];
$text1=$_POST['text1'];
$mailimg=$_FILES['mailimg']['name'];
$mailimg_tmp=$_FILES['mailimg']['tmp_name'];
$mail=$_POST['mail'];
$video=$_FILES['video']['name'];
$video_tmp=$_FILES['video']['tmp_name'];
$image3=$_FILES['image3']['name'];
$image3_tmp=$_FILES['image3']['tmp_name'];
$text3=$_POST['text3'];


 if (is_uploaded_file($img_tmp)) {
move_uploaded_file($img_tmp,'./sailing/img/'.$img); 
 }
 
  if (is_uploaded_file($image1_tmp)) {
move_uploaded_file($image1_tmp,'./sailing/image1/'.$image1); 
 }
 
if (is_uploaded_file($mailimg_tmp)) {
move_uploaded_file($mailimg_tmp,'./sailing/mailimg/'.$mailimg); 
 }

if (is_uploaded_file($video_tmp)) {
move_uploaded_file($video_tmp,'./sailing/video/'.$video); 
 }
 
 if (is_uploaded_file($image3_tmp)) {
move_uploaded_file($image3_tmp,'./sailing/image3/'.$image3); 
}


$sql2="select sailno from sailing_1";
$query=mysql_query($sql2, $connect);
$nom=mysql_num_rows($query);

if ($nom==0){
$no=1;
}
else $no=$nom+1;

$sql="insert into sailing_1 (paparazzicode, sailname, code, mak, brend, price, sailing, opt, checktype, img, num, image1, text1, mailimg, mail, video, image2, text2, sailno) values('$paparazzicode','$sailname','$code','$mak','$brend','$price', '$sailing', '$opt','$checktype','$img','$num','$image1','$text1','$mailimg','$mail','$video','$image3','$text3','$no')";
$query2=mysql_query($sql, $connect);

if ($query2)
{
?>
<script type="text/javascript">
location.href='sailing_1list.php';
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