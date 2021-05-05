<?php

  if(isset($_POST['return'])){
   if($_COOKIE["level"] == 3)
      header("Location:管理者頁面.php");
    else
      header("Location:員工頁面.php");
  }else if(isset($_POST['delete'])){
    include("dbtools.inc.php");
    $database="beverage store storage system";

    if($_COOKIE['level'] == 2)
      $sql = "DELETE FROM chat_room WHERE Sid='" . $_COOKIE['id'] ."'";
    else{
      $sql = "DELETE  FROM chat_room";
    }
    $link = create_connection();
    $dbresult = execute_query($database, $sql, $link);
    if(!$dbresult)echo mysqli_error($link);
    header('Location: 聊天室.php');

  }else if(isset($_POST['text_boolean'])){
    $text = $_POST['content'];
    $time = date('Y-m-d');
    $id = $_COOKIE['id'];
    $user = $_COOKIE['user'];

    include("dbtools.inc.php");
    $database="beverage store storage system";
    $sql = "INSERT INTO chat_room " .
    "(Sid, Name, Text, Date)" .
    "VALUES('$id', '$user', '$text', '$time')";
    $link = create_connection();
    $dbresult = execute_query($database, $sql, $link);
    if(!$dbresult  ) echo mysqli_error($link);

    while($row = mysqli_fetch_array($dbresult)){
      $text = $row['Date'] . " " . $row['Name'] . " " . $row['Text'];
      //echo $text;
      echo "<tr><td>" . $row['Date'] . "&nbsp;&nbsp;&nbsp;" .  $row['Name'] . "</td>" . "<td>" . $row['Text'] . "</td>".  "</tr>".  "</tr>";
    }

    header("Location: 聊天室.php");
  }else {
    $text = "";
  }

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>聊天室</title>
   </head>
   <body style="background:powderblue">
     <h1 style="text-align:center">聊天室</h1>
     <hr SIZE=5  ALIGN=LEFT NOSHADE color="#8E8E8E"><br><!---noshade无阴影的设定，为实心线段--->

     <table style="border:3px  Lavender solid;"cellpadding="10" border='0' width='85%'>
       <?php
         include("dbtools.inc.php");
         $database="beverage store storage system";
         $sql = "SELECT * FROM chat_room ";
         $link = create_connection();
         $dbresult = execute_query($database, $sql, $link);
         if(!$dbresult  ) echo mysqli_error($link);

         while($row = mysqli_fetch_array($dbresult)){
           $text = $row['Date'] . " " . $row['Name'] . " " . $row['Text'];
           //echo $text;
           echo "<tr><td>" . $row['Date'] . "&nbsp;&nbsp;&nbsp;" .  $row['Name'] . "</td>" . "<td>" . $row['Text'] . "</td>".  "</tr>".  "</tr>";
         }

        ?>


     </table>
     <br><br><br>
     馬上留言:<br>
     <form  method="post">
       <textarea name="content" value = <?php echo $text ?>></textarea>
       <input type='submit' name="text_boolean" value="立即新增留言" />
       <input type='submit' name="return" value="上一頁" />
       <input type='submit' name="delete" value="刪除對話紀錄" />
     </form>
     <br><br><br>
     <hr SIZE=5  ALIGN=LEFT NOSHADE color="#8E8E8E"><br><!---noshade无阴影的设定，为实心线段--->

   </body>
 </html>
