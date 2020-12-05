<?php

include_once ('dbtools.inc.php');

$database = 'beverage store storage system';
$sql = "DELETE  FROM manage WHERE Item='" . $_GET['item'] . "'";
$sql2 = "DELETE  FROM warehouse WHERE Item='" . $_GET['item'] . "'";
echo $sql . '<br>';
echo $sql2;
$link = create_connection();
execute_query($database, $sql, $link);
execute_query($database, $sql2, $link);
free("", $link);
header("Location: 倉庫狀況.php");
exit();
 ?>
