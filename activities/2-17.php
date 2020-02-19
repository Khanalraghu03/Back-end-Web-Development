<?php
$cars = array("BMW", "Toyota", "Volvo", 123);
echo "My car will be a " .$cars[0]. " once I graduate. <br/>";
$cars[4] = "Ford";

echo "<hr/>";

$friends[0] = "Mike";
$friends[1] = "Jeff";
$friends[2] = "Kate";
$friends[3] = "Jenny";
$friends[4] = "Josh";
$friends[10] = "April";

for($i=0;$i<count($friends);$i++){
    echo "Friend No. ".($i + 1). " is " . $friends[$i]. "<br/>";
}
echo "<hr/>";

foreach ($friends as $friend) {
    echo "Friend name is " .$friend. "<br/>";
}

echo "<hr/>";

$SID["Mike"] = "123456";
$SID["Jack"] = "987654";
$SID["Steve"] = "765432";

foreach ($SID as $name=>$id) {
    echo $name."'s id is: ".$id."<br/>";
}

echo "<hr/>";
$salary = array("Mike" => 5000,
                "Jason" => 370,
                "Phillip" => 4300,
                "Jacob" => 6100,
                "Zac" => 2100,
                "Jenny" => 6300,
                "Mathew" => 3088,
                "Tyler" => 2900,
                "Tracy" => 5103,
                "Joseph" => 1902,
                "Jolly" => 6100);

foreach ($salary as $name => $value) {
    echo "The salary of " .$name. " is: " .$value. "<br/>";
}

$total = 0;
foreach ($salary as $name => $value) {
    $total += $value;
}
echo "The total salary of all the employees is: " .$total. "<br/>";

$maxSalary = 0;
$highestPaidEmployee = "";
foreach ($salary as $name => $value) {
     if($value > $maxSalary)  {
         $maxSalary = $value;
        $highestPaidEmployee = $name;
    }
}
echo "The highest paid employee is: " .$highestPaidEmployee. " and is paid: ".$maxSalary."<br/>";

$minSalary = 99999;
$lowestPaidEmployee = "";
foreach ($salary as $name => $value) {
    if($value < $minSalary)  {
        $minSalary = $value;
        $lowestPaidEmployee = $name;
    }
}
echo "The lowest paid employee is: " .$lowestPaidEmployee. " and is paid: ".$minSalary."<br/>";



$secondMaxSalary = 0;
$secondHighestPaidEmployee = "";
foreach ($salary as $name => $value) {
    if($value > $secondMaxSalary)  {
        if($value < $maxSalary) {
            $secondMaxSalary = $value;
            $secondHighestPaidEmployee = $name;
        }
    }
}
//echo "The second highest paid employee is: " .$secondHighestPaidEmployee. " and is paid: ".$secondMaxSalary."<br/>";

foreach ($salary as $name => $value) {
    if($value == $secondMaxSalary) {
        echo "The second highest paid employee is: " .$name. " and is paid: ".$value."<br/>";
    }
}


?>