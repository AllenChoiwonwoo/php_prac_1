<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <form enctype="multipart/form-data" action="upload_img.php" method="POST" aria-describedby="fileHelp">
      <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
      <input name="userfile" type="file" />
      <input type="submit" value="upload" />
    </form>

  </body>
</html>
