<?php
require '../modules/db_connect.php';

$page = $_GET['page'];
$per_page = 3;
$n = $page * $per_page - $per_page;
$res = mysqli_query($db, "SELECT * FROM users LIMIT $n, $per_page");
for ($k = 0; $k < mysqli_num_rows($res); $k++) {
    $res2 = mysqli_fetch_assoc($res);
    echo $res2['name'] . '<br>';
}

echo '<br>';
$res = mysqli_query($db, "SELECT * FROM users");
for ($k = 1; $k <= mysqli_num_rows($res) / $per_page; $k++) {
    echo '<a href="?page=' . $k . '">' . $k . '</a>    ';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <button><a href="index.php">Return</a></button>
</body>
</html>