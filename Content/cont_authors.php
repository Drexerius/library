<?php
    require '../modules/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authors</title>
</head>
<body>
    <form method="post" action="../modules/add_author.php" style="margin-top: 50px;">
        <fieldset>
            <p><input type="text" name="name" placeholder="Name" required = true></p>
            <p><input type="text" name="surname" placeholder="Surname"></p>
            <p><input type="date" name="birth" placeholder="Birth"></p>
            <p><input type="submit" value="Add"></p>
        </fieldset>
    </form>

    <table border="1">
        <tr>
            <td>Name</td>
            <td>Surname</td>
            <td>Birth</td>
            <td>Edit</td>
        </tr>
        <?php if (count(getAuthors()) === 0) { ?>
            <tr>
                <td colspan="4">No authors found</td>
            </tr>
        <?php } else { foreach ($authors = getAuthors() as $author) { ?>
            <tr>
                <td><?= $author['name']; ?></td>
                <td><?= $author['surname']; ?></td>
                <td><?= $author['birth']; ?></td>
                <td>
                    <a href="../modules/edit_author.php?id=<?= $author['id']; ?>">Edit</a> /
                    <a href="../modules/delete_author.php?id=<?= $author['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php } } ?>
    </table>

    <form action="../modules/search_author.php" method="post">
        <input type="text" name="author" placeholder="Author" required = true>
        <input type="submit" value="Search">
    </form>

    <table border="1">
        <tr>
            <td>Authors</td>
            <td>Books</td>
        </tr>
        <?php foreach ($authors = getAuthorsBooks() as $el) { ?>
            <tr>
                <td><?= $el['name']; ?></td>
                <td><?= $el['COUNT(books.id)']; ?></td>
            </tr>
        <?php } ?>
    </table>

    <button><a href="../index.php">Return</a></button>
</body>
</html>

<?php

function getAuthorsBooks() : array
{
    global $db;
    $res2 = [];
    $res = mysqli_query($db, "SELECT authors.name, COUNT(books.id) FROM books
INNER JOIN authors ON books.author_id = authors.id
GROUP BY authors.id");
    for ($k = 0; $k < mysqli_num_rows($res); $k++) {
        $res2[] = mysqli_fetch_assoc($res);
    }
    return $res2;
}


function getAuthors(): array
{
    global $db;

    $authors = [];

    $result = mysqli_query($db, "SELECT * FROM authors");
    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        $authors[] = mysqli_fetch_assoc($result);
    }

    return $authors;
}
?>