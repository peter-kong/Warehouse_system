<?php

  include_once ("dbtools.inc.php");
  $database = 'beverage store storage system';
  $sql = 'SELECT * FROM warehouse';

  $link = create_connection();
  $dbresult = execute_query($database, $sql, $link);

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>倉庫狀況</title>
  </head>
  <body style="background-color:powderblue;">
    <h1 style="text-align:center">倉庫狀況</h1>
    <hr SIZE=5  ALIGN=LEFT NOSHADE color="#8E8E8E"><!---noshade无阴影的设定，为实心线段--->

    <table border = "1" style="width:100%">
      <thead>
          <tr>
            <td>操作</td>
            <td>物品</td>
            <td>數量(公斤)</td>
            <td>保存期限</td>
            <td>進貨廠商</td>
            <td>廠商電話</td>
            <td>單位價格(公斤)</td>
            <td>剩餘價值</td>
          </tr>
      </thead>
      <tbody>
              <?php
                while($row = mysqli_fetch_array($dbresult)){
                    echo "<tr>";
                    echo "<td>";
                    echo "<a href='庫存修改.php?item=" . $row['Item'] . "'>修改</a>";
                    echo "/";
                    echo "<a href='庫存調動.php?item=" . $row['Item'] . "'>查詢</a>";
                    echo "/";
                    echo "<a href='庫存刪除.php?item=" . $row['Item'] . "' onClick=\"return confirm('是否確認刪除這筆資料');\">刪除</a>";
                    echo "</td>";
                    echo "<td>" . $row["Item"] . "</td>";
                    echo "<td>" . $row["Quantity"] . "</td>";
                    echo "<td>" . $row["Save_time"] . "</td>";
                    echo "<td>" . $row["Vendor"] . "</td>";
                    echo "<td>" . $row["Vphone"] . "</td>";
                    echo "<td>" . $row["Unit_price"] . "</td>";
                    echo "<td>" . $row["Unit_price"] * $row["Quantity"] . "</td>";

                    echo "</tr>";
                }
               ?>
      </tbody>

    </table>
    <div style="text-align:center" >
    <a href="/Warehouse%20system/新增品項頁面.php" ><font size="5px">新增品項</font size></a>
    &nbsp;&nbsp;&nbsp;&nbsp;

    <a href="<?php  if($_COOKIE["level"] == 3) echo "/Warehouse%20system/管理者頁面.php";
                    else echo "/Warehouse%20system/員工頁面.php";?>" ><font size="5px">回到首頁</font size></a>
  </div>
  </body>
</html>
