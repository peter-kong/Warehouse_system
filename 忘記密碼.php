<?php

  include_once ('sendmail.php');

  $error = '';
  if(isset($_POST['return'])){
    header("Location: Login.php");
    exit();
  }else if(isset($_POST['send'])){

    $email = $_POST['email'];

    if(empty($email))
      $error = "信箱為空";

    else{

      include_once ("dbtools.inc.php");
      $link = create_connection();
      $database = 'beverage store storage system';
      $sql = "SELECT * FROM people WHERE email='" . $email . "'";
      $dbresult = execute_query($database, $sql, $link);
      $row = mysqli_fetch_array($dbresult);
      $body = "您的密碼為: " . $row['Password'];

      $error = send_mail($email, "使用者", $body);

    }
  }else{
    $email = '';
  }

 ?>

 <!DOCTYPE html>

 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>忘記密碼</title>
   </head>
   <body style="background:powderblue">
     <h1 style='text-align:center'>忘記密碼</h1>
     <hr SIZE=5  ALIGN=LEFT NOSHADE color="#8E8E8E"><br><!---noshade无阴影的设定，为实心线段--->
     <form method="post" action=''>
       <div style="text-align: center">
       <label for='email'>使用者信箱: </label>
       <input type='email' name='email' value='<?php echo $email ?>'>
       <br><br>
       <input type='submit' name='send' value='確認'>&nbsp;&nbsp;
       <input type='submit' name='return' value="上一頁">
       </div>
     </form>
     <br>

     <div style="color:red; text-align:center" ><?php echo $error ?></div>


     <hr SIZE=5  ALIGN=LEFT NOSHADE color="#8E8E8E"><br><!---noshade无阴影的设定，为实心线段--->

   </body>
 </html>
