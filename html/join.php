<!doctype html>
<html>
<head>
<title>join page</title>
</head>
<body>
<h2><br><center>join page</center>
<form method="post" action="join_result.php">
<b>ID</b><input type="text" size=10 maxlength=10 name="id"><br />
<b>name</b><input type="text" size=10 maxlength=10 name="yourname"><br />
<b>password</b><input type="password" size=10 maxlength=10 name="pwd"><br />
<b>confirm password</b><input type="password" size=10 maxlength=10 name="pwd2"><br />
<b>cell phone number</b>

<select name="m1">
<option value=" ">select</option>
<option value="010">010</option>
<option value="011">011</option>
<option value="016">016</option>
<option value="017">017</option>
<option value="018">018</option>
<option value="019">019</option>
</select>
-
<input type="text" size=4 name="m2" maxlength=4>
-
<input type="text" size=4 name="m3" maxlength=4><br />

<b>sex</b>
<input type="radio" name="sex" value="man" checked>man
<input type="radio" name="sex" value="woman">woman <br />

<b>address</b><input type="text" size=60 name="addr"><br />

<b>your hobby</b>
<input type="checkbox" name="com" value="yes" checked> computer
<input type="checkbox" name="sports" value="yes"> sports
<input type="checkbox" name="shop" value="yes"> shopping
<input type="checkbox" name="mov" value="yes"> movie <br />


<input type="submit" value="submit" value="join">
<!-- 여기서 submit 버튼을 누르면 왜 다음데이지로 넘어가는건지 모르겠다. -->
<input type="reset" value="rewrite">
</form>
</html>
