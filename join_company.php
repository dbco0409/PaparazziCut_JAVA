<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
<title>Untitled Document</title>
</head>

<body>
 <div>
  <h2>------//업체 회원가입//------</h2>
  <ul><li>
<iframe src="papaok1.htm" width="700" height="300" scrolling="auto"></iframe><br /></li>
<li><input type="radio" id="o" name="ok2" value="o" checked="checked" /><label>동의함</label> 
<input type="radio" id="x" name="ok2" value="x" onfocus="oked()"/><label>동의하지않음</label></li>
  <li>
<iframe src="papaok2.htm" width="700" height="300" scrolling="auto"></iframe><br /></li>
  <li><input type="radio" id="o" name="ok" value="o" checked="checked" /><label>동의함</label> 
<input type="radio" id="x" name="ok" value="x" onfocus="oked
()"/><label>동의하지않음</label></li></ul>
  <form action="join_result.php" method="post" name="form">
  <input type="hidden" name="level" value="2" />
<ul>
<li>아이디</li>
<li><input type="text" name="id" /><input type="button" value="중복확인" onClick="idCheck()"></li>
</ul>
<ul>
<li>비밀번호</li>
<li>
<input type="password" name="pwd" />
</li>
</ul>
<ul>
<li>비밀번호확인</li>
<li>
<input type="password" name="pwdtest" />
</li>
</ul>
<ul>
<li>회사이름</li>
<li>
<input type="text" name="name"/>
</li>
</ul>
<ul>
<li>대표자 이름</li>
<li>
<input type="text" name="nickname" />
</li>
</ul>
<ul>
<li>패스워드 찾는 질문</li>
<li>
<input type="text" name="question" />
</li>
</ul>
<ul>
<li>패스워드 찾는 답</li>
<li>
<input type="text" name="dab" />
</li>
</ul>
<ul>
<li>대표자 번호</li>
<li>
<input type="text" name="joo1" />-<input type="password" name="joo2"/>
</li>
</ul>
<ul>
<li>이메일</li>
<li>
<input type="text" name="email"  />
</li>
</ul>
<ul>
<li>회사 우편번호</li>
<li><a href='#' onclick="window.open('zip_search.php','zip','width=500, height=500, scrollbars=yes')">우편번호 검색</a> <br> 
   <input type=text name=zip1 size=3 readonly> - 
   <input type=text name=zip2 size=3 readonly><br> 
   <input type=text name=address1 size=50 readonly><br> 
   <input type=text name=address2 size=40><br> 

</li>
</ul>
<ul>
<li>대표자 번호</li>
<li>
<select name="p1">
<option>010</option>
<option>011</option>
<option>019</option>
<option>018</option>
</select>-<input type="text" name="p2" />-<input type="text" name="p3" />
</li>
</ul>
<ul>
<li>회사 전화번호</li>
<li>
<select name="t1">
<option>02</option>
<option>051</option>
<option>053</option>
<option>043</option>
<option>042</option>
<option>041</option>
</select>-<input type="text" name="t2" />-<input type="text" name="t3" />
</li>
</ul>
<ul>
<li>메일 발송</li>
<li>
<input type="radio" value="o" name="ok" />동의 <input type="radio" value="x" name="ok" />동의안함
</li>
</ul>
<ul>
<li></li>
<li>
<input type="button" value="회원가입" onclick="joined()" /><input type="button" value="돌아가기" 
onclick="location='index.php'"/>

</li>
</ul>
</form>
</div>
<script type="text/javascript" language="javascript">
function oked(){
var q=window.confirm('동의하지 않으면 회원가입을 할 수 없습니다. 그래도 계속하시겠습니까?');
if (q){	
window.back();
}
else { 
document.getElementById("x").checked="";
document.getElementById("o").focus(); }
}

function idCheck()
{
if (form.id.value==""){
alert('아이디를 입력해주세요.');
}
else if(form.id.value.length<2){
alert('아이디는 3자~10자 이내로 입력해주세요.');
}
else {
window.open('idChk.php?id='+form.id.value,'idCheck','width=400, height=200, scrollbar=no');
}
}

function joined()
{
if (form.id.value==""){
alert('아이디를 입력해주세요.');
form.id.focus();
}
else if(form.id.value.length<2){
alert('아이디는 3자~10자 이내로 입력해주세요.');
}
else if(form.pwd.value==""){
alert('비밀번호를 입력해주세요.');
form.pwd.focus();
}
else if(form.pwd.value!=form.pwdtest.value){
alert('비밀번호가 일치하지 않습니다.');
}
else if(form.name.value==""){
alert('이름을 입력해주세요.');	
form.name.focus();
}
else if((form.joo1.value=="")||(form.joo2.value=="")){
alert('주민등록번호를 입력해주세요.');
form.joo1.focus();
}
else if((form.joo1.value.length!=6)||(form.joo2.value.length!=7)){
alert('주민등록번호를 확인해주세요.');
form.joo1.focus();
}
else form.submit();
	
}


</script>
</body>
</html>