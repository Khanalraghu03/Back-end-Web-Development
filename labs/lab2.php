<?php
function drawTree() {
    $stars = 5;
    for($line = 1; $line <= $stars; $line++) {
        for($j = 1; $j <= $line; $j++) {
            echo "*";
        }
        echo "<br/>";
    }

    $stars = 9;
    for($line = 3; $line <= $stars; $line++) {
        for($j = 1; $j <= $line; $j++) {
            echo "*";
        }
        echo "<br/>";
    }

    $stars = 13;
    for($line = 4; $line <= $stars; $line++) {
        for($j = 1; $j <= $line; $j++) {
            echo "*";
        }
        echo "<br/>";
    }

    for($i = 1; $i <= 5; $i++) {
        for($j = 1; $j <= 5; $j++) {
            echo "*";
        }
        echo "<br/>";
    }
}

echo "<div style='color:red; line-height: 0.5; width: 50%; font-weight: bold; margin: auto; background-color: aqua; text-align: center'>";
    drawTree();
echo "</div>";

echo "<hr/>";

echo "<table style='color:blue; line-height: 0.5; width: 50%; font-weight: bold; margin: auto; background-color: pink; text-align: center'>";
    echo "<tr>";
        echo "<td>";
            drawTree();
        echo "</td>";

        echo "<td>";
            drawTree();
        echo "</td>";

        echo "<td>";
            drawTree();
        echo "</td>";

        echo "<td>";
            drawTree();
        echo "</td>";
    echo "</tr>";

echo "</table>";

?>
