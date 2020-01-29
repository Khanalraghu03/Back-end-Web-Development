<html>
<body>
<form action="Action-1-22.php" method="post">
    Name: <input type="text" name="name"><br/><br/>
    Email: <input type="email" name="email"><br/><br/>

    Your income is: <br/>
    <input type="radio" name="income" value="A"> Less than $50K <br/>
    <input type="radio" name="income" value="B"> More than $50k but less than $100k<br/>
    <input type="radio" name="income" value="C"> More than $100k<br/>
    <br/>

    <input type="submit" value="Submit me" name="submit">
</form>

<hr/>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Name: <input type="text" name="name"><br/><br/>
    Email: <input type="email" name="email"><br/><br/>

    Your income is: <br/>
    <input type="radio" name="income" value="A"> Less than $50K <br/>
    <input type="radio" name="income" value="B"> More than $50k but less than $100k<br/>
    <input type="radio" name="income" value="C"> More than $100k<br/>
    <br/>

    <input type="submit" value="Submit me" name="submit">
</form>







<?php
function validate_input($input) {
    $input = trim($input);
    $input = htmlspecialchars($input);
    return $input;
}
?>


<?php
if(isset($_POST["submit"])) {
    $name = validate_input($_POST["name"]);
    $email = validate_input($_POST["email"]);

    if(!empty($name) && !empty($email)) {

        echo "Your name is: " . $name . "<br/>";
        echo "Your email is: " . $email . ". <span style='color: red'>Please Verify.</span><br/>";

        if($_POST["income"] == "A") {
            echo "Your income is: Less than $50K";
        } else if($_POST["income"] == "B") {
            echo "Your income is: More than $50k but less than $100k";
        } else {
            echo "Your income is: More than $100k";
        }

    } else {
        echo "Please provide information correctly";
    }

}

?>





























</body>


</html>