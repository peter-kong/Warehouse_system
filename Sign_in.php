<?php

  include_once ('dbtools.inc.php');

  $error = '';
  if(isset($_POST["send"])){
    $id = $_POST['pid'];
    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $bdate = $_POST['bdate'];
    $phone = $_POST['phone'];
    $account = $_POST["email"];
    $address = $_POST['address'];
    $work_date = $_POST['work_date'];
    $salary = $_POST['salary'];
    $level = $_POST['level'];
    $password = $_POST["password"];

    if(empty($account)){
      $error = '帳號不能為空';
    }else if(empty($password)){
      $error = '密碼不能為空';
    }else{
      $database = 'beverage store storage system';
      $sql = 'INSERT INTO people' .
      "(Pid, Name, Sex, Bdate, Phone, Email, Address,
      Work_date, Salary, Level, Password)" .
      "VALUES('$id', '$name', '$sex', '$bdate', '$phone',
      '$account', '$address', '$work_date',
      '$salary', '$level', '$password')";
      $link = create_connection();
      $dbresult = execute_query($database, $sql, $link);
      //free($db)
      echo $sql;
      header('Location:管理者頁面.php');    }

  }else{
    $id = '';
    $name = '';
    $sex = '';
    $bdate = '';
    $phone = '';
    $account = '';
    $address = '';
    $work_date = '';
    $work_time = '';
    $salary = '';
    $level = '';
    $password = '';
  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>註冊</title>
  </head>
  <body style="background-color:powderblue;">
    <h1 style="text-align:center" >註冊新帳號</h1>
    <hr SIZE=5  ALIGN=LEFT NOSHADE color="#8E8E8E"><!---noshade无阴影的设定，为实心线段--->

    <form method="post" action="" style="text-align:center;">
      <label for="pid">ID:</label>
      <input type="text" name="pid" id='pid'
        value="<?php  echo $id ?>"/>
      <br><br>
      <label for="name">姓名:</label>
      <input type="text" name="name" id='name'
        value="<?php  echo $name ?>"/>
      <br><br>
      <label for="sex">性別:</label>
      <input type="text" name="sex" id='sex'
        value="<?php  echo $sex ?>"/>
      <br><br>
      <label for="bdate">生日:</label>
      <input type="date" name="bdate" id='bdate'
        value="<?php  echo $bdate ?>"/>
      <br><br>
      <label for="phone">電話:</label>
      <input type="text" name="phone" id='phone'
        value="<?php  echo $phone ?>"/>
      <br><br>

      <label for="email">電子信箱:</label>
      <input type="email" name="email" id='email'
        value="<?php  echo $account ?>"/>
      <br><br>
      <label for="address">通訊地址:</label>
      <input type="text" name="address" id='address'
        value="<?php  echo $address ?>"/>
      <br><br>
      <label for="work_date">工作開始:</label>
      <input type="date" name="work_date" id='work_date'
        value="<?php  echo $work_date ?>"/>
      <br><br>
      <label for="salary">月薪:</label>
      <input type="number" name="salary" id='salary'
        value="<?php  echo $salary ?>"/>
      <br><br>
      <label for="level">帳號等級:</label>
      <input type="number" name="level" id='level'
        value="<?php  echo $level ?>"/>
      <br><br>
      <label for="password">設定密碼:</label>
      <input type="password" name="password" id='password'
        value="<?php  echo $password ?>"/>
      <br/><hr SIZE=5  ALIGN=LEFT NOSHADE color="#8E8E8E"><br><!---noshade无阴影的设定，为实心线段--->

      <input type="submit" name="send" value="送出" />
    </form>
  </body>
</html>
