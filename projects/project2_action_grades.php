<?php
$admin_id = $admin_passwd = $stu_name = "";

function validateUserInput($input) {
    $input = trim($input);
    $input = htmlspecialchars($input);
    return $input;
}

if($_POST['submitme']) {

    $admin_id = validateUserInput($_POST['name']);
    $admin_passwd = validateUserInput($_POST['passwd']);
    $stu_name = validateUserInput($_POST['student']);

    if ($admin_id == "admin" && $admin_passwd == "admin") {
        $file = file_get_contents("St-gr-in.txt");
        $student_list = explode("\n", $file);
        foreach ($student_list as $index => $student) {
            $studentInfo[$index] = explode("\t", $student); //the result is a 2-D array
        }

        $searchBy = $_POST['showwhat'];

        //Show grades depending on this condition
        if ($searchBy == "all") {
            showGrades($studentInfo);
        } else if ($searchBy == "sorted") {
            showGradesSorted($studentInfo);

        } else if ($searchBy == "p100") {
            showGrades100($studentInfo);

        } else if ($searchBy == "dm0") {
            showGradesZeroAndDM($studentInfo);
        } else if ($searchBy == "byname") {
            showGradesByName($studentInfo, $stu_name);
        }
    } else {
        echo "No authorization to see grades";
    }
}

?>

<?php
    function swapItemLocations(&$S, $m, $n){
        foreach ($S as $index => $person) {
            $temp = $person[$m];
            $S[$index][$m] = $person[$n];
            $S[$index][$n] = $temp;
        }

    }

    function getTitle(){
        echo "<tr style='background-color: peru'>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Major</th>
                    <th>Grade</th>
                    <th>IP Address</th>
                </tr>";
    }

    function allGrades($studentInfo){
        $nFound = 0;
        foreach ($studentInfo as $index => $student) {
            $nFound++;
            echo "<tr style='background-color: antiquewhite'>";
            echo "<td>$index</td>";
            foreach ($student as $stu_info){
                echo "<td> $stu_info </td>";
            }
            echo "</tr>";
        }
        echo "There are ".$nFound." students shown below: <br/><br/>";
    }

    function descendGrades($studentInfo) {
        swapItemLocations($studentInfo, 3,0);
        rsort($studentInfo);
        swapItemLocations($studentInfo, 0,3);

        allGrades($studentInfo);
    }

    function grades100($studentInfo){
        $nFound=0;
        foreach ($studentInfo as $index => $student) {
            if($student[3] == "100") {
                $nFound++;
                echo "<tr style='background-color: antiquewhite'>";
                echo "<td>$index</td>";
                foreach ($student as $stu_info) {
                    echo "<td>$stu_info</td>";
                }
                echo "</tr>";
            }

        }
        echo "There are ".$nFound." students shown below: <br/><br/>";
    }

    function gradesZeroAndDM($studentInfo){
        $nFound = 0;
        foreach ($studentInfo as $index => $student) {
            if($student[3] == "0" && $student[2] = "Digital Media") {
                $nFound++;
                echo "<tr style='background-color: antiquewhite'>";
                echo "<td>$index</td>";
                foreach ($student as $stu_info) {
                    echo "<td>$stu_info</td>";
                }
                echo "</tr>";
            }

        }
        echo "There are ".$nFound." students shown below: <br/><br/>";
    }

    function gradesByName($studentInfo, $stu_name){
        $nFound = 0;
        foreach ($studentInfo as $index => $student) {
            if($student[0] == $stu_name) {
                $nFound++;
                echo "<tr style='background-color: antiquewhite'>";
                echo "<td>$index</td>";
                foreach ($student as $stu_info) {
                    echo "<td>$stu_info</td>";
                }
                echo "</tr>";
            }

        }
        echo "The name ".$stu_name." is found ".$nFound." times: <br/>";
    }


    function showGrades($studentInfo) {
        echo "The grade for each student is shown as follows. <br/><br/>";
        echo "<table style='border-collapse: collapse' border='1'>";
        getTitle();
        allGrades($studentInfo);
        echo "</table>";
    }

    function showGradesSorted($studentInfo){
        echo "The grades sorted descendly for all students are shown as follows. <br/><br/>";
        echo "<table style='border-collapse: collapse' border='1'>";
        getTitle();
        descendGrades($studentInfo);
        echo "</table>";

    }

    function showGrades100($studentInfo) {
        echo "The students who got 100 points. <br/><br/>";
        echo "<table style='border-collapse: collapse' border='1'>";
        getTitle();
        grades100($studentInfo);
        echo "</table>";

    }

    function showGradesZeroAndDM($studentInfo) {
        echo "The Digital Media students who got 0 points. <br/><br/>";
        echo "<table style='border-collapse: collapse' border='1'>";
        getTitle();
        gradesZeroAndDM($studentInfo);
        echo "</table>";
    }

    function showGradesByName($studentInfo, $stu_name) {
        echo "The info for students whose name is: ".$stu_name. ".<br/><br/>";
        echo "<table cellpadding='5px' style='border-collapse: collapse' border='1'>";
        getTitle();
        gradesByName($studentInfo,$stu_name);
        echo "</table>";
    }

?>
