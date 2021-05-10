<?php
require 'db_connect.php';

$id = htmlspecialchars(addslashes($_GET['id']));
$author = [];

if (!empty($id)) {
    $result = mysqli_query($db, "SELECT * FROM authors WHERE id = " . $id);

    if (mysqli_num_rows($result) === 0) {
        die('Author not found');
    }

    $author = mysqli_fetch_assoc($result);
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
    <title>Author edit</title>
</head>
<body>
    <h1>Author edit</h1>
    <form method="post" action="update_author.php?id=<?=$id;?>" style="margin-top: 50px;">
        <fieldset>
            <p><input type="text" name="name" value="<?= $author['name']; ?>" placeholder="Name"></p>
            <p><input type="text" name="surname" value="<?= $author['surname']; ?>" placeholder="Surname"></p>
            <p><input type="date" name="birth" value="<?= $author['birth']; ?>" placeholder="Birth"></p>
            <p><input type="submit" value="Edit"></p>
        </fieldset>
    </form>
</body>
</html>
