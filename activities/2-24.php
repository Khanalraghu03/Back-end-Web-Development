<?php
// http://drlai.altervista.org/ITEC4450/Spring2020-01/Students-Grades-Info.txt

$file = "St-gr-in.txt";
$studentsContent = file_get_contents($file);
//save everything from the file to a array seperated by new line
$studentList = explode("\n",$studentsContent);

foreach ($studentList as $index => $student) {
    $studentInfo[$index] = explode("\t", $student); //the result is a 2-D array
}
//display the 2D information
echo "<table border=1>";
echo "<tr>
            <th>Name</th>
            <th>Email</th>
            <th>Major</th>
            <th>Grade</th>
            <th>IP Address</th>
    </tr>";
foreach ($studentInfo as $student) {
    echo "<tr>";
//    echo "<td> ($index + 1) </td>";
    foreach ($student as $info)
        echo "<td> $info </td>";
    echo "</tr>";
}

echo "</table>";
echo "Totally ".$index." rows. <br/>";

$major = "Security";
$nFound = 0;
foreach ($studentInfo as $student) {
    if($major == $student[2]) {
        $nFound++;
    }
}
echo "There are " .$nFound. " students taking " . $major." Major. <br/>";

echo "<hr/>";
$major = "Digital Media";
$nFound = 0;
echo "Find all students of ".$major." major and have scored 100 <br/>";

echo "<table border=1>";
echo "<tr>
            <th>Name</th>
            <th>Email</th>
            <th>Major</th>
            <th>Grade</th>
            <th>IP Address</th>
    </tr>";
foreach ($studentInfo as $student) {
    if($major == $student[2] && 100 == $student[3]) {
        $nFound++;
        echo "<tr>";
            foreach ($student as $info) {
                echo "<td>$info</td>";
            }

        echo "</tr>";
    }
}

echo "</table>";
echo "There are " .$nFound. " students taking " . $major." Major. <br/>";

echo "<hr/>";
$AllMajor = array("Digital Media", "Security", "Software", "Business", "Other");
$TotalStudents = array(0,0,0,0,0);
foreach ($studentInfo as $student) {
    foreach ($AllMajor as $index => $major) {
        if($major == $student[2]) {
            $TotalStudents[$index]++;
        }
    }
}
echo "<table cellpadding='10px' border='2'>";
echo "<tr>
            <th>Major</th>
            <th>Total Students</th>
            <th>Bar</th>
            <th>Percentage</th>
            
    </tr>";
foreach ($AllMajor as $index => $major) {
    $percentage = number_format($TotalStudents[$index]/count($studentInfo)*100,2);
    echo "<tr>";
        echo "<td>$major</td>";
        echo "<td>$TotalStudents[$index]</td>";
        echo "<td><progress value=".$percentage." max='100'></progress></td>";
        echo "<td style='text-align: right'>".$percentage."%</td>";
    echo "</tr>";
}

echo "</table>";


?>