<?php

  include_once ('dbtools.inc.php');

  $error = '';

  if(isset($_POST['homepage']))
    header('Location:人員資料.php');
  else if(isset($_POST["send"])){

    $id = $_GET['id'];
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

    include_once ("dbtools.inc.php");
    $link = create_connection();
    $database = 'beverage store storage system';
    $sql = "SELECT * FROM people WHERE Pid='" . $id . "'";
    $dbresult = execute_query($database, $sql, $link);

    if(!$dbresult)echo "Error: " . mysqli_error($link) . '<br>';
    $row = mysqli_fetch_array($dbresult);
    //echo $row['Sex'] . "<br>";


    if(empty($name))
      $name = $row['Name'];
    if(empty($sex))
      $sex = $row['Sex'];
    if(empty($bdate))
      $bdate = $row['Bdate'];
    if(empty($phone))
      $phone = $row['Phone'];
    if(empty($account))
      $account = $row['Email'];
    if(empty($address))
      $address = $row['Address'];
    if(empty($work_date))
      $work_date = $row['Work_date'];
    if(empty($salary))
      $salary = $row['Salary'];
    if(empty($level))
      $level = $row['Level'];
    if(empty($password) AND $password != '0')
      $password  = $row['Password'];

      $database = 'beverage store storage system';
      $sql = "UPDATE people SET Name = '$name',
      Sex = '$sex',
      Bdate = '$bdate',
      Phone = '$phone',
      Email = '$account',
      Address = '$address',
      Work_date = '$work_date',
      Salary = '$salary',
      Level = '$level',
      Password = '$password'
      WHERE Pid = '" . $id . "'";
      $link = create_connection();
      $dbresult = execute_query($database, $sql, $link);
      free($dbresult, $link);
  //    if(!$dbresult)echo "Error: " . mysqli_error($link) . '<br>';

      //echo $sql;
      header('Location:管理者頁面.php');

  }else{

    $database = 'beverage store storage system';
    $sql = "SELECT `Name`, `Sex`, `Bdate`, `Phone`, `Email`, `Address`, `Work_date`, `Salary`, `Level`, `Password`
     FROM people WHERE Pid='" . $_GET['id'] . "'";
    $link = create_connection();
    $dbresult = execute_query($database, $sql, $link);
    $row = mysqli_fetch_array($dbresult);


    $id = $_GET['id'];
    $name = $row['Name'];
    $sex = $row['Sex'];
    $bdate = $row['Bdate'];
    $phone = $row['Phone'];
    $account = $row['Email'];
    $address = $row['Address'];
    $work_date = $row['Work_date'];
    $salary = $row['Salary'];
    $level = $row['Level'];
    $password = $row['Password'];
  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>修改</title>
  </head>
  <body style="background-color:powderblue;">
    <h1 style="text-align:center" >修改帳號</h1>
    <hr SIZE=5  ALIGN=LEFT NOSHADE color="#8E8E8E"><!---noshade无阴影的设定，为实心线段--->

    <form method="post" action="" style="text-align:center;">
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
      <br/><hr SIZE=5  ALIGN=LEFT NOSHADE color="#8E8E8E"><!---noshade无阴影的设定，为实心线段--->
      <div style="color:red" ><?php echo $error ?></div>

      <div>
        <input type="submit" name="send" value="送出" />
        <input type="submit" name="homepage" value="上一頁" />
      </div>
    </form>
  </body>
</html>
