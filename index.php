<?php

/*ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
*/
?>
<meta charset="UTF-8">
<h1>Мой первый сайт на PHP</h1>
<div style="border: 2px solid black;">
<?php

$name = "Вася";

echo "<b>Привет, ".$name." !</b>"; // вывод переменной под спец задачи
// Однострочный комментарий
/* Многострочный комментарий */ 
echo "<br>Привет $name!</br>"; //переменная отображается правильно 
echo '<br>Привет $name!</br>'; // переменная съедается

?>
</div>
<div style="border: 2px solid black; margin-top: 10px">
  <?php
    $bananas = 5;
    $apples = 10;
    $fruitsTotal = $bananas + $apples; 
    echo "$name съел $fruitsTotal фруктов";
    echo "<br>";
    define("PI", 3.14);
    $radius = 10;
    $square = PI * ($radius**2);
    echo $square;
    echo "<br>";
    
    $stringNumber = "500";
    $number = (integer)$stringNumber;
    echo $number + $number;
     echo "<br>";
    
    $number = 3.49;
    echo ceil($number)."<br>";
    echo round($number)."<br>";
    echo floor($number)."<br>";
    echo rand(10, 100);
    echo "<br>";
    echo "<br>";
    
    $string = "Привет, ";
    $string .= "Вася!";
    echo $string."<br>";
  ?>
  </div>
  <div style="border: 2px solid black; margin-top: 10px">
  <?php
    $a = 9;
    if ($a > 0 and $a<= 10) {
      echo true;
    } else {
      echo "false";
    }
      
      echo "<br>";
      
      $food = "carrot";
     /* if ($food == "apple") {
        echo $food."- фрукт";
      } else if($food == "cucumber") {
        echo $food." - овощ";
      }  else {
        echo $food." - не съедобно";
      }*/
      
      switch ($food) {
        case "apple":
        case "cucumber":
          echo $food." - фрукт";
          break;
        case "carrot":
        case "tomato":
          echo $food." - овощь";
          break;
        default:
          echo $food." - не съедобен";
      }
    
  ?>
</div>
<h2>Цыклы</h2>
<!--<div style = "border: 2px solid black; margin-top:10px">-->
<?php
 /*   for ($i = 0; $i <= 10; $i++) {
      echo $i."|";
    }
    echo "<br>";
    $count = 0;
    while ($count < 5) {
      echo "<p>Счетчик: $count</p>";
      $count++;
    }
    echo "<br>";
    do {
      echo "<p><b>Do счетчик: $count</b></p>";
    } while ($count > 10);
 
  $cars = ['Лексус', "Ламборджини", "БМВ", "Феррари", "Лада седан"];
  for ($i = 0; $i < count($cars) - 1;$i++) {
    echo $cars[$i].", ";
  }
  echo $cars[count($cars)-1];
   echo "<br>";
   
   foreach ($cars as $car) {
     echo $car.", ";
   }*/
   
  /* $family = array(
     "Папа" => "Вася",
     "Мама" => "Света",
     "Сын" => "Дима",
     "Дочь" => "Варвара",
     "Кошка" => "Катюха",
     "Попугай" => "Понч",
   );
     echo "<br>";
     echo $family["Кошка"]."<br>";*/
     //echo var_dump($family); //array  var_dump - чтобы показать массив
   
   /*echo "<table>";
   echo "<tr><th>Ключ</th><th>Значение</th></tr>";
   
   foreach($family as $key => $name) {
    echo "<tr><td>$key</td><td>$name</td></tr>";
     
   }
    echo "</table>";*/
  ?>
<!--</div>-->

<div style="display: flex; justify-content: center; border: 3px solid black; margin: 35px 0; padding: 15px;">
 <table border="1">
   <?php
  for ($i = 1; $i < 10;$i++) {
    echo "<tr>";
    for ($j = 1; $j < 10;$j++) {
    $multiply = $i*$j;
    echo "<td>$j * $i = $multiply</td>";
    }
    echo "</tr>";
  }
  ?>
 </table>
