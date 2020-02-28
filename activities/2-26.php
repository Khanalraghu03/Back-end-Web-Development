<?php
//sort : highest to lowest

/*Sorting using PHP*/
$numbers = array(18,4,-12,3,100,-29,17);
echo "Sorting accendingly<br/>";
sort($numbers);
displayArray($numbers);

function displayArray($A){
    foreach ($A as $a) {
        echo $a. "\t";
    }
    echo "<br/>";
}
echo "<hr/>";

echo "Sort descending<br/>";
rsort($numbers);
displayArray($numbers);

echo "<hr/>";
$People = array("Peter" => 35, "Ben" => 27, "Joe" => 18, "Kelly" => 46);
echo "Sort in ascending order for associative array by values<br/>";

asort($People);
displayAssociative($People);

function displayAssociative($P){
    foreach ($P as $key => $value) {
        echo $key . " => ".$value."<br/>";
    }
    echo "<br/>";
}
echo "<hr/>";
echo "Sorting in ascending order for associative array by keys<br/>";
ksort($People);
displayAssociative($People);

?>

<?php
$Students = array(
    array("Mike", 22, "Male", 75),
    array("Jason", 18, "Male", 55),
    array("Jenny", 25, "Female", 95),
    array("Megan", 18, "Female", 85),
    array("Top", 34, "Male", 75),
    array("Lily", 21, "Female", 75),
    array("Alex", 18, "Male", 88),
    array("Amy", 18, "Female", 75),
);
echo "<hr/>";
echo "not sorted data<br/>";
display2D($Students);

function display2D($S) {
    echo "<table border='1' cellpadding='10px' style='border-collapse: collapse; background-color: aqua'>";
        echo "<tr>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Grade</th>
        </tr>";
        foreach ($S as $s) {
            echo "<tr>";
            foreach ($s as $info) {
                echo "<td>$info</td>";
            }
            echo "</tr>";
        }


    echo "</table>";
}
echo "<hr/>";
echo "Sorted in ascending order by names<br/>";
sort($Students);
display2D($Students);


echo "<hr/>";
echo "Sorted in ascending order by ages<br/>";
swapItemLocations($Students, 0, 1);
sort($Students);
swapItemLocations($Students, 1, 0);
display2D($Students);

echo "<hr/>";
echo "Sorted in descending order by ages<br/>";
swapItemLocations($Students, 0, 1);
rsort($Students);
swapItemLocations($Students, 1, 0);
display2D($Students);

function swapItemLocations(&$S, $m, $n){
    //call by (&)reference ==> changes inside the function will be kept
    //call by value ==> change values but not keep the change

    foreach ($S as $index => $person) {
        $temp = $person[$m];
        $S[$index][$m] = $person[$n];
        $S[$index][$n] = $temp;
    }

}

echo "<hr/>";
echo "Sorted in descending order by grades<br/>";
swapItemLocations($Students, 0, 3);
rsort($Students);
swapItemLocations($Students, 3, 0);
display2D($Students);

echo "<hr/>";
echo "Sorting by grade if the age is the same<br/>";
swapItemLocations($Students, 0, 1);
swapItemLocations($Students, 1, 3);
sort($Students);
swapItemLocations($Students, 3, 1);
swapItemLocations($Students, 1, 0);
display2D($Students);

?>
