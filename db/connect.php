<?php
include "/Applications/XAMPP/xamppfiles/htdocs/wallace/db/dbconnection.inc.php";

$DBCONNECT = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DBNAME);

if (!$DBCONNECT)
    die("Connection Failed: " . $DBCONNECT->connect_error);

// mysqli_close($DBCONNECT);
