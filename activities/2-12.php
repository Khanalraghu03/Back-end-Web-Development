<?php
    echo "Today is: (m/d/Y) --> " .date("m/d/Y"). "<br/>"; //Y
    echo "Today is: (m/d/y) --> " .date("m/d/y"). "<br/>";
    echo "Today is: (M/d/Y) --> " .date("M/d/Y"). "<br/>"; //MY
    echo "Today is: (m/D/Y) --> " .date("m/D/Y"). "<br/>"; //DY
echo "Today is: (m-d-y) --> " .date("m-d-y"). "<br/>"; //Y
echo "Today is: (d \of M \i\\n Y) --> " .date("d \of M \i\\n Y"). "<br/>";

//String to time
$d = strtotime("March 21 1997");
echo "What day is for (l) ".date("m/d/Y", $d). ": " .date("l", $d) . "<br/>"; //l means name of the day of the week
echo "Today is day (w) ".date("w"). " of the week.<br/>"; //w represent day of the week in 0-6

echo "<hr/>";
echo "Now is (h:i:s) " . date("h:i:s") ."<br/>";
echo "Now is (h:i:sa) " . date("h:i:sa") ."<br/>";
echo "Now is (h:i:sA) " . date("h:i:sA") ."<br/>";
echo "Now is (H:i:s) " . date("H:i:s") ."<br/>";

echo "<hr/>";
//Timezone
date_default_timezone_set("America/Los_Angeles");
echo "Now is " .date("h:i:s") . " in Los Angeles <br/>";
date_default_timezone_set("America/Los_Angeles");
echo "Now is " .date("h:i:sA") . " in New York <br/>";

echo "<hr/>";
//(hour,min,sec,month,day,year)
$d2 = mktime(11,24,45,8,19,2012);
echo "The generated time is: ".date("Y-m-d h:i:sA",$d2). "<br/>";
echo "The seconds since 1970/1/1 is: " .$d2. "<br/>";
$d = strtotime("10:30pm April 15 2004");
echo "The created time is: " .date("Y-m-d h:i:sA", $d). "<br/>";
$d = strtotime("tomorrow");
echo "The Tomorrow from right now is: " .date("Y-m-d h:i:sA", $d). "<br/>";
$d = strtotime("Saturday");
echo "The Saturday from right now is: " .date("Y-m-d h:i:sA", $d). "<br/>";
$d = strtotime("yesterday");
echo "The yesterday from right now is: " .date("Y-m-d h:i:sA", $d). "<br/>";
$d = strtotime("+1 week");
echo "The 1 week from right now is: " .date("Y-m-d h:i:sA", $d). "<br/>";
$d = strtotime("+3 month");
echo "The 1 month from right now is: " .date("Y-m-d h:i:sA", $d). "<br/>";
?>

<?php
//count down
$d = strtotime("July 04 2020");
$days = ceil(($d-time())/60/60/24); //time in between

echo "There is " . $days. " days left until the Independence day <br/>";
?>

<?php
//calender
$d0 = strtotime("November 27, 1975");
$str = date("m",$d0)."/01/".date("Y",$d0);
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
    $ndays = date("t",$d1); // total number of days in a month
    for($i=0;$i<$ndays;$i++) {
        echo "<td>".date("d",$d1)."</td>";
        if(date("w",$d1) == 6) echo "<tr/><tr>";
        $d1 = strtotime("+1 day", $d1);
    }
    $endDay = date("w", $d1);
    for($i=$endDay;$i<7;$i++) {
        echo "<td>&nbsp;</td>";
    }
echo "</tr>";
echo "</table>";


echo "<br/> <br/> <br/>";
createCalender("April", 23, 2001);
//The month should be spelled --> this is wrong
//createCalender(4, 23, 2001);

?>

<?php

function createCalender($month, $day, $year)
{
    $d0 = strtotime($month." ".$day. " ". $year);
    $str = date("m",$d0)."/01/".date("Y",$d0);
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
        echo "<td>".date("d",$d1)."</td>";
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

















