<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>員工頁面</title>
  </head>
  <body style="background-color:powderblue;">
      <h1 style="text-align:center"><?php echo $_COOKIE['user'] ?>，歡迎</h1>
      <hr SIZE=5  ALIGN=LEFT NOSHADE color="#8E8E8E"><br><!---noshade无阴影的设定，为实心线段--->

        <div>
          <input type="submit" value="倉庫狀況"
          onclick="javascript:location.href='倉庫狀況.php'"
          style="font-size : 50px; width:595px;height:250px;
          border:2px blue dash;
          background-color:pink">
          <input type="submit" value="班表"
          onclick="javascript:location.href='Download.php?filename=班表.xlsx'"
          style="font-size : 50px;width:595px;height:250px;
          border:2px blue dash;
          background-color:blue">
        </div>
        <div>
          <input type="submit" value="清帳"
          onclick="javascript:location.href='結帳頁面.php'"
          style="font-size : 50px;width:595px;height:250px;
          border:2px blue dash;
          background-color:brown">
          <input type="submit" value="聊天室"
          onclick="javascript:location.href='聊天室.php'"
          style="font-size : 50px;width:590px;height:250px;
          border:2px blue dash;
          background-color:pink">
        </div>

        <input type="submit" value="登出"
        onclick="javascript:location.href='Login.php'"
        style="font-size : 50px;width:1190px;height:250px;
        border:2px blue dash;
        background-color:gray">
        <br><hr SIZE=5  ALIGN=LEFT NOSHADE color="#8E8E8E"><!---noshade无阴影的设定，为实心线段--->

  </body>
</html>
