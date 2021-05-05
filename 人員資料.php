<?php
  include_once('dbtools.inc.php');

  $database = 'beverage store storage system';
  $sql = 'SELECT `Pid`, `Name` FROM people';
  $link = create_connection();
  $dbresult = execute_query($database, $sql, $link);

  if(isset($_POST['numsend'])){
    $Eid = $_POST['number'];
  }else {
    $Eid = "";
  }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>人員資料目錄</title>
  </head>
  <body style="background-color:powderblue;">
    <h1 style='text-align:center'>人員目錄</h1>
    <hr SIZE=5  ALIGN=LEFT NOSHADE color="#8E8E8E"><br><!---noshade无阴影的设定，为实心线段--->

    <form method='post'>
      <label for='number'>篩選員工號碼: </label>
      <input type='text' name='number'/>&nbsp;
      <input type='submit' name='numsend'/>
    </form>

    <div>
    <table border="2" style="width:100%" >
      <thead  align='center' valign="middle">
        <tr>
          <td>編號</td>
          <td>姓名</td>
          <td>操作</td>
        </tr>
      </thead>
      <tbody  align='center' valign="middle">
        <?php
          if(empty($Eid)){
            while($row = mysqli_fetch_array($dbresult)){
              $id = $row['Pid'];
              echo "<tr>";
              echo "<td>";
              echo "<a href='人員詳細資料.php?id=". $id . "'>";
              echo "<h3>" . $id . "</h3>";
              echo "</a>";
              echo "</td>";
              echo "<td>";
              echo $row['Name'];
              echo "</td>";
              echo "<td>";
              echo "<a href='人員目錄修改.php?id=". $id . "'>修改</a>";
              echo "/";
              echo "<a href='人員目錄刪除.php?id=" . $id . "' onClick=\"return confirm('是否確認刪除這筆資料');\">";
              echo "刪除";
              echo "</a>";
              echo "</td>";
              echo "</tr>";
            }
          }else{
              while($row = mysqli_fetch_array($dbresult)){
                if($row['Pid'] == $Eid)break;
              }
              $id = $row['Pid'];
              echo "<tr>";
              echo "<td>";
              echo "<a href='人員詳細資料.php?id=". $id . "'>";
              echo "<h3>" . $id . "</h3>";
              echo "</a>";
              echo "</td>";
              echo "<td>";
              echo $id;
              echo "</td>";
              echo "<td>";
              echo "<a href='人員目錄修改.php?id=". $id . "'>修改</a>";
              echo "/";
              echo "<a href='人員目錄刪除.php?id=" . $id . "' onClick=\"return confirm('是否確認刪除這筆資料');\">";
              echo "刪除";
              echo "</a>";
              echo "</td>";
              echo "</tr>";
            }
          
          free($dbresult, $link);
         ?>
      </tbody>
    </table>
    <div style="text-align:center" >
    <a href="/Warehouse%20system/管理者頁面.php" ><font size="5px">回到首頁</font size></a>
  </div>
  </div>
  </body>
</html>
