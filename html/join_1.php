<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>join page("회원가입 페이지")</title>
  </head>
  <body>

    <img src="http://localhost/PapaMama_logo.png" height="150" alt="papamama로고"><br>
    <h3>   PapaMama</h3>
    <h2><br><center>join page("회원가입")</center>
      <form class="" action="join_result.php" method="post">
        <b>ID</b><input type="text" size=10 maxlength=10 name="id"><br />
        <b>name</b><input type="text" size=10 maxlength="10 "name="yourname" ><br />
        <b>password</b><input type="password" size=10 maxlength=10 name="pwd"><br />
        <b>confirm password</b><input type="password" size=10 maxlength=10 name="pwd2"><br />
        <b>cell phone number</b>

      <select class="" name="m1">
        <option value=" ">select</option>
        <option value="010">010</option>
        <option value="010">011</option>
        <option value="010">016</option>
        <option value="010">017</option>
        <option value="010">018</option>
        <option value="010">019</option>
      </select>
      <input type="text" size=4 name="m2" maxlength=4 >text
      <input type="text" size=4 name="m3" maxlength=4 ><br/>

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
      <input type="reset"  value="rewrite">
      </form>
  </body>
</html>
