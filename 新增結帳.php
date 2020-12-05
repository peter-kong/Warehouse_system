<?php
  $error = '';
  if(isset($_POST['backpage'])){
    header("Location: 結帳頁面.php");
  }
  else if(isset($_POST["submit"])){

    $checkout_man_id = $_COOKIE['id'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];


    if(empty($amount)){
      $error = '金額不能為空';
    }else if (empty($date))
      $error = '日期不能為空';
    else{

      include_once ('dbtools.inc.php');
      $database = 'beverage store storage system';
      $sql = 'INSERT INTO check_transaction' .
      "(Checkout_man_id, Amount, Date)" .
      "VALUES('$checkout_man_id', '$amount', '$date')";
      //echo $sql;
      $sql2 = 'INSERT INTO checkout' .
      "(Date, Amount)" .
      "VALUES('$date', '$amount')";
      $link = create_connection();
      execute_query($database, $sql, $link);
      execute_query($database, $sql2, $link);
      header('Location: 結帳頁面.php');
      exit;

    }
  }else{
    $checkout_man_id = '';
    $amount = '';
    $date ='';
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>新增結帳</title>
  </head>
  <body style="background:powderblue">
    <h1 style="text-align:center">新增結帳</h1>
    <hr SIZE=5  ALIGN=LEFT NOSHADE color="#8E8E8E"><br><!---noshade无阴影的设定，为实心线段--->

    <form method="post" action=''>
      <div style="text-align:center">
        <label for="amount">結帳金額:</label>
        <input type="number" name="amount" id="amount"
                value="<?php echo $amount; ?>"/>
        <br><br>
        <label for="date">結帳日期:</label>
        <input type="date" name="date" id="date"
                value="<?php echo $date; ?>"/>
        <br><br>
          <div style="color:red" ><?php echo $error ?></div>
        <input type="submit" name="submit" value="送出"/>
        <input type="submit" name="backpage" value="上一頁"/>
    </div>
    </form>

  </body>
</html>
