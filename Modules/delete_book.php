<?php
require 'db_connect.php';

$id = htmlspecialchars(addslashes($_GET['id']));

if (!empty($id)) {
    mysqli_query($db, "DELETE FROM books WHERE id = $id");
    header('Location: ../Content/cont_books.php');
} else {
    die('ID not found');
}