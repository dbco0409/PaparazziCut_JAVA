<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
<title>Untitled Document</title>
</head>

<body>
 <div>
  <h2>------//��ü ȸ������//------</h2>
  <ul><li>
<iframe src="papaok1.htm" width="700" height="300" scrolling="auto"></iframe><br /></li>
<li><input type="radio" id="o" name="ok2" value="o" checked="checked" /><label>������</label> 
<input type="radio" id="x" name="ok2" value="x" onfocus="oked()"/><label>������������</label></li>
  <li>
<iframe src="papaok2.htm" width="700" height="300" scrolling="auto"></iframe><br /></li>
  <li><input type="radio" id="o" name="ok" value="o" checked="checked" /><label>������</label> 
<input type="radio" id="x" name="ok" value="x" onfocus="oked
()"/><label>������������</label></li></ul>
  <form action="join_result.php" method="post" name="form">
  <input type="hidden" name="level" value="2" />
<ul>
<li>���̵�</li>
<li><input type="text" name="id" /><input type="button" value="�ߺ�Ȯ��" onClick="idCheck()"></li>
</ul>
<ul>
<li>��й�ȣ</li>
<li>
<input type="password" name="pwd" />
</li>
</ul>
<ul>
<li>��й�ȣȮ��</li>
<li>
<input type="password" name="pwdtest" />
</li>
</ul>
<ul>
<li>ȸ���̸�</li>
<li>
<input type="text" name="name"/>
</li>
</ul>
<ul>
<li>��ǥ�� �̸�</li>
<li>
<input type="text" name="nickname" />
</li>
</ul>
<ul>
<li>�н����� ã�� ����</li>
<li>
<input type="text" name="question" />
</li>
</ul>
<ul>
<li>�н����� ã�� ��</li>
<li>
<input type="text" name="dab" />
</li>
</ul>
<ul>
<li>��ǥ�� ��ȣ</li>
<li>
<input type="text" name="joo1" />-<input type="password" name="joo2"/>
</li>
</ul>
<ul>
<li>�̸���</li>
<li>
<input type="text" name="email"  />
</li>
</ul>
<ul>
<li>ȸ�� �����ȣ</li>
<li><a href='#' onclick="window.open('zip_search.php','zip','width=500, height=500, scrollbars=yes')">�����ȣ �˻�</a> <br> 
   <input type=text name=zip1 size=3 readonly> - 
   <input type=text name=zip2 size=3 readonly><br> 
   <input type=text name=address1 size=50 readonly><br> 
   <input type=text name=address2 size=40><br> 

</li>
</ul>
<ul>
<li>��ǥ�� ��ȣ</li>
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
<li>ȸ�� ��ȭ��ȣ</li>
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
<li>���� �߼�</li>
<li>
<input type="radio" value="o" name="ok" />���� <input type="radio" value="x" name="ok" />���Ǿ���
</li>
</ul>
<ul>
<li></li>
<li>
<input type="button" value="ȸ������" onclick="joined()" /><input type="button" value="���ư���" 
onclick="location='index.php'"/>

</li>
</ul>
</form>
</div>
<script type="text/javascript" language="javascript">
function oked(){
var q=window.confirm('�������� ������ ȸ�������� �� �� �����ϴ�. �׷��� ����Ͻðڽ��ϱ�?');
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
alert('���̵� �Է����ּ���.');
}
else if(form.id.value.length<2){
alert('���̵�� 3��~10�� �̳��� �Է����ּ���.');
}
else {
window.open('idChk.php?id='+form.id.value,'idCheck','width=400, height=200, scrollbar=no');
}
}

function joined()
{
if (form.id.value==""){
alert('���̵� �Է����ּ���.');
form.id.focus();
}
else if(form.id.value.length<2){
alert('���̵�� 3��~10�� �̳��� �Է����ּ���.');
}
else if(form.pwd.value==""){
alert('��й�ȣ�� �Է����ּ���.');
form.pwd.focus();
}
else if(form.pwd.value!=form.pwdtest.value){
alert('��й�ȣ�� ��ġ���� �ʽ��ϴ�.');
}
else if(form.name.value==""){
alert('�̸��� �Է����ּ���.');	
form.name.focus();
}
else if((form.joo1.value=="")||(form.joo2.value=="")){
alert('�ֹε�Ϲ�ȣ�� �Է����ּ���.');
form.joo1.focus();
}
else if((form.joo1.value.length!=6)||(form.joo2.value.length!=7)){
alert('�ֹε�Ϲ�ȣ�� Ȯ�����ּ���.');
form.joo1.focus();
}
else form.submit();
	
}


</script>
</body>
</html>