<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/db/dbconnection.inc.php";

$dbconnect = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DBNAME);

if (!$dbconnect)
    die("Connection Failed: " . $dbconnect->connect_error);
