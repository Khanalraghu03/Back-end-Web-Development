<html>
<head>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>
<body>
<h1 align=center>Student Fruit Survey</h1>
<hr/>

<?php
$name = $email = $address =$piecesOfFruit = $favFood = $brochure = "";
$nameMSG = $emailMSG = "" ;

function validateInput($input) {
    $input = trim($input);
    $input = htmlspecialchars($input);
    return $input;
}

if($_POST['submit']) {
    $name = validateInput($_POST['name']);
    $email = validateInput($_POST['email']);
    $address = validateInput($_POST['address']);

    if(empty($name)) {
        $nameMSG = "Missing";
    }

    if(empty($email)) {
        $emailMSG = "Missing";
    } else {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailMSG = "Please enter valid email";
        }
    }

    if($_POST['howMany'] == "zero") {
        $piecesOfFruit =  "zero";
    }else if($_POST['howMany'] == "one") {
        $piecesOfFruit = "one";
    } else if($_POST['howMany'] == "two") {
        $piecesOfFruit = "two";
    } else if($_POST['howMany'] == "twoplus") {
        $piecesOfFruit = "twoplus";
    }


    if($_POST["favFruit"] == "apple") {
        $favFood = "apple";
    } else if($_POST["favFruit"] == "plum") {
        $favFood = "plum";
    } else if($_POST["favFruit"] == "pomegranate") {
        $favFood = "pomegranate";
    }else if($_POST["favFruit"] == "strawberry") {
        $favFood = "strawberry";
    } else if($_POST["favFruit"] == "watermelon") {
        $favFood = "watermelon";
    } else  {
        $favFood = "other";
    }

    //$brochure
    if($_POST['brochure'] == "Yes") {
        $brochure = "checked";
    }

}

?>


<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <table style="background-color:pink;width:50%;margin:auto;">
        <tr><td align=right>Name</td><td> <input type="text" name="name" value="<?php echo $name ?>"> <span class='error'>* <?php echo " ". $nameMSG?></span><br/></td></tr>
        <tr><td align=right>Address</td><td>  <input type="text" name="address" value="<?php echo $address ?>"></td> </tr>
        <tr><td align=right>Email</td><td>  <input type="text" name="email" value="<?php echo $email ?>"> <span class='error'>* <?php echo " ". $emailMSG?></span></td></tr>

        <tr><td align=right >How many pieces of fruit do you eat per day? </td>
            <td><input type="radio" name="howMany" value="zero" <?php if($_POST["howMany"] == "zero") echo "checked"; ?>> 0
                <input type="radio" name="howMany" value="one" <?php if($_POST["howMany"] == "one") echo "checked";?>> 1
                <input type="radio" name="howMany" value="two" <?php if($_POST["howMany"] == "two") echo "checked";?>> 2
                <input type="radio" name="howMany" value="twoplus" <?php if($_POST["howMany"] == "twoplus") echo "checked";?>> More than 2  </td></tr>

        <tr><td align=right>Your favorite fruit is:</td>
            <td><select name="favFruit" >
                    <option value="apple"  <?php if($_POST["favFruit"] == "apple") echo "selected";?>>Apple</option>
                    <option value="banana" <?php if($_POST["favFruit"] == "banana") echo "selected";?>>Banana</option>
                    <option value="plum"   <?php if($_POST["favFruit"] == "plum") echo "selected";?>>Plum</option>
                    <option value="pomegranate" <?php if($_POST["favFruit"] == "pomegranate") echo "selected";?>>Pomegranate</option>
                    <option value="strawberry"  <?php if($_POST["favFruit"] == "strawberry") echo "selected";?>>Strawberry</option>
                    <option value="watermelon"  <?php if($_POST["favFruit"] == "watermelon") echo "selected";?>>Watermelon</option>
                    <option value="other"       <?php if($_POST["favFruit"] == "other") echo "selected";?>>other</option>
                </select> </td> </tr>

        <tr><td align=right>Would you like a brochure? </td><td> <input type="checkbox" name="brochure" value="Yes" <?php echo $brochure?>> </td></tr>

        <tr><td></td><td><input type="submit" name="submit" value="Submit"> </td></tr>
    </table>
</form>
<hr/>

<?php
    if($_POST['submit']) {
        if (!empty($name) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Your name is " . $name . "<br/>";
            if(!empty($address)) {
                echo "Your address is " . $address . "<br/>";
            }
            echo "Your email is " . $email . "<br/>";
            echo "You eat " . $piecesOfFruit . " pieces of fruit each day <br/>";
            echo "Your favorite fruit is " . $favFood . "<br/>";
            if ($_POST['brochure'] == "Yes") {
                echo "You would like a brochure";
            } else {
                echo "You do not want a brochure.";
            }
        } else {
            echo "Missing information is required. Please fill in before submit!";
        }
    }
?>

</body>
</html>