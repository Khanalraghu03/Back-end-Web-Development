\<html>
<head>
    <style>
        .error {color: #FF0000;}
    </style>
    <title>
        Lab 7
    </title>
</head>
<body>

<?php
//the city itself is an array
    //that array has an array with properties
$CitiInfo = array
(   array("New York", "NY", 8008278,103246,12345),
    array("Los Angeles", "CA", 3694820,100000,12346),
    array("Chicago", "IL", 2896016,93591,12347),
    array("Houston", "TX", 1953631,98174,12348),
    array("Philadelphia", "PA", 1517550,91083,12349),
    array("Phoenix", "AZ", 1321045,83412,29874),
    array("San Diego", "CA", 1223400,99247,29875),
    array("Dallas", "TX", 1188580,90111,29876),
    array("San Antonio", "TX", 1144646,89925,29877),
    array("Detroit", "MI",951270,80188,29878)
);

$search = "";
$searchMSG = "";
$searchBy = "";

function validateInput($input) {
    $input = trim($input);
    $input = htmlspecialchars($input);
    return $input;
}

if($_POST['submit']){
   $search = validateInput($_POST['search']);

   if(empty($search)) {
       $searchMSG = " Required";
   }

   $searchBy = $_POST['query'];

}
?>

<div style="width:60%;margin:auto;">
    <h1>City Info Query System</h1>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <p><span class="error">* required field.</span></p>

        Query by:
        <select name="query">
            <option value="City" <?php  if($searchBy == "City") echo "selected"?>>City</option>
            <option value="State" <?php  if($searchBy == "State") echo "selected"?>>State</option>
            <option value="Income"  <?php  if($searchBy == "Income") echo "selected"?>>Income</option>
        </select>
        <br/><br/>

        Type the State, City Name or Income that you want to search:
        <input type="text" name="search" value = "<?php echo $search; ?>" ><span class="error">*<?php echo $searchMSG?></span>
        <br/><br/>
        <input type=submit name=submit value=Search>
    </form>
    <hr/>

    <?php
        if($_POST['submit']) {
            if(!empty($search)){
            echo "<hr/>";
            $found = 0;
            //create a table
            echo "<table id='table' cellpadding='10px' border='1' style='text-align: center; border-collapse: collapse; background-color: peru;  margin: auto'; >";
                echo "<tr>";
                    echo "<th>City</th>";
                    echo "<th>State</th>";
                    echo "<th>Population</th>";
                    echo "<th>Income</th>";
                    echo "<th>Zip code</th>";
                echo "</tr>";
                if($searchBy == "City")
                {
                    foreach ($CitiInfo as $cityInfos) {
                        echo "<tr>";
                        //it's a string & !number
                        if($cityInfos[0] == $search)
                        {
                            foreach ($cityInfos as $value)
                            {
                                echo "<td>" .$value. "</td>";
                            }
                            $found++;
                        }
                        echo "</tr>";
                    }
                } else if ($searchBy == "State") {
                            //Its a string & !number
                    foreach ($CitiInfo as $index => $stateInfos) {
                        echo "<tr>";

                        //it's a string & !number
                        if($stateInfos[1] == $search)
                        {
                            foreach ($stateInfos as $value)
                            {
                                echo "<td>" .$value. "</td>";
                            }
                            $found++;
                        }

                        echo "</tr>";

                    }
                } else if($searchBy == "Income"){
                            //it's a number & !string
                    foreach ($CitiInfo as $index => $incomeInfos) {
                        echo "<tr>";
                        //it's a string & !number
                        if($incomeInfos[3] >= $search)
                        {
                            foreach ($incomeInfos as $value)
                            {
                                echo "<td>" .$value. "</td>";
                            }
                            $found++;
                        }
                        echo "</tr>";
                    }
                }

            echo "</table>";

            echo "<p style='text-align: center'> We found " .$found. " results matching your search. </p>";

            }
        }
    ?>

</div>
</body>
</html>