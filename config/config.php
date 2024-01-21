<?php

$hn = "localhost";
$un = "root";
$pw = "";
$db = "theatre";

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error){
    die("connection failed: " . $conn->connect_error );
}


