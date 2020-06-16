<?php

require_once('../db/connect.php');

if (!isset($_POST['submit'])) {
    exit("Error!");
    die();
}

$ufile = $_FILES['file_upload'];
$target_dir  = '/Applications/XAMPP/xamppfiles/htdocs/wallace/uploads/'; // TODO: Edit rights
$target_file = $target_dir . basename($ufile['name']);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$uploadOk = 1;
// Check if file is actual image
$check = getimagesize($ufile['tmp_name']);

if ($check !== false) {
    echo "File is an image - " . $check['mime'] . ".\n";
    $uploadOk = 1;
} else {
    echo "File is not an image.\n";
    $uploadOk = 0;
}

// Check file size
if ($ufile['size'] > 4000000) {
    echo "Sorry, file is too large.\n";
    $uploadOk = 0;
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, this file already exists.\n";
    $uploadOk = 0;
}

// Check file format
if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg') {
    echo "Sorry, this file format is not allowed!\n";
    $uploadOk = 0;
}

// Check if $uploadOk set to 0 - at least one requirement not passed
if ($uploadOk == 0) {
    echo "Error. Your File can not be uploaded.\n";
} else {
    if (move_uploaded_file($ufile['tmp_name'], $target_file)) {
        echo "The file: " . basename($ufile['name']) . " has been uploaded.\n";
    } else {
        echo "Sorry, there was an error uploading your file.\n";
    }
}



$sql = "INSERT INTO `wallace`.`images` VALUES ('/uploads/'{$ufile['name']})";

$res = mysqli_query($DBCONNECT, $sql);

if (!$res)
    die("Query Failed!");

echo "<script>location.href='/upload.php?res=1';</script>";
