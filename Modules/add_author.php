<?php
require 'db_connect.php';

$author = [];

$name = htmlspecialchars(addslashes($_POST['name']));
$surname = htmlspecialchars(addslashes($_POST['surname']));
$birth = htmlspecialchars(addslashes($_POST['birth']));

if (!empty($name)) {
    mysqli_query($db, "INSERT INTO authors (`name`, `surname`, `birth`) VALUES ('$name', '$surname', '$birth')");
}

header('Location: ../content/cont_authors.php');