<?php
require 'db_connect.php';

$id = htmlspecialchars(addslashes($_GET['id']));
$user = [];

if (!empty($id)) {
    $result = mysqli_query($db, "SELECT * FROM users WHERE id = " . $id);

    if (mysqli_num_rows($result) === 0) {
        die('User not found');
    }

    $user = mysqli_fetch_assoc($result);
} else {
    die('ID not found');
}

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User edit</title>
</head>
<body>
    <h1>User edit</h1>
    <form method="post" action="update_user.php?id=<?=$id;?>" style="margin-top: 50px;">
        <fieldset>
            <p><input type="text" name="name" value="<?= $user['name']; ?>" placeholder="Name"></p>
            <p><input type="text" name="surname" value="<?= $user['surname']; ?>" placeholder="Surname"></p>
            <p><input type="date" name="birth" value="<?= $user['birth']; ?>" placeholder="Birth"></p>
            <p><input type="text" name="phone" value="<?= $user['phone']; ?>" placeholder="Phone"></p>
            <p><input type="email" name="email" value="<?= $user['email']; ?>" placeholder="Email"></p>
            <p><input type="submit" value="Edit"></p>
        </fieldset>
    </form>
</body>
</html>
