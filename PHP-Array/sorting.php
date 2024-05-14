<?php
// Sorting array secara ascending
$cars = array("Volvo", "BMW", "Toyota");
sort($cars);

$arrlength = count($cars);

echo "Sort: Ascending <br><br>";
for($x = 0; $x < $arrlength; $x++) {
  echo $cars[$x];
  echo "<br>";
}

// Sorting array asosiatif berdasarkan kunci secara ascending
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
ksort($age);

echo "<br>Ksort: Associative (Key) <br><br>";
foreach($age as $x => $x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>";
}

// Sorting array asosiatif berdasarkan nilai secara ascending
asort($age);

echo "<br>Asort: Associative (Value) <br><br>";
foreach($age as $x => $x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>";
}

// Sorting array secara descending
rsort($cars);

$arrlength = count($cars);

echo "<br>Sort: Descending <br><br>";
for($x = 0; $x < $arrlength; $x++) {
  echo $cars[$x];
  echo "<br>";
}

// Sorting array asosiatif berdasarkan kunci secara descending
krsort($age);

echo "<br>Krsort: Associative (Key) <br><br>";
foreach($age as $x => $x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>";
}

// Sorting array asosiatif berdasarkan nilai secara descending
arsort($age);

echo "<br>Arsort: Associative (Value) <br><br>";
foreach($age as $x => $x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>";
}
?>
