<?php

  $item = "";

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body style="background-color:powderblue;">
    <h1 style="text-align:center">庫存修正</h1>
    <hr SIZE=5  ALIGN=LEFT NOSHADE color="#8E8E8E"><!---noshade无阴影的设定，为实心线段--->
    <br><br><br>
    <form style="font-size: 30px;text-align:center" method="post"
    action=<?php echo "庫存修改執行.php?item=" . $_GET['item'];?>>
      <label for="item">品項:<?php echo $_GET['item']; ?></label>
      &nbsp;
      <input type="radio" name="choose" id="buy" value="1" checked/>
      <label for="buy">增加</label>
      <input type="radio" name="choose" id="sell" value="-1"/>
      <label for="sell">減少</label>
      <br><br>
      <label for="quantity">數量:</label>
      <input type="number" name="quantity" id="quantity"></input>
      <input type="submit" value="送出"/>
    </form>
    <br><br>
    <div  style="text-align:center">
      <a href="倉庫狀況.php" ><font size="5px">上一頁</font size></a>
    </div>
  </body>
</html>
