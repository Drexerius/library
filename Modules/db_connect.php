<?php
$db = mysqli_connect('localhost', 'root', '', 'library');
if (mysqli_connect_errno()) {
    die('Error connecting to database');
} else {
    mysqli_query($db, "SET NAMES 'utf8'");
}