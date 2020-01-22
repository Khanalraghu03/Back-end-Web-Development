
<html lang="en">
<head>
    <title> My first php program</title>
    <style>
        #red {
            color:red;
        }
    </style>

</head>

<body>

<p>Hello World!</p>


<?php
    echo "My first php program";
    echo "<h1>My first php program</h1>";
    echo "<h1 id='red'>My first php program</h1>";
?>

<p>This is something else  that is
    <?php  echo "<span style='color:blue'> COLORFUL</span>"  ?>
    as well.</p>

<?php
    $school = "GGC"; //"GATECH";
/*
 * Multi line
 *
 * */
    echo "I like $school <br/>";
    echo 'I like $school. <br/>';
    echo "I like " .$school. "<br/>";

?>

<hr>

<?php
    $num = 123.456789;
    echo "The number is: " .$num. "</br>";
    printf("The number is: %f</br>", $num); //float
    printf("The number is: %d</br>", $num); //integer
    printf("The number is: %s</br>", $num); //string
    printf("The number is: %.2f</br>", $num); //float w/ 2 decimal

    echo "The number is: ".round($num,2)."</br>"; //float w/ 2 decimal

    ECHO "hELLO";
?>

</body>
</html>