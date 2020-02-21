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

<?php
if($_POST['submit']) {
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

?>
