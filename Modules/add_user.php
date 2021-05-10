<?php
require 'db_connect.php';

$user = [];

$login = htmlspecialchars(addslashes($_POST['login']));
$name = htmlspecialchars(addslashes($_POST['name']));
$surname = htmlspecialchars(addslashes($_POST['surname']));
$birth = htmlspecialchars(addslashes($_POST['birth']));
$phone = htmlspecialchars(addslashes($_POST['phone']));
$email = htmlspecialchars(addslashes($_POST['email']));
$password = htmlspecialchars(addslashes($_POST['password']));

if (!empty($login) && !empty($password)) {
    $password = md5(md5($password));

    mysqli_query($db, "INSERT INTO users (`name`, `surname`, `birth`, `phone`, `email`, `password`) VALUES ('$name', '$surname', '$birth', '$phone', '$email', '$password')");
}

header('Location: ../content/cont_users.php');