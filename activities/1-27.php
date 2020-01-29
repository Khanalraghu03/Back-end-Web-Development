<html>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
    Name: <input type="name" name="name" value="Mike"> <br/>
    Email: <input type="email" name="email"><br/>
    Your favorite fruit: <br/>
    <select name="fruit">
        <option value="Orange">Orange</option>
        <option value="Apple">Apple</option>
        <option value="Kiwi" selected>Kiwi</option>
        <option value="Lemon">Lemon</option>
    </select>
    <br/>
    Comments: <br/>
    <textarea name="comments" placeholder="Write your comments here..." cols="50" rows="4"></textarea>
    <br/>
    <input type="checkbox" name="showComments" value="yes"> Show my comments after submission
    <br/>
    <input type="checkbox" name="showEmail" value="yes"> Show my email after submission
    <br/>
    <input type="submit" name="submit" value="Submit info">
    <input type="reset" name="reset" value="Reset">
</form>

<?php
//if(isset($_GET["submit"]))
if($_GET["submit"])
{
    echo "Your name is: " .$_GET["name"]. "<br/>";

    echo "Your favorite fruit is: " .$_GET["fruit"]."<br/>";
    if($_GET["showComments"] == "yes") {
        echo "Your comments here: <pre>" . $_GET["comments"] . "</pre><br/>";
    }else {
        echo "Your comments are chosen not to be displayed.";
    }
    if($_GET["showEmail"] == "yes") {
        echo "Your email is: " .$_GET["email"]. "<br/>";
    }else {
        echo "Your email is chosen not to be displayed.";
    }
}

?>

<hr/>
<h1>Welcome to this online test!</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    1. What is 1+1? <br/>
    <input type="radio" name="Q1" value="A"> A. 2 <br/>
    <input type="radio" name="Q1" value="B"> B. 1 <br/>
    <input type="radio" name="Q1" value="C"> C. 0 <br/>
    <input type="radio" name="Q1" value="D"> D. 3 <br/>
    <hr/>
    2. What is 2*3? <br/>
    <input type="radio" name="Q2" value="A"> A. 2 <br/>
    <input type="radio" name="Q2" value="B"> B. 4 <br/>
    <input type="radio" name="Q2" value="C"> C. 6 <br/>
    <input type="radio" name="Q2" value="D"> D. 8 <br/>
    <hr/>
    3. What is 10-3? <br/>
    <input type="radio" name="Q3" value="A"> A. 6 <br/>
    <input type="radio" name="Q3" value="B"> B. 7 <br/>
    <input type="radio" name="Q3" value="C"> C. 1 <br/>
    <input type="radio" name="Q3" value="D"> D. 5 <br/>
    <hr/>
    4. What is 15/3? <br/>
    <input type="radio" name="Q4" value="A"> A. 2 <br/>
    <input type="radio" name="Q4" value="B"> B. 4 <br/>
    <input type="radio" name="Q4" value="C"> C. 7 <br/>
    <input type="radio" name="Q4" value="D"> D. 5 <br/>
    <hr/>

    <input type="submit" name="submit" value="Submit test"> <br/>
</form>

<?php
if($_POST["submit"]) {
    $score = 0;
    $nq = 4;
    $pointsPQ = 100 / $nq;
    if ($_POST["Q1"] == "A") {
        $score += $pointsPQ;
    }
    if ($_POST["Q2"] == "C") {
        $score += $pointsPQ;
    }
    if ($_POST["Q3"] == "B") {
        $score += $pointsPQ;
    }
    if ($_POST["Q4"] == "D") {
        $score += $pointsPQ;
    }
    echo "Your grade for this test is: " .$score. "<br/>";
}

?>

</body>
</html>