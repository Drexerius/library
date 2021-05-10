<?php
require 'db_connect.php';

$id = htmlspecialchars(addslashes($_GET['id']));
$author = [];

$name = htmlspecialchars(addslashes($_POST['name']));
$surname = htmlspecialchars(addslashes($_POST['surname']));
$birth = htmlspecialchars(addslashes($_POST['birth']));

mysqli_query($db, "UPDATE authors SET name = '$name', surname = '$surname', birth = '$birth' WHERE id = " . $id);

header('Location: ../Content/cont_authors.php');
?>