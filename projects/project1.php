<html>
<head>
    <title>
        Project for keeping all your input
    </title>
    <style>
        .required {
            color: red;
        }
        .container {
            width: 50%;
            background-color: grey;
            text-align: center;
            /*margin: auto;*/
            /*padding: auto;*/
        }
    </style>
</head>
<body>

<?php

    $name = $email = "";
    $nameMSG = $emailMSG = "";

    //make sure that users cannot input javascript or other
        //things that mess with the users.
    function validateInput($input) {
        $input = trim($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    if($_POST["submit"]) {
        $name = validateInput($_POST["name"]);
        $email = validateInput($_POST["email"]);
        $correctAnswer = "";


        if (empty($name)) {
            $nameMSG = "Name is required";
        }

        if (empty($email)) {
            $emailMSG = "Email is required";
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailMSG = "Email is not of correct format!";
            }
        }

        $major = "";
        if ($_POST["major"] == "Digital Media") {
            $major = "Digital Media";
        } else if ($_POST["major"] == "Software") {
            $major = "Software";
        } else if ($_POST["major"] == "Security") {
            $major = "Security";
        } else if ($_POST["major"] == "Business") {
            $major = "Business";
        } else {
            $major = "Other";
        }

        $score = 0;
        if ($_POST["Q1"] == "B") $score += 25;
        if ($_POST["Q2"] == "A") $score += 25;
        if ($_POST["Q3"] == "D") $score += 25;
        if ($_POST["Q4"] == "C") $score += 25;


        if (!empty($name) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if ($_POST["showanswer"] == "yes") {
                $correctAnswer = " <== This is the correct answer!";
            }
        }
    }

?>

<h1>Welcome to this Web Based Test!!!</h1>
<p>Please answer the following questions:</p>
<hr/>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Name: <input type="text" name="name" value="<?php echo $name ?>"> <span class="required">* <?php echo " ". $nameMSG?></span><br/><br/>
    E-mail: <input type="email" name="email" value="<?php echo $email ?>"> <span class="required">*<?php echo " ". $emailMSG?></span><br>
    <hr/>
    Choose your major area of study: <select name="major">
        <option value="Digital Media" <?php if($_POST["major"] == "Digital Media") echo "selected";?>> Digital Media</option>
        <option value="Software"  <?php if($_POST["major"] == "Software") echo "selected";?>>Software</option>
        <option value="Security" <?php if($_POST["major"] == "Security") echo "selected";?> >Security</option>
        <option value="Business" <?php if($_POST["major"] == "Business") echo "selected";?> >Business</option>
        <option value="Other" <?php if($_POST["major"] == "Other") echo "selected";?> >Other</option>
    </select> <br/>
    <hr/>
    <p>Question 1 (25points)</p>
    <p>What does PHP stand for?</p>
    <input type="radio" value="A" name="Q1" <?php if($_POST["Q1"] == "A") echo "checked"?> >A. Personal Home Page <br/>
    <input type="radio" value="B" name="Q1" <?php if($_POST["Q1"] == "B") echo "checked"?>  >B. Preprocessor Home Page <span class="required"><?php echo $correctAnswer ?></span><br/>
    <input type="radio" value="C" name="Q1"  <?php if($_POST["Q1"] == "C") echo "checked"?> >C. Pretext Hypertext Processor<br/>
    <input type="radio" value="D" name="Q1"  <?php if($_POST["Q1"] == "D") echo "checked"?> >D. Hypertext Preprocessor<br/>
    <hr/>
    <p>Question 2 (25points)</p>
    <p>Which of the below symbols is a newline character?</p>
    <input type="radio" value="A" name="Q2"  <?php if($_POST["Q2"] == "A") echo "checked"?> >A. \n<span class="required"><?php echo $correctAnswer ?> </span><br/>
    <input type="radio" value="B" name="Q2" <?php if($_POST["Q2"] == "B") echo "checked"?>  >B. /n<br/>
    <input type="radio" value="C" name="Q2" <?php if($_POST["Q2"] == "C") echo "checked"?>  >C. /r<br/>
    <input type="radio" value="D" name="Q2" <?php if($_POST["Q2"] == "D") echo "checked"?>  >D. \r<br/>
    <hr/>
    <p>Question 3 (25points)</p>
    <p>PHP files have a default file extension of_______</p>
    <input type="radio" value="A" name="Q3" <?php if($_POST["Q3"] == "A") echo "checked"?>  >A. .xml<br/>
    <input type="radio" value="B" name="Q3" <?php if($_POST["Q3"] == "B") echo "checked"?>  >B. .ph<br/>
    <input type="radio" value="C" name="Q3" <?php if($_POST["Q3"] == "C") echo "checked"?>  >C. .html<br/>
    <input type="radio" value="D" name="Q3" <?php if($_POST["Q3"] == "D") echo "checked"?>  >D. .php <span class="required"><?php echo $correctAnswer ?> </span><br/>
    <hr/>
    <p>Question 4 (25points)</p>
    <p>How should we add a single line comment in our PHP code?</p>
    <div class="container">
        i) /? <br/>
        ii) // <br/>
        iii) # <br/>
        iv) /* */
    </div>
    <input type="radio" value="A" name="Q4" <?php if($_POST["Q4"] == "A") echo "checked"?>  >A. Only ii<br/>
    <input type="radio" value="B" name="Q4" <?php if($_POST["Q4"] == "B") echo "checked"?> >B. Both ii and iv <br/>
    <input type="radio" value="C" name="Q4" <?php if($_POST["Q4"] == "C") echo "checked"?> >C.  ii, iii and iv <span class="required"><?php echo $correctAnswer ?> </span><br/>
    <input type="radio" value="D" name="Q4" <?php if($_POST["Q4"] == "D") echo "checked"?> >D. i, iii and iv<br/>
    <hr/>
    <input type="checkbox" name="showanswer"  value="yes" <?php if($_POST["showanswer"] == "yes") echo "checked"; ?>> Show correct answers after submission.
    <br/><br/>
    <input type="submit" value="Submit this test" name="submit">
    <input type="submit" name="reset" value="Reset">

</form>

<hr/>

<?php
    if($_POST["submit"]) {
        if (!empty($name) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {

            echo "Your test results: <br/>";
            echo "Name: " . $name . "<br/>";
            echo "Email: " . $email . "<br/>";
            echo "Major: " . $major . "<br/>";
            echo "Your grade for this test is: " . $score;
        }
    }
?>
</body>
</html>