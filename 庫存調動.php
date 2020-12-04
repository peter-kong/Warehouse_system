<?php
    include_once ("dbtools.inc.php");

    $database = 'beverage store storage system';
    $sql = "SELECT * FROM manage WHERE Item='" . $_GET['item'] ."'";

    $link = create_connection();
    $dbresult = execute_query($database, $sql, $link);

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>庫存調動紀錄</title>
  </head>
  <body style="background-color:powderblue;">
      <h1 style="text-align:center">庫存調動紀錄</h1>
      <hr SIZE=5  ALIGN=LEFT NOSHADE color="#8E8E8E"><!---noshade无阴影的设定，为实心线段--->

      <table border="1" style="width:100%">
        <thead  align='center' valign="middle">
          <tr>
            <td>品項</td>
            <td>時間</td>
            <td>調動人</td>
            <td>數量</td>
          </tr>
        </thead>
        <tbody  align='center' valign="middle">
          <?php
            while($row = mysqli_fetch_array($dbresult)){
              echo '<tr>';

              echo '<td>';
              echo $row['Item'];
              echo '</td>';
              echo '<td>';
              echo $row['Purchase_time'];
              echo '</td>';

              $database = 'beverage store storage system';
              $sql = "SELECT `Name` FROM people WHERE `Pid`='" . $row['Inventory_man_id'] . "'";
              $link = create_connection();
              $dbresult2 = execute_query($database, $sql, $link);

              echo "<td>" . mysqli_fetch_array($dbresult2)['Name'] . "</td>";

              echo '<td>';
              echo $row['Quantity'];
              echo '</td>';

              echo '</tr>';
            }
           ?>
        </tbody>
      </table>
      <div style="text-align:center">
      <a href="倉庫狀況.php" ><font size="5px">上一頁</font size></a>
      </div>
  </body>
</html>
