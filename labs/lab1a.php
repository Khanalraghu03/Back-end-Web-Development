<?php
$randomNum = rand(1,20);

echo "<h3 style='text-align: center'> Here displayed is the multiplication table of $randomNum X $randomNum</h3>";
echo "<table style='border-collapse: collapse' border='1px solid black' cellpadding='10px' align='center'>";

for($row=1;$row<=$randomNum;$row++) {

    echo "<tr>";

    for($col=1; $col<=$randomNum;$col++) {
        if($row % 2 == 0) {
            echo "<td style='background-color: aqua'>";
                echo ($row * $col);
            echo "</td>";
        } else {
            echo "<td >";
                echo ($row * $col);
            echo "</td>";
        }
    }

    echo "</tr>";
}

echo "</table>";

?>