<?php
require 'db_connect.php';

$id = htmlspecialchars(addslashes($_GET['id']));

if (!empty($id)) {
    mysqli_query($db, "DELETE FROM authors WHERE id = $id");
    header('Location: ../Content/cont_authors.php');
} else {
    die('ID not found');
}