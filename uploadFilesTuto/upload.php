<?php

/**
 * Register a file and store it in folder.
 * 
 * $_FILES superglobal containing datas on your file.
 * 
 */
if (isset($_FILES) && $_FILES['picture']['error'] === 0) { //['name of your input']['everything your picture contains']
    if ($_FILES['picture']['size'] <= 1000000) {

        $allowedExtensions = ['jpg', 'jpeg'];

        $pathInfo = pathinfo($_FILES['picture']['name'],  PATHINFO_EXTENSION);
        if (in_array(($pathInfo), $allowedExtensions)) { //pathinfo to find the extension of a file, compare it with in_arrazy
            move_uploaded_file(
                $_FILES['picture']['tmp_name'], //Need the tmp_name used to temporarily store on PHP, it's not ['name'] anymore
                'yourFolderName/' . $_POST['name'] . time() . '.' . pathinfo($_FILES['picture']['name'],  PATHINFO_EXTENSION) //Select in which folder you wanna upload the file.
            );
            echo 'Saul good';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">

        <input type="text" name="name">
        <input type="file" name="picture">
        <button type="submit">OUI</button>
    </form>
</body>

</html>