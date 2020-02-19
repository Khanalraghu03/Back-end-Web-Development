<?php
$NameList = array("Anna", "Brittany", "Cinderala", "Diana", "Eva",
    "Fiona", "Gunda", "Hege", "Inga", "Johanna", "Kitty", "Linda",
    "Nina", "Ophelia", "Petunia", "Amanda", "Requel", "Cindy", "Doris", "Eve", "Evita",
    "Sunniva", "Tove", "Unni", "Violet", "Liza", "Elizabeth", "Ellen", "Wenche", "Vicky");

$query = $_REQUEST["q"];
$hint = "";

if($query !== "") {
    $query = strtolower($query);
    $len = strlen($query);
    for($i = 0; $i < count($NameList);$i++) {
        if ($query === strtolower(substr($NameList[$i], 0, $len))) {
            $hint = $hint . "<div class='hint' style='width:100%;' onclick=selectMe('".$NameList[$i]."');>"
            .$NameList[$i]. "</div>";
        }
    }
    echo $hint;
}


?>
