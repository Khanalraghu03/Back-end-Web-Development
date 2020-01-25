<?php
echo "Thank you for your registration. Here is your information we collected: <br/>";
echo "Name: " . $_POST["name"] . "<br/>";
echo "Email:  ". $_POST["email"] . "<br/>";
echo "Gender: ";
if($_POST["gender"] == "Female") {
    echo  "Female";
} else if($_POST["gender"] == "Male") {
    echo "Male";
} else {
    echo "Do not want to tell";
}
echo "<br/>";

echo "Major: ";
if($_POST["major"] == "Digital Media") {
    echo "Digital Media";
} else if($_POST["major"] == "Software") {
    echo "Software";
} else if($_POST["major"] == "Security") {
    echo "Security";
} else if($_POST["major"] == "Business") {
    echo "Business";
} else  {
    echo "Other";
}
echo " <br/>";

//VIP Annual fee = $200.00, otherwise it is $100  {if studied more than 3 years ==> 30% off}
echo "Your annual membership fee is: ";
if($_POST["years"] > "3") {
    if ($_POST["vip"] == "VIP") {
        echo "$" . (200 * 70 / 100);
    } else {
        echo "$" . (100 * 70 / 100);
    }
} else {
    if ($_POST["vip"] == "VIP") {
        echo "$200";
    } else {
        echo "$100";
    }
}

?>
