<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>회원가입</title>
</head>

<body>
<!--///회원가입////-->
<form action="JoinTest.php" method="post" name="form">
<table>
<tr>
<td>아이디</td>
<td><input type="text" name="id" id="idx" /><input type="button" onclick="idCheck()" value="중복확인" /></td>
</tr>
<tr>
<td>비밀번호</td>
<td><input type="password" name="pwd" /></td>
</tr>
<tr>
<td>비밀번호확인</td>
<td><input type="password" name="pwd2" /></td>
</tr>
<tr>
<td>이름</td>
<td><input type="name" name="name" /></td>
</tr>
<tr>
<td>주소</td>
<td>
<select name="address" onchange="chag()" id="n">
<option>지역을 선택하세요.</option>
<option value="서울">서울</option>
<option value="부산">부산</option>
<option value="대구">대구</option>
<option value="대전">대전</option>
<option value="경기">경기</option>
<option value="충청">충청</option>
<option value="경상">경상</option>
<option value="제주">제주</option>
<option value="기타">기타</option>
</select>
<select name="dong" id="d">
</select>
<input type="hidden" name="dong2" id="m" />
</td>
</tr>
<tr>
<td>연락처</td>
<td><input type="text" name="t1" id="t1"/>-<input type="text" name="t2" />-<input type="text" name="t3" /></td>
</tr>
<tr>
<td>취미</td>
<td><input type="checkbox" name="like[]" value="책읽기" />책읽기 <input type="checkbox" name="like[]" value="컴퓨터" />컴퓨터게임 <input type="checkbox" name="like[]" value="Tv보기" />TV보기</td>
</tr>
<tr>
<td>주민등록번호</td>
<td><input type="text" name="joo1" />-<input type="password" name="joo2" /></td>
</tr>
<tr>
<td colspan="2"><input type="button" value="회원가입" onClick="loginChk()"/><input type="button" value="목록보기" onclick="location.href='board_list.php'" /></td>
</tr>
</table>
</form>
<script type="text/javascript">
function idCheck(){
var idx=form.id.value;
if (idx==""){
alert('아이디를 입력하세요');
form.id.focus();
}
else {
window.open('idChk.php?id='+idx,'idCheck','width=400, height=200, scrollbar=no');
}
}
function chag() {
var add=document.getElementById('n');
var dong=document.getElementById('d');
var dong2=document.getElementById('m');
var in0=["강남","삼성","서초","강북","강서","구서","종로","혜화"];
var in1=["화명","초량","부전","전포","영도","대연","문현","해운대"];
var sum=0;
if(add.selectedIndex==1){
	for (var i=0; i<in0.length; i++){
		sum+="<option>"+in0[i]+"</option>";
		}
		dong2.type="hidden";
		dong.innerHTML=sum;
		dong.focus();
	}
else if (add.selectedIndex==2){
	for (var i=0; i<in1.length; i++){
		sum+="<option>"+in1[i]+"</option>";
		}	
		dong2.type="hidden";
	dong.innerHTML=sum;
	dong.focus();
	}
else if(add.selectedIndex==3){
	for (var i=0; i<in1.length;i++){
		sum+="<option>"+"대구"+i+"</option>";
		}
		dong2.type="hidden";
		dong.innerHTML=sum;
		dong.focus();
	}
else if(add.selectedIndex==4){
	for (var i=0; i<in1.length;i++){
		sum+="<option>"+"대전"+i+"</option>";
		}
		dong2.disabled=false;
		dong.innerHTML=sum;
		dong.focus();
	}
else if(add.selectedIndex==5){
	for (var i=0; i<in1.length;i++){
		sum+="<option>"+"경기"+i+"</option>";
		}
		dong2.type="hidden";
		dong.innerHTML=sum;
		dong.focus();
	}
else if(add.selectedIndex==6){
	for (var i=0; i<in1.length;i++){
		sum+="<option>"+"충청"+i+"</option>";
		}
		dong2.type="hidden";
		dong.innerHTML=sum;
		dong.focus();
	}
else if(add.selectedIndex==7){
	for (var i=0; i<in1.length;i++){
		sum+="<option>"+"경상"+i+"</option>";
		}
		dong2.type="hidden";
		dong.innerHTML=sum;
		dong.focus();
}
else if(add.selectedIndex==8){
	for (var i=0; i<in1.length;i++){
		sum+="<option>"+"제주"+i+"</option>";
		}
		dong2.type="hidden";
		dong.innerHTML=sum;
		dong.focus();
	}
else if(add.selectedIndex==9){
		dong.innerHTML="";
		dong2.type="text";
		dong2.focus();
	}


}

function loginChk(){
	if (document.form.id.value==""){
	alert('아이디를 입력해주세요.');	
	form.id.focus();
	}
	else if(document.form.pwd.value==""){
	alert('비밀번호를 입력해주세요.');
	}
	else if(document.form.pwd.value!=document.form.pwd2.value){
	alert('비밀번호가 일치하지 않습니다.');
	}
	else if(document.form.name.value==""){
	alert('이름을 입력해주세요.');	
	}
	else if((document.form.joo1.value=="")||(document.form.joo2.value=="")){
	alert('주민등록번호를 입력해주세요.');
	}
	else if((document.form.joo1.value.length!=6)||(document.form.joo2.value.length!=7)){
	alert('주민등록번호를 확인해주세요.');
	form.joo1.focus();
	}
	else form.submit();
}
</script>
</body>
</html>