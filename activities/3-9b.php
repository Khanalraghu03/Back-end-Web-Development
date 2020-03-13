<html>
<body>

<h1>Query System</h1>
<form method="post" action = " <?php echo $_SERVER['PHP_SELF']?>">
    Please provide your name: <br/>
    <input type="text" name="name"><br/>
    <input type = "submit" name="submit"><br/>
</form>

<?php

if(isset($_POST["submit"])) {
    $file = "sign-up-info-2.txt";

    $InfoStr = file_get_contents($file);
    $InfoList = explode("\n", $InfoStr);

    foreach ($InfoList as $index=>$person) {
        $PersonInfo[$index] = explode("\t", $person);
    }

    echo "<table border = 1>";
    echo "<tr>
        <td>No.</td>
        <td>Name</td>
        <td>Email</td>
        <td>Major</td>
        <td>Date</td>
        <td>Time</td>
        <td>IP Address</td>
        <td>ID</td>
    </tr>";

    $nFound = 0;
    foreach ($PersonInfo as $people) {
        if($_POST["name"] == "*" || $people[0] == $_POST["name"]) {
            $nFound++;
            echo "<tr>";
            echo "<td>".$nFound."</td>";
            foreach ($people as $info)
                echo "<td>".$info."</td>";
            echo "</tr>";
        }
    }
    echo "</table>";
}

?>

</body>


</html>