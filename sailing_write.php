<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="sailing_write.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?
$menuid=$_REQUEST['menuid'];
$connect=mysql_connect('localhost','root','1234');
$select=mysql_select_db('ppl',$connect);
$sql="select ctg from menu where menuid='sailing_1'";
$query=mysql_query($sql, $connect);
$adm=mysql_num_rows($query);
while($row=mysql_fetch_array($query)){
	$category=$row['ctg'];
	$ctg=explode(",",$category);
?>
<form action="sailing_1write_result.php" method="post" enctype="multipart/form-data" name="form">
<div>
<h2>판매중 제조사의 글쓰기</h2>
<ul>
<li>파파라치코드</li>
<li><input type="text" name="paparazzicode" readonly="readonly"/><input type="button" onclick="papaCheck()" value="파파라치코드찾기" /></li>
</ul>
<ul>
<li>상품이름</li>
<li><input type="text" name="sailname" /></li>
</ul>
<ul>
<li>상품코드</li>
<li>
<select name="code">
<?
for ($c=0; $c<count($ctg);$c++){
?>
<option name="$ctg[$c]"><?=$ctg[$c]?></option>
<?
}
?>
</select>
</li>
</ul>
<ul>
<li>원산지</li>
<li><input type="text" name="make" /></li>
</ul>
<ul>
<li>브랜드</li>
<li><input type="text" name="brend" /></li>
</ul>
<ul>
<li>상품가격</li>
<li><input type="text" name="price" />원</li>
</ul>
<ul>
<li>판매옵션</li>
<li><input type="radio" name="sailing" value="판매중" />판매중 <input type="radio" name="sailing" value="판매예정" />판매예정</li>
</ul>
<ul>
<li>상품분류</li>
<li><input type="text" name="opt" /></li>
<li>분류와 분류 사이에는 ,으로 구분해주세요.</li>
</ul>
<ul>
<li>상품분류 타입</li>
<li><input type="radio" name="checktype" value="입력방식" />입력방식 <input type="radio" name="checktype" value="선택방식" />선택방식</li>
</ul>
<ul>
<li>상품사진</li>
<li><input type="file" name="image" /></li>
</ul>
<ul>
<li>제고량</li>
<li><input type="text" name="num" /></li>
</ul>
<ul>
<li>상품정보에 들어갈 사진</li>
<li><input type="file" name="image1"><br />
</li>
</ul>
<ul>
<li>상품정보에 들어갈 내용</li>
<li><textarea cols="20" rows="10" name="text1"></textarea><br />
</li>
</ul>
<ul>
<li>택배정보에 들어갈 사진</li>
<li><input type="file" name="mailimg"><br />
</li>
</ul>
<ul>
<li>택배정보에 들어갈 내용</li>
<li><textarea cols="20" rows="10" name="mail"></textarea><br />
</li>
</ul>
<ul>
<li>화면전환 영상</li>
<li><input type="file" name="video"></li>
<li>.avi 확장자로 업로드 해주세요.</li>
</ul>
<ul>
<li>글 하단에 들어갈 사진</li>
<li><input type="file" name="image2"><br />
</li>
</ul>
<ul>
<li>글 하단에 들어갈 내용</li>
<li><textarea cols="20" rows="10" name="text2"></textarea><br />
</li>
</ul>
<ul>
<li></li>
<li><input type="button" value="글쓰기" onclick="sail()"/><input type="button" value="취소하기" /><br />
</li>
</ul>
</div>
</form>
<? } ?>

<script type="text/javascript">
function papaCheck(){

window.open('papaChk.php','papacutChk','width=400, height=200, scrollbar=no');
}

function sail(){
if (form.sailname.value==""){
		alert('상품이름을 입력해주세요.');
	}
	else if(form.price.value==""){
		alert('가격을 입력해주세요.');
		}
	else if(form.num.value==""){
		alert('제고량을 입력해주세요.');
		}
	else 
	{
	var c=window.confirm('글을 등록하시겠습니까?');
	if (c){
		form.submit();
	}
		}	
}
</script>

</body>
</html>