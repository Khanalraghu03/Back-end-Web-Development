<?php

//for($i = 1; $i <= 100; $i++) {
//    echo $i,"<br/>";
//}


for($i = 1; $i <= 100; $i++) {
    echo $i,"\t";
}

$sum = 0;
for($i = 1; $i <= 100; $i++) {
    $sum += $i;
}
echo "<br/> <br/> The sum is: ".$sum."<br/><br/>";
echo "<hr/>";

//$stars = rand(1,20);
$stars = 10;
for($i = 1; $i <= $stars; $i++) {
    for($j = 1; $j <= $stars; $j++) {
        echo "*";
    }
    echo "<br/>";
}

echo "<hr/>";
for($line = 1; $line <= $stars; $line++) {
    for($j = 1; $j <= $line; $j++) {
        echo "*";
    }
    echo "<br/>";
}

/////////////////////////////////
echo "<hr/>";
for($line = 1; $line <= $stars; $line++) {
    for($j = 0; $j <= $stars - $line; $j++) {
        echo "*";
    }
    echo "<br/>";
}

echo "<hr/>";

//Tree
for($line = 0; $line<$stars; $line++) {
    //
    for($i=0; $i<$stars-$line-1;$i++) {
        echo "&nbsp;";
    }

    for($j = 0; $j <= $line; $j++) {
        echo "*";
    }

    echo "<br/>";
}

echo "<hr/>";
//give me 1 star at the max place
//give me 2 star at the max and max -1 place
for($line = 0; $line<$stars; $line++) {
    //
    for($i=0; $i<$stars-$line;$i++) {
        echo "<span style='color:white'>*</span>";
    }

    for($j = 0; $j <= $line; $j++) {
        echo "*";
    }

    echo "<br/>";
}
?>





<?php
echo "<hr/>";
echo "<div style='width: 50%; margin: auto; background-color: blue; text-align: center'>";
echo "<hr/>";
for($line = 1; $line <= $stars; $line++) {
    for($j = 1; $j <= $line; $j++) {
        echo "*";
    }
    echo "<br/>";
}
echo "</div>";
?>






<?php
echo "<hr/>";
echo "<div style='width: 50%; margin: auto; background-color: blue; text-align: center'>";
    echo "<div style='width: 55%; background-color: blue; text-align: right'>";

            echo "<hr/>";
            for ($line = 1; $line <= $stars; $line++) {
                for ($j = 1; $j <= $line; $j++) {
                    echo "*";
                }
                echo "<br/>";
            }

    echo "</div>";
echo "</div>";

?>
