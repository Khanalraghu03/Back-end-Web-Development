<?php
include "lib-1-10.php";

function showMSG() {
    echo "Hello World!!!</br>";
}

showMSG();

for($i = 0;$i<20;$i++) {
    echo "No. " .($i+1). ": ";
    echo showMSG();
}

$size = 10;
for($i = 0;$i<20;$i++) {
    echo "<span style='font-size: ".$size."'>";
    echo showMSG();
    $size++;
    echo "</span>";

}

?>

<?php

echo "<hr/>";
$w = rand(0,100);
if($w < 25) {
    showImage("sunny");
} else if($w < 50) {
    showImage("rainy");
}else if($w < 75) {
    showImage("cloudy");
} else {
    showImage("windy");
}

?>

<?php

echo "<hr/>";
echo "<table border=1 style='width:20%; margin:auto;'>";

for($row=0;$row<8;$row++) {
    echo "<tr>";

    for($column=0;$column<8;$column++) {
        $total = $row + $column;
        if($total % 2 == 0) {
            echo "<td style='background-color: white'>&nbsp;</td>";
        } else {
            echo "<td style='background-color: black'>&nbsp;</td>";
        }
    }

    echo "</tr>";
}

echo "</table>"

?>
