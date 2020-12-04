<?php

  include_once ("dbtools.inc.php");
  $database = 'beverage store storage system';
  $sql = "SELECT * FROM warehouse where item='" . $_GET["item"]. "'";

  $link = create_connection();
  $dbresult = execute_query($database, $sql, $link);
  $row = mysqli_fetch_array($dbresult);
  if($_POST['choose'] == 1){
    $quantity = $row["Quantity"] + $_POST["quantity"];
  }else{
    $quantity = $row["Quantity"] - $_POST["quantity"];
  }

  $sql = "UPDATE warehouse SET Quantity=$quantity WHERE Item='"
  . $_GET['item'] . "'";

  $times = date("Y/m/d");
  $item = $_GET['item'];
  $id = $_COOKIE['id'];

  if($_POST['choose'] == 1)
    $change = $_POST['quantity'];
  else
    $change = $_POST['quantity'] * -1;

  $sql2 = "INSERT INTO manage " .
    "(Purchase_time, Inventory_man_id, Item, Quantity)" .
    "VALUES ('$times', '$id', '$item', '$change')";
    //echo $sql2;

  execute_query($database, $sql, $link);
  execute_query($database, $sql2, $link);
  free($dbresult, $link);
  header('Location:倉庫狀況.php');
  exit;

 ?>
