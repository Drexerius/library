<?php
require '../modules/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>

<body>
    <form method="post" action="../modules/add_book.php" style="margin-top: 50px;">
        <fieldset>
            <p><input type="text" name="name" placeholder="Name" required = true></p>
            <p><input type="text" name="author" placeholder="Author"></p>
            <p><input type="text" name="genre" placeholder="Genre"></p>
            <p><input type="date" name="release_date" placeholder="Release date"></p>
            <p><input type="submit" value="Add"></p>
        </fieldset>
    </form>

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
                        <a href="../modules/edit_book.php?id=<?= $book['id']; ?>">Edit</a> /
                        <a href="../modules/delete_book.php?id=<?= $book['id']; ?>">Delete</a>
                    </td>
                </tr>
        <?php }
        } ?>
    </table>

    <button><a href="../index.php">Return</a></button>
</body>

</html>

<?php



function getBooks(): array
{
    global $db;

    $books = [];

    $result = mysqli_query($db, "SELECT books.*, authors.name as author_name, genres.name as genre_name FROM books
    INNER JOIN authors ON books.author_id = authors.id
    INNER JOIN genres ON books.genre_id = genres.id");
    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        $books[] = mysqli_fetch_assoc($result);
    }

    return $books;
}
?>