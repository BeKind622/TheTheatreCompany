<?php


$hn = "localhost";
$un = "my_clyde_admin2";
$pw = "QwpddO9.1Oj0VjJU";
$db = "theatre";

// Create database connection
$conn = new mysqli($hn, $un, $pw, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
