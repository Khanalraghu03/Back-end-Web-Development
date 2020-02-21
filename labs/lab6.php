<html>
<head>
    <style>
        .required {
            color: red;
        }
    </style>
</head>
<body>

<?php
$name = $month = $day = $year = "";
$nameMSG = "";

function validateInput($input) {
    $input = trim($input);
    $input = htmlspecialchars($input);
    return $input;
}

if($_POST['submit']) {
    $name = validateInput($_POST['name']);
    $day = validateInput($_POST['day']);
    $year = validateInput($_POST['year']);


    if (empty($name)) {
        $nameMSG = "Missing";
    }

    if($_POST['month'] == "January") {
        $month = "01";
    } else if($_POST['month'] == "February") {
        $month = "02";
    } else if($_POST['month'] == "March") {
        $month = "03";
    } else if($_POST['month'] == "April") {
        $month = "04";
    } else if($_POST['month'] == "May") {
        $month = "05";
    } else if($_POST['month'] == "June") {
        $month = "06";
    } else if($_POST['month'] == "July") {
        $month = "07";
    } else if($_POST['month'] == "August") {
        $month = "08";
    } else if($_POST['month'] == "September") {
        $month = "09";
    } else if($_POST['month'] == "October") {
        $month = "10";
    } else if($_POST['month'] == "November") {
        $month = "11";
    } else if($_POST['month'] == "December") {
        $month = "12";
    } else {
        $month = "";
    }



    $birthDate = $month."/".$day."/".$year;

    //days left till next birthday
    $daysUntilBirthday = ceil((mktime(0,0,0,$month,$day,date("Y"))-time())/(60*60*24));
    if($daysUntilBirthday < 0) {
        $daysUntilBirthday += 360;
    }

    //finding age
    $birthDateArray = explode("/", $birthDate);
    $age = (date("md", date("U", mktime(0, 0, 0, $birthDateArray[0], $birthDateArray[1], $birthDateArray[2]))) > date("md")
        ? ((date("Y") - $birthDateArray[2]) -1)
        : (date("Y") - $birthDateArray[2]));
}

?>

    <p class="required">* required field</p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        Your name please: <input type="text" name="name"> <span class="required">* <?php echo $nameMSG?></span> <br/><br/>
        Select the month of your birthday: <select name="month" id="month" >
            <option  value="January" >January</option>
            <option  value="February" >February</option>
            <option  value="March" >March</option>
            <option  value="April" >April</option>
            <option  value="May" >May</option>
            <option  value="June" >June</option>
            <option  value="July" >July</option>
            <option  value="August" >August</option>
            <option  value="September" >September</option>
            <option  value="October" >October</option>
            <option  value="November" >November</option>
            <option  value="December" >December</option>
        </select> <br/> <br/>
        Specify the date(day) of your birthday: <input type="text" name="day"> <br/> <br/>
        Specify the year you were born: <input type="text" name="year"> <br/> <br/>
        <input type="submit" value="Submit" name="submit">
    </form>
    <hr/>

    <?php
        createCalender($_POST['month'],$day,$year);

        if($_POST['submit']) {

            if(!empty($name)) {
                echo "<hr/>";
                echo "Your birthday is: " . $birthDate  . "<br/>"; //convert month into number/ day/year
                echo "You are " .$age." years old. <br/>";
                echo "There are " . $daysUntilBirthday. " days until your upcoming birthday <br/>";

                echo "<hr/>";
            }
        }

    ?>

    <?php

    function createCalender($month, $day, $year)
    {
        $d0 = strtotime($month." ".$day. " ". $year);
        $daysOfMonth = "01";
        $str = date("m",$d0)."/".$daysOfMonth."/".date("Y",$d0);
        $d1 = strtotime($str);
        echo "Calender for ".date("M \of Y",$d1)."<br/>";
        echo "<table border=1>";
        echo "<tr>
                <td>Su</td>
                <td>Mo</td>
                <td>Tu</td>
                <td>We</td>
                <td>Th</td>
                <td>Fr</td>
                <td>Sa</td>
              </tr>";


        $startDay = date("w",$d1);
        echo "<tr>";
        for($i = 0; $i < $startDay; $i++){
            echo "<td>&nbsp;</td>";
        }
        $ndays = date("t",$d1); //total number of days in a month
        for($i=0;$i<$ndays;$i++) {
            if(date("d",$d1) == $day) {
                echo "<td style='background-color: peru'>".date("d",$d1)."</td>";
            } else {
                echo "<td>".date("d",$d1)."</td>";
            }

            if(date("w",$d1) == 6) echo "<tr/><tr>";
            $d1 = strtotime("+1 day", $d1);
        }
        $endDay = date("w", $d1);
        for($i=$endDay;$i<7;$i++) {
            echo "<td>&nbsp;</td>";
        }
        echo "</tr>";
        echo "</table>";

    }
    ?>
</body>
</html>