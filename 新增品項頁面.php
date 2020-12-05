<?php

  $error='';
  if(isset($_POST['backpage'])){
    header("Location: 倉庫狀況.php");
    exit;
  }else if(isset($_POST["homepage"])){
    header("Location: 管理者頁面.php");
    exit;
  }else if(isset($_POST["send"])){

    $item = $_POST['item'];
    $quantity = $_POST['quantity'];
    $vendor = $_POST['vendor'];
    $vphone = $_POST['vphone'];
    $save_time = $_POST['save_time'];
    $unit_price = $_POST['unit_price'];
    $time = $_POST['date'];
    $man = $_COOKIE['id'];

    if(empty($item)){
      $error = '品項不能為空';
    }else if(empty($quantity))
      $error = '數量不能為空';
    else if(empty($vendor))
      $error = '廠商不能為空';
    else if(empty($vphone))
      $error = '廠商電話不能為空';
    else if(empty($save_time))
      $error = '保存時間不能為空';
    else if(empty($unit_price))
      $error = '單位價格不能為空';
    else if(empty($time))
      $error = '補貨時間不能為空';

    else{
      include_once ("dbtools.inc.php");

      $database = 'beverage store storage system';
      $sql = 'INSERT INTO warehouse' .
      "(Item, Quantity, Save_time, Vendor, Vphone, Unit_price)" .
      "VALUES('$item', '$quantity', '$save_time','$vendor', '$vphone', '$unit_price')";

      $sql2 = 'INSERT INTO manage' .
      "(Purchase_time, Inventory_man_id, Item, Quantity)" .
      "VALUES('$time', '$man', '$item', '$quantity')";


      $link = create_connection();
      execute_query($database, $sql, $link);
      execute_query($database, $sql2, $link);
      free("", $link);

      header('Location: 倉庫狀況.php');
      exit;

    }

  }else{
    $item = '';
    $quantity = '';
    $vendor = '';
    $vphone = '';
    $save_time = '';
    $unit_price = '';
    $time = '';
    $man = '';

  }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>新增品項</title>
  </head>
  <body style="background-color:powderblue;">
    <h1 style="text-align:center">新增品項</h1>
    <hr SIZE=5  ALIGN=LEFT NOSHADE color="#8E8E8E"><br><!---noshade无阴影的设定，为实心线段--->

    <form method="post" action="" style="text-align:center;">
      <label for="item">項目:</label>
      <input type="text" name="item" id='item'
        value="<?php  echo $item ?>"/>
      <br><br>
      <label for="quantity">數量(公斤):</label>
      <input type="text" name="quantity" id='quantity'
        value="<?php  echo $quantity ?>"/>
      <br><br>
      <label for="save_time">保存日期:</label>
      <input type="date" name="save_time" id='save_time'
        value="<?php  echo $save_time ?>"/>
      <br><br>
      <label for="vendor">廠商:</label>
      <input type="text" name="vendor" id='vendor'
        value="<?php  echo $vendor ?>"/>
      <br><br>
      <label for="vphone">廠商電話:</label>
      <input type="text" name="vphone" id='vphone'
        value="<?php  echo $vphone ?>"/>
      <br><br>

      <label for="unit_price">單位價錢(公斤):</label>
      <input type="number" name="unit_price" id='unit_price'
        value="<?php  echo $unit_price ?>"/>
      <br><br>
      <label for="date">補貨日期:</label>
      <input type="date" name="date" id='date'
        value="<?php  echo $time ?>"/>
      <br><br>
      <div style="color:red" ><?php echo $error ?></div>

      <div>
        <input type="submit" name="send" value="送出" />
        <input type="submit" name="backpage" value="上一頁" />
        <!---<input type="submit" name="homepage" value="管理者頁面" />
        --->
      </div>
    </form>

  </body>
</html>
