<html>
<body>
<h1>Please sign up</h1>

<form method = "post" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
    Name : <input type="text" name = "name"> <br/>
    Email : <input type="text" name = "email"> <br/>
    Major : <input type="text" name = "major"> <br/>

    <input type = "submit" name = "submit" value = "submit">
    <input type = "reset" name = "reset" value = "reset">


</form>
</body>
</html>

<?php

if($_POST["submit"]) {

    echo "<hr/>";
    echo "Thank you for signing up!<br/>";
    echo "Your name is: ".$_POST["name"]."<br/>";
    echo "Your email is: ".$_POST["email"]."<br/>";
    echo "Your major is: ".$_POST["major"]."<br/>";
    echo "<hr/>";




    $file = "sign-up-info-2.txt";

    $Info = "";
    $Info .= $_POST["name"];
    $Info .= "\t";
    $Info .= $_POST["email"];
    $Info .= "\t";
    $Info .= $_POST["major"];
    $Info .= "\t";
    $Info .= date("m/d/Y");
    $Info .= "\t";
    $Info .= date("h/i/sa");
    $Info .= "\t";
    $Info .= $_SERVER["REMOTE_ADDR"];
    $Info .= "\t";
    $Info .= rand(1000000,9999999);
    $Info .= "\n";


    file_put_contents($file, $Info, FILE_APPEND|LOCK_EX);


}


?>