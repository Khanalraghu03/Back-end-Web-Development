<html>
<head>
    <title>
        About uploading files
    </title>
</head>
<body>
<?php

$name = $email = "";

function validateInput($input) {
    $input = trim($input);
    $input = htmlspecialchars($input);
    return $input;
}

function UploadFile($tagName, $fileAllowed, $sizeAllowed, $overWriteAllowed) {
    $uploadOK = 1;
    $fileDestinationDir = "upload/";

    $file = $fileDestinationDir . basename($_FILES[$tagName]["name"]);
    $fileType = pathinfo($file, PATHINFO_EXTENSION);
    $fileSize = $_FILES[$tagName]["size"];

    if($fileSize > $sizeAllowed) {
        $uploadOK = 0;
//        echo "File is too large- must be less than or equal to ".$sizeAllowed;
    }
    if(!stristr($fileAllowed, $fileType)) {
        $uploadOK = 0;
//        echo "File type is not allowed <br/>";
    }
    if(!$overWriteAllowed && file_exists($file)) {
        $uploadOK = 0;
//        echo "File already exists & over writing is not allowed<br/>";
    }

    if($uploadOK == 1) {
        if (!move_uploaded_file($_FILES[$tagName]["tmp_name"], $file)) {
            $uploadOK = 0;
        }
    }

    if($uploadOK == 1) {
        return $file;
    } else {
        return false;
    }
}


?>



<h1>Application for GGC jobs</h1>
<p>Please fill in the information</p>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <table border=1>
        <tr><td align=right>Name:</td><td><input type="text" name="name" value=""></td></tr>
        <tr><td align=right>Email:</td><td><input type="email" name="email"  value=""></td></tr>
        <tr><td align=right>Highest Education Degree:</td><td>
                <select name="education">
                    <option value="Doctor" >Doctor</option>
                    <option value="Master" >Master</option>
                    <option value="College"  >College</option>
                    <option value="High School" >High School</option>
                </select> <br/><br/>

            </td></tr>

        <tr><td align=right>Position Applied:</td><td>
                <select name="position">
                    <option value="IT Help Desk Technician" >IT Help Desk Technician</option>
                    <option value="Fron Desk Receptionist" >Fron Desk Receptionist</option>
                    <option value="Janitor"  >Janitor</option>
                    <option value="PHP Web Programmer" >PHP Web Programmer</option>
                </select> <br/><br/>

            </td></tr>

        <tr><td align=right>CV (PDF only):</td><td><input type="file" name="cv"></td></tr>
        <tr><td align=right>Photo (PNG/JPG/GIF):</td><td><input type="file" name="photo"></td></tr>
        <tr><td><input type="submit" name="submit" value="Submit"></td><td><input type="reset" name="reset"></td></tr>
    </table>
</form>


<?php
    if($_POST['submit']) {
        $name = validateInput($_POST['name']);
        $email = validateInput($_POST['email']);
        $heDegree = $_POST['education'];
        $posApplied = $_POST['position'];



        echo "<hr>";
        echo "<table border=1>";
            echo "<tr>";
                echo "<td> Name: </td>";
                echo "<td> $name </td>";
            echo "</tr>";
        echo "<tr>";
            echo "<td> Email: </td>";
            echo "<td> $email </td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td> Highest Education Degree: </td>";
            echo "<td> $heDegree </td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td> Job Position Applied: </td>";
            echo "<td> $posApplied </td>";
        echo "</tr>";

        echo "<tr>";
            echo "<td> CV: </td>";
            $tagName = "cv";
            $fileAllowed = "PDF";
            $sizeAllowed = 5000000;
            $overWriteAllowed = 1;

            $file = UploadFile($tagName, $fileAllowed, $sizeAllowed,$overWriteAllowed);
            if($file != false) {
                echo "<td> Click <a href=" . $file . " >here</a> to see my CV. </td>";
            } else {
                echo "<td> Sorry, your format is not allowed.CV was not submitted.</td>";
            }

        echo "</tr>";
        echo "<tr>";
            echo "<td> Photo: </td>";
            $tagName = "photo";
            $fileAllowed = "PNG:JPEG:JPG:GIF:BMP";
            $file = UploadFile($tagName, $fileAllowed, $sizeAllowed, $overWriteAllowed);
            if ($file != false) {
                echo "<td> <img src=" . $file . " width='200' height='200'> </td>";
            } else {
                echo "<td> Sorry, your format is not allowed.Photo was not submitted </td>";
            }
        echo "</tr>";
        echo "</table>";

    }
?>

</body>
</html>