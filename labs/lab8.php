<html>
<head>
    <title>
        Activity-
    </title>
</head>
<body>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <table style="background-color:pink;margin:auto;" border=0>
        <thead align="center"><tr><td colspan="2">Sorting information in different ways</td></tr></thead>
        <tr><td colspan=2><hr/></td></tr>
        <tr><td align=right><input type=radio name="sortby" value="byname"></td><td>Sort by name in ascending order </td></tr>
        <tr><td align=right><input type=radio name="sortby" value="byemail"></td><td>Sort by email in descending order </td></tr>
        <tr><td align=right><input type=radio name="sortby" value="bymajor"></td><td>Sort by major in ascending order </td></tr>
        <tr><td align=right><input type=radio name="sortby" value="bygrade"></td><td>Sort by grade in descending order </td></tr>
        <tr><td colspan=2 align="center"><input name="login" alt="Login" type="submit" value="submit"> </td></tr>

    </table>
</form>
<br/>

</body>


<?php


//foreach ($studentDataList as $index => $student){
//    $studentInfo[$index] = explode("\t", $student);
//}

if($_POST['login']){
    $file = "AllGrades-lab-query-data.txt";
    $studentsData = file_get_contents($file);

    $studentDataList = explode("\n",$studentsData);
    if($_POST['sortby'] == "byname") {
        sortByNameAscending($studentDataList);
    } else if($_POST['sortby'] == "byemail") {
        sortByEmailDescending($studentDataList);
    } else if($_POST['sortby'] == "bymajor") {
        sortByMajorAscending($studentDataList);
    } else if($_POST['sortby'] == "bygrade") {
        sortByGradeDescending($studentDataList);
    }

}
function sortByNameAscending($studentDataList){
    foreach ($studentDataList as $index => $student){
        $studentInfo[$index] = explode("\t", $student);
    }
    sort($studentInfo);
    echo "<table border=1>";
    echo "Total: ".$index." rows of students listed below. <br/>";
    echo "<tr>
            <th>Name</th>
            <th>Email</th>
            <th>Major</th>
            <th>Grade</th>
            <th>IP Address</th>
    </tr>";
    foreach ($studentInfo as $student) {
        echo "<tr>";
        foreach ($student as $info)
            echo "<td> $info </td>";
        echo "</tr>";
    }
    echo "</table>";
}
function sortByEmailDescending($studentDataList){
    foreach ($studentDataList as $index => $student){
        $studentInfo[$index] = explode("\t", $student);
    }
    swapItemLocations($studentInfo, 1,0);
    rsort($studentInfo);
    swapItemLocations($studentInfo, 0,1);
    echo "<table border=1>";
    echo "Total: ".$index." rows of students listed below. <br/>";
    echo "<tr>
            <th>Name</th>
            <th>Email</th>
            <th>Major</th>
            <th>Grade</th>
            <th>IP Address</th>
    </tr>";
    foreach ($studentInfo as $student) {
        echo "<tr>";
        foreach ($student as $info)
            echo "<td> $info </td>";
        echo "</tr>";
    }
    echo "</table>";
}
function sortByMajorAscending($studentDataList){
    foreach ($studentDataList as $index => $student){
        $studentInfo[$index] = explode("\t", $student);
    }
    swapItemLocations($studentInfo, 2,0);
    sort($studentInfo);
    swapItemLocations($studentInfo, 0,2);
    echo "<table border=1>";
    echo "Total: ".$index." rows of students listed below. <br/>";
    echo "<tr>
            <th>Name</th>
            <th>Email</th>
            <th>Major</th>
            <th>Grade</th>
            <th>IP Address</th>
    </tr>";
    foreach ($studentInfo as $student) {
        echo "<tr>";
        foreach ($student as $info)
            echo "<td> $info </td>";
        echo "</tr>";
    }
    echo "</table>";
}
function sortByGradeDescending($studentDataList){
    foreach ($studentDataList as $index => $student){
        $studentInfo[$index] = explode("\t", $student);
    }
    swapItemLocations($studentInfo, 3,0);
    rsort($studentInfo);
    swapItemLocations($studentInfo, 0,3);
    echo "<table border=1>";
    echo "Total: ".$index." rows of students listed below. <br/>";
    echo "<tr>
            <th>Name</th>
            <th>Email</th>
            <th>Major</th>
            <th>Grade</th>
            <th>IP Address</th>
    </tr>";
    foreach ($studentInfo as $student) {
        echo "<tr>";
        foreach ($student as $info)
            echo "<td> $info </td>";
        echo "</tr>";
    }
    echo "</table>";
}


function swapItemLocations(&$S, $m, $n){
    //call by (&)reference ==> changes inside the function will be kept
    //call by value ==> change values but not keep the change

    foreach ($S as $index => $person) {
        $temp = $person[$m];
        $S[$index][$m] = $person[$n];
        $S[$index][$n] = $temp;
    }

}


?>
</html>
