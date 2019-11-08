<?php

  $_POST['nobutton']='textext';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script type="text/javascript">
    function post_to_url(path, params, method) {
      method = method || "post"; // Set method to post by default, if not specified.
      // The rest of this code assumes you are not using a library.
      // It can be made less wordy if you use one.
      var form = document.createElement("form");
      form.setAttribute("method", method);
      form.setAttribute("action", path);
      for(var key in params) {
        var hiddenField = document.createElement("input");
        hiddenField.setAttribute("type", "hidden");
        hiddenField.setAttribute("name", key);
        hiddenField.setAttribute("value", params[key]);
        form.appendChild(hiddenField);
  }
  document.body.appendChild(form);
  form.submit();
}

    </script>
  </head>
  <body>
    <form class="" action="post_2.php" method="post">
      <!-- <input type="text" name="" value=""> -->
      <input type="text" class="" name="name" value="choiwonwoo">
      <input type="hidden" class="" name="mail" value="gogodnjsdn@naver.com">
      <button type="submit" class="btn btn-primary">Submit</button>

    </form>
  </body>
</html>
