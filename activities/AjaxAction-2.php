<?php
$cp = $_GET['cp'];
$cp += rand(0,2);
if($cp > 100) $cp = 100;
echo $cp;
?>