</div>
<div style="display: flex; justify-content: center; border: 3px solid black; margin: 35px 0; padding: 15px;">
  <?php
   $vasyapetrov = array("name" => "Вася", "lastname" => "Петров");
    function getUserName($user = array("name" => "Иван", "lastname" => "Иванов")) {
      return $user["name"];
    }
    echo getUserName($vasyapetrov);
    echo "</br>";
    echo "</br>";
    $text = "sometext";
    function showText() {
      global $text;
      $text .= " anothertext";
    }
    showText();
    echo $text;
    echo "<br>";
    
    function func() {
     static $count = 0; // закрепляет значение переменной, объвляя ее всего один раз
      $count++;
      echo $count.'<br>';
      if($count < 10) {
        func();
      }
    }
    func();
  ?>
</div>
<h2>Работа со строками в PHP</h2>
<div >
  <?php
    $string = "съешь еще этих мягких французких булок";
    echo strlen($string)."<br>"; // так как русские символы они занимают 2 байта, поэтому блинна 71
    echo mb_strlen($string)."<br>"; // для правильного обображения русских символов
    $striposString = mb_stripos($string, "еще");
    echo $striposString."<br>";
    $stristrString = mb_stristr($string, "мягких");
    echo $stristrString."<br>";
    
    echo mb_substr($string, 6, 8)."<br>";
    echo mb_substr($string, -5, 3)."<br>";
    echo mb_substr($string, 6, -5)."<br>";
    echo mb_substr($string, -17, -5)."<br>";
    
    $string2 = "hello my name is kermit the frog";
    echo ucfirst($string2)."<br>";
    echo ucwords($string2)."<br>";
    echo strtolower($string2)."<br>";
    echo strtoupper($string2)."<br>";
    
    
    $username = "         VasyaPetrov      ";
    echo "/".$username."/"."<br>";
    $username = trim($username);
    echo "/".$username."/"."<br>";
    echo "<br>";
    
    
    $mass = explode(" ", $string);
    //echo var_dump($mass);
    echo implode(", ", $mass);
    
  ?>
</div>
<hr>
<div>
<h2>Работа с массивами</h2>
  <?php
  $cars = ['Лексус', "Ламборджини", "БМВ", "Феррари", "Лада седан"];
  //array_push($cars, "Копейка", "Запорожец");
  $cars[] = "Копейка";
  echo var_dump($cars)."<br>";
  
  $lastCar = array_pop($cars);
  echo var_dump($cars)."<br>";
  echo $lastCar."<br>";
  
  $firstCar = array_shift($cars);
  echo var_dump($cars)."<br>";
  echo $firstCar."<br>";
  
  array_unshift($cars, "Тойота");
  echo var_dump($cars)."<br>";
  ?>
</div>
<div >
  <?php
    $cmsList = ["Wordpress", "Joomla", "1C-Bitrix", "Moodle", "OpenCart"];// content manedgment system
    $sliceList = array_slice($cmsList, 2, 2); //($cmsList, 2, 2, true);true сохраняет ключ
    echo var_dump($sliceList);
    echo "<br>";
    echo "<br>";
    
    $cmsList = ["Wordpress", "Joomla", "1C-Bitrix", "Moodle", "OpenCart"];
    $deletedCms = array_splice($cmsList, 2, 2, ["Drupal", "ModX"]);
    echo var_dump($cmsList)."<br>";
    echo var_dump($deletedCms);
    
    
  /*function getUserName($user = array("name" => "Иван", "lastname" => "Иванов")){
    return $user["name"];
  }*/ // если объявит функию с пустым значением, то значение примет по умолчанию  array("name" => "Иван", "lastname" => "Иванов")
  echo getUserName();
  echo "<br>";
  echo "<br>";
  
  
  $cmsList = ["Wordpress", "Joomla", "1C-Bitrix", "Moodle", "OpenCart"];
  $reverseCmsList = array_reverse($cmsList);
  echo var_dump($reverseCmsList);
  echo "<br>";
  echo "<br>";
  
  
   $cmsList = ["Wordpress", "Joomla", "1C-Bitrix", "Moodle", "OpenCart"];
    sort($cmsList);
    echo var_dump($cmsList);
    echo "<br>";
    echo "<br>";
    $cars = ['Лексус', "Ламборджини", "БМВ", "Феррари", "Лада седан"];
    sort($cars);
    echo var_dump($cars);
    echo "<br>";
    echo "<br>";
    
    $hasLada = in_array("Лада седан", $cars);
    echo var_dump($hasLada);
  ?>
</div>

<hr>
