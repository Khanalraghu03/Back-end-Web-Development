<html>
    <style>
        .required {
            color: red;
        }
    </style>
    <body>
        <?php
            $name = $email = $gender = $comments= $time =  "";
            $nameMSG = $emailMSG = $genderMSG =  $commentsMSG = $timeMSG = "";

            function validate_input($input) {
                $input = trim($input);
                $input = htmlspecialchars($input);
                return $input;
            }

            if($_POST["submit"]) {
                $name = validate_input($_POST["name"]);
                $email = validate_input($_POST["email"]);
                $gender = validate_input($_POST["gender"]);
                $comments = validate_input($_POST["comments"]);
                $time = validate_input($_POST["time"]);

                if(empty($name)) {
                    $nameMSG = "Name is required!";
                }
                if(empty($email)) {
                    $emailMSG = "Email is required!";
                } else {
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailMSG = "Email is not of correct format!";
                    }
                }
                if(empty($gender)) {
                    $genderMSG = "Gender is required!";
                }

            }
        ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            Name: <input type="text" name="name" value=" <?php echo $name; ?>"><span class="required">* <?php echo $nameMSG; ?> </span><br/>
            Email: <input type="email" name="email" value=" <?php echo $email; ?>"><span class="required">* <?php echo $emailMSG; ?></span><br/>
            <br/>
            Gender:
            <input type="radio" name="gender" value="Male" <?php if($gender == "Male") echo "checked"; ?>> Male
            <input type="radio" name="gender" value="Female" <?php if($gender == "Female") echo "checked"; ?>> Female
            <input type="radio" name="gender" value="Other" <?php if($gender == "Other") echo "checked"; ?>> Other
            <span class="required">* <?php echo $genderMSG; ?></span>
            <br/>
            Comments: <br/>
            <textarea name="comments" id="" cols="50" rows="5"><?php echo $comments; ?>
            </textarea>
            <br/>
            Your preferred time is at:
            <select name="time" id="">
                <option value="AM" <?php if($time == "AM") echo "selected" ?>>Morning </option>
                <option value="PM" <?php if($time == "PM") echo "selected" ?>>Afternoon </option>
                <option value="EV" <?php if($time == "EV") echo "selected" ?>>Evening </option>
            </select>
            <br/>
            <input type="submit" value="Submit" name="submit">
        </form>
    </body>
</html>