<?php
include 'config.php';

// Password must be between 5 and 20 characters long.
if (strlen($_POST['psw']) > 20 || strlen($_POST['psw']) < 5) {
    exit('Password must be between 5 and 20 characters long!');
}
// We need to check if the account with that username exists.
$stmt = $conn->prepare('SELECT username, password FROM users WHERE username = ? ');
$stmt->bind_param('i', $_POST['username']);
$stmt->execute();
$stmt->store_result();
// Store the result so we can check if the account exists in the database.
if ($stmt->num_rows > 0) {
    // student number already exists
    echo 'student number exists! Please choose another.';
} else {
    $stmt->close();
    // Username doesnt exists, insert new account
    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES(?, ?, ?);");
  
   
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
    $stmt->bind_param('sss', $_POST['username'], $_POST['email'], $password);
    $stmt->execute();
    $conn->close();
}

header('Location: ../pages/Login.php');
