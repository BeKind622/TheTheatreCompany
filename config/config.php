<?php

$hn = "localhost";
$un = "my_clyde_admin2";
$pw = "QwpddO9.1Oj0VjJU";
$db = "theatre";

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error){
    die("connection failed: " . $conn->connect_error );
}


