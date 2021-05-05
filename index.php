<?php

  include_once ('dbtools.inc.php');

  $error='';$result='';$level='';
  if(isset($_POST["send"])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email)){
      $error = "帳號為空<br>";
    }else if(empty($password) && $password != '0'){
      $error = "密碼為空<br>";
    }else{
      $database = 'beverage store storage system';
      $sql = 'SELECT `Email`, `Password`, `Level`, `Name`, `Pid` FROM people';
      $link = create_connection();
      $dbresult = execute_query($database, $sql, $link);

      while ($row = mysqli_fetch_array($dbresult)) {
        if($row[0] == $email and $row['Password'] == $password){
          $level = $row['Level'];
          setcookie("level", $row['Level'], time()+7200);
          setcookie("user", $row['Name'], time()+7200);
          setcookie("id", $row['Pid'], time()+7200);

          $result='成功了<br>';
          break;
        }
      }
      if($result == '')
        $error = '帳號或密碼錯誤';
      else{
        free($dbresult, $link);
        if($level == 3){
          header("Location:管理者頁面.php");
          exit;
        //echo $_POST['email'];
        }else if($level == 2){
          header('Location:員工頁面.php');
          exit;
        }
      }
    }

  }else{
    $email = '';
    $password = '';
  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>飲料店管理系統</title>
  </head>
  <body style="background-color:powderblue;">
    <h1 style="text-align:center;">飲料店管理系統</h1>

    <hr SIZE=5  ALIGN=LEFT NOSHADE color="#8E8E8E"><br><!---noshade无阴影的设定，为实心线段--->

    <form method="post" action="" style="text-align:center;">
      <div>
        <label for="email">帳號:</label>
        <input type="email" name="email" id="email"
          value="<?php echo $email; ?>" />

      </div>
      <div>
        <label for="password">密碼:</label>
        <input type="password" name="password" id="password"
          value="<?php echo $password; ?>" />
      </div>


      <br/><hr SIZE=5  ALIGN=LEFT NOSHADE color="#8E8E8E"><br><!---noshade无阴影的设定，为实心线段--->
      <input type="submit" name="send" value="登入"/>
    </form>
    <br/>
    <div style="text-align:center;" >
    <a href="忘記密碼.php">忘記密碼?</a>
    &nbsp;&nbsp;
    <!---<a href="Sign_in.php" >註冊新帳號</a>--->


    </div>
    <div style="color:red" ><?php echo $error ?></div>

    <br><br/>
    <div>
      <b>~~關於本系統~~</b><br><br>
      有兩個角色:老闆、員工<br><br>
      老闆可以使用: 倉庫狀況、人員薪資、班表、結帳、創辦帳號與聊天室功能<br><br>
      員工可以使用: 倉庫狀況、班表、結帳與聊天室功能<br><br>
      依照不同權限有對不同功能模組有不同操作方法<br>
      詳情請見報告或親自操作<br><br>

      &nbsp;&nbsp;&nbsp;&nbsp;老闆帳號:410621208@gms.ndhu.edu.tw<br><br>
      &nbsp;&nbsp;&nbsp;&nbsp;老闆密碼:0<br><br>

      &nbsp;&nbsp;&nbsp;&nbsp;員工帳號:410777888@gmail.com<br><br>
      &nbsp;&nbsp;&nbsp;&nbsp;員工密碼:0<br><br>
    </div>

  </body>
</html>
