<?php
    include_once ('dbh.inc.php');
    include_once ('user.inc.php');
    include_once ("dbtools.inc.php");

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>My first PHP</title>
  </head>
  <body>
      <form method="post" action="handler.php">
      <?php
          class Employee{
              public $name;
              function __construct($Str){
                  $this->name = $Str;
                  echo 'set name: ' . $this->name . '<br>';
              }

              public function ShowName(){
                echo 'this employee name is: ' . $this->name . '<br>';
              }

              protected function tochild(){
                  return $this->name;
              }

              function __destruct(){
                  $this->name = NULL;
                  echo 'this obj is clear.' . '<br>';
              }

          }

          class otheremployee extends Employee{

            public $name;

            function __construct($Str){
              $this->name = $Str;
              echo 'child __construct set: ' . $this->name . '<br>';
            }

            public function callparentname(){
                parent::ShowName();
            }


          }

          class MyMath{
            public static function Cubies($X){
                return $X * $X * $X;
            }
          }

          class Circle{
            const PI = 3.14;
            public $radius;
            public function ShowArea(){
              echo 'Area is: ' . ($this->radius* $this->radius* self::PI) . '<br>';
            }
          }


          $database = 'xmldb';
          $sql = "SELECT * FROM score_data";
          $link = create_connection();
          $result = execute_query($database, $sql, $link);
          $num = mysqli_num_rows($result);

          mysqli_close($link);

          $mysqli = new mysqli('localhost', 'peter', 'zxc123');
          $mysqli->select_db('xmldb');
          $result = $mysqli->query($sql);

          while ($row = $result->fetch_assoc()) {
            echo $row['student_id'] . "<br>";
          }

          $mysqli->close();
      ?>

      <!---/<table border="3">
        <thead>
          <tr>
              <th>student_id</th>
              <th>xml_score</th>
              <th>data_structure_score</th>
              <th>algorithm_score</th>
              <th>network_score</th>
          </tr>
        </thead>

        <tbody>
        <?php
          while($row = mysqli_fetch_row($result)){
            echo "<tr>";
            for($j = 0;$j < 5;$j++)
              echo "<td>" . $row[$j] . "</td>";
          }
          echo "</tr>";
          mysqli_close($link);

         ?>
        </tbody>
      </table>--->


  </body>
</html>
