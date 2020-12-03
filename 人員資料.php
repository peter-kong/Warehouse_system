<?php
  include_once('dbtools.inc.php');

  $database = 'beverage store storage system';
  $sql = 'SELECT `Pid`, `Name` FROM people';
  $link = create_connection();
  $dbresult = execute_query($database, $sql, $link);

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

    <div>
    <table border="2" style="width:100%" >
      <thead  align='center' valign="middle">
        <tr>
          <td >編號</td>
          <td>姓名</td>
        </tr>
      </thead>
      <tbody  align='center' valign="middle">
        <?php
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
            echo "</tr>";
          }
          free($dbresult, $link);
         ?>
      </tbody>
    </table>
  </div>
  </body>
</html>
