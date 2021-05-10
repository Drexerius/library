<?php
require 'db_connect.php';

$id = htmlspecialchars(addslashes($_GET['id']));
$user = [];

$name = htmlspecialchars(addslashes($_POST['name']));
$surname = htmlspecialchars(addslashes($_POST['surname']));
$birth = htmlspecialchars(addslashes($_POST['birth']));
$phone = htmlspecialchars(addslashes($_POST['phone']));
$email = htmlspecialchars(addslashes($_POST['email']));

mysqli_query($db, "UPDATE users SET name = '$name', surname = '$surname', birth = '$birth', phone = '$phone', email = '$email' WHERE id = " . $id);

header('Location: ../Content/cont_users.php');
?>