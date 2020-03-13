<html>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
    <h1>Please provide the following documents: </h1>
    Select an image to upload: <input type="file" name="myImage"> <br>
    Select a PDF to upload your CV: <input type="file" name="mypdf">
    <br>
    <input type="submit" name="submit">
</form>
<hr>
<?php
function UploadFile($tagName, $fileAllowed, $sizeAllowed, $overWriteAllowed) {
    $uploadOK = 1;
    $fileDestinationDir = "upload/";

    $file = $fileDestinationDir . basename($_FILES[$tagName]["name"]);
    $fileType = pathinfo($file, PATHINFO_EXTENSION);
    $fileSize = $_FILES[$tagName]["size"];

    if($fileSize > $sizeAllowed) {
        $uploadOK = 0;
        echo "File is too large- must be less than or equal to ".$sizeAllowed;
    }
    if(!stristr($fileAllowed, $fileType)) {
        $uploadOK = 0;
        echo "File type is not allowed <br/>";
    }
    if(!$overWriteAllowed && file_exists($file)) {
        $uploadOK = 0;
        echo "File already exists & over writing is not allowed<br/>";
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

if($_POST["submit"]) {
    $tagName = "myImage";
    $fileAllowed = "PNG:JPEG:JPG:GIF:BMP";
    $sizeAllowed = 5000000;
    $overWriteAllowed = 1;

    $file = UploadFile($tagName, $fileAllowed, $sizeAllowed,$overWriteAllowed);
    if($file != false) {
        echo "<img src='" . $file . "' width='200' height='200'>";
    }

    $tagName = "mypdf";
    $fileAllowed = "PDF";
    $file = UploadFile($tagName, $fileAllowed, $sizeAllowed, $overWriteAllowed);
    if ($file != false) {
        echo "<a href='" . $file . "'> Click here to see the file</a>";
    }

}
?>






</body>
</html>