<?php
require 'db_connect.php';

$id = htmlspecialchars(addslashes($_GET['id']));
$book = [];

if (!empty($id)) {
    $result = mysqli_query($db, "SELECT * FROM books WHERE id = " . $id);

    if (mysqli_num_rows($result) === 0) {
        die('Book not found');
    }

    $book = mysqli_fetch_assoc($result);
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
    <title>Book edit</title>
</head>
<body>
    <h1>Book edit</h1>
    <form method="post" action="update_book.php?id=<?=$id;?>" style="margin-top: 50px;">
        <fieldset>
            <p><input type="text" name="name" value="<?= $book['name']; ?>" placeholder="Name"></p>
            <p><input type="text" name="author" value="<?= $book['author']; ?>" placeholder="Surname"></p>
            <p><input type="date" name="genre" value="<?= $book['genre']; ?>" placeholder="Birth"></p>
            <p><input type="text" name="release_date" value="<?= $book['release_date']; ?>" placeholder="Phone"></p>
            <p><input type="submit" value="Edit"></p>
        </fieldset>
    </form>
</body>
</html>
