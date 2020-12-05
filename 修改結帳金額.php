<?php
  $error = '';
  if(isset($_POST['return'])){
    header("Location: 結帳頁面.php");
  }else if(isset($_POST['send'])){


    $amount =  $_POST['amount'];
    $id = $_COOKIE['id'];

    if(empty($amount)){
      $error = '金額不能為空';
    }else {

        include_once ("dbtools.inc.php");
        $link = create_connection();
        $database = 'beverage store storage system';
        $sql = "UPDATE checkout SET Amount = '$amount'
                WHERE Date = '" . $_GET['date'] . "'";

        $sql2 = "UPDATE check_transaction SET Checkout_man_id = '$id'
                , Amount = '$amount' WHERE Date ='" . $_GET['date'] . "';";

        echo $sql . "<br>" . $sql2 . "<br>";
        $dbresult = execute_query($database, $sql, $link);
        if(!$dbresult)echo mysqli_error($link) . "<br>";
        $dbresult = execute_query($database, $sql2, $link);
        if(!$dbresult)echo mysqli_error($link);


        header("Location: 結帳頁面.php");
        exit();

    }

  }else{
    $id = '';
    $amount = '';
  }
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>修改結帳金額</title>
   </head>
   <body style="background-color:powderblue">
     <h1 style="text-align:center">修改結帳金額</h1>
     <hr SIZE=5  ALIGN=LEFT NOSHADE color="#8E8E8E"><!---noshade无阴影的设定，为实心线段--->

     <form method="post">
        <div style="text-align:center">
        <label for='amount'>更動金額</label>
        <input type='number' name='amount'
              value=<?php echo $amount; ?>/><br><br>
        
          <input type="submit" name='send' value='確認'/> &nbsp;&nbsp;
          <input type="submit" name='return'/ value='上一頁'><br>
        </div>
     </form>

     <hr SIZE=5  ALIGN=LEFT NOSHADE color="#8E8E8E"><!---noshade无阴影的设定，为实心线段--->
     <div style="color:red"><?php echo $error ?></div>
   </body>
 </html>
