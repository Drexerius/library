<?php
require 'db_connect.php';
$author = htmlspecialchars(addslashes($_POST['author']));
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>
</head>
<body>
<table border="1">
    <tr>
        <td>Name</td>
        <td>Author</td>
        <td>Genre</td>
        <td>Release date</td>
        <td>Edit</td>
    </tr>
    <?php if (count(getBooks()) === 0) { ?>
        <tr>
            <td colspan="5">No books found</td>
        </tr>
    <?php } else {
        foreach ($books = getBooks() as $book) { ?>
            <tr>
                <td><?= $book['name']; ?></td>
                <td><?= $book['author_name']; ?></td>
                <td><?= $book['genre_name']; ?></td>
                <td><?= $book['release_date']; ?></td>
                <td>
                    <a href="/edit_book.php?id=<?= $book['id']; ?>">Edit</a> /
                    <a href="/delete_book.php?id=<?= $book['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php }
    } ?>
</table>
</body>
</html>
<?php


function getBooks(): array
{
    global $db; global $author;
    $books_arr = [];

    $books = mysqli_query($db, "SELECT books.*, authors.name as author_name, genres.name as genre_name FROM books WHERE author_name LIKE '%$author%' OR author_surname LIKE '%$author%'
    INNER JOIN authors ON books.author_id = authors.id
    INNER JOIN genres ON books.genre_id = genres.id");
    for ($i = 0; $i < mysqli_num_rows($books); $i++) {
        $books_arr[] = mysqli_fetch_assoc($books);
    }

    return $books_arr;
}
?>
