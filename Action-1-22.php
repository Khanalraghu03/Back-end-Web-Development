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

} else {
    echo "Please submit your form";
}
?>
