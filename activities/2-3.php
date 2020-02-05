<html>
<body>
<form method ="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <p> Where is GGC located?</p>
    <input type=radio name = ggc value=A>A. Georgia<br/>
    <input type=radio name = ggc value=B>B. Florida<br/>
    <input type=radio name = ggc value=C>C. Virginia<br/>
    <input type=radio name = ggc value=D>D. Washington<br/>
    <input type=submit name =submit value="submit test">

    <input type=reset>
</form>
<hr/>
<?php
if($_REQUEST["submit"])
{
    if($_REQUEST["ggc"]== "A")
        echo "Your answer is correct<br/>";
    else
        echo "Wrong, try again<br/>";
}
?>
<hr/>
<?php
$filename = "visitNumber.txt";
$nVisitor = file_get_contents($filename);
if($nVisitor == NULL || $nVisitor =="")
{
    $nVisitor = 0;
}
$nVisitor ++;
echo "This site has been visited by ".$nVisitor." people!<br/>";
echo "The new visitor's IP address is: ".$_SERVER["REMOTE_ADDR"]."<br/>";

$mytime =$_SERVER["REQUEST_TIME"];
$mydate = getdate($mytime);

echo "The time of this visit is: ".$mydate["weekday"].", ".$mydate["month"]."/".$mydate["mday"]."/".$mydate["year"].
    " ".$mydate["hours"].":".$mydate["minutes"].":".$mydate["seconds"]."<br/>";
file_put_contents($filename, $nVisitor,LOCK_EX );
?>

<?php
$filename = "log.txt";
$vlist = file_get_contents($filename);
echo "<pre>".$vlist. "</pre>";

$vlist = $_SERVER["REMOTE_ADDR"];
$vlist .= $mydate["weekday"].",".$mydate["month"]."/".$mydate["mday"]."/".$mydate["year"].
    " ".$mydate["hours"].":".$mydate["minutes"].":".$mydate["seconds"]."\n";

echo "<pre>".$vlist. "</pre>";

file_put_contents($filename, $vlist, FILE_APPEND | LOCK_EX);

?>

</body>
</html>