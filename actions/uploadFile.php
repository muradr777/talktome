<?php

require_once('/Applications/XAMPP/xamppfiles/htdocs/wallace/roots.php');

// Console Debugger
$debug = true; // * Turn this off after debugging
if (!isset($_POST['submit']) || $_FILES['file_upload']['size'] == 0) {
    exit("Error!");
    die();
}

$ufile = $_FILES['file_upload'];
$target_dir  = $_SERVER['DOCUMENT_ROOT'] . '/uploads/'; // TODO: Edit rights
$target_file = $target_dir . basename($ufile['name']);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$uploadOk = 1;
// Check if file is actual image
$check = getimagesize($ufile['tmp_name']);

if (!$check) {
    if($debug) new ConsoleDebug("File is not an image.");
    $uploadOk = 0;
}

// Check file size
if ($ufile['size'] > 4000000) {
    if($debug) new ConsoleDebug("Sorry, file is too large.");
    $uploadOk = 0;
}

// Check if file already exists
if (file_exists($target_file)) {
    if($debug) new ConsoleDebug("Sorry, this file already exists.");
    $uploadOk = 0;
}

// Check file format
if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg') {
    if($debug) new ConsoleDebug("Sorry, this file format is not allowed!");
    $uploadOk = 0;
}

// Check if $uploadOk set to 0 - at least one requirement not passed
if ($uploadOk == 0) {
    echo "Error. Your File can not be uploaded.\n";
//     echo <<<HTML
//         <script>
//             setTimeout(function() {
//                 location.href="/upload.php?res=0";
//             }, 1500);
//         </script>
// HTML;
} else {
    if (move_uploaded_file($ufile['tmp_name'], $target_file)) {
        if($debug) new ConsoleDebug("The file: " . basename($ufile['name']) . " has been uploaded.");
    } else {
        if($debug) new ConsoleDebug("Sorry, there was an error uploading your file.");
    }
}



echo $sql = "INSERT INTO `wallace`.`images` VALUES (0, '/uploads/{$ufile['name']}')";

$res = mysqli_query($dbconnect, $sql);

if (!$res)
    die("Query Failed!");

echo "<script>location.href='/upload.php?res=1';</script>";
