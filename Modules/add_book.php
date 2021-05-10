<?php
require 'db_connect.php';

$book = [];

$name = htmlspecialchars(addslashes($_POST['name']));
$author = htmlspecialchars(addslashes($_POST['author']));
$genre = htmlspecialchars(addslashes($_POST['genre']));
$release_date = htmlspecialchars(addslashes($_POST['release_date']));

if (!empty($name)) {
    mysqli_query($db, "INSERT INTO books (`name`, `author`, `genre`, `release_date`) VALUES ('$name', '$author', '$genre', '$release_date')");
}

header('Location: ../Content/cont_books.php');