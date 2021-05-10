<?php
require 'db_connect.php';

$id = htmlspecialchars(addslashes($_GET['id']));

if (!empty($id)) {
    mysqli_query($db, "DELETE FROM users WHERE id = $id");
    header('Location: ../content/cont_users.php');
} else {
    die('ID not found');
}