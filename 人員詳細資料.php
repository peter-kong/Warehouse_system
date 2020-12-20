<?php

  include_once ('dbtools.inc.php');

  $database = 'beverage store storage system';
  $id = $_GET["id"];

  $sql = "SELECT * FROM people WHERE Pid='" . $id . "'";

  $link = create_connection();
  $dbresult = execute_query($database, $sql, $link);
  $row = mysqli_fetch_array($dbresult);
  free($dbresult, $link);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>人員詳細資料</title>
  </head>
  <body style="background-color:powderblue;">
      <h1 style="text-align:center;">人員詳細資料</h1>
      <hr SIZE=5  ALIGN=LEFT NOSHADE color="#8E8E8E"><!---noshade无阴影的设定，为实心线段--->

      <ul style="font-size:30px;">
        <li>Id: <?php echo $row['Pid'];?></li>
        <li>Name: <?php echo $row['Name'];?></li>
        <li>Sex: <?php echo $row['Sex'];?></li>
        <li>Birthday: <?php echo $row['Bdate'];?></li>
        <li>tel: <?php echo $row['Phone'];?></li>
        <li>E-mail: <?php echo $row['Email'];?></li>
        <li>Address: <?php echo $row['Address'];?></li>
        <li>Wrok_day: <?php echo $row['Work_date'];?></li>
        <li>Period: <?php echo (strtotime(date("Y-m-d")) - strtotime($row['Work_date']))/(60*60*24);?> 天</li>
        <li>Salary: <?php echo $row['Salary'];?></li>
        <li>Level: <?php echo $row['Level'];?></li>
        <li>Password: <?php echo $row['Password'];?></li>
      </ul>
      <div style="text-align:center">
      <a href="人員資料.php" ><font size="5px">上一頁</font size></a>
      <a href="/Warehouse%20system/管理者頁面.php" ><font size="5px">回到首頁</font size></a>
      </div>
  </body>
</html>
