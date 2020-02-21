<?php

$students = array(
    array("Mike", 22, "Male"),
    array("Jason", 18, "Male"),
    array("Jenny",25, "Female"),
    array("Megan",18, "Female")
);

//display all information of the array
for($row=0;$row<count($students);$row++) {
    echo "<p>The student #" . ($row + 1) . ": <br/></p>";
    echo "<ul>";
    for ($col = 0; $col < count($students[$row]); $col++) {
        echo "<li>" . $students[$row][$col] . "</li>";
    }
    echo "</ul>";
}
echo "<hr/>";

//foreach loop
foreach($students as $index => $person) {
    echo "<p>The student #" . ($index + 1) . ": <br/></p>";
    echo "<ul>";
    foreach ($person as $value) {
        echo "<li>" . $value . "</li>";
    }
    echo "</ul>";
}
echo "<hr/>";

//table
echo "<div style=' padding: 10px;'>";
echo "<table border='2' style='border-collapse: collapse; font-size: 18px; text-align: center; margin: auto; background-color: peru;'>";
echo "<tr>";
echo "<th> Name </th>";
echo "<th> Age </th>";
echo "<th> Gender </th>";
echo "</tr>";
foreach($students as $index => $person) {
    echo "<tr>";
    foreach ($person as $value) {

        echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
echo "</div>";

echo "<hr/>";

$name = "Jenny";
foreach ($students as $person) {
    if($name == $person[0]) {
        echo "Name: ".$person[0]." Age: ".$person[1]." Gender: ".$person[2]."<br/>";
    }
}
echo "<hr/>";

$students[5] = array("Jason", 26, "Male");
$name = "Jason";
$found = 0;
foreach ($students as $person) {

    if($name == $person[0]) {
        $found++;
        echo "Name: ".$person[0]." Age: ".$person[1]." Gender: ".$person[2]."<br/>";
    }
}
echo "In total there are " .$found. " students with the name Jason. <br/>";
echo "<hr/>";

//finding the youngest person
$youngestAge = 99999;
foreach ($students as $person) {
    if($youngestAge > $person[1]) {
        $youngestAge = $person[1];
    }

}

$found = 0;
echo "The age of the youngest student is: " .$youngestAge."<br/>";
foreach ($students as $person) {
    if($youngestAge == $person[1]) {
        $found++;
        echo "The youngest student name is: " .$person[0]. " and the gender is: ".$person[2]."<br/>";
    }
}
echo "There are ".$found." youngest student <br/>";
echo "<hr/>";



//finding the youngest person
$oldestAge = 0;
foreach ($students as $person) {
    if($oldestAge < $person[1]) {
        $oldestAge = $person[1];
    }

}

$students[8] = array("Josh",26,"Male");
$students[10] = array("Kobe",26,"Male");

$found = 0;
echo "The age of the oldest student is: " .$oldestAge."<br/>";
foreach ($students as $person) {
    if($oldestAge == $person[1]) {
        $found++;
        echo "The oldest student name is: " .$person[0]. " and the gender is: ".$person[2]."<br/>";
    }
}
echo "There are ".$found." oldest student <br/>";
echo "<hr/>";

//Find the average age of all the students
// ==> add all the age of the student and divide by the number of the student
$totalStudents = 0;
$totalAge= 0;
foreach($students as $person) {
    $totalStudents++;
    $totalAge += $person[1];
}
$averageAge = $totalAge/$totalStudents;
echo "The average age of the total students is: " . $averageAge;
echo "<hr/>";

?>
