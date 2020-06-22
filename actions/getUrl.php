<?php

if (!isset($_POST)) {
    exit("Error!");
    die();
}

require_once('/Applications/XAMPP/xamppfiles/htdocs/wallace/db/connect.php');

$sql = "SELECT `url` FROM `wallace`.`images` ORDER BY RAND() LIMIT 1";

$res = mysqli_query($dbconnect, $sql);

if (!$res)
    die("Query Failed!");

echo mysqli_fetch_assoc($res)['url']; // return url