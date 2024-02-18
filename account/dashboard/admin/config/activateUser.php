<?php
 
include '../../../auth/config.php';


$uid = $_GET['uid'];
$stmt = $conn->prepare('UPDATE users usr
    set
    usr.active = 1
    where id = '.$uid.' ');

$stmt->execute();
header("Location: ../../a/allUsers");
