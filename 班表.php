<?php

    $msg = '';
    if(isset($_POST['return'])){
      header("Location: 管理者頁面.php");
    }else if(isset($_FILES['file'])){
      $msg = "上傳檔案資訊<br/>" ;
      $msg .= "檔名: " . $_FILES["file"]["name"] . "<br/>";
      $msg .= "暫存檔: " . $_FILES["file"]["tmp_name"] . "<br/>";

      if( copy($_FILES['file']["tmp_name"], $_FILES["file"]["name"])){
        $msg .= "檔案上傳成功<br/>";
        unlink($_FILES["file"]["tmp_name"]);
      }
      else
        $msg .= "檔案上傳失敗<br/>";
    }

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>班表上傳</title>
  </head>
  <body style="background:powderblue">
    <h1 style="text-align:center">班表上傳</h1>
    <hr SIZE=5  ALIGN=LEFT NOSHADE color="#8E8E8E"><br><!---noshade无阴影的设定，为实心线段--->

    <form action='' enctype="multipart/form-data"
          method="post">
          <div style="text-align:center">
            <label for="file">上傳班表:</label>
            <input type="file" name="file"/>&nbsp;
            <input type="submit" value="上傳檔案"><br/>

                      <?php
                        if(!empty($msg))
                          echo "<p>" . $msg . "</p>";
                      ?>
          </div><br>


          <div style="text-align:center">
            <input type="submit" name="return" value="上一頁">
          </div>
    </form>
    <hr SIZE=5  ALIGN=LEFT NOSHADE color="#8E8E8E"><br><!---noshade无阴影的设定，为实心线段--->


  </body>
</html>
