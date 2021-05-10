<?php
require 'db_connect.php';

$id = htmlspecialchars(addslashes($_GET['id']));
$user = [];

$name = htmlspecialchars(addslashes($_POST['name']));
$author = htmlspecialchars(addslashes($_POST['author']));
$genre = htmlspecialchars(addslashes($_POST['genre']));
$release_Date = htmlspecialchars(addslashes($_POST['release_date']));

mysqli_query($db, "UPDATE books SET name = '$name', author = '$author', genre = '$genre', release_date = '$release_Date' WHERE id = " . $id);

header('Location: ../content/cont_books.php');
?>