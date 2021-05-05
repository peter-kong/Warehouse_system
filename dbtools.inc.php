<?php
  function create_connection(){
    $link = mysqli_connect("localhost", "peter", "zxc123") or
      die("無法連接資料庫<br><br>" . mysqli_error());
    //mysql_query("SET NAMES utf8");
    return $link;
  }

  function execute_query($database, $sql, $link){
    $db_selected = mysqli_select_db($link, $database) or
      die("開啟資料庫失敗" . mysqli_error());

    $result = mysqli_query($link, $sql);
    return $result;
  }

  function free($result, $link){
    if($result)
      mysqli_free_result($result);
    if($link)
      mysqli_close($link);
  }

  function error_handle($db){
    echo "錯誤代碼: " . mysqli_erron($db) . '<br/>';
    echo "錯誤訊息: " . mysqli_error($db) . '<br/>';
  }

 ?>
