<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>員工頁面</title>
  </head>
  <body style="background-color:powderblue;">
      <h1 style="text-align:center"><?php echo $_COOKIE['user'] ?>，歡迎</h1>

        <input type="submit" value="倉庫狀況"
        onclick="javascript:location.href='Login.php'"
        style="width:1200px;height:250px;
        border:2px blue dash;
        background-color:pink">
        <input type="submit" value="班表"
        onclick="javascript:location.href='Login.php'"
        style="width:1200px;height:250px;
        border:2px blue dash;
        background-color:blue">
        <input type="submit" value="結帳"
        onclick="javascript:location.href='Login.php'"
        style="width:1200px;height:250px;
        border:2px blue dash;
        background-color:brown">

  </body>
</html>
