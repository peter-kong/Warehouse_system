<?php

  include('dbtools.inc.php');
  $link = create_connection();
  $database = 'beverage store storage system';
//  $sql3 = "DELETE FROM check_transaction WHERE Checkout_man_id='" . $_GET['id'] . "'";
  $sql2 = "DELETE  FROM manage WHERE Inventory_man_id='" . $_GET['id'] . "'";
  $sql = "DELETE  FROM people WHERE Pid='" . $_GET['id'] . "'";
//  execute_query($database, $sql3, $link);
  execute_query($database, $sql2, $link);
  execute_query($database, $sql, $link);
  free("", $link);
  header("Location: 人員資料.php");
  exit();
  //echo $sql;
 ?>
