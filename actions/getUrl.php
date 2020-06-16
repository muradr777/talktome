<?php

if (!isset($_POST)) {
    exit("Error!");
    die();
}

$sql = "SELECT `url` FROM `wallace`.`images` ORDER BY RAND() LIMIT 1";

$res = mysqli_query($dbconnect, $sql);

if (!$res)
    die("Query Failed!");

echo mysqli_fetch_assoc($res)['url']; // return url