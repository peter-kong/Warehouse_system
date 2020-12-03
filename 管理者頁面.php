<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>管理者頁面</title>
  </head>
  <body style="background-color:powderblue;" >
      <h1 style="text-align:center"><?php echo $_COOKIE['user'] ?>，歡迎</h1>
      <div>
        <input type="submit" value="倉庫狀況"
        onclick="javascript:location.href='倉庫狀況.php'"
        style="font-size : 50px;width:590px;height:250px;
        border:2px blue dash;
        background-color:pink">
        <input type="submit" value="人員資料"
        onclick="javascript:location.href='人員資料.php'"
        style="font-size : 50px;width:590px;height:250px;
        border:2px blue dash;
        background-color:green">
      </div>
      <div>
        <input type="submit" value="班表"
        onclick="javascript:location.href='Login.php'"
        style="font-size : 50px;width:590px;height:250px;
        border:2px blue dash;
        background-color:blue">
        <input type="submit" value="結帳"
        onclick="javascript:location.href='Login.php'"
        style="font-size : 50px;width:590px;height:250px;
        border:2px blue dash;
        background-color:brown">
      </div>
      <input type="submit" value="註冊新帳號"
      onclick="javascript:location.href='Sign_in.php'"
      style="font-size : 50px;width:1185px;height:250px;
      border:2px blue dash;
      background-color:gold">

  </body>
</html>
