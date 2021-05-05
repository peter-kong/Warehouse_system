<?php
  include_once ("dbtools.inc.php");

  $database = 'beverage store storage system';
  $sql = 'SELECT * FROM check_transaction';

  $link = create_connection();
  $dbresult = execute_query($database, $sql, $link);

  if(isset($_POST['send'])){
    $money = (int)$_POST['dollars'];
  }else{
    $money = 0;
  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>清帳頁面</title>
  </head>
  <body style="background:powderblue">
    <h1 style="text-align:center">清帳頁面</h1>
    <hr SIZE=5  ALIGN=LEFT NOSHADE color="#8E8E8E"><br><!---noshade无阴影的设定，为实心线段--->

    <form method='post'>
        <?php
        if($_COOKIE['level'] == 3){
          echo "<label for='dollars'>篩選金額: </label>";
          echo "<input type='text' name='dollars'/>";
          echo " ";
          echo "<input type='submit' name='send' value='送出'>";
         }
         ?>

    </form>

    <table border="1" style="text-align:center" width="100%">
      <thead>
        <tr>
          <td>操作</td>
          <td>日期</td>
          <td>金額</td>
          <td>收帳ID</td>
          <td>姓名</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php
            while($row = mysqli_fetch_array($dbresult)){

              $database = 'beverage store storage system';
              $sql = "SELECT `Name` FROM people WHERE `Pid`='" . $row['Checkout_man_id'] . "'";
              $link = create_connection();
              $dbresult2 = execute_query($database, $sql, $link);

              $name = mysqli_fetch_array($dbresult2)['Name'];

              if (empty($name)) {
                $name = "已離職";
                $id = "  已離職";
              }else {
                $id = $row['Checkout_man_id'];
              }

              if((int)$row['Amount'] >= $money){
                echo "<tr>";

                if($name == $_COOKIE['user'] || $_COOKIE['level'] == 3)
                  echo "<td>" . "<a href='修改結帳金額.php?date=". $row['Date'] . "'>" . "修改金額</a>" . "</td>";
                else {
                  echo "<td/>";
                }
                echo "<td>" . $row['Date'] . "</td>";
                echo "<td>" . $row['Amount'] . "</td>";


                echo "<td>" . $id . "</td>";
                echo "<td>" . $name . "</td>";
                echo "</tr>";
              }
            }
           ?>
        </tr>
      </tbody>
    </table>
    <hr SIZE=5  ALIGN=LEFT NOSHADE color="#8E8E8E"><br><!---noshade无阴影的设定，为实心线段--->

    <br>
    <div style='text-align:center'>
    <a href=新增結帳.php><font size="5px">新增清帳</font size></a>
    <a href=<?php if($_COOKIE['level'] == 3)  echo "管理者頁面.php";
                  else echo "員工頁面.php"; ?> ><font size="5px">上一頁</font size></a>
    </div>

  </body>
</html>
